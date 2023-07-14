<?php 

    $lg = 'PL';
    if(!empty($_POST['lg'])) {$lg = $_POST['lg'];}

    $token = "2028fdb68ba74648888062c2e307733b";
    
    $uri = 'http://api.football-data.org/v4/competitions/'.$lg.'/matches';
    $reqPrefs['http']['method'] = 'GET';
    $reqPrefs['http']['header'] = 'X-Auth-Token: 2028fdb68ba74648888062c2e307733b';
    $stream_context = stream_context_create($reqPrefs);
    $response = file_get_contents($uri, false, $stream_context);
    $matches = json_decode($response,true);
    $m = $matches['matches']; //리그 전체 경기일정
    print_r($m);

    for($i=0;$i<count($m);$i++) {
        $m[$i]['utcDate'] = substr($m[$i]['utcDate'],0,10); //날짜시간형식의 값 중 날짜만 가져와 담기
    }
    return $m;

?>