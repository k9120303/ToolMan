<!DOCTYPE html>
<html>
    <?php
      session_start();
      include('../forall.php');
      $email = $_SESSION['AccountEmail'];
      include("../db_pdo_conn.php");
      $sql2 = "SELECT * FROM account WHERE email = '$email'";
      $result2 = $db -> query($sql2);
      $row2 = $result2->fetch();

      $sql = "SELECT * FROM personal_info WHERE name = '$email'";
      $result = $db -> query($sql);
      $row = $result->fetch();
    ?>
    <body class="w3-content" style="max-width:1200px; background-color:#EEEEEE">
    <!-- Top header -->
    <header class="w3-container w3-xlarge">
      <p class="w3-left"><a href="../board/board.php" style="text-decoration:none">ToolMan</a>
    	<a href = "../profile/profile.php"><img src="../icon/Profile.png" style="margin-top: 25px; margin-left:10px; width:40px"></a>
    	<a href = "../toolbox/toolbox.php"><img src="../icon/toolbox.png" style="margin-top: 25px; margin-left:10px; width:40px"></a></p><br><br>
    </header>
	  <div style="background-color:white">
      <div><br>
		<img style="display:block; margin:auto;" class="img-responsive" src="../icon/profile2.png" alt="">
		<p style="text-align:center; font-family: 微軟正黑體; font-size:40px; font-weight:bold;"><?php echo $row2['name']; ?></p>
		<p style="text-align:center; font-family: 微軟正黑體; font-size:25px;">暱稱：<?php echo $row2['nick_name']; ?></p>
		<p style="text-align:center; font-family: 微軟正黑體; font-size:25px;">專長：<?php echo $row2['expertise']; ?></p>
      </div>
	<div id="chartdiv" ></div>
	<div id="barchart_values" style="width: auto; height: auto; margin:auto; word-break:break-all"></div><br>
	<div class="w3-center">
		<a href ="editProfile.php">
		<input style="font-family: 微軟正黑體; background-color:#689F38; font-weight:bold;" class="w3-btn w3-round-xxlarge" type="submit" value="修改個人檔案"/></a>
	</div><br>
	</div>

<!-- Styles -->
<style>
#chartdiv {
  width: 70%;
  height: 500px;
  margin: auto;
}

.myButton {
	background-color:#689F38;
	-moz-border-radius:11px;
	-webkit-border-radius:11px;
	border-radius:11px;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:22px;
	padding:6px 15px;
	text-decoration:none;
	text-shadow:0px 0px 0px #2f6627;
}
.myButton:hover {
	background-color:#cccccc;
}
.myButton:active {
	position:relative;
	top:1px;
}

</style>

<!-- ChartResources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/radar.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

<!-- Chart code -->
<script>
var chart = AmCharts.makeChart( "chartdiv", {
  "type": "radar",
  "theme": "light",
  "dataProvider": [ {
    "type": "資訊",
    "ability": <?php echo $row['information'];?>
  }, {
    "type": "美術",
    "ability": <?php echo $row['art'];?>
  }, {
    "type": "溝通",
    "ability": <?php echo $row['communication'];?>
  }, {
    "type": "體力",
    "ability": <?php echo $row['phy_stren'];?>
  }, {
    "type": "學術",
    "ability": <?php echo $row['academic'];?>
  }, {
    "type": "其他",
    "ability": <?php echo $row['other'];?>
  } ],
  "valueAxes": [ {
    "axisTitleOffset": 20,
    "minimum": 0,
    "axisAlpha": 0.15
  } ],
  "startDuration": 2,
  "graphs": [ {
    "balloonText": "[[value]] points of the ability",
    "bullet": "round",
    "lineThickness": 2,
    "valueField": "ability"
  } ],
  "categoryField": "type",
  "export": {
    "enabled": true
  }
} );
</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load("current", {packages:["corechart"]});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ["Element", "Density", { role: "style" } ],
    ["5星", <?php echo $row['star5'];?>, "#b87333"],
    ["4星", <?php echo $row['star4'];?>, "orange"],
    ["3星", <?php echo $row['star3'];?>, "gold"],
    ["2星", <?php echo $row['star2'];?>, "color: #FFF8BC"],
    ["1星", <?php echo $row['star1'];?>, "color: #e5e4e2"]
  ]);

  var view = new google.visualization.DataView(data);
  view.setColumns([0, 1,
                   { calc: "stringify",
                     sourceColumn: 1,
                     type: "string",
                     role: "annotation" },
                   2]);

  var options = {
    title: "評分",
    width: "100%",
    height: 200,
    bar: {groupWidth: "100%"},
    legend: { position: "none" },
  };
  var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
  chart.draw(view, options);
}
</script>

</body>

</html>
