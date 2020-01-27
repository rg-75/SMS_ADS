<?php
system('clear');
$ip = "10.182.118.97:1688";
$s= 0;
$f= 0;
system('clear');
$n = file_get_contents("number.txt");
$n1 = explode("\n",$n);
$message= urlencode(file_get_contents("message.txt"));
foreach($n1 as $to) {
    $sms_information = "To=".$to."&Message=".$message;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"http://".$ip."/services/api/messaging/");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $sms_information);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $page = curl_exec($ch);
    curl_close ($ch);
    if($page != ""){
        $s++;
    }
    else{
        $f++;
    }
system('clear');
echo "
                        SMS-ADS
     /*-----------------------------------------*\
    /*-------------------RG-75-------------------*\
   /*---------------------------------------------*\
        Ip API             |    ".$ip."
        Sms Sent           |    ".$s."
        Sms No Sent        |    ".$f."
        next number        |    ".$to."
   \*---------------------------------------------*/
    \*-------------------------------------------*/
     \*------------------------ Created By Zaki */
";
sleep(10);
}
?>
