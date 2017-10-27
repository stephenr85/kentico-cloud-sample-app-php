<?php



function deliver_rich_text($text, $client = null){
	$processor = new App\Helpers\DeliverRichTextProcessor($client);
	return $processor->processText($text);
}