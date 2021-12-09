<?php
include 'configwe.php';
include 'navigation.php';
?>
<?php
if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); 

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);

    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Negative amount cannot be transferred")'; 
        echo '</script>';
    }
 else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Insufficient Balance")'; 
        echo '</script>';
    }
  else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Zeroamountvalue cannot be transferred')";
         echo "</script>";
     }
  else {
         
        $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             

                
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='transferhistory.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}

?>

<html>
<head>
<style>
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
h2{
	margin-left: 30px;
}
select{
	margin-left: 99px;
	width: 80.50%;
	padding: 5px;
}
select option{
	font-size: 16px;
	font-family: arial;
}
input{
	margin-left: 99px;
	width: 80.50%;
	padding: 5px;	
}
button{
	width: 30%;
	text-align: center;
	padding: 15px 32px;
	border: none;
	color: white;
  font-size: 16px;
  cursor: pointer;
  margin-left: 35%;
  background-color: #4CAF50;
}
button:hover{
  background-color: #4CAF;
}
body{

  background-image: url("img/poster3.jpeg");
  background-repeat:no-repeat;
  background-position: center;
  background-size: cover;
}
</style>
</head>
<body>
<div class="trans"><h1>TRANSACTION</h1></div>
<h2>TRANSFER FROM:</h2>
<br>
<?php
  $sid=$_GET['id'];
  $sql = "SELECT * FROM  users where id=$sid";
  $result=mysqli_query($conn,$sql);
  if(!$result)
  {
   echo "Error : ".$sql."<br>".mysqli_error($conn);
  }
  $rows=mysqli_fetch_assoc($result);
?>
<form method="post" name="tcredit" class="tabletext" >
<table>
<tr>
	  <th>ID</th>
    <th>SENDER</th>
    <th>BALANCE</th>
</tr>
<tr>
	<td><?php echo $rows['id']?></td>
    <td><?php echo $rows['name']?></td>
    <td><?php echo $rows['balance']?></td>
</tr>
</table>

<br>
<h2>TRANSFER TO:</h2>
<br>
<select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
               
                $sid=$_GET['id'];
                $sql = "SELECT * FROM users where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                
                    Name : <?php echo$rows['name'] ;?> ; Balance :  
                    <?php echo $rows['balance'] ;?>  
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
<br>
<br>
<h2>AMOUNT :</h2>
<input type="number" placeholder="Enter amount" name="amount" required>
<br>
<br>
<br>
<br>
<button type="submit" name="submit">Transfer</button>
</form>
</body>
</html>
