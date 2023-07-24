<?php 

      /* CURL */
      function curl($url,$token) {
        $headers = array();
        $headers[] = "X-Auth-Token: ".$token;
        $ch = curl_init(); 
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        
        $result = curl_exec($ch);
        $result = json_decode($result); 

        return $result;
    }

?>