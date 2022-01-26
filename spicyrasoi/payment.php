
<?php
$url = "https://test.payu.in/merchant/postservice?form=2-H";
$req = curl_init($url);
curl_setopt($req, CURLOPT_URL, $url);
curl_setopt($req, CURLOPT_POST, true);
curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
$headers = array("Content-Type: application/x-www-form-urlencoded",);
curl_setopt($req, CURLOPT_HTTPHEADER, $headers);
$data = "key=&command=&var1=&var2=&var3=&var4=&var5=&var6=&var7=&var8=&var9=&hash=";
curl_setopt($req, CURLOPT_POSTFIELDS, $data);
$resp = curl_exec($req);
curl_close($req);
var_dump($resp);
