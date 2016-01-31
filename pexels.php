<?php 
    // Get cURL resource
    // $curl = curl_init();
    // // Set some options - we are passing in a useragent too here
    
    // curl_setopt ($curl, CURLOPT_SSL_VERIFYHOST, 0);
    // curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, 0); 

    // $fields = array(
    // 'grant_type'=> urlencode('client_credentials'),
    // 'client_id'=>urlencode('p7mzm4c4amxrpakvuphy3d2w'),
    // 'client_secret'=>urldecode('F256dEavuns67bPf9mcb2TWsuT24R4a228UZh5fmwvYxZ')
    // );
    // $fields_string = '';
    // foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
    // rtrim($fields_string, '&');
    // // echo"field strug".$fields_string;
    // curl_setopt_array($curl, array(
    //     CURLOPT_POST => count($fields),
    //     CURLOPT_POSTFIELDS =>$fields_string, 
    //     CURLOPT_RETURNTRANSFER => 1,
    //     CURLOPT_URL => 'https://api.gettyimages.com/oauth2/token',
    //     CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    // ));
    // // Send the request & save response to $resp
    // $resp_token = curl_exec($curl);
    // $resp_token = json_decode($resp_token);
    // $access_token = $resp_token->access_token;
    // // echo"at is ".$access_token;  
    // getImages($access_token);
    // // if(!curl_exec($curl)){
    // // die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
    // // }
    //  curl_close($curl);
    
    // function getImages($access_token){
         // $search_phrase = "dog";
        $search_phrase = $_GET['phrase'];
        $url_pexels = 'http://api.pexels.com/v1/search?query='.$search_phrase.'&per_page=15&page=1';
       
         $curl = curl_init();
   
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Authorization: 563492ad6f91700001000001cad8e4f4038d40d36d6a44490f526000 '
        ));
        curl_setopt ($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, 0); 
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url_pexels,
            CURLOPT_USERAGENT => 'Codular Sample cURL Request'
        ));
        // Send the request & save response to $resp
        $resp = curl_exec($curl);
        // if(!curl_exec($curl)){
        // die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
        // }
        $the_json  = json_encode($resp);
        // echo $the_json;
        print_r($resp);
        // Close request to clear up some resources
        curl_close($curl);
    
    // }




?>