/**
 * File: Utilities/util.js
 * =====
 * 
 * Desciption:
 * ===========
 * Utilities Module, which contains all of the everyday,
 * run of the mill type of functions encapsulated as 
 * methods of this module.
 * 
 * Element class manipulation, Element selection, etc.
 * 
 * Author: _mrg
 * =======
 * Date: December 2019
 * =====
 * 
 */

/**
 * Module's Constructor Function.
 */
var Util = function() {}

  /**
   * ================================================================================================
   * 
   * Module/Class DOM CLass Querying/Manipulation Methods.
   *
   * ================================================================================================
   */
  Util.prototype.hasClass = function( element, classSelector ) {
    this.element = element || null;
    if ( ( typeof( element ) == undefined || element != null ) && typeof( element ) === 'string' ) {
      tmp = document.querySelectorAll( element );
      this.element = ( tmp.length > 1 ) ? tmp : tmp[0];
      delete( tmp );
    }

    return this.element.classList.contains( classSelector );
  }

  /* a.addClass( document.body, "media-library" ) */
  Util.prototype.addClass = function( element, classSelector ) {
    this.element = element || null;
    if ( ( typeof( element ) == undefined || element != null ) && typeof( element ) === 'string' ) {
      tmp = document.querySelectorAll( element );
      this.element = ( tmp.length > 1 ) ? tmp : tmp[0];
      delete( tmp );
    }

    if ( Util.element.hasClass( classSelector ) ) return;

    return ( typeof( this.element ) != undefined && Array.isArray( this.element ) ) 
      ? this.element.map( el => { el.classList.add( classSelector ) })
      : this.element.classList.add( classSelector );
  }

  Util.prototype.removeClass = function( element, classSelector ) {
    this.element = element || null;
    if ( ( typeof( element ) == undefined || element != null ) && typeof( element ) === 'string' ) {
      tmp = document.querySelectorAll( element );
      this.element = ( tmp.length > 1 ) ? tmp : tmp[0];
      delete( tmp );
    }

    if ( ! Util.element.hasClass( classSelector ) ) return;

    return ( typeof( this.element ) != undefined && Array.isArray( this.element ) ) 
      ? this.element.map( el => { el.classList.remove( classSelector ) })
      : this.element.classList.remove( classSelector );
  }

  /*
  Util.prototype.replaceClass = function( element, classSelector, replacementClass ) {
    this.element = element || null;
    if ( ( typeof( element ) == undefined || element != null ) && typeof( element ) === 'string' ) {
      tmp = document.querySelectorAll( element );
      this.element = ( tmp.length > 1 ) ? tmp : tmp[0];
      delete( tmp );
    }

    if ( ! Util.element.hasClass( classSelector ) ) return;

    return 
      ( typeof( this.element ) != undefined && Array.isArray( this.element ) ) 
      ? this.element.classList.replace( classSelector )
      : this.element.map( el => { el.classList.replace( classSelector )});
  }
  */

  Util.prototype.classValues = function( element ) {
    this.element = element || null;
    if ( ( typeof( element ) == undefined || element != null ) && typeof( element ) === 'string' ) {
      tmp = document.querySelectorAll( element );
      this.element = ( tmp.length > 1 ) ? tmp : tmp[0];
      delete( tmp );
    }

    return this.element.classList.values;
  }

  Util.prototype.replaceClass = function( element, classSelector, replacementClass ) {
    this.element = element || null;
    if ( ( typeof( element ) == undefined || element != null ) && typeof( element ) === 'string' ) {
      tmp = document.querySelectorAll( element );
      this.element = ( tmp.length > 1 ) ? tmp : tmp[0];
      delete( tmp );
    }

    if ( ! Util.element.hasClass( classSelector ) || Util.element.hasClass( replacementClass ) ) return;

    return ( typeof( this.element ) != undefined && Array.isArray( this.element ) ) 
      ? this.element.map( el => { el.classList.replace( classSelector, replacementClass ) })
      : this.element.classList.replace( classSelector, replacementClass );
  }
