<?php

namespace gift\app\services\utils;

class CsrfService
{

    public  static function generate(){
        $token = bin2hex(random_bytes(32));
        $_SESSION['csrf'] = $token;
        return $token;
    }

    public static function check($token){
        if(isset($_SESSION['csrf']) && $_SESSION['csrf'] === $token){
            unset($_SESSION['csrf']);
        }else{
            unset($_SESSION['csrf']);
            throw new CsrfException("Erreur CSRF");
        }
    }
}