### A basic example, which explains basic logic tests and functional tests, using PHPUnit with selenium.

* Autoloading of classes and namespacing (use: composer install)
* [Pear install of phpunit] (http://phpunit.de/manual/3.7/en/installation.html#installation.pear)
* [Pear install of PHPunit_Selenium] (http://phpunit.de/manual/3.7/en/selenium.html#selenium.installation)

__note:__ I have used [latest selenium jar v 2.40.0] (http://selenium-release.storage.googleapis.com/2.40/selenium-server-standalone-2.40.0.jar)

### Run test using

* For logic tests: phpunit --colors tests/Basic/CalculatorTest.php
* For functional test using selenium: phpunit tests/Basic/CalculatorWebTest.php
(view resides in: src/View/cal.php)

> in phpunit.xml, bootstrap="./vendor/autoload.php" attribute specifies where the bootstrap
> file is located.

### installing composer on MAC

> Goto a directory & get composer:
* curl -sS https://getcomposer.org/installer | php -d detect_unicode=Off
> move composer into a bin directory you control:
* sudo mv composer.phar /usr/local/bin/composer
> double check composer works
* composer about
>(optional) Update composer:
* sudo composer self-update


### TODO:

[Detailed instruction, How to setup PEAR and PHPUnit using PEAR] (http://www.gargpraveen.blogspot.com/)

and lot more! stay tuned ;)

### Thank you!

[Praveen Garg] (http://www.gargpraveen.blogspot.com/)

> All used framework/libraries are trademarks of their respective owners. and open source
> [free licensed to use] to community (as per my knowledge), if any issue please report at:
> (praveen.garg@nerdapplabs.com).

> The use of these does not indicate endorsement of the trademark holder by nerdapplabs,
> nor vice versa.


[@nerdapplabs] (http://nerdapplabs.com)