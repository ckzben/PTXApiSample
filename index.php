<?php
    //台北市公車 藍26 路線與站牌資料

    include_once("config.php");

    //台北市公車 藍26
    $RouteUID = 'TPE10432';

    //API 認證授權機制
    $ptxAu = GetAuthorizationHeader();

    $headers[] = 'Authorization: '. $ptxAu['Authorization'] .'';
    $headers[] = 'X-Date: '.$ptxAu['X-Date'] .'';

    $url = 'http://ptx.transportdata.tw/MOTC/v2/Bus/StopOfRoute/City/Taipei?$filter=RouteUID%20eq%20%27'.$RouteUID.'%27&$top=30&$format=JSON';

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPGET, TRUE);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers );

    $rsStopOfRoute = curl_exec ($curl);
    $rsStopOfRoute = json_decode( $rsStopOfRoute , true );


    var_dump( $rsStopOfRoute );

?>
