<?php

include './config.php';

$sql = "SELECT * FROM `products`";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        $percentssssss = (($row['previous_price'] - $row['price']) * 100) / $row['previous_price'];
        $is_discount = round($percentssssss);                                           
		$id=$row['id']; 

        update_discount($is_discount,$id);

    }

    // $sql = "INSERT INTO `cron_job` (`name`, `status`)

            // VALUES ('Success - Matching Income', '1')";

    if ($conn->query($sql) === true) {

        echo "New record created successfully";

    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;

    }

} else {

    if ($conn->query($sql) === true) {

        echo "Failed record created successfully";

    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;

    }

}

 
function update_discount($is_discount,$id)
{

    global $conn;

    $query = $conn->query("UPDATE products set is_discount='$is_discount' where id='$id'");

    if ($query === true) {

        header('location: edit_notice.php?update=true&id=');

    } else {

        header('location: edit_notice.php?false_update&id=');

    }

} 