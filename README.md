# PHP Raspberry Pi 

### Installation

To install simply:

    $ composer require spring-z/php-raspbrry-pi
    
Need extra:

    $ sudo apt install expect
    
First check that wiringPi is not already installed. In a terminal, run:

    $ gpio -v

If you get something, then you have it already installed. The next step is to work out if it’s installed via a standard package or from source. If you installed it from source, then you know what you’re doing – carry on – but if it’s installed as a package, you will need to remove the package first. To do this:

    $ sudo apt-get purge wiringpi
    $ hash -r

Then carry on.

If you do not have GIT installed, then under any of the Debian releases (e.g. Raspbian), you can install it with:

    $ sudo apt-get install git-core

If you get any errors here, make sure your Pi is up to date with the latest versions of Raspbian: (this is a good idea to do regularly, anyway)

    $ sudo apt-get update
    $ sudo apt-get upgrade

To obtain WiringPi using GIT:

    $ cd
    $ git clone git://git.drogon.net/wiringPi

If you have already used the clone operation for the first time, then

    $ cd ~/wiringPi
    $ git pull origin

Will fetch an updated version then you can re-run the build script below.

To build/install there is a new simplified script:

    $ cd ~/wiringPi
    $ ./build
    
### Quick Start and Examples

More examples are available under /examples

```php
require dirname(dirname(__FILE__)) . '/vendor/autoload.php';

use \Pi\GPIO;

// pinMode
$gpio = new GPIO();
$gpio->setRootUser('root', 'mypi');
var_dump($gpio->pinMode(0,GPIO::OUTPUT));
```