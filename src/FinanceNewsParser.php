<?php

namespace src;

class FinanceNewsParser extends Base
{
    protected function fetchXml() {
        $xml = file_get_contents($this->url);
        return new \SimpleXMLElement($xml);
    }

    public function parse() {
        $rssFeed = [];

        foreach ($this->xml->channel->item as $item) {
            $rssItem = new BaseImporter(
                (string)$item->title,
                (string)$item->description,
                (string)$item->link,
                (string)$item->pubDate
            );
            $rssFeed[] = $rssItem;
        }

        return $rssFeed;
    }
}