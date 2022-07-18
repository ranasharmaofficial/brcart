<?php
								if($user['address']=='')
								{
									?>
									<?php
				if(is_array($user_address) && count($user_address) > 0) {
					foreach ($user_address as $val) {
						$userAddressId=$val['id'];
						$pin=$val['pin'];
						?>
									 
					<?php }
				}
					?>
								<?php } else { ?>
							<?php
				if(is_array($user_default_address) && count($user_default_address) > 0) {
					foreach ($user_default_address as $val) {
						$userAddressId=$val['id'];
						$pin=$val['pin'];
						?>
								 
					<?php }
				}
					?>								
								<?php } ?>		 
						 
								<?php 


 include('db.php');

 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT count(id) FROM pin where pin='$pin'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($count_pin);	
    while ($stmt->fetch()) {	
	
        		}  
}	


if($count_pin==1)
{
	 include('db.php');

 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT cod FROM pin where pin='$pin'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($cod);	
    while ($stmt->fetch()) {	
	
        		}  
}	


include('db.php');

 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT cod_limit FROM pin where pin='$pin'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($cod_limit);	
    while ($stmt->fetch()) {	
	
        		}  
}	

 


 
 
}
else
{
	$cod='NO';
	$cod_limit='NO';
}


?>	

if($cod=='YES')
{
if($cod_limit>=$price)
{
	$cod='YES';
}
ELSE
{
	$cod='NO';
}
}

$s=1;

include('db.php');
mysqli_set_charset($conn,"utf8");
$sql = "SELECT * FROM pin_charge where pin='$pin' and order_amount<='$price' order by delivery_amount asc";
$result = $conn->query($sql);
 
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

	 
		$delivery=$row['delivery_amount'];
		  
	
 } 	

$conn->close();
}

if(!isset($delivery))
{
	$delivery=0;
}