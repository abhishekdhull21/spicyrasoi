<?php 
// $url = "https://test.payu.in/_payment";
// $req = curl_init($url);
// curl_setopt($req, CURLOPT_URL, $url);
// curl_setopt($req, CURLOPT_POST, true);
// curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
// $headers = array("Content-Type: application/x-www-form-urlencoded",);
// curl_setopt($req, CURLOPT_HTTPHEADER, $headers);
// $data = "key=gtKFFx&txnid=eCgNwAbJLRIWsY&amount=10&firstname=PayU User&email=test@gmail.com&phone=9876543210&productinfo=iPhone&pg=UPI&bankcode=UPI&surl=https://localhost/apidevlopment/product/add.php/&furl=https://apiplayground-response.herokuapp.com/&ccnum=&ccexpmon=&ccexpyr=&ccvv=&ccname=&txn_s2s_flow=&hash=02e4fd1d129a290742a16c9bf2214ff0be72e68a64c9e52ff7ff5bae0f1a371907b947e1fa87ec7f11a1407c93d5481d8466156985bbc3337a90d28bd0c401da";
// curl_setopt($req, CURLOPT_POSTFIELDS, $data);
// $resp = curl_exec($req);
// curl_close($req);
// var_dump($resp);


// $url = "https://test.payu.in/_payment";

// $req = curl_init($url);
// curl_setopt($req, CURLOPT_URL, $url);
// curl_setopt($req, CURLOPT_POST, true); 
// curl_setopt($req, CURLOPT_RETURNTRANSFER, true);

// $headers = array( "Content-Type: application/x-www-form-urlencoded", ); 
// curl_setopt($req, CURLOPT_HTTPHEADER, $headers);
// $data = "key=JP***g&txnid=P9oBZ41AZtPz0w&amount=10&firstname=PayU User&email=test@gmail.com&phone=9876543210&productinfo=iPhone&pg=UPI&bankcode=UPI&surl=https://apiplayground-response.herokuapp.com/&furl=https://apiplayground-response.herokuapp.com/&ccnum=&ccexpmon=&ccexpyr=&ccvv=&ccname=&txn_s2s_flow=&hash=22654e276be89b73412b16995b85214f5cdbe039c529ba960e6e1ea2f2f04f7c86c28ea6186531bb96193219f0f055ad033832111906cf9b89e62627179bb529";

// curl_setopt($req, CURLOPT_POSTFIELDS, $data);
// $resp = curl_exec($req);
// curl_close($req);
// var_dump($resp);
                                                 
?>
<html>
<body>
<form action='https://test.payu.in/_payment' method='post'>
<input type="hidden" name="key" value="JP***g" />
<input type="hidden" name="txnid" value="t6svtqtjRdl34W" />
<input type="hidden" name="productinfo" value="iPhone" />
<input type="hidden" name="amount" value="10" />
<input type="hidden" name="email" value="test@gmail.com" />
<input type="hidden" name="firstname" value="Ashish" />
<input type="hidden" name="lastname" value="Kumar" />
<input type="hidden" name="pg" value="UPI" />
<input type="hidden" name="bankcode" value="UPI" />
<input type="hidden" name="vpa" value="test123@okhdfcbank" />
<input type="hidden" name="surl" value="your own success url" />
<input type="hidden" name="furl" value="your own failure url" />
<input type="hidden" name="phone" value="9988776655" />
<input type="hidden" name="hash" value="eabec285da28fd0e3054d41a4d24fe9f7599c9d0b66646f7a9984303fd6124044b6206daf831e9a8bda28a6200d318293a13d6c193109b60bd4b4f8b09c90972" />
<input type="submit" value="submit"> </form>
</body>
</html>