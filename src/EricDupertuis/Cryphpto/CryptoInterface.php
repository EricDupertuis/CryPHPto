<?php

/*
 * (c) 2016 Eric Dupertuis
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EricDupertuis\Cryphpto;

/**
 * Interface implemented by extension classes.
 *
 * @author Eric Dupertuis <dupertuis.eric@gmail.com>
 */
interface CryptoInterface
{
    public function decrypt($data, $key);

    public function encrypt($data, $key);

    public function generateKeyPair();
}
