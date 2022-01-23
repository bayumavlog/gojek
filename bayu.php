<?php
error_reporting(0);
include ("function.php");
echo "\033[33;1m         SELAMAT DATANG DI SCRIPT REGISTRASI BAYU MAVLOG             \n";

echo "\033[34;1m          SCRIPT GOJEK REGISTRASI BAYU DWI DIRGANTARA\n\n";
echo "        __     _ _    __  _   _       _    _     _ _     _ _      _    __ _  @BAYU MAVLOG
      | _  )  / \  \ /  /| | | |     |  \/  |   / \ \   / / |   / _ \ /  _ |
      | _ /  / _ \  V  / | | | |     | |\/| |  / _ \ \ / /| |  | | | | |  _
      | _  )/ __  \   |  | | | |     | |  | | /  _  \ V / | |_ | |_| |_|_| |
      | _ //     \_\ _|   \ _ /      | |  | |/ /  \  \_/  |___| \ _ / \ _ _|\n";

nope:
echo "\033[31;1m\n\n MAAF UNTUK SEMENTARA SCRIP INI TIDAK DAPAT DI GUNAKAN \n\n"; 
/*
$nope = trim(fgets(STDIN));
$cek = cekno($nope);
if ($cek == false)
    {
    echo "\033[35;1m1[x] Nomor Telah Terdaftar bosku\n";
			goto nope;
    }
  else
    {
echo "\033[31;1m[!] Siapkan OTPmu JANGAN LUPA SUBSCRIBE YT BAYU MAVLOG\n";
sleep(5);
$register = register($nope);
if ($register == false)
    { 
    echo "\033[35;1m[x] Gagal Mendapatkan OTP! Harap Gunakan Nomer Yang Belum Terdaftar DI GOJEK\n";
    }
  else
    {
    otp:
    echo "\033[33;1m[!] Masukkan Kode Verifikasi (OTP) : ";
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
                echo "\e[!] Trying to redeem Reff : AYOCOBAGOJEK !\n";
                sleep(3);
            $claim = reff($verif);
            if ($claim == false){
            echo "\e[!] Failed to Claim Voucher, Try to Claim Manually\n";
            }else{
                echo "\e[+] ".$claim."\n";
            }
    }
    }
    }


?>
