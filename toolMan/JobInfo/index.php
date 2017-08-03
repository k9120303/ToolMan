<?php
	require_once("dbcontroller.php");
	$db_handle = new DBController();
	$name = $_SESSION['AccountEmail'];
	$query ="SELECT * FROM work_evaluation WHERE job_id = '$get_job_id'";
	$result = $db_handle->runQuery($query);
?>
<HTML>
	<HEAD>
		<TITLE>Evaluation</TITLE>
		<style>
		body{width:610;}
		.demo-table {width: 100%;border-spacing: initial;margin: 20px 0px;word-break: break-word;table-layout: auto;line-height:1.8em;color:#333;}
		.demo-table th {background: #999;padding: 5px;text-align: left;color:#FFF;}
		.demo-table td {border-bottom: #f0f0f0 1px solid;background-color: #EEEEEE;padding: 5px;}
		.demo-table td div.feed_title{text-decoration: none;color:#00d4ff;font-weight:bold;}
		.demo-table ul{margin:0;padding:0;}
		.demo-table li{cursor:pointer;list-style-type: none;display: inline-block;color: #F0F0F0;text-shadow: 0 0 1px #666666;font-size:20px;}
		.demo-table .highlight, .demo-table .selected {color:#F4B30A;text-shadow: 0 0 1px #F48F0A;}
		</style>
		<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
		<script type='text/javascript' src="index.js"></script>
	</HEAD>

	<BODY>
		<table class="demo-table">
			<tbody>
				<?php
				if(!empty($result)) {
				$i=0;
				foreach ($result as $tutorial) {
				?>
				<tr>
					<td valign="top">
						<div id="tutorial-<?php echo $tutorial["job_id"]; ?>">
							<?php if($name == $tutorial['publisher']){ ?>
							<p>給這位工具人評分</p>
								<input type="hidden" name="rating" id="rating" value="<?php echo $tutorial["bossToMan"]; ?>" />
								<ul onMouseOut="resetRating(<?php echo $tutorial["job_id"]; ?>);">
								  <?php
								  for($i=1;$i<=5;$i++) {
								  $selected = "";
								  if(!empty($tutorial["bossToMan"]) && $i<=$tutorial["bossToMan"]) {
									$selected = "selected";
								  }
								  ?>
								  <li style="font-size:50px;" class='<?php echo $selected; ?>' onmouseover="highlightStar(this,<?php echo $tutorial["job_id"]; ?>);" onmouseout="removeHighlight(<?php echo $tutorial["job_id"]; ?>);" onClick="addRating(this,<?php echo $tutorial["job_id"]; ?>);">&#9733;</li>
								  <?php }  ?>
								<ul>
							<?php }; ?>

							<?php if($name == $tutorial['worker']){ ?>
							<p>給這位工頭評分</p>
								<input type="hidden" name="rating" id="rating" value="<?php echo $tutorial["manToBoss"]; ?>" />
								<ul onMouseOut="resetRating(<?php echo $tutorial["job_id"]; ?>);">
								  <?php
								  for($i=1;$i<=5;$i++) {
								  $selected = "";
								  if(!empty($tutorial["manToBoss"]) && $i<=$tutorial["manToBoss"]) {
									$selected = "selected";
								  }
								  ?>
								  <li style="font-size:50px;" class='<?php echo $selected; ?>' onmouseover="highlightStar(this,<?php echo $tutorial["job_id"]; ?>);" onmouseout="removeHighlight(<?php echo $tutorial["job_id"]; ?>);" onClick="addRating(this,<?php echo $tutorial["job_id"]; ?>);">&#9733;</li>
								  <?php }  ?>
								<ul>
							<?php }; ?>



						</div>
					</td>
				</tr>
				<?php
				}
				}
				?>
			</tbody>
		</table>
	</BODY>
</HTML>
