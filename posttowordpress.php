<?php
 //wordpress post 

require_once("IXR_Library.php.inc");
 
//$client->debug = false; //Set it to false in Production Environment
 
$title=''; // $title variable will insert your blog title 
$body=''; // $body will insert your blog content (article content)
 
$category=","; // Comma seperated pre existing categories. Ensure that these categories exists in your blog.
$keywords="";
 
$customfields=array('icon'=>'123', 'developer'=>'Autor Bio Here'); // Insert your custom values like this in Key, Value format
 
//$customfields=array('icon'=>'123', 'developer'=>'Autor Bio Here'); // Insert your custom values like this in Key, Value format
 
 //meta
   $title = htmlentities($title,ENT_NOQUOTES,$encoding);
    $keywords = htmlentities($keywords,ENT_NOQUOTES,$encoding);
 
    $content = array(
        'title'=>$title,
        'description'=>$body,
        'mt_allow_comments'=>0,  // 1 to allow comments
        'mt_allow_pings'=>0,  // 1 to allow trackbacks
        'post_type'=>'post',
        'mt_keywords'=>$keywords,
        'categories'=>array($category),
        'customfields' =>  array($customfields)
 
 
    );
 
// Create the client object
$client = new IXR_Client('http://url/xmlrpc.php');
 
 $username = "username"; 
 $password = "password"; 
 $params = array(0,$username,$password,$content,true); // Last parameter is 'true' which means post immideately, to save as draft set it as 'false'
 


//print_r( $content );
// Run a query for PHP
if (!$client->query('metaWeblog.newPost', $params)) {
    die('Something went wrong - '.$client->getErrorCode().' : '.$client->getErrorMessage());
}
else
    echo "<p>Article Posted Successfully $title</p>";
    
    
    ?>
