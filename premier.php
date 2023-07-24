<?php
include_once("./header.php");
include_once("Controller/LeagueInfo.php");
?>

<style>
    .bestgoal {
      padding:1%;
      margin-bottom: 350px;
    }
</style>

<script>
  function select(ths) {
    var yearVal = $("#selectyear option:selected").val();
    window.location.href="./premier.php?league=PL&year="+yearVal;

    var query = window.location.search;
    var param = new URLSearchParams(query);
    var year = param.get('year'); 

    $("#selectyear").val(year).attr("selected","selected");
  }
</script>

<h3><img src="<?=$m[0]['competition']['emblem']?>" width="100px">&nbsp;<?=$m[0]['competition']['name']?></h3>

<div class="leagueHeader" style="padding:2%;">
    <select class="btn btn-secondary btn-sm dropdown-toggle" id="selectyear" aria-expanded="false" onchange="select(this)">
    <option selected>연도</option>
    <option value="2023">2023</option>
    <option value="2022">2022</option>
    <option value="2021">2021</option>
    <option value="2021">2020</option>
    </select>
</div>

<form id="lgForm" name="lgForm" method="POST" action="Controller/Premier.php">
  <input type="hidden" id="leagueName" name="leagueName" value="PL" />
</form>

<div class="rankingtable bestteam" style="width:50%;float:left;margin-bottom:40px;">
  <p class="cap">팀 순위</p>
  <table class="tg" width="100%">
        <thead>
            <tr>
                <th class="tg-c3ow">순위</th>
                <th class="tg-c3ow">팀명</th>
                <th class="tg-c3ow">경기 수</th>
                <th class="tg-c3ow">승</th>
                <th class="tg-c3ow">무</th>
                <th class="tg-c3ow">패</th>
                <th class="tg-c3ow">득점</th>
            </tr>
            </thead>
            <tbody>
                <?php if(!empty($tr)) { for($i=0;$i<count($tr);$i++) { ?>
            <tr class="tr-list">
                <td class="tg-0lax"><?=$tr[$i]['position']?></td>
                <td class="tg-0lax"><img src="<?=$tr[$i]['team']['crest']?>" width="25px"></img>&nbsp;<?=$tr[$i]['team']['name']?></td>
                <td class="tg-0lax"><?=$tr[$i]['playedGames']?></td>
                <td class="tg-0lax"><?=$tr[$i]['won']?></td>
                <td class="tg-0lax"><?=$tr[$i]['draw']?></td>
                <td class="tg-0lax"><?=$tr[$i]['lost']?></td>
                <td class="tg-0lax"><?=$tr[$i]['points']?></td>
                
            </tr>
            <?php } } else { ?> 
                <td class="tg-0lax"></td>
                <td class="tg-0lax"></td>
                <td class="tg-0lax"></td>
                <td class="tg-0lax">시즌 개막 전으로 데이터가 없습니다.</td>
                <td class="tg-0lax"></td>
                <td class="tg-0lax"></td>
                <td class="tg-0lax"></td>
            <?php } ?>
            </tbody>
  </table>
</div>


<div class="rankingtable bestgoal" style="width:50%;float:right;">
  <p class="cap">득점 순위</p>
  <table class="tg" width="100%">
        <thead>
            <tr>
                <th class="tg-c3ow">순위</th>
                <th class="tg-c3ow">선수명</th>
                <th class="tg-c3ow">팀명</th>
                <th class="tg-c3ow">골</th>
                <th class="tg-c3ow">도움</th>
                <th class="tg-c3ow">패널티</th>
            </tr>
            </thead>
            <tbody>
                <?php if(!empty($pr)) { for($i=0;$i<count($pr);$i++) { ?>
            <tr class="tr-list">
                <td class="tg-0lax"><?=$pr[$i]['ranking']?></td>
                <td class="tg-0lax"><?=$pr[$i]['player']['name']?></td>
                <td class="tg-0lax">
                    <img src="<?=$pr[$i]['team']['crest']?>" width="25px"></img>
                &nbsp;<?=$pr[$i]['team']['name']?></td>
                <td class="tg-0lax"><?=$pr[$i]['goals']?></td>
                <td class="tg-0lax"><?=$pr[$i]['assists']?></td>
                <td class="tg-0lax"><?=$pr[$i]['penalties']?></td>
                
            </tr>
            <?php } } else { ?> 
                <td class="tg-0lax"></td>
                <td class="tg-0lax"></td>
                <td class="tg-0lax">시즌 개막 전으로 데이터가 없습니다.</td>
                <td class="tg-0lax"></td>
                <td class="tg-0lax"></td>
                <td class="tg-0lax"></td>
            <?php } ?>
            </tbody>
  </table>
</div>


<div class="leagueSchedule">
  <p class="cap">리그 전체 경기 일정</p>
  <table class="tg lgSkdTbl" width="100%">
      <thead>
          <tr>
              <th class="tg-c3ow">경기일</th>
              <th class="tg-c3ow">회차</th>
              <th class="tg-c3ow">리그</th>
              <th class="tg-c3ow">홈팀</th>
              <th class="tg-c3ow">스코어</th>
              <th class="tg-c3ow">원정팀</th>
          </tr>
      </thead>
      <?php for($i=0;$i<count($m);$i++) { ?>
      <tbody>
      <tr class="tr-list">
          <td class="tg-0lax"><?=$m[$i]['utcDate']?></td>
          <td class="tg-0lax"><?=$m[$i]['matchday']?></td>
          <td class="tg-0lax">
              <img src="<?=$m[$i]['competition']['emblem']?>" width="40"></img>&nbsp;</td>
          <td class="tg-0lax">
              <img src="<?=$m[$i]['homeTeam']['crest']?>" width="25"></img>&nbsp;<?=$m[$i]['homeTeam']['name']?></td>
          <td class="tg-0lax"><?=$m[$i]['score']['fullTime']['home']?> : <?=$m[$i]['score']['fullTime']['away']?></td>
          <td class="tg-0lax">
          <img src="<?=$m[$i]['awayTeam']['crest']?>" width="25"></img>&nbsp;<?=$m[$i]['awayTeam']['name']?></td>
      </tr>
      </tbody>
      <?php } ?>
  </table>
</div>
