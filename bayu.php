<?php

error_reporting(0);
include ("function.php");
echo "\033[33;1m         GOJEK VERSION 1.8.6              \n";
echo "\033[35;1mSCRIPT GOJEK REGISTRASI BAYU DWI DIRGANTARA\n";
echo "\n";
nope:
echo "\033[32;1m[?] Masukkan Nomor HP Anda wanji 628*** : ";
$nope = trim(fgets(STDIN));
$cek = cekno($nope);
if ($cek == false)
    {
    echo "\033[35;1m1[x] Nomor Telah Terdaftar\n";
			goto nope;
    }
  else
    {
echo "\033[31;1m[!] Siapkan OTPmu JANGAN LUPA SUBREK YT KANG VOUCER\n";
sleep(5);
$register = register($nope);
if ($register == false)
    {
    echo "\033[35;1m[x] Gagal Mendapatkan OTP! Harap Gunakan Nomer Yang Belum Terdaftar DI GOJEK\n";
    }
  else
    {
    otp:
    echo "\033[33;1m [!] Masukkan Kode Verifikasi (OTP) : ";
    $otp = trim(fgets(STDIN));
    $verif = verif($otp, $register);
    if ($verif == false)
        {
        echo "\e[x] Kode Verifikasi Salah\n";
        goto otp;
        goto otp;
        }
      else
        {
	echo "\e[!] Trying to redeem Voucher : COBAGOFOOD010420A !\n";
        $claim = claim1($verif);
        if ($claim == false){
            echo "\e[!] Failed to Claim Voucher, Try to Claim Manually\n";
			      sleep(3);
            echo "\e[!] Trying to redeem Voucher : COBAGOFOOD010420B !\n";
			      goto ride;
            }else{
                echo "\e[+] ".$claim."\n";
				    sleep(3);
                echo "\e[!] Trying to redeem Voucher :  !\n";
                sleep(3);
                goto ride;
            }
            ride:
            $claim = ride($verif);
            if ($claim == false){
            echo "\e[!] Failed to Claim Voucher, Try to Claim Manually\n";
			      sleep(3);
            echo "\e[!] Trying to redeem Voucher :  !\n";
            sleep(3);
            }else{
                echo "\e[+] ".$claim."\n";
				    sleep(3);
                echo "\e[!] Trying to redeem Voucher :  !\n";
                sleep(3);
                goto pengen;
            }
            pengen:
            $claim = cekvocer($verif);
            if ($claim == false ) {
            echo "\e[!] Failed to Claim Voucher, Try to Claim Manually\n";
           }
		  else
			{
			echo $claim . "\n";
			}
		}
	}
}
?>
