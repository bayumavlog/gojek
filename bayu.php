<?php

error_reporting(0);
include ("function.php");
echo "\033[33;1m         GOJEK VERSION 1.8.8              \n";
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
			echo "\e[!] Trying to redeem Voucher : EBADAHMAKAN !\n";
        sleep(3);
        $claim = claim($verif);
        if ($claim == false)
            {
            echo "\e[!]".$claim."\n";
            sleep(3);
            echo "\e[!] Trying to redeem Voucher : AXEANTIMATIGAYA !\n";
            sleep(3);
            goto next;
            }
            else{
                echo "\e[+] ".$claim."\n";
                sleep(3);
                echo "\e[!] Trying to redeem Voucher : AYOCOBAGOCAR !\n";
                sleep(3);
                goto ride;
            }
            next:
            $claim = claim1($verif);
            if ($claim == false) {
                echo "\e[!]".$claim['data']['message']."\n";
                sleep(3);
                echo "\e[!] Trying to redeem Voucher : COBAGOFOOD010420A !\n";
                sleep(3);
                goto next1;
            }
            else{
                echo "\e[+] ".$claim."\n";
                sleep(3);
                echo "\e[!] Trying to redeem Voucher : AYOCOBAGOCAR !\n";
                sleep(3);
                goto ride;
            }
            next1:
            $claim = claim2($verif);
            if ($claim == false) {
                echo "\e[!]".$claim['errors'][0]['message']."\n";
                sleep(3);
                echo "\e[!] Trying to redeem Voucher : AYOCOBAGOCAR !\n";
                sleep(3);
                goto ride;
            }
          else
            {
            echo "\e[+] ".$claim . "\n";
            sleep(3);
            echo "\e[!] Trying to redeem Voucher : AYOCOBAGORIDE !\n";
            sleep(3);
            goto ride;
            }
            ride:
            $claim = ride($verif);
            if ($claim == false ) {
                echo "\e[!]".$claim['errors'][0]['message']."\n";
                sleep(3);
                echo "\e[!] Trying to redeem Voucher : AYOCOBAGORIDE !\n";
                sleep(3);

            }
            else{
                echo "\e[+] ".$claim."\n";
                sleep(3);
                echo "\e[!] Trying to redeem Voucher : AYOCOBAGORIDE !\n";
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
