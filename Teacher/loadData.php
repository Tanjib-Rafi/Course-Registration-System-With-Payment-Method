<?php
require_once "connection.php";
$search=$_POST['search'];
$sql="select * from studentsignup "; 
if($search!=''){
	$sql.="where roll_no like '%$search%'";

}
$stmt=$connect->prepare($sql);
$stmt->execute();
$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
if(isset($data['0'])){
	$html='<table class="table table-bordered text-center" style="background-color: rgb(0, 225, 255);"><thead>
		<tr>
			<th>Roll No</th>
			<th>Student Name</th>
			<th>Action</th>
		  </tr>
		</thead>';
	foreach($data as $list){
		$html.='<tr>
			<td>'.$list['roll_no'].'</td>
			<td>'.$list['student_name'].'</td>
			<td><a href="?action=order&roll_no='.$list['roll_no'].'" class="btn btn-sm btn btn-warning" style="width: 120px;"> View</a></td>
		  </tr>';
	}	
	$html.='</table>';
	echo $html;	
}else{
	echo "<h4>Data not found</h4>";
}
?>