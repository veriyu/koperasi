<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Config;

/**
* 
*/
class Encrypter
{
    
    public static function encryptID($id,$decript=false,$pass='',$separator='-', & $data=array()) {
        $pass = $pass?$pass:Config::get('app.key');
        $pass2 = Config::get('app.url');;
        $bignum = 200000000;
        $multi1 = 500;
        $multi2 = 50;
        $saltnum = 10000000;
        if($decript==false){
            $strA = self::alphaid(($bignum+($id*$multi1)),0,0,$pass);
            $strB = self::alphaid(($saltnum+($id*$multi2)),0,0,$pass2);
            $out = $strA.$separator.$strB;
        } else {
            $pid = explode($separator,$id);
            
            
        //    trace($pid);
            $idA = (self::alphaid($pid[0],1,0,$pass)-$bignum)/$multi1;
            $idB = (self::alphaid($pid[1],1,0,$pass2)-$saltnum)/$multi2;
            $data['id A'] = $idA;
            $data['id B'] = $idB;
            $out = ($idA==$idB)?$idA:false;
        }
        return $out;
    }

    public static function alphaID($in, $to_num = false, $pad_up = false, $passKey = null)
    {
        $index = "abcdefghijkmnpqrstuvwxyz23456789ABCDEFGHIJKLMNPQRSTUVWXYZ";
        if ($passKey !== null) {
            // Although this function's purpose is to just make the
            // ID short - and not so much secure,
            // with this patch by Simon Franz (http://blog.snaky.org/)
            // you can optionally supply a password to make it harder
            // to calculate the corresponding numeric ID
     
            for ($n = 0; $n<strlen($index); $n++) {
                $i[] = substr( $index,$n ,1);
            }
     
            $passhash = hash('sha256',$passKey);
            $passhash = (strlen($passhash) < strlen($index))
                ? hash('sha512',$passKey)
                : $passhash;
     
            for ($n=0; $n < strlen($index); $n++) {
                $p[] =    substr($passhash, $n ,1);
            }
     
            array_multisort($p,    SORT_DESC, $i);
            $index = implode($i);
        }
     
        $base    = strlen($index);
     
        if ($to_num) {
            // Digital number    <<--    alphabet letter code
            $in    = strrev($in);
            $out = 0;
            $len = strlen($in) - 1;
            for ($t = 0; $t <= $len; $t++) {
                $bcpow = bcpow($base, $len - $t);
                $out     = $out + strpos($index, substr($in, $t, 1)) * $bcpow;
            }
     
            if (is_numeric($pad_up)) {
                $pad_up--;
                if ($pad_up > 0) {
                    $out -= pow($base, $pad_up);
                }
            }
            $out = sprintf('%F', $out);
            $out = substr($out, 0, strpos($out, '.'));
        } else {
            // Digital number    -->>    alphabet letter code
            if (is_numeric($pad_up)) {
                $pad_up--;
                if ($pad_up > 0) {
                    $in += pow($base, $pad_up);
                }
            }
     
            $out = "";
            for ($t = floor(log($in, $base)); $t >= 0; $t--) {
                $bcp = bcpow($base, $t);
                $a     = floor($in / $bcp) % $base;
                $out = $out . substr($index, $a, 1);
                $in    = $in - ($a * $bcp);
            }
            $out = strrev($out); // reverse
        }
     
        return $out;
    }   

}