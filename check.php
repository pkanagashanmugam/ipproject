<?php
    $my=new mysqli("localhost","root","","project");
    $uname=$_POST['email'];
    $passw=$_POST['password'];
    $sql="select pass,name from userreg where email='".$uname."' ";
    $result=$my->query($sql);
    $row = $result->fetch_assoc();
    echo $row['pass'];
    if($row['pass']==$passw) {
        $name=$row['name'];
        $log="1";
        $quer="insert into session(emailid,logged) values ('$uname','$log')";
        $r=$my->query($quer);
        if($r == true){
            header("Location:Main.html?param=$name");
            exit();
        }
    }
    else{
    echo "LOGIN UNSUCCESSFUL";
    header("Location:Login.html");
        exit();
    }
?>
