<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Fiveinone</title>
<style type="text/css">
body{
	background:url(images/fondo.jpg) top center !important;}
#news{
	background:url(images/LandingPage_03.jpg) top center !important;
	height:50px;
	width:590px;
	position:relative;
	top:228px;
	margin:0 auto;}
#social{
	height:32px;
	width:148px;
	position:relative;
	top:589px;
	margin:0 auto;}
input[type="email"]{
	font-size:14px;
	border:none;
	background-color: transparent !important;
	color: #46494a;
	width: 508px ;
	margin: 18px 0 18px 18px;
	overflow:hidden;}
input[type="email"]:focus{
	outline:0px;}
input[type="image"]{
	heigth:50px !important;
	width: 62px;
	border:none;}
#newsletter{
	display:inline-block;}
@-moz-document url-prefix() {
input[type="email"]{
width:510px;
border:none;
box-shadow:none;
}
}	
</style>
</head>

<body>
<?php
if(isset($_POST['email']))
{
	$email=$_POST['email'];
	
	$dbhost     = "localhost";
	$dbname     = "fiveino1_fiveinone";
	$dbuser     = "fiveino1_5i9";
	$dbpass     = "Nycolas86";
	$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	
	$sql="SELECT * FROM newsletter WHERE email='$email'";
	$consulta = $conn->prepare($sql);	
	$consulta -> execute();
	$contar = $consulta->fetchColumn();
	$msgError = "Email ya existe en nuestra base de datos";
	$msgBienvenida = "Gracias por registrarte";
	if($contar == 0)
	{
		$sql="INSERT INTO newsletter (EMAIL, PERMITE) VALUES ('$email', 1)";
		$consulta = $conn->prepare($sql);	
		$consulta -> execute();
		$conn = null;
		echo "<script type='text/javascript'>alert('$msgBienvenida');</script>";
	}
	else
	{
		echo "<script type='text/javascript'>alert('$msgError');</script>";
	}
}
?>
<div id="news">
<form id="newsletter" name="newsletter" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<div style="float:left; display:inline-block;">
<input type="email" placeholder="Envianos tu email y te avisamos cuando estemos listos." name="email" required>
</div>
<div style="float:left;">
<input type="image" name="submit" src="images/boton.jpg" alt="Submit">
</div>
</form>
</div>

<div id="social">
<img src="images/LandingPage_07.png">
<img style="margin-left:21px"src="images/LandingPage_09.png">
<img style="margin-left:21px"src="images/LandingPage_11.png">
</div>

</body>
</html>
