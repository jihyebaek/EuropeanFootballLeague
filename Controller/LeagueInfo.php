<?php 
    include_once("Controller/Curl.php");
    
    if(!empty($_GET['league'])) {$lg = $_GET['league'];} //리그종류
    if(!empty($_GET['year'])) { $y = $_GET['year']; } else {$y = '2023';} //리그년도
    $token = "2028fdb68ba74648888062c2e307733b"; //API접속 토큰

    /* 전체경기일정*/
    function getMatches($lg,$y,$token) {  
        $url = 'http://api.football-data.org/v4/competitions/'.$lg.'/matches/?season='.$y;
        $result = curl($url, $token);
        $json = json_encode($result); //StdClass Object형식 array로 바꾸기1
        $result = json_decode($json,true); //StdClass Object형식 array로 바꾸기2
        $plMatch = $result['matches'];
        
        for($i=0;$i<count($plMatch);$i++) {
            $plMatch[$i]['utcDate'] = substr($plMatch[$i]['utcDate'],0,10); //날짜시간형식의 값 중 날짜만 가져와 담기
        }

        return $plMatch;
    }
    $m = getMatches($lg,$y,$token);

    /* 팀 순위 */
    function getTeamRanking($lg,$y,$token) {
        $url = 'http://api.football-data.org/v4/competitions/'.$lg.'/standings/?season='.$y;
        $result = curl($url, $token);
        $json = json_encode($result); //StdClass Object형식 array로 바꾸기1
        $result = json_decode($json,true); //StdClass Object형식 array로 바꾸기2
        $rankings = $result['standings'][0]['table'];

        return $rankings;
    }
    $tr = getTeamRanking($lg,$y,$token);


    /* 득점 순위 */
    function getPointRanking($lg,$y,$token) {
        $url = 'http://api.football-data.org/v4/competitions/'.$lg.'/scorers/?season='.$y;
        $result = curl($url, $token);
        $json = json_encode($result); //StdClass Object형식 array로 바꾸기1
        $result = json_decode($json,true); //StdClass Object형식 array로 바꾸기2
        $rankings = $result['scorers'];

        for($i=0;$i<count($rankings);$i++) {
            $rankings[$i]['ranking'] = $i+1; //순위
        }

        return $rankings;
    }
    $pr = getPointRanking($lg,$y,$token);

?>