<?php
	session_start();
if (isset($_POST['x_coordinat_hidden']) && isset($_POST['y_coordinat']) && isset($_POST['radius']) ){
	$x = $_POST['x_coordinat_hidden'];
	$y =  str_replace(",", ".", $_POST['y_coordinat']);
	$radius = str_replace(",", ".", $_POST['radius']);

	$time_start = microtime(true); 

	//sample script
	for($i=0; $i<1000; $i++){
		if(($y>=$x-$radius && $x>=0 && $y<=0) || ((pow($x, 2)+pow($y,2)<=pow($radius, 2)) && $x>=0 && $y>0) || ($x<=0 && $y>=0 && $y<=$radius && $x>=-$radius)){
			$result="yes";
		} else $result="no";
	}

	$date = date("Y-m-d H:i:s", time());  

		

	$time_end = microtime(true);

	//dividing with 60 will give the execution time in minutes otherwise seconds
	$execution_time = ($time_end - $time_start);

	
	$html = "<tr>
			<th width='20%'>
				$x
			</th>
			<th width='20%'>
				$y
			</th>
			<th width='20%'>
				$radius
			</th>
			<th width='20%'>
				$date
			</th>
			<th width='20%'>
				$result
			</th>
			<th width='20%'>
				$execution_time
			</th>
		</tr>";
	$_SESSION["html"] = $_SESSION["html"] . $html;
	header('location:index.php');
	return;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" type="text/css">
	<title>Ибадуллаев Алибаба P3215</title>
</head>
<body>

	<h1 class="header" >Ибадуллаев Алибаба Эльбрус оглы <br>
	P3215 вариант: 15008</h1>
	<img src="areas.png" alt="This is picture of lab" class="image">

	<table border="1" cellpadding="0" cellspacing="0" width="100%">
		<form name="form" action="index.php" onsubmit="return validateForm()" method="post">
				<tr>
				<th width="50%" >Выберите координату по Х</th>
				<th width="50%">
					<input type="button" class="x_coordinate_button" name="x_coordinat" onclick="storeVar(this.value)" value="-5">
					<input type="button" class="x_coordinate_button" name="x_coordinat" onclick="storeVar(this.value)" value="-4">
					<input type="button" class="x_coordinate_button" name="x_coordinat" onclick="storeVar(this.value)" value="-3">
					<input type="button" class="x_coordinate_button" name="x_coordinat" onclick="storeVar(this.value)" value="-2">
					<input type="button" class="x_coordinate_button" name="x_coordinat" onclick="storeVar(this.value)" value="-1">
					<input type="button" class="x_coordinate_button" name="x_coordinat" onclick="storeVar(this.value)" value="0">
					<input type="button" class="x_coordinate_button" name="x_coordinat" onclick="storeVar(this.value)" value="1">
					<input type="button" class="x_coordinate_button" name="x_coordinat" onclick="storeVar(this.value)" value="2">
					<input type="button" class="x_coordinate_button" name="x_coordinat" onclick="storeVar(this.value)" value="3">
				</th>
			</tr>
			<tr>
				<th width="50%" >Выберите координату по Y</th>
				<th width="50%">
					<input type="text" name="y_coordinat" placeholder="(-5..3)">

				</th>
			</tr>
			<tr>
				<th width="50%" >Выберите радиус</th>
				<th width="50%">
					<input type="text" name="radius" placeholder="(2..5)">
				</th>
			</tr>
			<tr>
				<th colspan="2">
					<button>Проверить точку</button>
				</th>
			</tr>
			<input type="hidden" id="x" name="x_coordinat_hidden" />
		</form>
		
		<tr>
			<th colspan="2">
				<span id="error"></span>
			</th>
		</tr>
	</table>
	<script src="script.js"></script>
	
	<table border='1' cellpadding='0' cellspacing='0' width='100%' id="result_table">
		<tr>
			<th width='20%'>
				X
			</th>
			<th width='20%'>
				Y
			</th>
			<th width='20%'>
				Z
			</th>
			<th width='20%'>
				Время выполнения
			</th>
			<th width='20%'>
				Результат
			</th>
			<th width='20%'>
				Время, затраченное на выполнение скрипта
			</th>
		</tr>

		<?php
			$html=  $_SESSION["html"];
			echo $html;
		?>
	</table>

</body>
</html>
