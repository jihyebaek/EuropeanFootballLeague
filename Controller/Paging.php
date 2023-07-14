<?php 
//230706 페이징 테스트중
if(isset($_GET['page'])) {$page = $_GET['page'];}
else {
    $list=20; //페이지 당 데이터 개수
    $pageNum=5; //블럭 당 페이지 개수
    $page = isset($_GET["page"])? $_GET["page"] : 1;
    $totalPage = ceil($plMatch / $list); //전체 페이지 수
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
?>