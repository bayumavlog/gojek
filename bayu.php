<?php

error_reporting(0);
include ("func.php");
echo "\e            GOJEK VERSION 1.7.1            \n";
echo "\e SCRIPT GOJEK AUTO REGISTER BAYU DWI DIRGANTARA\n";
echo "\n";
nope:
echo "\e[?] Masukkan Nomor HP Anda : ";
$nope = trim(fgets(STDIN));
$cek = cekno($nope);
if ($cek == false)
    {
    echo "\e[x] Nomor Telah Terdaftar\n";
			goto nope;
    }
  else
    {
echo "\e[!] Siapkan OTPmu\n";
sleep(5);
$register = register($nope);
if ($register == false)
    {
    echo "\e[x] NOMER NGAK FRESH BOY!\n";
    }
  else
    {
    otp:
    echo "\e[!] Masukkan Kode Verifikasi (OTP) : ";
    $otp = trim(fgets(STDIN));
    $verif = verif($otp, $register);
    if ($verif == false)
        {
        echo "\e[x] Kode Verifikasi Salah\n";
        goto otp;
        }
      else
        {
		$h=fopen("newgojek.txt","a");
		fwrite($h,json_encode(array('token' => $verif, 'voc' => 'gofood gak ada'))."\n");
		fclose($h); 
                echo "\e[!] Trying to redeem Reff : G-3VC8BZF !\n";
                sleep(3);
            $claim = reff($verif);
            if ($claim == false){
            echo "\e[!] LOGIN , Claim Manually  KODE NOH\n";
            }else{
                echo "\e[+] ".$claim."\n";
            }
    }
    }
    }


?>
