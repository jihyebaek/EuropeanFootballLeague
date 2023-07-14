<?php
include_once("./header.php");
include_once("Controller/Index.php");
?>

<style>
  .cap{
      caption-side: top;
      text-align: center;
    }
  .tg{  
      border-collapse: collapse;
      border-color: #ccc;
      border-spacing: 0;
    }
    
    .tg td{
      background-color: #fff;
      border-color: #ccc;
      border-style: solid;
      border-width: 0px;
      color: #333;
      font-family: Arial, sans-serif;
      font-size: 14px;
      overflow: hidden;
      padding: 10px 5px;
      word-break: normal;
    }

    .tg th{
      background-color: #f0f0f0;
      border-color: #ccc;
      border-style: solid;
      border-width: 0px;
      color: #333;
      font-family: Arial, sans-serif;
      font-size: 12px;
      font-weight: normal;
      overflow: hidden;
      padding: 10px 5px;
      word-break: normal;
    }

    .tg .tr-list{
      text-align: center;
      vertical-align: top
    }

    .tg .tg-c3ow{
      border-color: inherit;
      text-align: center;
      vertical-align: top
    }
    .tg .tg-0lax{
      text-align: center;
      vertical-align: top;
      border-bottom: 1px solid gray;
    }

    .rankingtable {
      padding:1%;
    }
</style>

<script>
  function select(ths) {
    var yearVal = $("#selectyear option:selected").val();
    var leagueVal = $("#selecleague option:selected").val();
    window.location.href="./index.php?year="+yearVal+"&league="+leagueVal;
  }
</script>

<div class="rankingtable bestgoal">
  <p class="cap">경기 일정</p>
  <table class="tg" width="100%">
    <thead>
      <tr>
        <th class="tg-c3ow">날짜</th>
        <th class="tg-c3ow">시간</th>
        <th class="tg-c3ow">리그</th>
        <th class="tg-c3ow">홈팀</th>
        <th class="tg-c3ow">원정팀</th>
      </tr>
    </thead>
    <?php for($i=0;$i<count($plMatch);$i++) { if($plMatch[$i]['dDay'] == 'today' || $plMatch[$i]['dDay'] == 'first') {?>
      <tbody>
        <tr class="tr-list">
          <td class="tg-0lax"><?=$plMatch[$i]['utcDate']?></td>
          <td class="tg-0lax"><?=$plMatch[$i]['utcTime']?></td>
          <td class="tg-0lax"><img src="<?=$plMatch[$i]['competition']['emblem']?>" width="45px"></td>
          <td class="tg-0lax"><img src="<?=$plMatch[$i]['homeTeam']['crest']?>" width="25px">&nbsp;<?=$plMatch[$i]['homeTeam']['name']?></td>
          <td class="tg-0lax"><img src="<?=$plMatch[$i]['awayTeam']['crest']?>" width="25px">&nbsp;<?=$plMatch[$i]['awayTeam']['name']?></td>
        </tr>
      </tbody>
    <?php } }?>
  </table>
  <br/><br/>

  <table class="tg" width="100%">
    <thead>
        <tr>
          <th class="tg-c3ow">날짜</th>
          <th class="tg-c3ow">시간</th>
          <th class="tg-c3ow">리그</th>
          <th class="tg-c3ow">홈팀</th>
          <th class="tg-c3ow">원정팀</th>
        </tr>
      </thead>
      <?php for($i=0;$i<count($pdMatch);$i++) { if($pdMatch[$i]['dDay'] == 'today' || $pdMatch[$i]['dDay'] == 'first') {?>
        <tbody>
          <tr class="tr-list">
            <td class="tg-0lax"><?=$pdMatch[$i]['utcDate']?></td>
            <td class="tg-0lax"><?=$pdMatch[$i]['utcTime']?></td>
            <td class="tg-0lax"><img src="<?=$pdMatch[$i]['competition']['emblem']?>" width="45px"></td>
            <td class="tg-0lax"><img src="<?=$pdMatch[$i]['homeTeam']['crest']?>" width="25px">&nbsp;<?=$pdMatch[$i]['homeTeam']['name']?></td>
            <td class="tg-0lax"><img src="<?=$pdMatch[$i]['awayTeam']['crest']?>" width="25px">&nbsp;<?=$pdMatch[$i]['awayTeam']['name']?></td>
          </tr>
        </tbody>
      <?php } }?>
  </table>
  <br/><br/>

  <table class="tg" width="100%">
    <thead>
      <tr>
        <th class="tg-c3ow">날짜</th>
        <th class="tg-c3ow">시간</th>
        <th class="tg-c3ow">리그</th>
        <th class="tg-c3ow">홈팀</th>
        <th class="tg-c3ow">원정팀</th>
      </tr>
    </thead>
    <?php for($i=0;$i<count($blMatch);$i++) { if($blMatch[$i]['dDay'] == 'today' || $blMatch[$i]['dDay'] == 'first') {?>
      <tbody>
        <tr class="tr-list">
          <td class="tg-0lax"><?=$blMatch[$i]['utcDate']?></td>
          <td class="tg-0lax"><?=$blMatch[$i]['utcTime']?></td>
          <td class="tg-0lax"><img src="<?=$blMatch[$i]['competition']['emblem']?>" width="45px"></td>
          <td class="tg-0lax"><img src="<?=$blMatch[$i]['homeTeam']['crest']?>" width="25px">&nbsp;<?=$blMatch[$i]['homeTeam']['name']?></td>
          <td class="tg-0lax"><img src="<?=$blMatch[$i]['awayTeam']['crest']?>" width="25px">&nbsp;<?=$blMatch[$i]['awayTeam']['name']?></td>
        </tr>
      </tbody>
    <?php } }?>
  </table>
  <br/><br/>

  <table class="tg" width="100%">
    <thead>
      <tr>
        <th class="tg-c3ow">날짜</th>
        <th class="tg-c3ow">시간</th>
        <th class="tg-c3ow">리그</th>
        <th class="tg-c3ow">홈팀</th>
        <th class="tg-c3ow">원정팀</th>
      </tr>
    </thead>
    <?php for($i=0;$i<count($saMatch);$i++) { if($saMatch[$i]['dDay'] == 'today' || $saMatch[$i]['dDay'] == 'first') {?>
      <tbody>
        <tr class="tr-list">
          <td class="tg-0lax"><?=$saMatch[$i]['utcDate']?></td>
          <td class="tg-0lax"><?=$saMatch[$i]['utcTime']?></td>
          <td class="tg-0lax"><img src="<?=$saMatch[$i]['competition']['emblem']?>" width="45px"></td>
          <td class="tg-0lax"><img src="<?=$saMatch[$i]['homeTeam']['crest']?>" width="25px">&nbsp;<?=$saMatch[$i]['homeTeam']['name']?></td>
          <td class="tg-0lax"><img src="<?=$saMatch[$i]['awayTeam']['crest']?>" width="25px">&nbsp;<?=$saMatch[$i]['awayTeam']['name']?></td>
        </tr>
      </tbody>
    <?php } }?>
  </table>
  <br/><br/>

  <table class="tg" width="100%">
    <thead>
      <tr>
        <th class="tg-c3ow">날짜</th>
        <th class="tg-c3ow">시간</th>
        <th class="tg-c3ow">리그</th>
        <th class="tg-c3ow">홈팀</th>
        <th class="tg-c3ow">원정팀</th>
      </tr>
    </thead>
    <?php for($i=0;$i<count($flMatch);$i++) { if($flMatch[$i]['dDay'] == 'today' || $flMatch[$i]['dDay'] == 'first') {?>
      <tbody>
        <tr class="tr-list">
          <td class="tg-0lax"><?=$flMatch[$i]['utcDate']?></td>
          <td class="tg-0lax"><?=$flMatch[$i]['utcTime']?></td>
          <td class="tg-0lax"><img src="<?=$flMatch[$i]['competition']['emblem']?>" width="45px"></td>
          <td class="tg-0lax"><img src="<?=$flMatch[$i]['homeTeam']['crest']?>" width="25px">&nbsp;<?=$flMatch[$i]['homeTeam']['name']?></td>
          <td class="tg-0lax"><img src="<?=$flMatch[$i]['awayTeam']['crest']?>" width="25px">&nbsp;<?=$flMatch[$i]['awayTeam']['name']?></td>
        </tr>
      </tbody>
    <?php } }?>
  </table>
  <br/><br/>



</div>
