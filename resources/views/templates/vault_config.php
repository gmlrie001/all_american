<?php

/**
*
* Vault Sidebar Navigation Menu Item Configuration
*
* REMOVE THE ITEMS YOU DONT NEED
* example, i only need
* HOME, ABOUT, CONTACT,
* then only have those items and remove the rest
*/

/**
 *   env('APP_URL', 'https://africanoils.co.za')
 *   env('DB_DATABASE', 'africano_ecommerce_oils')
 *   env('DB_USERNAME', 'africano_danielk')
 *   env('DB_PASSWORD', 'Blue1960++')
 */

return [
  'vault_navitems' => [
    'site_settings',
    // 'sage_one',
    'account',  
    'checkout',
    'shop',
    // 'aramax_shipping', 
    // 'aramex_shipping', 
    // 'thecourierguy_shipping', 
    'home',
    // 'portfolio',
    // 'recipes',
    // 'blog',
    // 'contact',
    // 'faq_categories',
    // 'information_pages',
    // 'country_names_and_codes',
  ],

  'sage_accounting_enable' => 0,
  'sage_credencials' => [
    'SAGEONE_USERNAME' => 'killimouna86@yahoo.com',
    'SAGEONE_PASSWORD' => 'lLIg&r666x9J',
    'SAGEONE_APIKEY' => '{D3B6A4C2-F62E-40DB-97BC-07C285581554}',
    'SAGEONE_ENDPOINT' => 'https://resellers.accounting.sageone.co.za/api/2.0.0',
  ],

  'uses_external_courier' => 1, 
  'external_courier_companies' => [
    'Aramex' => [
      'courier' => 'Aramex', 
      'courier_enabled'  => 0,
      'courier_package' => [
      ], 
      'aramex_shipping_package' => [
        'shipment_courier'       => "\\Vault\\ShipmentCourier", 
        'aramex_checkout_helper' => [
          \App\Helpers\AramexShipping\AramexAPI::class, 
          \App\Helpers\AramexShipping\AramexPostalCodeValidation::class, 
        ],
        'courier_default'        => "\\Vault\\CourierAramex", 
      ], 
      'options' => [
        'aramex_credentials' => [
          'AccountCountryCode' => 'ZA',
          'AccountEntity'	     => '',
          'AccountNumber' 	   => '',
          'AccountPin'	       => '',
          'UserName'           => '@',
          'Password'           => '',
          'Version'            => '1.0',
      
          'ProductGroup'        => 'DOM',
          'PaymentType'         => 'P',
          'ProductType'         => 'OND', // PPX, DPX, GPX, EPX
          'rateCalcEndPoint'    => NULL,
          // Monzamedia specific endpoint specially created for the Vault
            // 'rateCalcEndPoint'    => 'GetDomesticBestService',

          // Vault SPECIFIC implementation of Aramex ZA for getting best rates for domestic shipping
          // Leave empty to activate Vault SPECIFIC implementation.
          'ServiceType'       => '',
          'ServiceCodeTrans'  => [
            'PEC' => 'Economy',
            'ONP' => 'Overnight delivery',
            'PEX' => 'Road express',
            'EMD' => 'Early morning delivery',
            'SMP' => 'Same day shipment',
          ],
      
          'OriginStreetAddress' => '',
          'OriginBusinessPark'  => '',
          'OriginOtherAddress'  => NULL,
          'OriginCountryCode'   => 'ZA',
          'OriginCountryName'   => 'South Africa',
          'OriginState'         => 'Western Cape',
          'OriginSuburb'        => '',
          'OriginCity'          => 'Cape Town',
          'OriginPostCode'      => '',
      
          'SenderName'          => '',
          'SenderReference1'    => '',
          'SenderReference2'    => null,
          'SenderContactPerson' => '',
          'SenderContactNumber' => '',
          'SenderContactEmail'  => '@',
      
          'isDocsDefault'       => false,
          'reqInsDefault'       => false, // requires insurance
          'insValDefault'       => 0, // default insurance amount if above is true
          'wbTmplDefault'       => 9201, // -> via URL and 9202 -> , 
          'wbFtchDefault'       => 'URL', // null
      
          'shopWaybillPrefix'   => '',
          'specialInstructionsDefault' => '',
        ],
      ], 
    ], 
  
    'TheCourierGuy' => [
      'courier' => 'Ppapi_tcg', 
      'courier_enabled' => 0,
      'courier_package' => [
        'shipment_courier' => "\\Vault\\ShipmentCourier", 
        'checkout_helper'  => [
          \App\Helpers\TheCourierGuyParcelPerfectAPI\CheckoutServices\DeliveryOptionsService::class, 
        ], 
        'courier_default'  => "\\Vault\\CourierTcg", 
      ], 
      'options' => [],
    ], 
    
    'ParcelNinja' => [
      'courier' => 'Parcel_ninja', 
      'courier_enabled' => 0,
      'courier_package' => [
        'shipment_courier' => "\\Vault\\ShipmentCourier", 
        'checkout_helper'  => [], 
        'courier_default'  => "\\Vault\\CourierParcelNinja", 
      ], 
      'options' => [], 
    ], 

    'Default' => [
      'courier' => 'Default', 
      'courier_enabled' => 1,
      'courier_package' => [
        'shipment_courier' => \App\Models\ShippingOption::class, 
        'checkout_helper'  => [], 
        'courier_default'  => "", 
      ], 
      'options' => [], 
    ], 

    'Collection' => [
      'courier' => 'Collection', 
      'courier_enabled' => 1,
      'courier_package' => [
        'shipment_courier' => \App\Models\CollectionPoint::class, 
        'checkout_helper'  => [], 
        'courier_default'  => "", 
      ], 
      'options' => [], 
    ],
  ],

  'free_shipping_enabled' => !1,
  'free_shipping_value_threshold_default' => 999.00,
  // SPECIAL OPTIONS -> Rate/Shipping Cost Specific
  'shipment_options' => [
    // Absorb/Wave %_percentage_% of the shipping cost/expense
    //    0 => No cover; (or NULL);
    //   45 => Percentage subsidize;
    //  100 => Full cover
    'enable_subsidize' => 0,

    // Subdize percentage <= 100 and > 0 - e.g. 45;
    // 'shipment_subsidize_percent'  => null,
    // Override Shipping rate cost with this Value > 0
    // 'override_shipment_cost_with' => null,
    'absorb_shipping_cost' => 100,
  ],


  'payment_options' => [
    'model' => \App\Models\PaymentOption::class,
  ],
  'payment_options_enabled' => [
    'eft_payment_option', 
    'payfast_payment_option', 
    'ozow_payment_option', 
    'store_credit_checkout_only_option', 
  ],

  'eft_payment_option' => [
    'enable' => 1
  ],

  'store_credit_checkout_only_option' => [
    'enable' => 1
  ],

  'payfast_payment_option' => [
    'enable' => 1, 
    'is_test' => !1,

    'sandbox' => [
      'url'          => env( 'PAYFAST_WEBSERVICE_URL_SANDBOX', 'https://sandbox.payfast.co.za/eng/process' ),
      'merchant_id'  => env( 'PAYFAST_MERCHANT_ID_SANDBOX', '10000100' ), 
      'merchant_key' => env( 'PAYFAST_MERCHANT_KEY_SANDBOX', '46f0cd694581a' ), 
    ],
    'live' => [
      'url'          => env( 'PAYFAST_WEBSERVICE_URL', 'https://www.payfast.co.za/eng/process' ),
      'receiver'     => env( 'PAYFAST_MERCHANT_RECEIVER', '15514262' ), 
      'merchant_key' => env( 'PAYFAST_MERCHANT_KEY', '5gajd08znxwe4' ), 
      'cmd'          => env( 'PAYFAST_WEBSERVICE_CMD', '_paynow' ), 
      'frontendUUID' => env( 'PAYFAST_MERCHANT_CLIENT_UUID', 'a7275aa3b7abd9c3f49f369ad392987f' ),
    ],

    'COUNTRY_CODE' => 'ZA',
    'CURRENCY_CODE' => 'ZAR',

    'BANK_REFERENCE' => '',
    'TRANSACTION_REFERENCE' => '',

    'RETURN_URL' => env( 'APP_URL' ) . '/success',   // success
    'ERROR_URL'  => env( 'APP_URL' ) . '/error',     // error
    'CANCEL_URL' => env( 'APP_URL' ) . '/cart/view', // cancel
    'NOTIFY_URL' => env( 'APP_URL' ) . '/notify',    // notifications
  ],

  'ozow_payment_option' => [
    'enable' => !1,
    'is_test' => !1,

    'SITE_CODE'    => env( 'OZOW_SITE_CODE', 'AFR-AFR-016' ),
    'SECRET_KEY'   => env( 'OZOW_SECRET_KEY', '676886137f4d438a8b8dea986588dabd' ),
    'OZOW_PRIVATE' => env( 'GOOGLE_PRIVATE_KEY', '676886137f4d438a8b8dea986588dabd' ),
    'OZOW_APIKEY'  => env( 'GOOGLE_API_KEY', '7a20ff57466e44c29a4443f446f53555' ),

    'COUNTRY_CODE' => 'ZA',
    'CURRENCY_CODE' => 'ZAR',

    'BANK_REFERENCE' => '',
    'TRANSACTION_REFERENCE' => '',

    'RETURN_URL' => env( 'APP_URL' ) . '/ipay?orderId=', // success
    'ERROR_URL'  => env( 'APP_URL' ) . '/error',         // error
    'CANCEL_URL' => env( 'APP_URL' ) . '/cart/view',     // cancel
    'NOTIFY_URL' => env( 'APP_URL' ) . '/ipay/notify',   // notifications
  ],
  
  // 'google' => [
    // 'google_recaptcha_enable' => !1,
    // 'google_recaptcha' => [
    //   'service'    => \App\Helpers\GoogleReCaptcha\GoogleRecaptchaHelper::class,
    //   'client_key' => env( 'GOOGLE_CLIENT_KEY', null ),
    //   'secret_key' => env( 'GOOGLE_SECRET_KEY', null ),
    // ],

    // 'google_sigin_enable' => !1,
    // 'google_sigin' => [
    //   'oauth_clientId' => '1024907060635-n9dkce27h4f4a5a4g9bh6jep2cmerf6t.apps.googleusercontent.com',
    //   'oauth_secretId' => 'dXaXDebv2TlYH6m6wiU59hue',
    //   'oauth_redirect' => env('APP_URL').'/login/google/callback'
    // ],
  // ],

  // 'facebook' => [
    // 'facebook_sigin_enable' => !1,
    // 'facebook_sigin' => [
    //   'oauth_clientId' => '',
    //   'oauth_secretId' => '',
    //   'oauth_redirect' => env('APP_URL').'/login/facebook/callback'
    // ],
  // ],

];
