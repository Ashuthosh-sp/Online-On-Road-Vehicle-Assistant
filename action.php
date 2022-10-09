<?php
require('../hellomechanic/login/config.php');
$output='';
$query="SELECT * from vname where vtid='".$_POST['vtID']."' ORDER BY vname";
prx($query);
$result=mysqli_query($con,$query);
$output .='<option value ="" disabled selected> - Select vehcile-</option>';
while($row=mysqli_fetch_array($result))
{
    $output .='<option value="'.$row["id"].'">'.$row["vname"].'</option>';
}
echo $output;

?>