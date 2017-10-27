<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    
    public function index(){
    	$client = app()->make('DeliverClient');

    	$articles = $client->getItems([
    		'system.type' => 'article'
    	]);

    	$viewData = [
    		'articles' => $articles
    	];

    	return view('articles.index', $viewData);
    }

    public function detail($codename){
    	$client = app()->make('DeliverClient');

    	$article = $client->getItem($codename);

    	$related_articles = $article->getModularContent('related_articles')->getItems();

    	$viewData = [
    		'article' => $article,
    		'related_articles' => $related_articles
    	];

        $body_copy = $this->processRichText($article->getString('body_copy'), $client);
        $article->getElement('body_copy')->value = $body_copy;

    	return view('articles.detail', $viewData);
    }

    public function processRichText($text, $client){
        $crawler = new \Wa72\HtmlPageDom\HtmlPageCrawler('<div id="process-root">' . $text .'</div>');

        $itemObjects = [];

        $crawler->filter('object[type="application/kenticocloud"]')->each(function($node, $i) use (&$itemObjects) {

            if($node->attr('data-type') == 'item'){
                $objectID = $node->attr('data-codename');
                $node->attr('data-replace-id', $objectID);
                $itemObjects[$objectID] = $node;
            }
            //may need to process other object types
        });

        $items = $client->getItems([
            'system.codename[in]' => implode(',', array_keys($itemObjects))
        ]);
        //dd($items);
        foreach($items as $item){
            $node = $itemObjects[$item->system->codename];
            $objectView = view('shared.rich_text_item._' . $item->system->type);
            $objectView->with('item', $item);
            //dd($node);
            //dd($item);
            //dd($objectView->render());
            $node->replaceWith($objectView->render());
        }

        
        // Item links
        $crawler->filter('a[data-item-id]')->each(function($node, $i){
            if(!$node->attr('href')){
                $node->attr('href', '/rich_text_link/' . $node->attr('data-item-id'));
            }
        });

        $result = $crawler->filter('#process-root')->html();

        //dd($result);

        return $result;
    }
}
