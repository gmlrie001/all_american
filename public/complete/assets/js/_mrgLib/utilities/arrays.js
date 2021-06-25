/**
 * File: Utilities/arrays.js
 * =====
 * 
 * Desciption:
 * ===========
 * Arrays Module, which contains all of the everyday,
 * run of the mill type of functions encapsulated as 
 * methods of this module.
 * 
 * Check if is an array, map, filter, reduct, etc.
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
var Arrays = function( input ) {
  this.object = input || null;

  return this.object;
}

/**
 * ================================================================================================
 * 
 * Module/Class Array methods.
 *
 * ================================================================================================
 */
Arrays.prototype.isArray = function() {
  // var object = () ? input : input;
  return Array.isArray( this.object );
}
    
