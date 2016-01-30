<?php 
    require("OAuth.php");

    $query_str = $_POST['tnpquery'];
    $url = "http://api.thenounproject.com/icons/".$query_str;

    $cc_key  = "ba1e0123de5441a0ae7bea59a69a5446";
    $cc_secret = "b51b40a1e4234c56858df0ebef8dc396";
    $search_results_limnit = 10;
    // $url = "http://api.thenounproject.com/icons/happy";
    $args = array();
    $args["limit"] = $search_results_limnit;
     
    $consumer = new OAuthConsumer($cc_key, $cc_secret);
    $request = OAuthRequest::from_consumer_and_token($consumer, NULL,"GET", $url, $args);
    $request->sign_request(new OAuthSignatureMethod_HMAC_SHA1(), $consumer, NULL);
    $url = sprintf("%s?%s", $url, OAuthUtil::build_http_query($args));
    $ch = curl_init();
    $headers = array($request->to_header());
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $rsp = curl_exec($ch);
    $the_json = json_decode($rsp);
    // echo$the_json->icons[0]->preview_url;
    echo$rsp;  

    // echo$query_str;
?>