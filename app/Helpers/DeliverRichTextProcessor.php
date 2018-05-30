<?php
namespace App\Helpers;

use \Wa72\HtmlPageDom\HtmlPageCrawler;

class DeliverRichTextProcessor {

	protected $client = null;

	public function __construct($client = null){
		if(!$client){
			$client = app()->make('DeliverClient');
		}
		$this->client = $client;
	}
	
	public function processText($text){
        $crawler = new HtmlPageCrawler('<div id="process-root">' . $text .'</div>');

        $itemObjects = [];

        $crawler->filter('object[type="application/kenticocloud"]')->each(function($node, $i) use (&$itemObjects) {

            if($node->attr('data-type') == 'item'){
                $objectID = $node->attr('data-codename');
                $node->attr('data-replace-id', $objectID);
                $itemObjects[$objectID] = $node;
            }
            //may need to process other object types
        });

        $items = $this->client->getItems([
            'system.codename[in]' => implode(',', array_keys($itemObjects))
        ]);

        foreach($items->items as $item){
            $node = $itemObjects[$item->system->codename];
            $objectView = view('shared.rich_text_item._' . $item->system->type);
            $objectView->with('item', $item);
            $node->replaceWith($objectView->render());
        }

        
        // Item links
        $crawler->filter('a[data-item-id]')->each(function($node, $i){
            if(!$node->attr('href')){
                $node->attr('href', '/rich_text_link/' . $node->attr('data-item-id'));
            }
        });

        $result = $crawler->filter('#process-root')->html();

        return $result;
    }

}