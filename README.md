55chan - A fork of vichan
========================================================

Warning
------------
This software is not production-ready, we still have a lot to do. DO NOT PULL YET.
Use vichan vichan-compatible branch if you want a more stable branch, but it'll only supports PHP <= 7.3

About
------------
55chan is a fork of vichan, a great imageboard package, we'll do our best to actively build on it.

Requirements
------------
1.	PHP >= 7.4 
2. Composer.
3. MySQL/MariaDB server
4. [mbstring](http://www.php.net/manual/en/mbstring.installation.php)
5. [PHP GD](http://www.php.net/manual/en/intro.image.php)
6. [PHP PDO](http://www.php.net/manual/en/intro.pdo.php)
7. [PHP BC Math](https://www.php.net/manual/en/book.bc.php)
8. [Composer](https://getcomposer.org/download/)
9. A Unix-like OS, preferrably FreeBSD or Linux

After installing [Composer](https://getcomposer.org/download/),  run bellow:


```
composer install
```

Make sure to run the below as root:

And make sure to run bellow as root:
```
apt-get install ffmpeg ffprobe graphicsmagick gifsicle php7.4-fpm php7.4-cli php7.4-apcu php7.4-mysql php7.4-gd php7.4-pdo php7.4-mbstring php7.4-bcmath 
```


We try to make sure 55chan is compatible with all major web servers. 55chan does not include an Apache ```.htaccess``` file nor does it need one.

### Recommended
1. MariaDB server >= 10.3.22
2. ImageMagick (command-line ImageMagick or GraphicsMagick preferred).
3. [APC (Alternative PHP Cache)](http://php.net/manual/en/book.apc.php),
   [XCache](http://xcache.lighttpd.net/) or
   [Memcached](http://www.php.net/manual/en/intro.memcached.php)

Contributing
------------
You can contribute to 55chan by:
-  Developing patches/improvements/translations and using GitHub to submit pull requests
-  Providing feedback and suggestions
-  Writing/editing documentation

Installation
-------------
1. Download and extract 55chan to your web directory or get the latest development version with:
```
        git clone git://github.com/55chan/55chan.git
```
2. Navigate to ```install.php``` in your web browser and follow the prompts.
3. 55chan should now be installed. Log in to ```mod.php``` with the default username and password combination: **admin / password**.

Please remember to change the administrator account password.

See also: [Configuration Basics](https://github.com/vichan-devel/vichan/wiki/config).


Upgrade
-------
To upgrade from any version of 55chan:

Either run ```git pull``` to update your files, if you used git, or
backup your ```inc/instance-config.php``` and ```inc/instance-functions.php```, replace all your files in place
(don't remove boards and instance-config files inside etc.), then put ```inc/instance-config.php``` and ```inc/instance-functions.php``` back and finally run ```install.php```.

Support
--------
Vichan/55chan is still beta software -- there are bound to be bugs. If you find a
bug, please report it.

I'll always be on #55chan@irc.rizon.net, if you need something, ask the OPs.

vichan API
----------
vichan provides by default a 4chan-compatible JSON API. For documentation on this, see:
https://github.com/vichan-devel/vichan-API/ .

License
--------
See [LICENSE.md](http://github.com/vichan-devel/vichan/blob/master/LICENSE.md).

