<?php

require 'vendor/autoload.php'; // include Composer goodies

$client = new MongoDB\Client("mongodb://localhost:27017");

$collection = $client->mydb->shows;

// fetch all product documents
$cursor = $collection->find();

// How many results found
$num_docs = $collection->count();

$arr = array();
// do it!
if( $num_docs > 0 )
{
    // loop over the results
    foreach ($cursor as $obj) {
	
      //  echo '<br />Title: ' . $obj['title'] . "\n";
      //  echo '<br />Year: ' . $obj['year'] . "\n";
      //  echo '<br />Favorite: ' . $obj['favorite'] . "\n";
     //   echo "<br />\n";
	$temp = array("title"=>$obj['title'],"year"=>$obj['year'], "favorite"=>$obj['favorite']);
	array_push($arr, $temp);
    }
} else {
    // if no products are found, we show this message
    echo "No products found \n";
}

$myjson= json_encode( $arr);
echo '{ "shows": ' . $myjson . '}';

?>
