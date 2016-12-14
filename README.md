# U2F-php-server-examples
Examples for the U2F-php-server repository : https://github.com/Samyoul/U2F-php-server

## Installation

```bash
$ git clone https://github.com/Samyoul/U2F-php-server-examples.git
$ cd u2f-php-server-examples
$ composer install 
```

## Getting Started

After you've installed the repository you will be able to start using the examples. They are written to "just work" , so hopefully they will. 

Navigate to `https://your-development-ip-or-domain/u2f-php-server-examples/PDO-Without-AJAX/index.php`

Choose a one of the 3 preset users to login with, start playing! :D !

## Requirements

Presumably you've read the requirements of the source repository, but in case you haven't here's a link: https://github.com/Samyoul/U2F-php-server#requirements

All the points are essential to pay attention to, but the biggest "gotcha" is that you are not using HTTPS.

**YOU MUST USE A HTTPS URL, OR U2F WON'T WORK** :)