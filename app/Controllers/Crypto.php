<?php

namespace App\Controllers;

use phpseclib\Crypt\RSA;

class Crypto
{
    protected $digest_alg = "sha512";

    protected $private_key_bits = 4096;

    public function encrypt($data, $key)
    {
        openssl_public_encrypt($data, $encrypted, $key);

        return $encrypted;
    }

    public function decrypt($data, $key)
    {
        openssl_private_decrypt($data, $decrypted, $key);

        return $decrypted;
    }

    public function generateKeyPair()
    {
        $rsa = new RSA();
        $keys = $rsa->createKey();

        return json_encode([
            "public" => $keys['publickey'],
            "private" => $keys['privatekey']
        ]);
    }
}
