<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once("factory.php");

// User <br /> in browser, \n in command line
if (php_sapi_name() == "cli") {
    // In cli-mode
    define("EOL", "\n", true);
} else {
    // Not in cli-mode
    define("EOL", "<br />", true);
}

// Call Factory lib
$factory = new Factory();

// Random addresses
for($i = 0; $i <= 4; $i++) {
    $factory->generateMyRandomKey();
    $factory->getInfos();
    echo "Balance: " . $factory->getBalance();
    echo EOL;
    echo "Public: " . $factory->getAddress();
    echo EOL;
    echo "Private: " . $factory->getPrivateKey();
    echo EOL;
    echo "----------------\n";
    
    if ($factory->getBalance() > 0) {
        die('You got the impossible Win \o/');
    }
}

// Passphrase addresse
$passphrase = 'Bitcoin is a cryptocurrency and a payment system';
$factory->generateMyKey($passphrase);
echo "Public: " . $factory->getAddress();
echo EOL;
echo "Private: " . $factory->getPrivateKey();
echo EOL;
echo "-----------------";
echo EOL;
echo "Public from Private: " . $factory->getMyAddressFromPrivKey($factory->getPrivateKey());
echo EOL;

/*

function getRetrieveMyAddress($pubKey) {
    // ...
    return $privKey;
}

*/
