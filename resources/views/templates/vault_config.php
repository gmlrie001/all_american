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
    'aramex_shipping', 
    // 'thecourierguy_shipping', 
    'home',
    'portfolio',
    // 'recipes',
    // 'blog',
    // 'contact',
    // 'faq_categories',
    // 'information_pages',
    'country_names_and_codes',
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
      'aramex_shipping_package' => [
        "\\Vault\\ShipmentCourier",
        "\\Vault\\CourierAramex", 
      ], 
      'options' => [
        'aramex_credentials' => [
          'AccountCountryCode' => 'ZA',
          'AccountEntity'	     => 'CPT',
          'AccountNumber' 	   => '251333',
          'AccountPin'	       => '654654',
          'UserName'           => 'daniel@africanoils.co.za',
          'Password'           => 'Password@123',
          'Version'            => '1.0',
      
          //    'rateCalcEndPoint'    => NULL,
          'rateCalcEndPoint'    => 'GetDomesticBestService',
          'ProductGroup'        => 'DOM',
          'PaymentType'         => 'P',
          'ProductType'         => 'OND', // PPX, DPX, GPX, EPX
          //     'ServiceType' => '', // 'PEC|ONP'
          //     'ServiceCodeTrans' => [
          //       'PEC' => 'Domestic Economy Shipping',
          //       'ONP' => 'Domestic Overnight Shipping',
          //     ],
          // 
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
      
          'OriginStreetAddress' => '7 Section Street',
          'OriginBusinessPark'  => 'Shop No. 4, Section Street Business Park',
          'OriginOtherAddress'  => NULL,
          'OriginCountryCode'   => 'ZA',
          'OriginCountryName'   => 'South Africa',
          'OriginState'         => 'Western Cape',
          'OriginSuburb'        => 'Brooklyn',
          'OriginCity'          => 'Cape Town',
          'OriginPostCode'      => '7405',
      
          'SenderName'          => 'Daniel Kantor',
          'SenderReference1'    => 'African Oils Ecommerce Online Order: https://africanoils.co.za',
          'SenderReference2'    => 'None',
          'SenderContactPerson' => 'Daniel Kantor',
          'SenderContactNumber' => '07699139873',
          'SenderContactEmail'  => 'daniel@africanoils.co.za',
      
          'isDocsDefault'       => false,
          'reqInsDefault'       => false,
          'insValDefault'       => 0,
          'wbTmplDefault'       => 9201, // 9202
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
        'tcg_checkout_helper' => \App\Helpers\TheCourierGuyParcelPerfectAPI\CheckoutServices\DeliveryOptionsService::class, 
        'courier_tcg' => "\\Vault\\CourierTcg", 
      ], 
      'options' => [],
    ],  
    'ParcelNinja' => [
      'courier' => 'Parcel_ninja', 
      'courier_enabled' => 0,
      'courier_package' => [
        'shipment_courier' => "\\Vault\\ShipmentCourier", 
        'tcg_checkout_helper' => \App\Helpers\TheCourierGuyParcelPerfectAPI\CheckoutServices\DeliveryOptionsService::class, 
        'courier_tcg' => "\\Vault\\CourierTcg", 
      ], 
      'options' => [], 
    ], 
    'Default' => [
      'courier' => 'Default', 
      'courier_enabled' => 1,
      'courier_package' => [
        'shipment_courier' => "\\App\\Models\\ShippingOption", 
        'tcg_checkout_helper' => NULL, 
        'courier_default' => "", 
      ], 
      'options' => [], 
    ],
    'Collection' => [
      'courier' => 'Collection', 
      'courier_enabled' => 1,
      'courier_package' => [
        'shipment_courier' => \App\Models\CollectionPoint::class, 
        'tcg_checkout_helper' => NULL, 
        'courier_default' => "", 
      ], 
      'options' => [], 
    ],
  ],

  'free_shipping_enabled' => !1,
  'free_shipping_value_threshold_default' => 100.00,
  'shipment_options' => [
    // SPECIAL OPTIONS -> Rate/Shipping Cost Specific
    'enable_subsidize' => 0,
    // Absorb/Wave %_percentage_% of the shipping cost/expense
    //    0 => No cover; (or NULL);
    //   45 => Percentage subsidize;
    //  100 => Full cover
    'absorb_shipping_cost' => 100,
    // Subdize percentage <= 100 and > 0 - e.g. 45;
    // 'shipment_subsidize_percent'  => null,
    // Override Shipping rate cost with this Value > 0
    // 'override_shipment_cost_with' => null,
    // /
  ],

  'payment_options' => [
    'model' => \App\Models\PaymentOption::class,
  //   'filters' => [
  //     ['where'=>[
  //       'status', 'PUBLISHED'
  //     ],
  //     ['orWhere'=>[
  //       'status', 'SCHEDULED'=>[
  //         'where'=>[
  //           'status_date', '>', strtotime('now')
  //         ]
  //       ]
  //     ],
  //     ['status'=>[
  //       'SCHEDULED'=>[
  //         'status_date'=>''
  //       ]
  //     ]
  //   ],
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
    'is_test' => !0,
    'sandbox' => [
      'url' => 'https://sandbox.payfast.co.za/eng/process',
      'merchant_id'  => '10000100', 
      'merchant_key' => '46f0cd694581a', 
    ],
    'live' => [
      'frontendUUID' => 'a7275aa3b7abd9c3f49f369ad392987f',
      'url' => 'https://www.payfast.co.za/eng/process',
      'cmd' => '_paynow', 
      'receiver' => '15514262', 
      'merchant_key' => '5gajd08znxwe4', 
    ],
    'COUNTRY_CODE' => 'ZA',
    'CURRENCY_CODE' => 'ZAR',
    'TRANSACTION_REFERENCE' => '',
    'BANK_REFERENCE' => '',
    'RETURN_URL' => env( 'APP_URL' ) . '/success', // success
    'ERROR_URL' => env( 'APP_URL' ) . '/error',         // error
    'CANCEL_URL' => env( 'APP_URL' ) . '/cart/view',     // cancel
  ],

  'ozow_payment_option' => [
    'enable' => 1,
    'IS_TEST' => true,
    'SITE_CODE' => 'AFR-AFR-016',
    'SECRET_KEY' => '676886137f4d438a8b8dea986588dabd',
    'OZOW_PRIVATE' => '676886137f4d438a8b8dea986588dabd',
    'OZOW_APIKEY' => '7a20ff57466e44c29a4443f446f53555',
    'COUNTRY_CODE' => 'ZA',
    'CURRENCY_CODE' => 'ZAR',
    'BANK_REFERENCE' => 'AO',
    'TRANSACTION_REFERENCE' => 'AO',
    'RETURN_URL' => env( 'APP_URL' ) . '/ipay?orderId=', // success
    'ERROR_URL' => env( 'APP_URL' ) . '/error',         // error
    'CANCEL_URL' => env( 'APP_URL' ) . '/cart/view',     // cancel
    'NOTIFY_URL' => env( 'APP_URL' ) . '/ipay/notify',   // notifications
  ],
  
  // 'google_sigin_enable' => 0,
  // 'google_sigin' => [
  //   'oauth_clientId' => '1024907060635-n9dkce27h4f4a5a4g9bh6jep2cmerf6t.apps.googleusercontent.com',
  //   'oauth_secretId' => 'dXaXDebv2TlYH6m6wiU59hue',
  //   'oauth_redirect' => env('APP_URL').'/login/google/callback'
  // ],

  // 'facebook_sigin_enable' => 0,
  // 'facebook_sigin' => [
  //   'oauth_clientId' => '',
  //   'oauth_secretId' => '',
  //   'oauth_redirect' => env('APP_URL').'/login/facebook/callback'
  // ],

  ];
