<?php

require_once "connection.php";

if(!isset($_SESSION["roll_no"]))
{
  header("location:StudentLogin.php");
}
?>

<?php
$stmt = $connect->query("SELECT a.*, b.totalfee,b.tuitionfee,b.examfee  
from pendingcourse  a
left join coursetable b on a.course_id=b.course_id WHERE a.status = 1 and a.roll_no ='". $_SESSION["roll_no"]."'");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$total=0;
foreach($rows as $row)
{
?>
           
            
<?php	
		 $total=$total+($row['tuitionfee'] + $row['examfee'] );
}
?>
<th>Total</th>
<th><?php echo number_format($total,2)?></th>  