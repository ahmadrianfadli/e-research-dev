<?php

    function curlPost($url,$param){
        // return var_dump($param);
        $ch = curl_init($url);
        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $param) ;
            
        /* set the content type json */
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json','X-Token:'.$token.''));
            
        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
        /* execute request */
        $result = curl_exec($ch);

        //return var_dump($result);

        $resultJson =json_decode($result, TRUE);  
        /* close cURL resource */
        curl_close($ch);
        return $resultJson;
    }
    
?>