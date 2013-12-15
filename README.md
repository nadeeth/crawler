crawler
=======

Usage

1. Initialize 

$crawler = new Crawler();

$crawler->url = "crawlerTestVictim.html";

$crawler->init();

Or

$crawler = new Crawler("crawlerTestVictim.html");

2. Query

Ex:

$images = $crawler->getTagAtrributes("img", "src");//Get the images

$headings = $crawler->getInnerText('h1');//Get the headings 

$links = $crawler->getTagAtrributes("a", "href");//Get the links