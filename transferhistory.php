<?php
include 'configwe.php';
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
}
body{

	background-image: url("img/poster2.jpeg");
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

</style>

</head>
<body>
<div class="trans"style ="color:black;">TRANSACTION HISTORY</div>
<table>
	<thead>
<tr>
	<th>SNO</th>
    <th>SENDER</th>
    <th>RECEIVER</th>
    <th>AMOUNT</th>
</tr>
</thead>
<tbody>
	<?php
	$sql="select * from transaction";
	$query = mysqli_query($conn,$sql);
	while($rows = mysqli_fetch_assoc($query))
	{
    ?>
<tr>
	<td><?php echo $rows['sno'] ?></td>
    <td><?php echo $rows['sender'] ?></td>
    <td><?php echo $rows['receiver'] ?></td>
    <td><?php echo $rows['balance'] ?></td>
</tr>
    <?php
    }
     ?>
</tbody>
</table>
</body>
</html>