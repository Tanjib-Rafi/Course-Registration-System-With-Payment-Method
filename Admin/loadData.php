<?php
require_once "connection.php";
$search=$_POST['search'];
$sql="select * from payment "; 
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
			<th>Token ID</th>
			<th>Balance Transaction</th>
            <th>Amount</th>
			<th>monthi</th>
		  </tr>
		</thead>';
	foreach($data as $list){
		$html.='<tr>
			<td>'.$list['roll_no'].'</td>
			<td>'.$list['trxid'].'</td>
			<td>'.$list['transaction'].'</td>
            <td>'.$list['amount'].'</td>
            <td>'.$list['monthi'].'</td>
		  </tr>';
	}	
	$html.='</table>';
	echo $html;	
}else{
	echo "<h4>Data not found</h4>";
}
?>
