<?php
class Crawler {

  protected $page = '';

  public function __construct($uri) {
    $this->page = $this->read_page($uri);
  }

  public function read_page($uri) {
    return file_get_contents($uri); 
  }

  public function get_images($limit = 10) {
     
    $images = Array();
   
    if (!empty($this->page)){
   
        $xmlDoc = new DOMDocument();
        @$xmlDoc->loadHTML($this->page);
        $xpath = new DOMXPath(@$xmlDoc);

        $searchNode = $xpath->query("(//img)[position() <= {$limit}]");
       
        foreach ($searchNode as $node) {
           
            $images[] = $node->getAttribute('src');
        }
    }
   
    return $images;
  }

}

$crawl = new Crawler('https://www.google.com.sg/search?q=dogs&hl=en&source=lnms&tbm=isch&sa=X&ei=EzBDUbTeB460rAfLxIH4Ag&ved=0CAcQ_AUoAQ&biw=1301&bih=678');
$images = $crawl->get_images();

foreach ($images as $k=>$v) {
    echo "<img src='$v'>";
}

print_r($images);
?> 
