<?php
require_once('./vendor/autoload.php');

use Dadata\DadataClient;
use Location\Coordinate;
use Location\Distance\Vincenty;

if(!empty($_POST['address'])){

    $from = $_POST['address'];
    $to = 'г Москва, пр-кт Вернадского д 105';

    $token = "ee7513074795a91fedd389fbbef5aeb3dbc8b824";
    $secret = "94db2c650b46a628ce99e5548f746ffd02178ff5";
    $dadata = new DadataClient($token, $secret);

    $resultFfrom = $dadata->clean("address", $from);
    $resultTo = $dadata->clean("address", $to);

    $coordinate1 = new Coordinate($resultFfrom['geo_lat'], $resultFfrom['geo_lon']);
    $coordinate2 = new Coordinate($resultTo['geo_lat'], $resultTo['geo_lon']);
    $calculator = new Vincenty();

    $distance = $calculator->getDistance($coordinate1, $coordinate2);

    echo "расстояние от  $from  до $to составляет $distance метра!";
}else {
    exit("Поле адресс пустое");
}









