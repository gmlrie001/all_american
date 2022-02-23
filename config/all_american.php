<?php

if ( in_array( env('APP_ENV'), ['local', 'development', 'dev'] ) ) {
  $localPublicPath = local_public_path( 'public', 'assets' );
}

/**
 * 
 * Website templating style guide and JS/JQuery functionality.
 * 
 */

return [
  /**
   * | 
   * | We define here the variables that are set in the vault_config.php in
   * | the Monzamedia templates, e.g. African Oils Template.
   * | 
   * | NB: only public assets such as css, js and images are part of this 
   * | package, and the blade files should remain within its corresponding
   * | template repository.
   * | 
   */
  'type'     => 'package', 
  'resource' => 'template', // app, assets, 
  'name'     => 'templates/all_american', 
  'version'  => '1.0-dev', 

  /**
   * | ============================================================= *
   * |
   * | Destination path for BLADE TEMPLATES publishing.
   * |
   * | ============================================================= *
   */
  'template_source'      => dirname( __DIR__ ) .DIRECTORY_SEPARATOR. 'resources/views/templates', 
  'template_destination' => resource_path( 'views/templates' ), 
  'template_tagname'     => 'all_american_template', 

  /**
   * | ============================================================= *
   * |
   * | Destination path for TEMPLATES ASSETS publishing.
   * |
   * | ============================================================= *
   */
  'assets_source'      => dirname( __DIR__ )  .DIRECTORY_SEPARATOR. 'public/assets', 
  'assets_destination' => base_path( 'public_html/assets' ), 
  'assets_tagname'     => 'all_american_assets', 

];
