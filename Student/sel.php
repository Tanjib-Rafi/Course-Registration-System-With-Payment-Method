<?php
if (isset($_POST['enroll']))
{
if (!empty($_POST['chk1'])) 
{
  if (!empty($_POST['et']))
  {
    $roll_no = $_SESSION['roll_no']; 

    $values1= $_POST["et"];
    $values11= implode('',$values1);
    $values111= str_split($values11, 4);

    //$ck = json_encode($values111);
    var_dump($values111);
  
    //$i=0;
  

foreach($_POST['chk1'] as $checkbox1)
{

foreach($values111 as $ck)
{
  $sql5="INSERT INTO pendingcourse(exam_type) VALUES('$ck')";
  $stmt5 = $connect->prepare($sql5);
  $stmt5->execute();
}
}
  }}}
?>