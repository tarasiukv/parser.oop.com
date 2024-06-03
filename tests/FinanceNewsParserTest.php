<?php

use PHPUnit\Framework\TestCase;
use src\FinanceNewsParser;

class FinanceNewsParserTest extends TestCase
{
    public function testParse()
    {
        $url = 'https://search.cnbc.com/rs/search/combinedcms/view.xml?partnerId=wrss01&id=10000664';
        $parser = new FinanceNewsParser($url);
        $news = $parser->parse();

        var_dump($news);
        $this->assertNotEmpty($news);
        $this->assertIsArray($news);

        foreach ($news as $item) {
            $this->assertInstanceOf('src\BaseImporter', $item);
            $this->assertNotEmpty($item->getTitle());
            $this->assertNotEmpty($item->getDescription());
            $this->assertNotEmpty($item->getLink());
            $this->assertNotEmpty($item->getPubDate());
        }
    }
}

?>
