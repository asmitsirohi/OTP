<?php
    if(isset($_POST['submit'])) {
        session_start();

        $email = $_POST['email'];

        $rndno = rand(100000,999999);
    
        $to = $email;
    
        $subject = "OTP";
    
        $txt = "OTP: ".$rndno." ";
    
        $headers = "From: otp@techfesthub_Codingforum.com";
    
        mail($to,$subject,$txt,$headers);

        $_SESSION['email'] = $email;
        $_SESSION['otp'] = $rndno;

        header("location:verify_otp.php");
    }

?>

