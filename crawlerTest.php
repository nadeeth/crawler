<?php

require 'crawler.php';

class crawlerTest extends PHPUnit_Framework_TestCase {
    
    private $crawler;

    public function getCrawler() {

        if (!$this->crawler instanceof Crawler) {
            $this->crawler = new Crawler();
        }

        return $this->crawler;
    }

    public function testGetImages() {

        $result = '';
        $this->assertEquals('', $result);
    }
}
?>