<?php

include_once( resource_path( 'views/templates/vault_config.php' ) );
// dd( $vault_navitems );

/**
 *
 * Vault Sidebar Navigation Menu Item Configuration
 *
 * Major overhaul to use include section config files, within the folder:
 * ]> resource_path()/views/templates/config/settings/vault_navitems/{...}
 *
 */
return [
  'items' => [
    'site_settings'     => include(resource_path() .  '/views/templates/config/settings/vault_navitems/more_navitems/navitem_stub-1.php'),
    'sage_one'          => include(resource_path() .  '/views/templates/config/settings/vault_navitems/more_navitems/navitem_stub-2.php'),
    'aws'               => include(resource_path() .  '/views/templates/config/settings/vault_navitems/more_navitems/navitem_stub-3.php'),
    'error_logs'        => include(resource_path() .  '/views/templates/config/settings/vault_navitems/more_navitems/navitem_stub-4.php'),
    'reports'           => include(resource_path() .  '/views/templates/config/settings/vault_navitems/more_navitems/navitem_stub-5.php'),
    'account'           => include(resource_path() .  '/views/templates/config/settings/vault_navitems/more_navitems/navitem_stub-6.php'),
    'abandoned'         => include(resource_path() .  '/views/templates/config/settings/vault_navitems/more_navitems/navitem_stub-7.php'),
    'checkout'          => include(resource_path() .  '/views/templates/config/settings/vault_navitems/more_navitems/navitem_stub-8.php'),
    'shop'              => include(resource_path() .  '/views/templates/config/settings/vault_navitems/more_navitems/navitem_stub-9.php'),
    'home'              => include(resource_path() . '/views/templates/config/settings/vault_navitems/more_navitems/navitem_stub-10.php'),
    'portfolio'         => include(resource_path() . '/views/templates/config/settings/vault_navitems/more_navitems/navitem_stub-portfolio.php'),
    'about'             => include(resource_path() . '/views/templates/config/settings/vault_navitems/more_navitems/navitem_stub-11.php'),
    'recipes'           => include(resource_path() . '/views/templates/config/settings/vault_navitems/more_navitems/navitem_stub-25.php'),
    'blog'              => include(resource_path() . '/views/templates/config/settings/vault_navitems/more_navitems/navitem_stub-12.php'),
    'services'          => include(resource_path() . '/views/templates/config/settings/vault_navitems/more_navitems/navitem_stub-13.php'),
    'contact'           => include(resource_path() . '/views/templates/config/settings/vault_navitems/more_navitems/navitem_stub-14.php'),
    'gallery'           => include(resource_path() . '/views/templates/config/settings/vault_navitems/more_navitems/navitem_stub-15.php'),
    'testimonials'      => include(resource_path() . '/views/templates/config/settings/vault_navitems/more_navitems/navitem_stub-16.php'),
    'faq_categories'    => include(resource_path() . '/views/templates/config/settings/vault_navitems/more_navitems/navitem_stub-17.php'),
    'inspiration'       => include(resource_path() . '/views/templates/config/settings/vault_navitems/more_navitems/navitem_stub-18.php'),
    'stores'            => include(resource_path() . '/views/templates/config/settings/vault_navitems/more_navitems/navitem_stub-19.php'),
    'directions'        => include(resource_path() . '/views/templates/config/settings/vault_navitems/more_navitems/navitem_stub-20.php'),
    'agents'            => include(resource_path() . '/views/templates/config/settings/vault_navitems/more_navitems/navitem_stub-21.php'),
    'press'             => include(resource_path() . '/views/templates/config/settings/vault_navitems/more_navitems/navitem_stub-22.php'),
    'promo_pages'       => include(resource_path() . '/views/templates/config/settings/vault_navitems/more_navitems/navitem_stub-23.php'),
    'information_pages' => include(resource_path() . '/views/templates/config/settings/vault_navitems/more_navitems/navitem_stub-24.php'),
    'country_names_and_codes' => include(resource_path() . '/views/templates/config/settings/vault_navitems/more_navitems/navitem_stub-27.php'),
    // 'aramax_shipping'   => include(resource_path() . '/views/templates/config/settings/vault_navitems/more_navitems/navitem_stub-28.php'),
    'aramex_shipping'   => include(resource_path() . '/views/templates/config/settings/vault_navitems/more_navitems/navitem_stub-28.php'),
  ]
];
