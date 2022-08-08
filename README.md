Challenge Joan Teich
 
-- Requeriments:
  * Php 8.x
  * Composer 2.x

-- Install:
  1. In the selected folder execute:
        `git clone https://github.com/Joante/ID90.git`
  2. Make a virtual host pointing to the root folder.
  4. Install PhpUnit with composer:
        `composer update`

-- Run the application:
  1. Enter to the website by the URL selected in the virtual host (Default: http://localhost/)
  2. Login and search the desire hotels

    
-- Test the application:
  1. Run the following command in the root folder to test the Login action:
        `./vendor/bin/phpunit tests/TestLogin.php`
  2. Run the following command in the root folder to test the Search action:
        `./vendor/bin/phpunit tests/TestHotelSearch.php`
