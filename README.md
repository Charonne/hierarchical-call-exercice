# hierarchical-call-exercice
An exercice to practice hierarchical addresses.<br />
With one passphrase, you can generate multiples addresses.

<h1>Installation</h1>
<h2>Install composer</h2>
Execute
<pre>
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
</pre>

<h2>Install bitcoinECDSA</h2>
Execute
<pre>
composer require bitcoin-php/bitcoin-ecdsa
composer install
</pre>

<h2>Test script</h2>
Execute
<pre>
php index.php
</pre>
Or got to 
<i>http://localhost/hierarchical-exercice/index.php</i>

<h1>Test random generation of addresses</h1>
Uncomment the <i>// Random addresses</i> block, and test the script
It's illustrate that you can have random addresses, or predetermined addresses with passphrases


<h1>Exercice</h1>
Aim: create a function based on hierarchical to retrieve a private key from a public key
<ul>
<li>Comment or remove the random block</li>
<li>Use the <strong>for</strong> loop on the Passphrase block, and change the limit to 20</li>
<li>Concatenate the $i at the end of the passphrase on each iteration</li>
<li>Store the 16th public key on a variable</li>
<li>Create a function which take the public key parameter, and retrieve the private associated</li>




