<?php
echo '<pre>';
$opts = array(
    'http'=>array(
        'method'=>"GET",
        'timeout' => 360,
        "header" => "Accept: xml/*, text/*, */*\r\n",
        "ignore_errors" => false
    )
);
$url = 'http://api.ilsa.ru/auto/v1/offers?q=dealer:RU73HY02&t=ASC&access_token=NjI5NmVmNmFkMzc3YWVjZDc3MmFiYTFiMDI2ZTk5ZGUyOTM4YzA3ODZiMTA1OTAwNzA1NjdjODcxYTBlOWY0YQ';
$context = stream_context_create($opts);
$file = file_get_contents( $url, false, $context);
$xml = new SimpleXMLElement($file);
$offers= $xml->xpath('//asc-stock/offers/offer');

foreach ($offers as $offer){
    $image = $offer->image . '<br>';
    var_dump($image);
    $equipments = $offer->xpath('//equipment');
    foreach ($equipments as $equipment) {
        print $equipment . '<br>' ;
    }
}



echo'</pre>';