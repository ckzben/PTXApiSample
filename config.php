<?php
    //definition ptx member parameter
    //http://ptx.transportdata.tw
    //(Public Transport Data eXchange，PTX)
    //reference https://gist.github.com/ptxmotc/383118204ecf7192bdf96bc0197bb981

    date_default_timezone_set('UTC');

    //會員ID、KEY
    define("APP_ID" , "");
    define("APP_KEY" , "");

    //API 認證授權機制
    function GetAuthorizationHeader()
    {
        $gtm_time = date( 'D, d M Y H:i:s \G\M\T' );
        $signature = base64_encode(hash_hmac('sha1', 'x-date: '. $gtm_time , APP_KEY , true )) ;

        $Authorization = 'hmac username="'.APP_ID.'", algorithm="hmac-sha1", headers="x-date", signature="'.$signature.'"';

        return array('Authorization'=>$Authorization ,'X-Date'=>$gtm_time );
    }

?>