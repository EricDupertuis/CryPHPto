<?php

namespace EricDupertuis\Cryphpto;

class Crypto implements CryptoInterface
{
    protected $digest_alg = "sha512";

    protected $private_key_bits = 4096;

    protected $private_key_type = OPENSSL_KEYTYPE_RSA;

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
        $res = openssl_pkey_new([
            "digest_alg" => $this->digest_alg,
            "private_key_bits" => $this->private_key_bits,
            "private_key_type" => $this->private_key_type
        ]);

        openssl_pkey_export($res, $privateKey);
        $publicKey = openssl_pkey_get_details($res);
        $publicKey = $publicKey["key"];

        return [
            "pubKey" => $publicKey,
            "privKey" => $privateKey
        ];
    }
}
