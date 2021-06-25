<?php

namespace Templates\AllAmerican;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;


Class AllAmerican
{

  public $package = __CLASS__;

  private static $config;


  /**
   * Constructor
   */
  public function __construct( $packageName="AllAmerican" )
  {
    return $this->exportConfig( $packageName );
  }

  /**
   * Create new instance
   */
  public static function newInstance()
  {
    return new static();
  }

  /**
   * Export configuration
   */
  public static function exportConfig( $packageName="AllAmerican" )
  {
    if ( empty( $packageName ) || $packageName == "" ) $packageName = __CLASS__;

    return self::setPackageConfigFile( $packageName )
               ->getPackageConfigFile();
  }

  /**
   * Get the config. package name, which is private static
   */
  public static function getPackageConfigFile()
  {
    return static::$config;
  }

  /**
   * Set the private static config. package name
   */
  public static function setPackageConfigFile( $config )
  {
    static::$config = config( $config );

    return static::$config;
  }

}
