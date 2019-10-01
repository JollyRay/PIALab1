<?php
function streamlineArray($array, $add){
	$cou= count($array);
	if ($cou > 4)
		$cou=3;
	else
		$cou=$cou-1;
	
	for ($i = $cou; $i >= 0; $i--)
		$array[$i+1] = $array[$i];
	$array[0]=$add;
	return $array;
}
function pointSearch($R, $X, $Y)
{
	$Y=(float)trim(str_replace(",", ".", $Y));
	$R=(float)trim($R);
	$X=(float)trim($X);
	$bool=false;
    if($X>=0 && $Y>=0)
		$bool=(float)$X*(float)$X+(float)$Y*(float)$Y<=(float)$R*(float)$R/4;
	if($X<=0 && $Y>=0)
		$bool= (float)$Y-(float)$X<=(float)$R;
	if($X<=0 && $Y<=0)
		$bool= abs($X)<=$R && abs($Y)<=$R;
    return $bool;
}
session_start();
$messegeAnswer = (isset ($_SESSION["messegeAnswer"])) ? $_SESSION["messegeAnswer"] : "";
$arrayTry = (isset ($_SESSION["arrayTry"])) ? $_SESSION["arrayTry"] : [];
if(isset($_POST["parameterY"])){
	$parameterY=trim(htmlspecialchars($_POST["parameterY"]));
}else
{
	$parameterY='';
}
$_SESSION["parameterY"]=$parameterY;
$X = (isset ($_POST["myCheckboxX"])) ? $_POST["myCheckboxX"] : [];
$R = (isset ($_POST["myCheckboxR"])) ? $_POST["myCheckboxR"] : [];
if(isset($_POST["clear"])){
	$parameterY = "";
	$X=[];
	$R=[];
	$_SESSION["parameterY"]="";
	$_SESSION["messegeAnswer"]="";
	$messegeAnswer="";
}
if(isset($_POST["clearSession"])){
	session_destroy();
	$arrayTry=[];
}

if(isset($_POST["send"])){
	$start=microtime(true);
	$parameterY = trim(htmlspecialchars($_POST["parameterY"]));
	$_SESSION["parameterY"] = $parameterY;
	$X = (isset ($_POST["myCheckboxX"])) ? $_POST["myCheckboxX"] : [];
	$R = (isset ($_POST["myCheckboxR"])) ? $_POST["myCheckboxR"] : [];
	If ((count($X)*count($R)===1)&&(preg_match('/^-?[0-2]([.,][0-9]+)?$/', $parameterY) || preg_match('/^[3-4]([.,][0-9]+)?$/', $parameterY))){
		if (pointSearch($R[0], $X[0], substr($parameterY, 0, 12)))
			$messegeAnswer = "Попал";
		else
			$messegeAnswer = "Не попали";
		$_SESSION["messegeAnswer"]=$messegeAnswer;
		$arrayTry = streamlineArray($arrayTry, [$X[0], $parameterY, $R[0], $messegeAnswer, microtime(true)-$start]);
		$_SESSION["arrayTry"] = $arrayTry;

	}
	else
	{
		$messegeAnswer="";
		$_SESSION["messegeAnswer"] = $messegeAnswer;
	}
		
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
  <title>Камышников Владислав Р3201 Вариант 201010</title>
  <style>
body{background-image: url(back.png);}
td{text-align: center;}
DIV {padding: 10px;}
.header {
//	background: #D5BAE4;
	font-family: monospace;
	font-size: 30px;
	color: #000;
	text-align: center;
}
.layout {
	position: relative; width: 100%;
}
.layout > DIV {
	position: absolute;
	margin: 10px;
}
.col1 {
	background: transparent;
	width: 300px;
	left: 0px;
}
.col2 {
	left: 400px;
	width: 900px;
	padding: 0px;
}
.col3 {
//	background: #D3D3D3;
	left: 1345px;
	width: 300px;
	padding: 0px;
}
.realBox{
	background: #D3D3D3;
	border: 8px solid #999999;
}
#fdgvbnhjmk{
	height: 300px;
}
p {
	font-family: Verdana, sans-serif;
	font-size: 40px;
}
img:hover{
	border: 8px solid #999999;
}
  </style>
  <script type="text/javascript" src="main.js"></script>
</head>
<body>
<div class="header">P3201 Камышников Владислав Вариант 201010</div>
<div class="layout">
	<div class="col1" style="border: 0px;"></div>
	<div class="col2">
		<div align="center" class="realBox" id="fdgvbnhjmk"><img src="pictureForLab.png" alt="Картинка для варианта №201010">
		<p><?php echo $messegeAnswer?></p></div>
		<div></div>
		<div class="realBox">
		<table width="100%" border= 1px; cellspacing=0px;>
		<tr>
			<td colspan=6>Прошлыйе результаты</td>
		</tr>
		<tr>
			<td width="5%">№</td>
			<td width="5%">X</td>
			<td width="15%">Y</td>
			<td width="5%">R</td>
			<td width="10%">Попадание</td>
			<td width="60%">Время</td>
		</tr>
		<tr>
			<td>1</td>
			<td><?php echo((isset($arrayTry[0])) ? $arrayTry[0][0] : ''); ?></td>
			<td><?php echo((isset($arrayTry[0])) ? $arrayTry[0][1] : ''); ?></td>
			<td><?php echo((isset($arrayTry[0])) ? $arrayTry[0][2] : ''); ?></td>
			<td><?php echo((isset($arrayTry[0])) ? $arrayTry[0][3] : ''); ?></td>
			<td><?php echo((isset($arrayTry[0])) ? $arrayTry[0][4]." секнуд" : ''); ?></td>
		</tr>
		<tr>
			<td>2</td>
			<td><?php echo((isset($arrayTry[1])) ? $arrayTry[1][0] : ''); ?></td>
			<td><?php echo((isset($arrayTry[1])) ? $arrayTry[1][1] : ''); ?></td>
			<td><?php echo((isset($arrayTry[1])) ? $arrayTry[1][2] : ''); ?></td>
			<td><?php echo((isset($arrayTry[1])) ? $arrayTry[1][3] : ''); ?></td>
			<td><?php echo((isset($arrayTry[1])) ? $arrayTry[1][4]." секнуд" : ''); ?></td>
		</tr>
		<tr>
			<td>3</td>
			<td><?php echo((isset($arrayTry[2])) ? $arrayTry[2][0] : ''); ?></td>
			<td><?php echo((isset($arrayTry[2])) ? $arrayTry[2][1] : ''); ?></td>
			<td><?php echo((isset($arrayTry[2])) ? $arrayTry[2][2] : ''); ?></td>
			<td><?php echo((isset($arrayTry[2])) ? $arrayTry[2][3] : ''); ?></td>
			<td><?php echo((isset($arrayTry[2])) ? $arrayTry[2][4]." секнуд" : ''); ?></td>
		</tr>
		<tr>
			<td>4</td>
			<td><?php echo((isset($arrayTry[3])) ? $arrayTry[3][0] : ''); ?></td>
			<td><?php echo((isset($arrayTry[3])) ? $arrayTry[3][1] : ''); ?></td>
			<td><?php echo((isset($arrayTry[3])) ? $arrayTry[3][2] : ''); ?></td>
			<td><?php echo((isset($arrayTry[3])) ? $arrayTry[3][3] : ''); ?></td>
			<td><?php echo((isset($arrayTry[3])) ? $arrayTry[3][4]." секнуд" : ''); ?></td>
		</tr>
		<tr>
			<td>5</td>
			<td><?php echo((isset($arrayTry[4])) ? $arrayTry[4][0] : ''); ?></td>
			<td><?php echo((isset($arrayTry[4])) ? $arrayTry[4][1] : ''); ?></td>
			<td><?php echo((isset($arrayTry[4])) ? $arrayTry[4][2] : ''); ?></td>
			<td><?php echo((isset($arrayTry[4])) ? $arrayTry[4][3] : ''); ?></td>
			<td><?php echo((isset($arrayTry[4])) ? $arrayTry[4][4]." секнуд" : ''); ?></td>
		</tr>
		</table>
		</div>
	</div>
	<div class="col3">
	<div class="realBox">
		<form name="checkPoint" action="" method="post" id="form">
		<div>
		<table width="100%" id="fieldCheckX">
		<tr>
			<td colspan=10>X:</td>
		</tr>
		<tr>
			<td>-4</td>
			<td>-3</td>
			<td>-2</td>
			<td>-1</td>
			<td>0</td>
			<td>1</td>
			<td>2</td>
			<td>3</td>
			<td>4</td>
			<td>5</td>
		</tr>
		<tr>
			<td><input id="myCheckboxX-4" name="myCheckboxX[]" type="checkbox" value="-4" <?php if(in_array("-4", $X)) echo "checked='checked'";?>></td>
			<td><input id="myCheckboxX-3" name="myCheckboxX[]" type="checkbox" value="-3" <?php if(in_array("-3", $X)) echo "checked='checked'";?>></td>
			<td><input id="myCheckboxX-2" name="myCheckboxX[]" type="checkbox" value="-2" <?php if(in_array("-2", $X)) echo "checked='checked'";?>></td>
			<td><input id="myCheckboxX-1" name="myCheckboxX[]" type="checkbox" value="-1" <?php if(in_array("-1", $X)) echo "checked='checked'";?>></td>
			<td><input id="myCheckboxX0" name="myCheckboxX[]" type="checkbox" value="0" <?php if(in_array("0", $X)) echo "checked='checked'";?>></td>
			<td><input id="myCheckboxX1" name="myCheckboxX[]" type="checkbox" value="1" <?php if(in_array("1", $X)) echo "checked='checked'";?>></td>
			<td><input id="myCheckboxX2" name="myCheckboxX[]" type="checkbox" value="2" <?php if(in_array("2", $X)) echo "checked='checked'";?>></td>
			<td><input id="myCheckboxX3" name="myCheckboxX[]" type="checkbox" value="3" <?php if(in_array("3", $X)) echo "checked='checked'";?>></td>
			<td><input id="myCheckboxX4" name="myCheckboxX[]" type="checkbox" value="4" <?php if(in_array("4", $X)) echo "checked='checked'";?>></td>
			<td><input id="myCheckboxX5" name="myCheckboxX[]" type="checkbox" value="5" <?php if(in_array("5", $X)) echo "checked='checked'";?>></td>
		</tr>
		</table>
		</div>
		<div>
		<label>Параметр Y:</label>
		<input type="text" name="parameterY" value="<?php echo ((isset($parameterY)) ? $parameterY : ""); ?>" onkeyup="return proverka(this);" id="usersY" size =10px/>
		</div>
		<div>
		<table width="50%" id="fieldCheckR">
		<tr>
			<td colspan=5>R:</td>
		</tr>
		<tr>
			<td>1</td>
			<td>2</td>
			<td>3</td>
			<td>4</td>
			<td>5</td>
		</tr>
		<tr>
			<td><input id="myCheckboxR1" name="myCheckboxR[]" type="checkbox" value="1" <?php if(in_array("1", $R)) echo "checked='checked'";?>></td>
			<td><input id="myCheckboxR2" name="myCheckboxR[]" type="checkbox" value="2" <?php if(in_array("2", $R)) echo "checked='checked'";?>></td>
			<td><input id="myCheckboxR3" name="myCheckboxR[]" type="checkbox" value="3" <?php if(in_array("3", $R)) echo "checked='checked'";?>></td>
			<td><input id="myCheckboxR4" name="myCheckboxR[]" type="checkbox" value="4" <?php if(in_array("4", $R)) echo "checked='checked'";?>></td>
			<td><input id="myCheckboxR5" name="myCheckboxR[]" type="checkbox" value="5" <?php if(in_array("5", $R)) echo "checked='checked'";?>></td>
		</tr>
		</table>
		</div>
		<div>
		<div id="messegeAboutError"></div>
		<input type="submit" id="pushButton" name="send" value="Проверить" onclick="validate()" align="bottom" />
		<input type="submit" name="clear" value="Очистка" align="bottom" onclick="clearTable()"/>
		<input type="submit" name="clearSession" value="Разрыв сессии" align="bottom" />
		</div>
		</form>
	</div>
	</div>
</div>

</body>
</html>
