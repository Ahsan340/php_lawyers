<?php
$con=mysqli_connect("localhost","root","","lawww");
if($con){
    // echo "<script>alert('connection is successfull')</script>";
}
else{
    echo "<script>alert('connection is failed')</script>";
}
?>