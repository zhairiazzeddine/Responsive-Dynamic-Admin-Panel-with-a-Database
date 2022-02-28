<?php

function get_ip()
{
    if(isset($_SERVER['HTTP_CLIENT_IP']))
    {
        return $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
        return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
    }
}
$ip=get_ip();
$query=@unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
if (isset($query)){
    echo "ISP : ".$query['isp']."<br/>";
    echo "COUNTRY : ".$query['country']."<br/>";
    echo "COUNTRY CODE : ".$query['countryCode']."<br/>";
    echo "REGION NAME : ".$query['regionName']."<br/>";
    echo "CITY : ".$query['city']."<br/>";
    echo "ZIP : ".$query['zip']."<br/>";
    echo "LATITUDE : ".$query['lat']."<br/>";
    echo "LONGITUDE : ".$query['lon']."<br/>";
    echo "TIMEZONE : ".$query['timezone']."<br/>";
    echo "ORG : ".$query['org']."<br/>";
    echo "AS : ".$query['as']."<br/>";
    echo "IP ADRESSE : ".$ip;
}



?>