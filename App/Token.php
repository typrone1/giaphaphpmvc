<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 23/09/2017
 * Time: 11:30 PM
 */
namespace App;
class Token {
    protected $token;

    public function __construct($token_value = null)
    {
        if ($token_value) {

            $this->token = $token_value;

        } else {
            $this->token = bin2hex(random_bytes(16)); // 16byte = 128bit = 32hex
        }

    }
    public function getValue(){
        return $this->token;
    }
    public function getHash(){
        return hash_hmac('sha256', $this->token, Config::SECRET_KEY);  // 256 = 64 ky tu
    }
}