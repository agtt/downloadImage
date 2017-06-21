<?php


require_once('function.php');

$images = [
     'http://pic3.nipic.com/20090514/2639204_233912087_2.jpg',
     'http://pic1a.nipic.com/2008-10-22/20081022103550586_2.jpg'
     ];
        
foreach ( $images as $url ) {
    $res = downloadImage($url);
        if ($res !== false) {
            echo "123";
        } else {
            echo "456";
        }
}
