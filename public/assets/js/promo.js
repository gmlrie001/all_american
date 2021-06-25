/**
 * Copyright 2014 Facebook "Share to Download" by Adam Azad (AdamA)
 * Licensed under the Apache License, Version 2.0
 * http://www.apache.org/licenses/LICENSE-2.0
 **/
$(document).ready(function () {

    var btnShare = $('#facebook-share');

     window.fbAsyncInit = function() {
       FB.init({
         appId      : '1316646895143006',
         version    : 'v2.7'
       });
     };   
   btnShare.on('click', function(e){
       e.preventDefault();
     /** display the share dialog and wait for the response **/
     FB.ui({
           display: 'popup',
           method:  'share',
           href: 'https://developers.facebook.com/docs/',
           },
           /** our callback **/
           function(response) {
                /** debug **/
                // console.log(typeof response);
                // console.log(response);
                // console.log(response instanceof Array);
                if (response != 'undefined' && response instanceof Array) {
                    /** the user shared the content on their Facebook, go ahead and continue to download **/
                    var pathname = window.location.pathname;
                    pathname = pathname.substring(0, pathname.indexOf("/share"));
                    
                    window.location.replace(pathname+"/thankyou");
                }
                
           });
       
    });
});

// Load the SDK
(function(d, s, id){
 var js, fjs = d.getElementsByTagName(s)[0];
 if (d.getElementById(id)) {return;}
 js = d.createElement(s); js.id = id;
 js.src = "//connect.facebook.net/en_US/sdk.js";
 fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));