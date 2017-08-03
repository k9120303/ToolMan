<script type='text/javascript'>
  function tableToInfo(job_id) {
      window.location.href = "../JobInfo/jobInfo.php?&job_id=" + job_id;
  }
</script>
<?php
  function getName($email)
  {
    include('../db_pdo_conn.php');
    $result = $db -> query("SELECT * FROM account WHERE email = '$email'");
    $row = $result->fetch();
    return $row['name'];
  }

  function tableList($title, $sql)
  {
    echo '<h1 style="font-family: 微軟正黑體">'.$title.'</h1>
          <table class="w3-table-all w3-large w3-hoverable">
            <tr style="background-color:#689F38; color:white;">
              <th>工作名稱</th>
              <th>工作類型</th>
              <th>工頭</th>
              <th>工具人</th>
              <th>地點</th>
              <th>薪水</th>
              <th>工作時間</th>
              <th>接案日期</th>
            </tr>';

    include("../db_pdo_conn.php");
    $result = $db -> query($sql);
    while($row = $result->fetch())
    {

      stateToShow($row[5], $row[0]);
      echo '<td>';
      echo $row[1].'</td>'; //名稱
      echo '<td>';
      typeToShow($row[2]);
      echo '</td>'; //類型
      echo '<td>'.getName($row[11]).'</td>';//工頭
      echo '<td>'.getName($row[12]).'</td>';//工具人
      echo '<td>'.$row[6].'</td>'; //地點
      echo '<td>'.$row[3].'</td>'; //薪水
      echo '<td>'.$row[4].'</td>'; //工作時間
      echo '<td>'.$row[10].'</td>';//接案日期
      echo '</tr>';
    }
    echo '</table><br>';
  }

  function tableListForSmall($title, $sql)
  {
    echo '<h1 style="font-family: 微軟正黑體">'.$title.'</h1>
          <table class="w3-table-all w3-slarge w3-hoverable">
            <tr style="background-color:#689F38; color:white;">
              <th>工作名稱</th>
              <th>工作類型</th>
              <th>薪水</th>
              <th>工作時間</th>
            </tr>';

    include("../db_pdo_conn.php");
    $result = $db -> query($sql);
    while($row = $result->fetch())
    {

      stateToShow($row[5], $row[0]);
      echo '<td style="width:100px;">';
      echo $row[1].'</td>'; //名稱
      echo '<td>';
      typeToShow($row[2]);
      echo '</td>'; //類型
      echo '<td>'.$row[3].'</td>'; //薪水
      echo '<td>'.$row[4].'</td>'; //工作時間
      echo '</tr>';
    }
    echo '</table><br>';
  }

  function stateToShow($state, $job_id)
  {
    switch ($state) {
      case "審核中":
          echo '<tr style="background-color:#81ADF7" onclick="tableToInfo('.$job_id.')">';
          break;
      case "未接案":
          echo '<tr style="background-color:#FFF079;" onclick="tableToInfo('.$job_id.')">';
          break;
      default:
          echo '<tr onclick="tableToInfo('.$job_id.')">';
    }
  }

  function typeToShow($type)
  {
    switch ($type) {
      case "art":
          echo '美術';
          break;
      case "communication":
          echo '交際';
          break;
      case "information":
          echo '資訊';
          break;
      case "academic":
          echo '學術';
          break;
      case "phy_stren":
          echo '勞力';
          break;
      default:
          echo '其他';
    }
  }
?>
