<?php

use BitcoinPHP\BitcoinECDSA\BitcoinECDSA;
require_once("vendor/bitcoin-php/bitcoin-ecdsa/src/BitcoinPHP/BitcoinECDSA/BitcoinECDSA.php");

/**
 * My factory class
 */
class Factory extends BitcoinECDSA
{
    private $infos;
    
    /**
     * Generates a hexadecimal encoded string
     *
     * @param string $passphrase
     * @throws \Exception
     */
    public function generateMyKey($passphrase)
    {
        $res = $this->hash256($passphrase);
        $this->k    =  $res;
    }
    
    /**
     * Generates a hexadecimal encoded string
     *
     * @param string $passphrase
     * @throws \Exception
     */
    public function generateMyRandomKey()
    {
        $this->generateRandomPrivateKey();
    }
    
    /**
     * Get infos
     */
    public function getInfos()
    {
        // Call API
        $url  = "http://btc.blockr.io/api/v1/address/info/" . $this->getAddress();
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        // Execute curl
        $result = curl_exec($ch);
        // Format results
        $this->infos = json_decode($result);
        // Close curl
        curl_close($ch);
    }
    
    /**
     * return a pub key form a priv key
     */
    public function getMyAddressFromPrivKey($k)
    {
        $G = $this->G;

        if(!isset($k)) {
            throw new \Exception('No Private Key was defined');
        }

        $pubKey 	    = $this->mulPoint($k,['x' => $G['x'], 'y' => $G['y']]);

        $pubKey['x']	= gmp_strval($pubKey['x'], 16);
        $pubKey['y']	= gmp_strval($pubKey['y'], 16);

        while(strlen($pubKey['x']) < 64) {
            $pubKey['x'] = '0' . $pubKey['x'];
        }

        while(strlen($pubKey['y']) < 64) {
            $pubKey['y'] = '0' . $pubKey['y'];
        }
        $pubKey = $this->getDerPubKeyWithPubKeyPoints($pubKey);
        // Return address
        return $this->getAddress($pubKey);
    }
    
    /**
     * Get balance
     */
    public function getBalance()
    {
        return $this->infos->data->balance;
        
    }
}
