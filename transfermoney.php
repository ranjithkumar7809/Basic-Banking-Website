<?php
include 'configwe.php';
$sql="select * from users";
$result=mysqli_query($conn,$sql);
?>
<?php
include 'navigation.php';
?>

<html>
<head>
<style>
*{
	margin: 0;
	padding: 0;
	text-decoration: none;
	list-style: none;
}body{

	background-image: url("img/poster1.jpeg");
	background-repeat:no-repeat;
	background-position: center;
	background-size: cover;
}

.trans{
	text-align: center;
	font-weight: bold;
	line-height: 100px;
	font-size: 20px;
}
table{
	  background-color: rgba(255,255,255,0.4);
	margin-left: 10%;
	font-family:arial;
	border-collapse: collapse;
	width: 80%;
}
td,th{
	border: 1px solid red;
	text-align: center;
	padding: 8px;
}
tr:nth-child{
	background-color: #dddddd;
}
button{
	padding:3px;
	background-color:#008080;
}
</style>

</head>
<body>
<div class="trans">TRANSFER MONEY</div>
<table>
<tr>
	<th>ID</th>
    <th>NAME</th>
    <th>E-MAIL</th>
    <th>BALANCE</th>
    <th>TRANSFER</th>
</tr>
<?php
	$sql="select * from users";
    $result=mysqli_query($conn,$sql);
    while($rows=mysqli_fetch_assoc($result))
    {
?>
<tr>
	<td><?php echo $rows['id']?></td>
    <td><?php echo $rows['name']?></td>
    <td><?php echo $rows['email']?></td>
    <td><?php echo $rows['balance']?></td>
    <td><a href="calculation.php?id= <?php echo $rows['id'];?>"><button>transfer</button></a></td>
</tr>
    <?php
    }
    ?>
</table>
</body>
</html>
