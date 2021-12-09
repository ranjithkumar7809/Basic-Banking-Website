
<?php
include 'configwe.php';
?>

<html>
<head>
<style>
*{
	margin: 0;
	padding: 0;
	text-decoration: none;
	list-style: none;
}
nav {
height: 80px;
background-color:white;
}
nav ul{
	text-align: right;
	margin-right: 25px;
}
nav ul li{
	display: inline-block;
	line-height: 80px;
	margin: 0 15px;
}
nav ul li a{
	color: black;
	font-size: 20px;
	font-weight: bold;
}
nav img{
	position: absolute;
	margin-left: 10px;
	width: 75px;
	height: 75px;
}
</style>

</head>
<body>
<nav>
	<img src="img/banklogo.PNG">
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="transferhistory.php">Transaction History</a></li>
		<li><a href="transfermoney.php">Transfer Money</a></li>
	</ul>
</nav>

</body>
</html>
