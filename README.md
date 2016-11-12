# Hierarchical exercice
An exercice to practice hierarchical addresses.<br />
With one passphrase, you can generate multiples addresses.

<h1>Installation</h1>
<h2>Install composer</h2>
Install curl
<pre>
apt-get update && apt-get install curl php5 git
</pre>
Execute
<pre>
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
</pre>

<h2>Install bitcoinECDSA</h2>
Log as user<br />
Git clone this project and execute
<pre>
cd hierarchical-exercice/
composer require bitcoin-php/bitcoin-ecdsa
composer install
</pre>

<h2>Test script</h2>
Execute
<pre>
php index.php
</pre>
Or got to 
<i>http://localhost/hierarchical-exercice/index.php</i><br />
You should see
<pre>
Public: 1EbKLRDDcW9HRnAcDxDtgrBJNFFGFaumRT
Private: e8b8cb723816e654c9ad0b465ec64028c929faf0595ccad6485eb3afcb4ce103
...
</pre>

<h1>Test random generation of addresses</h1>
Uncomment the <code>// Random addresses</code> block, and test the script
It's illustrate that you can have random addresses, or predetermined addresses with passphrases


<h1>Exercice</h1>
<h2>Purpose</h2>
To create a function based on hierarchical to retrieve a private key from a public key, you have to:
<ul>
<li>Set up a hierarchical system</li>
<li>Create a function to retrieve a private key from this hierarchical system</li>
</ul>
<h2>Details</h2>
<ul>
<li>Comment or remove the random block</li>
<li>Use the <strong>for</strong> loop on the Passphrase block, and change the limit to 20 <code>for($i = 0; $i <= 20; $i++) {}</code></li>
<li>Concatenate the $i at the end of the passphrase on each iteration <code>$passphrase . $i</code></li>
<li>Store the 16th public key on a variable</li>
<li>Create a function which take the public key parameter, and retrieve the private key associated</li>
</ul>




