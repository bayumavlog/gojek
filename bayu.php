<?php

error_reporting(0);
include ("function.php");
echo "\033[35;1m2          BAYU MAVLOG"
echo "\033[33;1m         GOJEK VERSION 1.8.4              \n";
echo "\033[36;1m SCRIPT GOJEK REGISTRASI BAYU DWI DIRGANTARA\n";
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
echo "\033[31;1m0[!] Siapkan OTPmu\n";
sleep(5);
$register = register($nope);
if ($register == false)
    {
    echo "\033[35;1m2[x] Gagal Mendapatkan OTP! Harap Gunakan Nomer Yang Belum Terdaftar DI GOJEK\n";
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
	echo "\033[31;1m0[!] Mencoba Claim  Voucher : COBAGOFOOD090320A !\n";
        $claim = claim1($verif);
        if ($claim == false){
            echo "\033[34;1m[!] Gagal claim otomatis, Silahkan Claim Manually\n";
			      sleep(3);
            echo "\033[31;1m0[!] Mencoba Claim Voucher : COBAINGORIDEPAY !\n";
			      goto ride;
            }else{
                echo "\e[+] ".$claim."\n";
				    sleep(3);
                echo "\033[31;1m0[!] Mencoba Claim Voucher : COBAGOFOOD090320A !\n";
                sleep(3);
                goto ride;
            }
            ride:
            $claim = ride($verif);
            if ($claim == false){
            echo "\033[34;1m[!] Gagal claim otomatis, Silahkan Claim Manually\n";
			      sleep(3);
            echo "\033[31;1m0[!] Mencoba Claim Voucher :COBAINGORIDE !\n";
            sleep(3);
            }else{
                echo "\e[+] ".$claim."\n";
				    sleep(3);
                echo "\033[31;1m0[!] Mencoba Claim Voucher : COBAINGORIDEPAY !\n";
                sleep(3);
                goto pengen;
            }
            pengen:
            $claim = cekvocer($verif);
            if ($claim == false ) {
            echo "\033[34;1m[!] Gagal claim otomatis, Silahkan Claim Manually\n";
           }
		  else
			{
			echo $claim . "\n";
			}
		}
	}
}
?>
