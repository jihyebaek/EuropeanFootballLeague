<?php 

    $today = date("Y-m-d");
    $token = "2028fdb68ba74648888062c2e307733b"; //API접속 토큰

    /* 
    * 프리미어리그 일정 
    */
    $uri = 'http://api.football-data.org/v4/competitions/PL/matches';
    $reqPrefs['http']['method'] = 'GET';
    $reqPrefs['http']['header'] = 'X-Auth-Token: 2028fdb68ba74648888062c2e307733b';
    $stream_context = stream_context_create($reqPrefs);
    $response = file_get_contents($uri, false, $stream_context);
    $result = json_decode($response,true);
    $plMatch = $result['matches'];
    
    for($i=0;$i<count($plMatch);$i++) {
        $plMatch[$i]['utcTime'] = substr($plMatch[$i]['utcDate'],-9,-4); //날짜시간형식의 값 중 시간만 가져와 담기
        $plMatch[$i]['utcDate'] = substr($plMatch[$i]['utcDate'],0,10); //날짜시간형식의 값 중 날짜만 가져와 담기
        $num[] = $plMatch[$i]['utcDate'];

        if($plMatch[$i]['utcDate'] == $today) {
            $plMatch[$i]['dDay'] = "today";
        } else if($plMatch[$i]['utcDate'] > $today) {
            $plMatch[$i]['dDay'] = "soon";
            if($plMatch[$i]['season']['startDate'] == $plMatch[$i]['utcDate']) {
                $plMatch[$i]['dDay'] = "first";
            }
        } else if($plMatch[$i]['utcDate'] < $today) {
            $plMatch[$i]['dDay'] = "done";
        }
    }


    /* 
    * 프리메라리그 일정 
    */
    $uri = 'http://api.football-data.org/v4/competitions/PD/matches';
    $reqPrefs['http']['method'] = 'GET';
    $reqPrefs['http']['header'] = 'X-Auth-Token: 2028fdb68ba74648888062c2e307733b';
    $stream_context = stream_context_create($reqPrefs);
    $response = file_get_contents($uri, false, $stream_context);
    $result = json_decode($response,true);
    $pdMatch = $result['matches'];

    for($i=0;$i<count($pdMatch);$i++) {
        $pdMatch[$i]['utcTime'] = substr($pdMatch[$i]['utcDate'],-9,-4); //날짜시간형식의 값 중 시간만 가져와 담기
        $pdMatch[$i]['utcDate'] = substr($pdMatch[$i]['utcDate'],0,10); //날짜시간형식의 값 중 날짜만 가져와 담기
        $num[] = $pdMatch[$i]['utcDate'];

        if($pdMatch[$i]['utcDate'] == $today) {
            $pdMatch[$i]['dDay'] = "today";
        } else if($pdMatch[$i]['utcDate'] > $today) {
            $pdMatch[$i]['dDay'] = "soon";
            if($pdMatch[$i]['season']['startDate'] == $pdMatch[$i]['utcDate']) {
                $pdMatch[$i]['dDay'] = "first";
            }
        } else if($pdMatch[$i]['utcDate'] < $today) {
            $pdMatch[$i]['dDay'] = "done";
        }
    }


    /* 
    * 분데스리가 일정 
    */
    $uri = 'http://api.football-data.org/v4/competitions/BL1/matches';
    $reqPrefs['http']['method'] = 'GET';
    $reqPrefs['http']['header'] = 'X-Auth-Token: 2028fdb68ba74648888062c2e307733b';
    $stream_context = stream_context_create($reqPrefs);
    $response = file_get_contents($uri, false, $stream_context);
    $result = json_decode($response,true);
    $blMatch = $result['matches'];

    for($i=0;$i<count($blMatch);$i++) {
        $blMatch[$i]['utcTime'] = substr($blMatch[$i]['utcDate'],-9,-4); //날짜시간형식의 값 중 시간만 가져와 담기
        $blMatch[$i]['utcDate'] = substr($blMatch[$i]['utcDate'],0,10); //날짜시간형식의 값 중 날짜만 가져와 담기
        $num[] = $blMatch[$i]['utcDate'];

        if($blMatch[$i]['utcDate'] == $today) {
            $blMatch[$i]['dDay'] = "today";
        } else if($blMatch[$i]['utcDate'] > $today) {
            $blMatch[$i]['dDay'] = "soon";
            if($blMatch[$i]['season']['startDate'] == $blMatch[$i]['utcDate']) {
                $blMatch[$i]['dDay'] = "first";
            }
        } else if($blMatch[$i]['utcDate'] < $today) {
            $blMatch[$i]['dDay'] = "done";
        }
    }

    
    /* 
    * 세리에A 일정 
    */
    $uri = 'http://api.football-data.org/v4/competitions/SA/matches';
    $reqPrefs['http']['method'] = 'GET';
    $reqPrefs['http']['header'] = 'X-Auth-Token: 2028fdb68ba74648888062c2e307733b';
    $stream_context = stream_context_create($reqPrefs);
    $response = file_get_contents($uri, false, $stream_context);
    $result = json_decode($response,true);
    $saMatch = $result['matches'];

    for($i=0;$i<count($saMatch);$i++) {
        $saMatch[$i]['utcTime'] = substr($saMatch[$i]['utcDate'],-9,-4); //날짜시간형식의 값 중 시간만 가져와 담기
        $saMatch[$i]['utcDate'] = substr($saMatch[$i]['utcDate'],0,10); //날짜시간형식의 값 중 날짜만 가져와 담기
        $num[] = $saMatch[$i]['utcDate'];

        if($saMatch[$i]['utcDate'] == $today) {
            $saMatch[$i]['dDay'] = "today";
        } else if($saMatch[$i]['utcDate'] > $today) {
            $saMatch[$i]['dDay'] = "soon";
            if($saMatch[$i]['season']['startDate'] == $saMatch[$i]['utcDate']) {
                $saMatch[$i]['dDay'] = "first";
            }
        } else if($saMatch[$i]['utcDate'] < $today) {
            $saMatch[$i]['dDay'] = "done";
        }
    }


    
    /* 
    * 프랑스리그1 일정 
    */
    $uri = 'http://api.football-data.org/v4/competitions/FL1/matches';
    $reqPrefs['http']['method'] = 'GET';
    $reqPrefs['http']['header'] = 'X-Auth-Token: 2028fdb68ba74648888062c2e307733b';
    $stream_context = stream_context_create($reqPrefs);
    $response = file_get_contents($uri, false, $stream_context);
    $result = json_decode($response,true);
    $flMatch = $result['matches'];

    for($i=0;$i<count($flMatch);$i++) {
        $flMatch[$i]['utcTime'] = substr($flMatch[$i]['utcDate'],-9,-4); //날짜시간형식의 값 중 시간만 가져와 담기
        $flMatch[$i]['utcDate'] = substr($flMatch[$i]['utcDate'],0,10); //날짜시간형식의 값 중 날짜만 가져와 담기
        $num[] = $flMatch[$i]['utcDate'];

        if($flMatch[$i]['utcDate'] == $today) {
            $flMatch[$i]['dDay'] = "today";
        } else if($flMatch[$i]['utcDate'] > $today) {
            $flMatch[$i]['dDay'] = "soon";
            if($flMatch[$i]['season']['startDate'] == $flMatch[$i]['utcDate']) {
                $flMatch[$i]['dDay'] = "first";
            }
        } else if($flMatch[$i]['utcDate'] < $today) {
            $flMatch[$i]['dDay'] = "done";
        }
    }
    
    //230706 페이징 테스트중
    if(isset($_GET['page'])) {$page = $_GET['page'];}
    else {
        $list = 20; //페이지 당 데이터 개수
        $pageNum = 5; //블럭 당 페이지 개수
        $page = isset($_GET["page"])? $_GET["page"] : 1;
        $totalPage = ceil(count($num)/ $list); //전체 페이지 수
        $totalBlock = ceil($totalPage / $pageNum); //전체 블럭 수
        $nowBlock = ceil($page / $pageNum); //현재블럭번호

         /* paging : 블럭 당 시작 페이지 번호 = (해당 글의 블럭번호 - 1) * 블럭당 페이지 수 + 1 */
         $s_pageNum = ($nowBlock - 1) * $pageNum + 1;
         // 데이터가 0개인 경우
         if($s_pageNum <= 0){$s_pageNum = 1;};

        /* paging : 블럭 당 마지막 페이지 번호 = 현재 블럭 번호 * 블럭 당 페이지 수 */
        $e_pageNum = $nowBlock * $pageNum;
        // 마지막 번호가 전체 페이지 수를 넘지 않도록
        if($e_pageNum > $totalPage){$e_pageNum = $totalPage;};
    }

    /* paging : 시작 번호 = (현재 페이지 번호 - 1) * 페이지 당 보여질 데이터 수 */
    $start = ($page-1) * $list;

    /* paging : 쿼리 작성 - limit 몇번부터, 몇개 */
    // $sql = "select * from members limit $start, $list_num;";

    // /* paging : 쿼리 전송 */
    // $result = mysqli_query($dbcon, $sql);

    /* paging : 글번호 */
    $cnt = $start + 1;


?>