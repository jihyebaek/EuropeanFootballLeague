<?php 
    include_once("Controller/Curl.php");

    $today = date("Y-m-d"); //일정호출 시 사용
    $token = "2028fdb68ba74648888062c2e307733b"; //API접속 토큰

    /* 
    * 프리미어리그 일정 
    */
    function premier($today,$token) {
        $url = 'http://api.football-data.org/v4/competitions/PL/matches';
        $result = curl($url, $token);
        $json = json_encode($result); //StdClass Object형식 array로 바꾸기1
        $result = json_decode($json,true); //StdClass Object형식 array로 바꾸기2
        $data = $result['matches'];
            for($i=0;$i<count($data);$i++) {
                $data[$i]['utcTime'] = substr($data[$i]['utcDate'],-9,-4); //날짜시간형식의 값 중 시간만 가져와 담기
                $data[$i]['utcDate'] = substr($data[$i]['utcDate'],0,10); //날짜시간형식의 값 중 날짜만 가져와 담기
                $num[] = $data[$i]['utcDate'];
    
                if($data[$i]['utcDate'] == $today) {
                    $data[$i]['dDay'] = "today";
                } else if($data[$i]['utcDate'] > $today) {
                    $data[$i]['dDay'] = "soon";
                    if($data[$i]['season']['startDate'] == $data[$i]['utcDate']) {
                        $data[$i]['dDay'] = "first";
                    }
                } else if($data[$i]['utcDate'] < $today) {
                    $data[$i]['dDay'] = "done";
                }
            }
        return $data;
    }
   $plMatch = premier($today,$token);



    /* 
    * 프리메라리그 일정 
    */
    function primera($today,$token) {
        $url = 'http://api.football-data.org/v4/competitions/PD/matches';
        $result = curl($url, $token);
        $json = json_encode($result); //StdClass Object형식 array로 바꾸기1
        $result = json_decode($json,true); //StdClass Object형식 array로 바꾸기2
        $data = $result['matches'];
    
        for($i=0;$i<count($data);$i++) {
            $data[$i]['utcTime'] = substr($data[$i]['utcDate'],-9,-4); //날짜시간형식의 값 중 시간만 가져와 담기
            $data[$i]['utcDate'] = substr($data[$i]['utcDate'],0,10); //날짜시간형식의 값 중 날짜만 가져와 담기
            $num[] = $data[$i]['utcDate'];
    
            if($data[$i]['utcDate'] == $today) {
                $data[$i]['dDay'] = "today";
            } else if($data[$i]['utcDate'] > $today) {
                $data[$i]['dDay'] = "soon";
                if($data[$i]['season']['startDate'] == $data[$i]['utcDate']) {
                    $data[$i]['dDay'] = "first";
                }
            } else if($data[$i]['utcDate'] < $today) {
                $data[$i]['dDay'] = "done";
            }
        }
        return $data;
    } 
    $pdMatch = primera($today,$token);



    /* 
    * 분데스리가 일정 
    */
    function budesliga($today,$token) {
        $url = 'http://api.football-data.org/v4/competitions/BL1/matches';
        $result = curl($url, $token);
        $json = json_encode($result); //StdClass Object형식 array로 바꾸기1
        $result = json_decode($json,true); //StdClass Object형식 array로 바꾸기2
        $data = $result['matches'];

        for($i=0;$i<count($data);$i++) {
            $data[$i]['utcTime'] = substr($data[$i]['utcDate'],-9,-4); //날짜시간형식의 값 중 시간만 가져와 담기
            $data[$i]['utcDate'] = substr($data[$i]['utcDate'],0,10); //날짜시간형식의 값 중 날짜만 가져와 담기

            if($data[$i]['utcDate'] == $today) {
                $data[$i]['dDay'] = "today";
            } else if($data[$i]['utcDate'] > $today) {
                $data[$i]['dDay'] = "soon";
                if($data[$i]['season']['startDate'] == $data[$i]['utcDate']) {
                    $data[$i]['dDay'] = "first";
                }
            } else if($data[$i]['utcDate'] < $today) {
                $data[$i]['dDay'] = "done";
            }
        }
        return $data;
    }
    $blMatch = budesliga($today,$token);
    

    
    /* 
    * 세리에A 일정 
    */
    function serie($today,$token) {
        $url = 'http://api.football-data.org/v4/competitions/SA/matches';
        $result = curl($url, $token);
        $json = json_encode($result); //StdClass Object형식 array로 바꾸기1
        $result = json_decode($json,true); //StdClass Object형식 array로 바꾸기2
        $data = $result['matches'];
    
        for($i=0;$i<count($data);$i++) {
            $data[$i]['utcTime'] = substr($data[$i]['utcDate'],-9,-4); //날짜시간형식의 값 중 시간만 가져와 담기
            $data[$i]['utcDate'] = substr($data[$i]['utcDate'],0,10); //날짜시간형식의 값 중 날짜만 가져와 담기
            $num[] = $data[$i]['utcDate'];
    
            if($data[$i]['utcDate'] == $today) {
                $data[$i]['dDay'] = "today";
            } else if($data[$i]['utcDate'] > $today) {
                $data[$i]['dDay'] = "soon";
                if($data[$i]['season']['startDate'] == $data[$i]['utcDate']) {
                    $data[$i]['dDay'] = "first";
                }
            } else if($data[$i]['utcDate'] < $today) {
                $data[$i]['dDay'] = "done";
            }
        }
        return $data;
    }
    $saMatch = serie($today,$token);



    
    /* 
    * 프랑스리그1 일정 
    */
    function francd1($today,$token) {
        $url = 'http://api.football-data.org/v4/competitions/FL1/matches';
        $result = curl($url, $token);
        $json = json_encode($result); //StdClass Object형식 array로 바꾸기1
        $result = json_decode($json,true); //StdClass Object형식 array로 바꾸기2
        $data = $result['matches'];
    
        for($i=0;$i<count($data);$i++) {
            $data[$i]['utcTime'] = substr($data[$i]['utcDate'],-9,-4); //날짜시간형식의 값 중 시간만 가져와 담기
            $data[$i]['utcDate'] = substr($data[$i]['utcDate'],0,10); //날짜시간형식의 값 중 날짜만 가져와 담기
            $num[] = $data[$i]['utcDate'];
    
            if($data[$i]['utcDate'] == $today) {
                $data[$i]['dDay'] = "today";
            } else if($data[$i]['utcDate'] > $today) {
                $data[$i]['dDay'] = "soon";
                if($data[$i]['season']['startDate'] == $data[$i]['utcDate']) {
                    $data[$i]['dDay'] = "first";
                }
            } else if($data[$i]['utcDate'] < $today) {
                $data[$i]['dDay'] = "done";
            }
        }
        return $data;
    }
    $flMatch = francd1($today,$token);







