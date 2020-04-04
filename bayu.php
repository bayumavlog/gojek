<?php

error_reporting(0);
include ("func.php");
echo "\n";
echo "\e            GOJEK VERSION 2.0              \n";
echo "\e SCRIPT GOJEK AUTO REGISTER + AUTO CLAIM VOUCHER BAYU DWI DIRGANTARA\n";
echo "\n";
nope:
echo "\e[?] Masukkan Nomor HP Anda (62) : ";
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
$register = register('1'.$nope);
if ($register == false)
    {
    echo "\e[x] Failed Get OTP!\n";
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
			echo "\e[!] Trying to redeem Voucher : GOFOODSANTAI19 !\n";
        sleep(3);
        $claim = claim($verif);
        if ($claim == false)
            {
            echo "\e[!]".$claim."\n";
            sleep(3);
            echo "\e[!] Trying to redeem Voucher : COBAGOFOOD010420A !\n";
            sleep(3);
            goto next;
            }
            else{
                echo "\e[+] ".$claim."\n";
                sleep(3);
                echo "\e[!] Trying to redeem Voucher : COBAGOFOOD010420B !\n";
                sleep(3);
                goto ride;
            }
            next:
            $claim = claim1($verif);
            if ($claim == false) {
                echo "\e[!]".$claim['data']['message']."\n";
                sleep(3);
                echo "\e[!] Trying to redeem Voucher : COBAGOFOOD010420B !\n";
                sleep(3);
                goto next1;
            }
            else{
                echo "\e[+] ".$claim."\n";
                sleep(3);
                echo "\e[!] Trying to redeem Voucher : COBAGORIDE !\n";
                sleep(3);
                goto ride;
            }
            next1:
            $claim = claim2($verif);
            if ($claim == false) {
                echo "\e[!]".$claim['errors'][0]['message']."\n";
                sleep(3);
                echo "\e[!] Trying to redeem Voucher : COBAGOCAR !\n";
                sleep(3);
                goto ride;
            }
            ride:
            $claim = ride($verif);
            if ($claim == false ) {
                echo "\e[!]".$claim['errors'][0]['message']."\n";
                sleep(3);
                echo "\e[!] Trying to redeem Voucher : COBAGOCAR !\n";
                sleep(3);

            }
            else{
                echo "\e[+] ".$claim."\n";
                sleep(3);
                echo "\e[!] Trying to redeem Voucher : COBAGOCAR !\n";
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
