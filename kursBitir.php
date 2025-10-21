<?php

set_time_limit(-1);

/* BU DEGERLERI DEGISTIRIN*/
$cookie = "locale=tr; access_token=eyJhbGciOiJSUzI1NiJ9.eyJzdWIiOiIyODc1ODI1IiwiZG9tYWluIjoiQlRLIiwiaXNzIjoiS0IiLCJwaWQiOjI4NzgyMjUsIm9pZCI6NTEsImV4cCI6MTc2ODA0MzIzMywidXVpZCI6IjBiYzIyMTJhLTRlZDctNGIxNS1hMjNiLTE5NDA1MWQzNWYzYiIsImlhdCI6MTc2MDI2NzIzMywianRpIjoiMWY4ZDU1NjEtOWFlZS00NTMyLWIzMDktODBmNTA1ZDg2ZDVmIn0.Y-tDCzkIGTxVd2MMUi9tyuY46fkUpgm2G8WTSZS7HwhZj42fXI5lVYRQ9QPiUMCj_CWiYMo-tc302WqOO827Trc4BX1_uwmuxtA1IOHjfYbfNdBZzZYIwlkaAjNVyUM8LsiU6FxaspTT4ZXN_uvoP3ydzptVU81gXacPKscjvblhU9DnVVn36UNXD7xnME-U_yxpi37HS5jE8B4FRQAtQcoodw45XF6xDKJYzOde4u9FBtzaJszsQg8mPqpHJwfldMS5eXjrVlqyuuD6mzQHSqcqjwlTocWm1TnR_bF0_ActZQ0Fw649U8h__E2MVi_aH8yIhdcQcgPCs7F7sSpS9w; pacc_id=2875825; pal=true; dtCookie=v_4_srv_1_sn_7FCCF00EBF5BAB7ED45270B0A3251822_perc_100000_ol_0_mul_1_app-3Aa6235131c73ba348_1; _btk_t1=89252937cc57ba1eb4f6071761daa211; rxVisitor=17610588809491E6U0VVKOJN46SHUL645599A3CIRQKMM; account_id=51; _gid=GA1.3.10974422.1761068917; _announcements=1761070106859; _ga=GA1.3.1933822287.1760267178; dtSa=-; rxvt=1761072263280|1761068870106; dtPC=1$70463155_417h-vWBVCLIKARFAVURIJUORWCFMLIFKJVEAO-0e0; _gat=1; _ga_80X7LT6HWG=GS2.3.s1761068879$o4$g1$t1761070463$j60$l0$h0; dtLatC=1";
$kursURL = "https://www.btkakademi.gov.tr/portal/course/player/deliver/yeni-baslayanlar-icin-python-programlama-26252";
/* BU DEGERLERI DEGISTIRIN*/


$kursID = explode("/", $kursURL)[5];


function btkAkademiTamamla($i, $cookie, $url)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://www.btkakademi.gov.tr/portal/course/deliver/update-attempt/{$i}",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\"successStatus\":\"SUCCESS\",\"completionPercentage\":100,\"successPercentage\":100,\"attemptDuration\":95,\"totalDuration\":1000,\"newAttempt\":false,\"duration\":95,\"lastPosition\":422}",
        CURLOPT_HTTPHEADER => array(
            "Connection: keep-alive",
            "Accept: application/json, text/plain, */*",
            "X-CSRF-TOKEN: e1c922a6-429d-484f-8f95-710219e6bf03",
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36 OPR/68.0.3618.125",
            "Content-Type: application/json;charset=UTF-8",
            "Origin: https://www.btkakademi.gov.tr",
            "Sec-Fetch-Site: same-origin",
            "Sec-Fetch-Mode: cors",
            "Sec-Fetch-Dest: empty",
            "Referer: {$url}",
            "Accept-Language: en-US,en;q=0.9",
            "Cookie: {$cookie}"
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
}

function siteGet($url, $cookie){
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "{$url}",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Connection: keep-alive",
            "Accept: application/json, text/plain, */*",
            "X-CSRF-TOKEN: e1c922a6-429d-484f-8f95-710219e6bf03",
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36 OPR/68.0.3618.125",
            "Content-Type: application/json;charset=UTF-8",
            "Origin: https://www.btkakademi.gov.tr",
            "Sec-Fetch-Site: same-origin",
            "Sec-Fetch-Mode: cors",
            "Sec-Fetch-Dest: empty",
            "Referer: {$url}",
            "Accept-Language: en-US,en;q=0.9",
            "Cookie: {$cookie}"
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;
}

$re = '/<a href=".portal.course.deliver.'.$kursID.'.selectCourseId=(.*?)">/m';
$str = siteGet($kursURL, $cookie);

preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

$veriler = [];




foreach ($matches as $mm){
    $veriler[] = $mm[1];
}

foreach ($veriler as $id){
    btkAkademiTamamla($id, $cookie, $kursURL);
}
