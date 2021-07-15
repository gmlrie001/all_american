<?php

namespace Templates\AllAmerican;

use Illuminate\Support\ServiceProvider;

class TemplateServiceProvider extends ServiceProvider
{

  // protected $defer = false;

  /**
   * Bootstrap the application services.
   * 
   *  /</> Optional methods to load your package assets
   * 
   */
  public function boot()
  {
    $this->publishes([
      dirname( __DIR__ ) . DIRECTORY_SEPARATOR . 'config/all_american.php' => config_path( 'all_american.php' ),
    ], 'all_american_config' );

    $this->publishes([
      dirname( __DIR__ ) . DIRECTORY_SEPARATOR . 'public/assets' => public_path( 'assets' ),
    ], 'all_american_assets' );

    if ( in_array( env( 'APP_ENV' ), ['local', 'development', 'dev'] ) ) {
      $this->publishes([
        dirname( __DIR__ ) . DIRECTORY_SEPARATOR . 'public/assets' => base_path( 'public/assets' ),
      ], 'all_american_assets_to_local_public_assets' );
    }

    $this->publishes([
      dirname( __DIR__ ) . DIRECTORY_SEPARATOR . 'resources/views/templates' => resource_path( 'views/templates' ),
    ], 'all_american_templates' );
  }

  /**
   * Register the application services.
   */
  public function register()
  {
    // Automatically apply the package configuration
    $this->mergeConfigFrom( dirname( __DIR__ ) . DIRECTORY_SEPARATOR . 'config/all_american.php', 'all_american') ;
  }

  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides()
  {
    return [];
  }

}
