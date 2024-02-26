<?php
    $my=new mysqli("localhost","root","","project");
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['phno'];
    $pass=$_POST['password'];
    $sql="insert into userreg (name,email,phno,pass) values('$name','$email','$mobile','$pass')";
    $final=$my->query($sql);
    if($final==true){
        header("Location:Login.html");
        exit();}
    else{
    echo "INSERT UNSUCESSEFULL";
    header("Location:signup.html");
        exit();}
?>