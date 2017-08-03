	<?php
	  include("../db_pdo_conn.php");
	  $sql = $db->prepare("SELECT * FROM job_list");
	  $sql->execute();
	  $sql2 = "SELECT * FROM job_list";
	  $result = $db -> query($sql2);
	  $row_total = $sql->rowCount();//取得總列數

	  //將資料存入二維陣列
	  for($j = 0;$j<($row_total);$j++){
		  $row = $result->fetch();
		  $jobList[$j] = $row;
		  for($k = 0;$k<9;$k++){
			$jobList[$j][$k] = urldecode(json_encode(urlencode($jobList[$j][$k])));
		  }
	  } 
  
	?>
	
	<script type="text/javascript">
	
		var geocoder;
		var map, popup;
		var info;

		
		function initMap() {
			
			info = <?php echo json_encode( $jobList ) ?>;
			map = new google.maps.Map(document.getElementById("map"), {
				zoom: 16,
				center: {lat:25.149864, lng:121.776512}
			});
			geocoder = new google.maps.Geocoder();
			popup = new google.maps.InfoWindow();
			document.getElementById('inputButton').addEventListener('click', function() {
				searchByAddr(geocoder,map);
			});
			document.getElementById('inputNowLocation').addEventListener('click', function() {
				searchByLocation();
			});
			codeAddress(geocoder,map);
		}
		
		window.addEventListener( "load", initMap, false );
		
		function searchByAddr(geocoder,map){
			var inputAddr = document.getElementById('inputAddress').value;
			geocoder.geocode( { 'address': inputAddr }, function(results, status) {//將地址轉成經緯度
						if (status == google.maps.GeocoderStatus.OK) {//如果轉換成功
							map.setCenter(results[0].geometry.location);//設定中心點
						} else {
							alert("失敗, 原因: " + status);
						}			
			});
		}
		
		
		function codeAddress(geocoder,resultMap) {
			
			var temp = <?php echo json_encode( $jobList ) ?>;
			var row_total = <?php echo $row_total?>;
			var marker;
			var j = 0;//挖資料存到marker
			var flag = true;
			
			
			//問老師 非同步問題
			for(var i = 0;i < row_total;i++){
					var addr = temp[i][6]; 
					if(temp[i][5] == "\"未接案\""){
						if(flag) j = i;
						flag = false;
						geocoder.geocode( { 'address': addr}, function(results, status) {//將地址轉成經緯度
							if (status == google.maps.GeocoderStatus.OK) {//如果轉換成功
															
								marker = new google.maps.Marker({//新增一個marker
									map: resultMap,
									position: results[0].geometry.location
								});
								
								
								while(temp[j][6] == "\"\"" || temp[j][5] != "\"未接案\""){//如果是空的，往下挖
									j++;
								}
								
								attachSecretMessage(marker,j);//欲新增到地圖上
								j++;
								
							}else{
								//if(temp[j][6] != "\"\"")
									j++;
							}	
						});
					}
			}	
		}
		//<a href="../jobInfo/jobInfo.php?&job_id='.$row[0].'">
		function attachSecretMessage(marker,index) {
			temp = info[index][0].replace(/[\"]/g, "");
			address = "工作名稱 : " + info[index][1] + "<br>" + 
					  "地點 : " + info[index][6] + "<br>" + 
					  "連絡電話：" + info[index][8] + "<br>" + 
					  "<a href = '../jobInfo/jobInfo.php?&job_id=" + temp + "'>more detail..</span>";
			var infowindow = new google.maps.InfoWindow({
			content: address
			});

			marker.addListener('click', function() {
				infowindow.open(marker.get('map'), marker);
			});
			
			
		}
		
		
		function searchByLocation(){
			var taipei = new google.maps.LatLng(25.08, 121.45);
			
			if(window.navigator.geolocation){   
				var geolocation=window.navigator.geolocation;   
				geolocation.getCurrentPosition(getPositionSuccess);   
			}else{   
				alert("你的瀏覽器不支援地理定位");   
				map.setCenter(taipei);   
			}     
		}
		
		function getPositionSuccess(position){   
				initialLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);   
				//定位到目前位置   
				map.setCenter(initialLocation);
		} 
		
			
    </script>
	
	<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBa_dzbNIgH2zfEowN0TMy4IwkId5QTN40">
    </script>
	