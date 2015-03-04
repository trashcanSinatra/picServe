<?php


$request;
$startVal;
$i = 1;
$id = 1;
$images = array();
$directory = opendir('_india/');
$max = 10000000000;


  if ( isset ( $_GET["action"], $_GET["start"] ) )
 {

    // used if both parameters are supplied.

  $request = $_GET["action"];
  $startVal = $_GET["start"];
  $startVal = $startVal - 1;

      if ($handle = $directory)
      {
       while ($entry = readdir($handle)) 
       {      
            if ($entry != "." && $entry != "..") 
           {
              $images[$i] = $entry;
              $i = $i + 1;
            }       
       }
               closedir($handle);
      }

$displayImages = array_slice($images, $startVal, $max, true);



$xml = new SimpleXMLElement('<xml/>');
      
  foreach ($displayImages as $key => $pic)
 {
    $pictures = $xml->addChild('picture');
    $pictures->addAttribute('id', "pic_$key");
    $pictures->addAttribute('src', addslashes("http://localhost/picServe/_india/" . $pic));
 }

    Header('Content-type: text/xml');
    print($xml->asXML());
    exit;


} else if ( isset ( $_GET["action"] ) && !isset( $_GET["start"] ) ) {

	// executed if only the required action parameter is supplied.

      $request = $_GET["action"];

	if ($handle = $directory)
      {
  	   while ($entry = readdir($handle)) 
  	   {	  	
      	      if ($entry != "." && $entry != "..") 
      	     {
        	   $images[$i] = $entry;
        	   $i = $i + 1;
            }     	
    	   }
   		   closedir($handle);
	}


  $xml = new SimpleXMLElement('<xml/>');
      
  foreach ($images as $key => $pic)
 {
    $pictures = $xml->addChild('picture');
    $pictures->addAttribute('id', "pic_$key");
    $pictures->addAttribute('src', addslashes("http://localhost/picServe/_india/" . $pic));
 }

    Header('Content-type: text/xml');
    print($xml->asXML());
    exit;

} else {

	// executed if the required action parameter is not provided.

  echo "";

}


