<?php

error_reporting(0);
include ("function.php");
echo "\033[33;1m         jangan maruk anjing              \n";
echo "\033[35;1mSCRIPT GOJEK REGISTRASI BAYU DWI DIRGANTARA\n";
echo "\n";
nope:
echo "\033[32;1m[?] Masukkan Nomor HP Anda Yang Belum Terdaftar Di Gojek : ";
$nope = trim(fgets(STDIN));
$cek = cekno($nope);
if ($cek == false)
    {
    echo "\033[35;1m1[x] Nomor Telah Terdaftar bosku\n";
			goto nope;
    }
  else
    {
echo "\033[31;1m[!] Siapkan OTPmu JANGAN LUPA SUBREK YT BAYU MAVLOG\n";
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
			echo "\e[!] Trying to redeem Voucher :PESANGOFOOD0607!\n";
        sleep(3);
        $claim = claim($verif);
        if ($claim == false)
            {
            echo "\e[!]".$claim." PESANGOFOOD0607 \n";
            sleep(3);
            echo "\e[!] Trying to redeem Voucher :PESANGOFOOD0607\n";
            sleep(3);
            goto next;
            }
            else{
                echo "\e[+] ".$claim."\n";
                sleep(3);
                echo "\e[+] ".$claim."PESANGOFOOD0607\n";
                sleep(3);
                echo "\e[!] Trying to redeem Voucher :\n";
                sleep(3);
                goto pengen;
            }
            pengen:
            $claim = cekvocer($verif);
            if ($claim == false ) {
                echo "\VOUCHER INVALID/GAGAL REDEEM\n";
            }
            else{
                echo "\e[+] ".$claim."\n";
                
        }
    }
    }
    }


?>
