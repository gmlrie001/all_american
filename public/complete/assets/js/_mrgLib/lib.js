(function (window) {
  // You can enable the strict mode commenting the following line  
  // 'use strict';

  // This function will contain all our code
  function myLibrary() {
    var _myLibraryObject = {};

    // This variable will be inaccessible to the user, only can be visible in the scope of your library.
    var settings = {
      volume: 100,
      mute: false
    };


    // Change a private property
    _myLibraryObject.setVolume = function (volume) {
      settings.volume = volume;
      return volume;
    };

    // Change a private property
    _myLibraryObject.setMute = function (muteStatus) {
      if (typeof (muteStatus) === 'boolean') {
        settings.mute = muteStatus;
      } else {
        console.error("You need to disable or enable the sound !");
      }

      return settings.mute;
    };

    // Change a private property
    _myLibraryObject.haveSound = function () {
      return settings.mute;
    };

    // We will add functions to our library here !
    // Just create a property to our library object.
    _myLibraryObject.myCustomLog = function (thingToLog) {
      console.log("My-Custom-Log > Type of variable : " + typeof (thingToLog));
      console.log("My-Custom-Log > Is number : " + !isNaN(thingToLog));
      console.log("My-Custom-Log > Length : " + (thingToLog).length);

      return console.log(thingToLog);
    };

    return _myLibraryObject;
  }

  // We need that our library is globally accesible, then we save in the window
  if (typeof (window.myWindowGlobalLibraryName) === 'undefined') {
    window.myWindowGlobalLibraryName = myLibrary();
  }
})(window); // We send the window variable withing our function

// Then we can call it using
console.log(myWindowGlobalLibraryName);