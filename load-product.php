<?php
 
$conn = mysqli_connect("localhost","u891088891_harshbaazar_db","!=%Rana@9534540361","u891088891_harshbaazar_db") or die(" ");
// $search_term = 'n';
$search_term = $_GET['product'];
$sql = "SELECT distinct name, id,slug, price FROM products WHERE name LIKE '%{$search_term}%' OR meta_tag LIKE '%{$search_term}%'  order by (name = '$search_term') desc limit 10";

if ($search_term != "") {

	$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "<ul style='background:#ECF0F1;border: 1px solid #ECF0F1;list-style: none;>'";

	if(mysqli_num_rows($result) > 0){
	    
		while($row = mysqli_fetch_assoc($result)){
		    
		    
		$output .= "<a style='text-decoration:none;' href='https://ubaazar.com/item/{$row['slug']}'>
			<li  onclick='window.location.href='https://ubaazar.com/item/{$row['slug']}'' style='text-decoration:none;border-radius: 3px;padding:3px;color:#000;font-size:16px;'>{$row['name']} </li>
		
		</a><hr style='margin:1px;'>";
			
			
		}
  }else
  {  
  	$output .= "<li style='pointer-events:none;cursor: default;'><p style='color:#000;font-size:14px;' class='font-weight-bold'>Your product has not been added yet.<br>It will be added very soon.</br>
						Send your product name through WhatsApp.

  
						</p>

						</li>";
  } 
  
  
$output .= "</ul>";

}
echo $output;

?>
