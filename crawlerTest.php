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

        $crawler = new Crawler("crawlerTestVictim.html");
        
        $images = $crawler->getImages();        
        $this->assertEquals('image_one.jpg', $images[0]);
        $this->assertEquals('image_two.jpg', $images[1]);
        
        $images = $crawler->getImages(1);//test the limit
        $this->assertEquals(1, count($images));
        $this->assertEquals('image_one.jpg', $images[0]);
    }
    
    public function testGetHeadings() {

        $crawler = new Crawler();
        $crawler->url = "crawlerTestVictim.html";
        $crawler->init();//Manual initialization
        
        $headings = $crawler->getHeadings(1);//h1 headings
        $this->assertEquals('Title One', $headings[0]);
        $this->assertEquals('Title Two', $headings[1]);
        
        $headings = $crawler->getHeadings(1,1);//test the limit
        $this->assertEquals(1, count($headings));
        $this->assertEquals('Title One', $headings[0]);
    }
    
    public function testGetParagraphs() {

        $crawler = new Crawler("crawlerTestVictim.html");
        
        $paragraphs = $crawler->getParagraphs();
        $this->assertEquals('Paragraph one...', $paragraphs[0]);
        $this->assertEquals('Paragraph two...', $paragraphs[1]);
        
        $paragraphs = $crawler->getParagraphs(1);//test the limit
        $this->assertEquals(1, count($paragraphs));
        $this->assertEquals('Paragraph one...', $paragraphs[0]);
    }
    
    public function testGetInnerHtml() {

        $crawler = new Crawler("crawlerTestVictim.html");
        
        $content = $crawler->getInnerHtml('p');
        $this->assertEquals('Paragraph one...', $content[0]);
        $this->assertEquals('Paragraph two...', $content[1]);
        
        $content = $crawler->getInnerHtml('h1', 1);//test the limit
        $this->assertEquals(1, count($content));
        $this->assertEquals('Title One', $content[0]);
    }
}
?>