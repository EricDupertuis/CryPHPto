<?php

namespace App\Controllers;

use phpseclib\Crypt\RSA;

class Crypto
{
    protected $digest_alg = "sha512";

    protected $private_key_bits = 4096;

    protected $encryptionMode = RSA::ENCRYPTION_PKCS1;

    protected $privateKey;

    protected $publicKey;

    public function encryptFromPublic($data, $key)
    {
        $cipher = new RSA();
        $cipher->setPublicKey($key);
        $cipher->setEncryptionMode($this->encryptionMode);

        return $cipher->encrypt($data);
    }

    public function encryptFromPrivate($data, $key)
    {
        $cipher = new RSA();
        $cipher->setPrivateKey($key);
        $cipher->setEncryptionMode($this->encryptionMode);

        return $cipher->encrypt($data);
    }

    public function decryptFromPublic($data, $key)
    {
        $cipher = new RSA();
        $cipher->setPublicKey($key);
        $cipher->setEncryptionMode($this->encryptionMode);

        return $cipher->decrypt($data);
    }

    public function decryptFromPrivate($data, $key)
    {
        $cipher = new RSA();
        $cipher->setPrivateKey($key);
        $cipher->setEncryptionMode($this->encryptionMode);

        return $cipher->decrypt($data);
    }

    public function generateKeyPair()
    {
        $rsa = new RSA();
        $rsa->setEncryptionMode($this->encryptionMode);

        $keys = $rsa->createKey();

        $this->setPublicKey($keys['publickey']);
        $this->setPrivateKey($keys['privatekey']);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    /**
     * @param mixed $privateKey
     */
    public function setPrivateKey($privateKey)
    {
        $this->privateKey = $privateKey;
    }

    /**
     * @return mixed
     */
    public function getPublicKey()
    {
        return $this->publicKey;
    }

    /**
     * @param mixed $publicKey
     */
    public function setPublicKey($publicKey)
    {
        $this->publicKey = $publicKey;
    }
}
