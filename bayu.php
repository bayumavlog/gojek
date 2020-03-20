<?php

error_reporting(0);
include ("function.php");
echo "\033[33;1m         GOJEK VERSION 1.8.5               \n";
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
        }
      else
        {
	echo "\033[31;1m[!] Mencoba Claim  Voucher : COBAGOFOOD090320A !\n";
        $claim = claim1($verif);
        if ($claim == false){
            echo "\033[34;1m[!] Gagal claim otomatis, Silahkan Claim Manually \n";
           }
		  else
			{
			echo $claim . "\n";
			}
		}
	}
}
?>
