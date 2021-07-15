# TEMPLATE Monzamedia Styling Guide and JS/JQuery Repos

## TEMPLATES/AllAmerican
======

All American Auto Ecommerce site styling, through CSS, and dynamic functionality via JS/JQuery.

## PLEASE See the DEVELOP branch of this repository for further instructions.

_mrg
======

### USAGE:

  * Click on use this repo. as template for your next project;
  * ONLY work in the public folder, leave the other files and folders;
  * Place all of your necessary CSS and JS into the appropriate spot in the public folder,
        eg. ```public/assets/oils/css...``` ___or___ ```public/assets/oils/js...```, etc;
  * Make sure that the paths you have match what has been set in the target template layouts index file; and
  * When complete commit as repo and then you are ready to pull it into the appropriate server, eg. shop all american auto.

### DEPOLYMENT:

  * Get into an terminal environment either via SSH or CPanel;
  * Make the following directory, if it does not exist, in the root folder:
      eg. Type the following ```$:>   mkdir -p packages/templates```
  * Now move into that folder (cd packages/templates) and then clone your repo. created above; and
  * You should end up with a path looking like: packages/templates/{{your_repo_name}}.

### INSTALLATION:

  * In order to install we need composer and your projects main composer.json file;
  * Follow the instructions at: https://getcomposer.org/download/ to install a localized version of composer;
  * Open composer.json file and the following lines exactly at the end of the file just before the final curly bracket, }
```
...
},
    "repositories": [
        {
            "type": "path",
            "url": "packages/vault/courier_tcg"
        },
        {
            "type": "path",
            "url": "packages/vault/portfolio"
        },
        {
            "type": "path",
            "url": "packages/vault/shipment_courier"
        },
        {
            "type": "path",
            "url": "packages/vault/store_credit"
        },
        {
            "type": "path",
            "url": "packages/templates/all_american"
        }
    ]
} <-- the final curly bracket as mentioned above!
```

  * Next validate composer.json by typing, $:> php composer.phar validate;
  * All good, then execute the following:
      $:> php composer.phar install -o --profile -vvv
      and
      $:> php composer.phar require templates/{{__repo-name__}} -o --profile -vvv
  * Successful installation and now we are ready to activate this package.

### ACTIVATION:

  * The final step is to publish the assets folder from your repo into the public_html on the server;
  * This is accomplished on the terminal as follows:
```
      $:> php artisan vendor:publish --force
```
  * You will be presented with a menu to choose from:
```
     $:>
      Which provider or tag's files would you like to publish?:
      [0 ] Publish files from all providers and tags listed below
      [1] Provider: Templates\AllAmerican\AllAmericanServiceProvider
      [2] Tag: all_american_assets
      [3] Tag: all_american_config
      [4] Tag: stubs
```
  * This repos has the following prefix attached to ALL of its tags: all_american_...
  * So, in this case type 2 and press enter; and
  * On success you will see the response.

VOILA / QED !!!
