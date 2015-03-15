<?php
class Email
{
    public static function SendVaricationMail($Name,$Email,$Userid)
    {
        $subject = 'Glipped Email Varification';
        $uid = md5(uniqid(time()));
        $header = "";
        $message = "Dear ".strip_tags($Name).", \r\n";
        $message .= "You are successfully signup as a glipped user. please for complete your signup click on varification link given in below. \r\n";
        $message .= "http://52.10.178.162/glipped/View/dashboard/varifyuser.php?uid=".$Userid." \r\n";
        $message .= "Thanks, \r\n";
        $message .= "Team Glipped \r\n";
        $header .= "From: info@glipped.com \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
        $header .= "This is a multi-part message in MIME format.\r\n";
        $header .= "--".$uid."\r\n";
        $header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
        $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $header .= $message."\r\n\r\n";
        $mail_sent = @mail ($Email,$subject,$message,$header);
        if($mail_sent)
        {
            echo "";
        }
        else
        {
            echo "";
        }
    }
}

