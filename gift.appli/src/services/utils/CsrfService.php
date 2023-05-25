<?php

namespace gift\app\services\utils;

class CsrfService
{

    public function generate(){
        $token = bin2hex(random_bytes(32));
        $_SESSION['csrf'] = $token;
        return $token;
    }

    public function verify($token){
        if(isset($_SESSION['csrf']) && $_SESSION['csrf'] === $token){
            return true;
        }
        return false;
    }
}