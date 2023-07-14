<?php 
    
    if(!empty($_GET['league'])) {$lg = $_GET['league'];} 
    if(!empty($_GET['year'])) { $y = $_GET['year']; } else {$y = '2023';}

    $token = "2028fdb68ba74648888062c2e307733b"; //API접속 토큰

    /* 전체경기일정*/
    function getMatches($lg,$y) {  
        $uri = 'http://api.football-data.org/v4/competitions/'.$lg.'/matches/?season='.$y;
        $reqPrefs['http']['method'] = 'GET';
        $reqPrefs['http']['header'] = 'X-Auth-Token: 2028fdb68ba74648888062c2e307733b';
        $stream_context = stream_context_create($reqPrefs);
        $response = file_get_contents($uri, false, $stream_context);
        $matches = json_decode($response,true);
        $plMatch = $matches['matches'];
        
        for($i=0;$i<count($plMatch);$i++) {
            $plMatch[$i]['utcDate'] = substr($plMatch[$i]['utcDate'],0,10); //날짜시간형식의 값 중 날짜만 가져와 담기
        }

        return $plMatch;
    }
    $m = getMatches($lg,$y);

    /* 팀 순위 */
    function getTeamRanking($lg,$y) {
        $uri = 'http://api.football-data.org/v4/competitions/'.$lg.'/standings/?season='.$y;
        $reqPrefs['http']['method'] = 'GET';
        $reqPrefs['http']['header'] = 'X-Auth-Token: 2028fdb68ba74648888062c2e307733b';
        $stream_context = stream_context_create($reqPrefs);
        $response = file_get_contents($uri, false, $stream_context);
        $result = json_decode($response,true);
        $rankings = $result['standings'][0]['table'];

        return $rankings;
    }
    $tr = getTeamRanking($lg,$y);


    /* 득점 순위 */
    function getPointRanking($lg,$y) {
        $uri = 'http://api.football-data.org/v4/competitions/'.$lg.'/scorers/?season='.$y;
        $reqPrefs['http']['method'] = 'GET';
        $reqPrefs['http']['header'] = 'X-Auth-Token: 2028fdb68ba74648888062c2e307733b';
        $stream_context = stream_context_create($reqPrefs);
        $response = file_get_contents($uri, false, $stream_context);
        $result = json_decode($response,true);
        $rankings = $result['scorers'];

        for($i=0;$i<count($rankings);$i++) {
            $rankings[$i]['ranking'] = $i+1; //순위
        }

        return $rankings;
    }
    $pr = getPointRanking($lg,$y);

?>