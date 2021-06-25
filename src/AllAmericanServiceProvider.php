<?php

namespace Templates\AllAmerican;

use Illuminate\Support\ServiceProvider;

class AllAmericanServiceProvider extends ServiceProvider
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
      $this->loadMigrationsFrom( dirname( __DIR__ ) . DIRECTORY_SEPARATOR . 'database/migrations');

      $this->publishes([
        dirname( __DIR__ ) . DIRECTORY_SEPARATOR . 'config/all_american.php' => config_path( 'all_american.php' ),
      ], 'all_american_config' );

      $this->publishes([
        dirname( __DIR__ ) . DIRECTORY_SEPARATOR . 'public/assets' => public_path( 'assets' ),
      ], 'all_american_public_html_assets' );

      $this->publishes([
        dirname( __DIR__ ) . DIRECTORY_SEPARATOR . 'public/assets' => base_path( 'public/assets' ),
      ], 'all_american_public_assets' );

      // $this->publishes([
      //   dirname( __DIR__ ) . DIRECTORY_SEPARATOR . 'config/all_american.php' => config_path( 'all_american.php' ),
      //   dirname( __DIR__ ) . DIRECTORY_SEPARATOR . 'public/assets' => public_path( 'assets' ),
      // ], 'all_american' );
    }

    /**
     * Register the application services.
     */
    public function register()
    {
      // Automatically apply the package configuration
      $this->mergeConfigFrom( dirname( __DIR__ ) . DIRECTORY_SEPARATOR . 'config/all_american.php', 'all_american') ;

      // Register the main class to use with the facade
      $this->app->singleton( 'all_american', function () {
        return new AllAmerican();
      });

      // // Bind to main package class
      // $this->app->bind( 'AllAmerican', function () {
     	//   return new Templates\AllAmerican\AllAmerican();
      // });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
      return [
        'all_american', 
        // 'AllAmerican', 
      ];
    }

}
