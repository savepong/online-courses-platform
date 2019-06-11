<html lang="en"> 
    <head> 
        <title> {{config('app.name')}} </title>         
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{asset('themes/courseplus')}}/assets/images/favicon.png">
        <link href="{{asset('themes/courseplus')}}/assets/img/brand/favicon.png" rel="icon" type="image/png">

        <!-- Your stylesheet-->
        <link rel="stylesheet" href="{{asset('themes/courseplus')}}/assets/css/uikit.css"> 
        <link rel="stylesheet" href="{{asset('themes/courseplus')}}/assets/css/main.css"> 

        <!-- font awesome -->         
        <link rel="stylesheet" href="{{asset('themes/courseplus')}}/assets/css/fontawesome.css">

        <!--  javascript -->
        <script src="{{asset('themes/courseplus')}}/assets/js/simplebar.js"></script>         
        <script src="{{asset('themes/courseplus')}}/assets/js/uikit.js"></script>   
        
    </head>     
    <body> 
        <div id="app">
            <div id="defaultOpen"></div>

            <!-- PreLoader -->         
            <div id="spinneroverlay"> 
                <div class="spinner"></div>             
            </div>   
            
            <!-- header  -->
            <header-component></header-component>

            <!-- Navigation  -->
            <navigation-component></navigation-component>

            <main>
                @yield('content')          
            </main>         
            
            <!-- footer -->         
            <footer-component></footer-component>  

            <!-- button scrollTop -->         
            <button id="scrollTop" class="uk-animation-slide-bottom-medium"> 
                <a href="#" class="uk-text-white" uk-totop uk-scroll></a> 
            </button>  
        </div>  

        <!--  Night mood -->         
        <script>
        (function (window, document, undefined) {
          'use strict';
          if (!('localStorage' in window)) return;
          var nightMode = localStorage.getItem('gmtNightMode');
          if (nightMode) {
              document.documentElement.className += ' night-mode';
          }
        })(window, document);


        (function (window, document, undefined) {

          'use strict';

          // Feature test
          if (!('localStorage' in window)) return;

          // Get our newly insert toggle
          var nightMode = document.querySelector('#night-mode');
          if (!nightMode) return;

          // When clicked, toggle night mode on or off
          nightMode.addEventListener('click', function (event) {
              event.preventDefault();
              document.documentElement.classList.toggle('night-mode');
              if ( document.documentElement.classList.contains('night-mode') ) {
                  localStorage.setItem('gmtNightMode', true);
                  return;
              }
              localStorage.removeItem('gmtNightMode');
          }, false);

        })(window, document);

        // Preloader
        var spinneroverlay = document.getElementById("spinneroverlay");
        window.addEventListener('load', function(){
            spinneroverlay.style.display = 'none';
        });

         //scrollTop
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};        
        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("scrollTop").style.display = "block";
            } else {
                document.getElementById("scrollTop").style.display = "none";
            }
        } 
               
        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }

        </script>   
        
        <script src="{{asset('js/app.js')}}"></script>      
    </body>     
</html>
