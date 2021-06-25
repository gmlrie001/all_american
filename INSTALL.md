#Ecommerce Store Credit Package Installation
  > Namespace: Vault/StoreCredit,
  > PackageName: StoreCredit.
===

* Step 1:
First obtain the get_packages.sh script from the VaultCore repository.
===

* Step 2:
Make the script executable and execute it providing repo clone url and snake case package name:
```
  $> ./get_package.sh https://github.com/gmlrie001/store_credit store_credit
```
This will create a packages folder for storing a private localized repo. of the package.

* Step 3:
PLEASE NOTE:
 Ensure that you have the following line in your project's main composer.json file
  ```
  "minimum-stability": "dev",
  ```

* Step 4:
  Once the previous step is completed, we next have to install the package and have it register,
  which can be achieved as follows:
  ```
    $> php composer.phar require vault/store_credit -o --profile -vvv
  ```

* Step 5:
  On successful completion you will notice, after the dump-autoload, that the package has been
  installed (see below):
```
[31.6MiB/15.68s] Discovered Package: aws/aws-sdk-php-laravel
Discovered Package: spatie/laravel-newsletter
Discovered Package: spatie/laravel-responsecache
Discovered Package: stevebauman/location
Discovered Package: tom-lingham/searchy
Discovered Package: vault/store_credit <<---| <*--! YOUR NEWLY INSTALLED PACKAGE !--*>
Discovered Package: werneckbh/laravel-qr-code
Package manifest generated successfully.
[27.4MiB/15.73s] 40 packages you are using are looking for funding.
[27.4MiB/15.73s] Use the `composer fund` command to find out more!
```

* Step 6:
Next we run move into the packges/vault/store_credit folder and exeute the 2 scripts attached
to the composer.json file: clearCache and copyToBladePages.

php composer.phar run-script --timeout=10 clearCache
php composer.phar run-script --timeout=10 copyToBladePages  

* Step 7:
#TODO#
Make the necesary changes to the checkout blades... 

* Step 8:
Remove all references to store-credit in the web.php and vault.php route files.

* Step 9:
Test...!

* Step 10:
and Test some more...!
