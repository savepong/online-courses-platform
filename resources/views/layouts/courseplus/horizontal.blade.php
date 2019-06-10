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
            {{-- <div class="uk-navbar-sticky uk-background-grey " uk-sticky="show-on-up: true; animation: uk-animation-slide-top;offset: 85">
                <nav class="uk-padding-small uk-visible@m uk-navbar-transparent uk-animation-slide-to uk-position-z-index" uk-navbar>
                    <div class="uk-flex uk-flex-center uk-width-expand">
                        <ul class="uk-subnav uk-subnav-2">
                            <li class="uk-active">
                                <a href="#"> <i class="fas fa-play icon-medium uk-margin-small-right"></i> Courses </a>
                                <!-- drop topic list -->
                                <div uk-drop="pos: top-left ;mode:click ; offset: 10;animation: uk-animation-slide-bottom-small" class="uk-drop angle-top-left"> 
                                    <div class="tm-drop-topic">
                                        <div class="uk-grid-collapse uk-grid-match" uk-grid> 
                                            <div class="uk-width-1-2"> 
                                                <ul uk-tab="connect: #component-tab-left;animation: uk-animation-slide-left-small, uk-animation-slide-right-small" class="tm-drop-topic-list uk-card uk-card-default uk-margin-remove uk-box-shadow-large"> 
                                                    <li>
                                                        <a href="#"> <i class="far fa-credit-card  uk-margin-small-right"></i> Web Development <i class="fas fa-chevron-right uk-position-center-right uk-margin-right"></i> </a>
                                                    </li>
                                                    <li>
                                                        <a href="#"> <i class="fas fa-briefcase   uk-margin-small-right"></i>   Business  <i class="fas fa-chevron-right uk-position-center-right uk-margin-right"></i> </a> 
                                                    </li>                                                 
                                                    <li>
                                                        <a href="#"> <i class="fas fa-pencil-ruler  uk-margin-small-right"></i>   Office Productivity  <i class="fas fa-chevron-right uk-position-center-right uk-margin-right"></i> </a> 
                                                    </li>
                                                    <li>
                                                        <a href="#"> <i class="fas fa-brain  uk-margin-small-right"></i>    Personal Development <i class="fas fa-chevron-right uk-position-center-right uk-margin-right"></i> </a> 
                                                    </li>
                                                    <li>
                                                        <a href="#"> <i class="fas fa-bullhorn uk-margin-small-right"></i>   Marketing  <i class="fas fa-chevron-right uk-position-center-right uk-margin-right"></i> </a> 
                                                    </li>
                                                    <li>
                                                        <a href="#"> <i class="fas fa-life-ring  uk-margin-small-right"></i>   Life Style <i class="fas fa-chevron-right uk-position-center-right uk-margin-right"></i> </a> 
                                                    </li>                                                 
                                                    <li>
                                                        <a href="#"> <i class="fas fa-camera uk-margin-small-right"></i>   Photography <i class="fas fa-chevron-right uk-position-center-right uk-margin-right"></i> </a> 
                                                    </li>
                                                    <li>
                                                        <a href="#"> <i class="fas fa-briefcase-medical uk-margin-small-right"></i>   Health & Fitness <i class="fas fa-chevron-right uk-position-center-right uk-margin-right"></i> </a> 
                                                    </li>
                                                    <li>
                                                        <a href="#"> <i class="fas fa-shopping-bag  uk-margin-small-right"></i>   Ecommerce <i class="fas fa-chevron-right uk-position-center-right uk-margin-right"></i> </a> 
                                                    </li>
                                                    <li>
                                                        <a href="#"> <i class="fas fa-utensils  uk-margin-small-right"></i>   Food & cooking <i class="fas fa-chevron-right uk-position-center-right uk-margin-right"></i> </a> 
                                                    </li>
                                                </ul>
                                            </div>                                         
                                            <div class="uk-width-1-2 uk-width-1-2"> 
                                                <ul id="component-tab-left" class="uk-switcher uk-card uk-card-default uk-box-shadow-large">
                                                    <li>
                                                        <!-- Web Development list -->                                                     
                                                        <ul class="tm-drop-topic-list uk-padding-remove">
                                                            <li>
                                                                <a href="course-grid.html"> All Development</a>
                                                            </li>                                                         
                                                            <li>
                                                                <a href="course-grid.html"> Web  Development </a>
                                                            </li>                                                         
                                                            <li>
                                                                <a href="course-grid.html">  Mobile App  </a>
                                                            </li>                                                         
                                                            <li>
                                                                <a href="course-grid.html">  Programming language  </a>
                                                            </li>                                                         
                                                            <li>
                                                                <a href="course-grid.html">  Game Development  </a>
                                                            </li>                                                         
                                                            <li>
                                                                <a href="course-grid.html">  Software   </a>
                                                            </li>                                                         
                                                            <li>
                                                                <a href="course-grid.html">  Development tools  </a>
                                                            </li>                                                         
                                                            <li>
                                                                <a href="course-grid.html">  Ecommerce  </a>
                                                            </li>
                                                            <li>
                                                                <a href="course-grid.html"> Training</a>
                                                            </li>                                                         
                                                        </ul>                                                     
                                                    </li>
                                                    <li>
                                                        <!-- Business courses list -->                                                     
                                                        <ul class="tm-drop-topic-list uk-padding-remove">
                                                            <li>
                                                                <a href="course-grid.html"> All Business </a>
                                                            </li>                                                         
                                                            <li>
                                                                <a href="course-grid.html"> Finance </a>
                                                            </li>                                                         
                                                            <li>
                                                                <a href="course-grid.html">  Sales  </a>
                                                            </li>                                                         
                                                            <li>
                                                                <a href="course-grid.html">  Startegy  </a>
                                                            </li>                                                         
                                                            <li>
                                                                <a href="course-grid.html">  Sales  </a>
                                                            </li>                                                         
                                                            <li>
                                                                <a href="course-grid.html">  Other  </a>
                                                            </li>                                                         
                                                        </ul>                                                     
                                                    </li>
                                                    <li>
                                                        <!-- IT & Software  courses list -->                                                     
                                                        <ul class="tm-drop-topic-list uk-padding-remove"> 
                                                            <li>
                                                                <a href="course-grid.html"> Hadware   </a>
                                                            </li>                                                         
                                                            <li>
                                                                <a href="course-grid.html"> Operating system  </a>
                                                            </li>                                                         
                                                            <li>
                                                                <a href="course-grid.html"> Network  </a>
                                                            </li>                                                         
                                                            <li>
                                                                <a href="course-grid.html"> Other  </a>
                                                            </li>                                                         
                                                        </ul>                                                     
                                                    </li>
                                                    <li>
                                                        <!--Personal development  courses list -->                                                     
                                                        <ul class="tm-drop-topic-list uk-padding-remove"> 
                                                            <li>
                                                                <a href="course-grid.html"> Leadership   </a>
                                                            </li>                                                         
                                                            <li>
                                                                <a href="course-grid.html"> Productivity    </a>
                                                            </li>                                                         
                                                            <li>
                                                                <a href="course-grid.html"> Personal Finance  </a>
                                                            </li>                                                         
                                                            <li>
                                                                <a href="course-grid.html"> Other  </a>
                                                            </li>                                                         
                                                        </ul>                                                     
                                                    </li>
                                                    <li>
                                                        <!-- Marketing  courses list -->                                                     
                                                        <ul class="tm-drop-topic-list uk-padding-remove"> 
                                                            <li>
                                                                <a href="course-grid.html"> All Marketing   </a>
                                                            </li>                                                         
                                                            <li>
                                                                <a href="course-grid.html"> Digital Marketing    </a>
                                                            </li>                                                         
                                                            <li>
                                                                <a href="course-grid.html"> Search Engine Optimization  </a>
                                                            </li>                                                         
                                                            <li>
                                                                <a href="course-grid.html"> Other  </a>
                                                            </li>                                                         
                                                        </ul>                                                     
                                                    </li>
                                                    <li>
                                                        <!-- Life style  courses list -->                                                     
                                                        <ul class="tm-drop-topic-list uk-padding-remove"> 
                                                            <li>
                                                                <a href="course-grid.html"> Food   </a>
                                                            </li>                                                         
                                                            <li>
                                                                <a href="course-grid.html"> Travel    </a>
                                                            </li>                                                         
                                                            <li>
                                                                <a href="course-grid.html"> Gaming   </a>
                                                            </li>                                                         
                                                            <li>
                                                                <a href="course-grid.html"> Other  </a>
                                                            </li>                                                         
                                                        </ul>                                                     
                                                    </li>
                                                </ul>                                             
                                            </div>                                         
                                        </div>                                     
                                    </div>                                 
                                </div>
                            </li>
                            <li>
                                <a href="books.html"> <i class="fas fa-book-open icon-medium uk-margin-small-right"></i> Books </a>
                            </li>
                            <li>
                                <a href="#"> <i class="fas fa-file-alt icon-medium uk-margin-small-right"></i> Blogs </a>
                                <div uk-dropdown> 
                                    <ul class="uk-nav uk-dropdown-nav"> 
                                        <li>
                                            <a href="blog.html"> Blogs </a>
                                        </li>                                     
                                        <li>
                                            <a href="blog.html"> Articles</a>
                                        </li>
                                        <li class="uk-nav-header uk-margin-small-top"> Blog Videos </li>                                     
                                        <li>
                                            <a href="blog-video.html"> Video Layout 1 </a>
                                        </li>                                     
                                        <li>
                                            <a href="blog-video-post.html"> Video Layout 2 </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#"> <i class="fas fa-code icon-medium uk-margin-small-right"></i> Scripts </a>
                                <div uk-drop="pos: top  ;mode:click ; offset: 10;animation: uk-animation-slide-bottom-small" class="uk-drop tm-dropdown-medium"> 
                                    <div class="uk-card-small uk-box-shadow-xlarge uk-card-default uk-maring-small-left  border-radius-6"> 
                                        <div class="uk-card uk-card-default border-radius-6"> 
                                            <div class="uk-card-body">
                                                <div class="uk-child-width-1-3 uk-grid-collapse  uk-text-small uk-text-center uk-flex-center" uk-grid>
                                                    <div> 
                                                        <a href="scripts.html" class="uk-link-reset"> <i class="fab fa-html5 info-big-icon"></i> <p class="uk-margin-small-top uk-margin-remove-bottom">  Html templates   </p> </a> 
                                                    </div>
                                                    <div> 
                                                        <a href="scripts.html" class="uk-link-reset"> <i class="fab fa-php info-big-icon"></i> <p class="uk-margin-small-top uk-margin-remove-bottom">    PHP Scripts  </p> </a>
                                                    </div>
                                                    <div> 
                                                        <a href="scripts.html" class="uk-link-reset"> <i class="fab fa-wordpress info-big-icon"></i> <p class="uk-margin-small-top uk-margin-remove-bottom">    Cms Plugins  </p> </a>
                                                    </div>
                                                    <div class="uk-margin-small-top"> 
                                                        <a href="scripts.html" class="uk-link-reset"> <i class="fab fa-wordpress-simple info-big-icon"></i> <p class="uk-margin-small-top uk-margin-remove-bottom">  Cms themes  </p> </a>
                                                    </div>
                                                    <div class="uk-margin-small-top"> 
                                                        <a href="scripts.html" class="uk-link-reset"> <i class="fab fa-android info-big-icon"></i> <p class="uk-margin-small-top uk-margin-remove-bottom">   Apps Source    </p> </a>
                                                    </div>
                                                    <div class="uk-margin-small-top"> 
                                                        <a href="scripts.html" class="uk-link-reset"> <i class="fas fa-code  info-big-icon"></i> <p class="uk-margin-small-top uk-margin-remove-bottom">  All Scripts  </p> </a>
                                                    </div>
                                                </div>                                             
                                            </div>                                         
                                        </div>                                     
                                    </div>                                 
                                </div>                             
                            </li>
                            <li>
                                <a href="discussion.html"> <i class="fas fa-comment-alt icon-medium uk-margin-small-right"></i> Discussion </a>
                            </li>                         
                            <li>
                                <a href="#"> <i class="fas fa-clone icon-medium uk-margin-small-right"></i> Pages </a>
                                <div class="tm-dropdown-medium" uk-dropdown="mode:click ;"> 
                                    <div class="uk-dropdown-grid uk-child-width-1-2@m" uk-grid> 
                                        <div> 
                                            <ul class="uk-nav uk-dropdown-nav"> 
                                                <li>
                                                    <a href="help.html"> Help </a> 
                                                </li>                                             
                                                <li>
                                                    <a href="pages-term.html"> Terms </a>
                                                </li>                                             
                                                <li>
                                                    <a href="pages-faq.html"> Faq </a>
                                                </li>                                             
                                                <li>
                                                    <a href="pages-term.html"> About    </a>
                                                </li>
                                            </ul>
                                        </div>                                     
                                        <div> 
                                            <ul class="uk-nav uk-dropdown-nav"> 
                                                <li>
                                                    <a href="profile.html"> Profile  </a>
                                                </li>
                                                <li>
                                                    <a href="ui-elements.html"> UI Elements  </a> 
                                                </li>                                             
                                                <li>
                                                    <a href="ui-compuntes.html"> Ui Compuntes</a>
                                                </li>                                             
                                                <li>
                                                    <a href="ui-helpers.html"> Ui Helpers </a>
                                                </li>                                             
                                            </ul>
                                        </div>                                     
                                    </div>
                                </div>
                            </li>                         
                        </ul>                     
                    </div>
                </nav>             
            </div> --}}
            <main>
                @yield('content')          
            </main>         
            
            <!-- footer -->         
            <div class="uk-section-small uk-margin-medium-top"> 
                <hr class="uk-margin-remove"> 
                <div class="uk-container uk-align-center uk-margin-remove-bottom uk-position-relative"> 
                    <div uk-grid> 
                        <div class="uk-width-1-3@m uk-width-1-2@s uk-first-column"> 
                            <a href="pages-about.html" class="uk-link-heading uk-text-lead uk-text-bold"> <i class="fas fa-graduation-cap"></i>  {{config('app.name')}}</a> 
                            <div class="uk-width-xlarge tm-footer-description">A unique and beautiful collection of UI elements that are all flexible and modular.   building the website of your dreams.</div>                         
                        </div>                     
                        <div class="uk-width-expand@m uk-width-1-2@s"> 
                            <ul class="uk-list  tm-footer-list"> 
                                <li> 
                                    <a href="#"> Browse Our Library </a> 
                                </li>                             
                                <li> 
                                    <a href="#"> Tutorials/Articles </a> 
                                </li>                             
                                <li> 
                                    <a href="#"> Scripts and codes</a> 
                                </li>                             
                                <li> 
                                    <a href="#"> Ebooks</a> 
                                </li>                             
                            </ul>                         
                        </div>                     
                        <div class="uk-width-expand@m uk-width-1-2@s"> 
                            <ul class="uk-list tm-footer-list"> 
                                <li> 
                                    <a href="#"> About us </a> 
                                </li>                             
                                <li> 
                                    <a href="#"> Contact Us </a> 
                                </li>                             
                                <li> 
                                    <a href="#"> Privacy   </a> 
                                </li>                             
                                <li> 
                                    <a href="#">   Policy </a> 
                                </li>                             
                            </ul>                         
                        </div>                     
                        <div class="uk-width-expand@m uk-width-1-2@s"> 
                            <ul class="uk-list  tm-footer-list"> 
                                <li> 
                                    <a href="#">Web Design </a> 
                                </li>                             
                                <li> 
                                    <a href="#">Web Development  </a> 
                                </li>                             
                                <li> 
                                    <a href="#"> iOS Development </a> 
                                </li>                             
                                <li> 
                                    <a href="#">  PHP Development </a> 
                                </li>                             
                            </ul>                         
                        </div>                     
                    </div>                 
                    <hr>
                    <p class="uk-postion-absoult uk-margin-remove uk-position-bottom-right" style="bottom: 8px;right: 60px;" uk-tooltip="title: Visit Our Site; pos: top-center"> Powered By <a href="https://ideagital.com" target="_blank" class="uk-text-bold uk-link-reset">IDEAGITAL TECH</a></p> 
                    <div class="uk-margin-small" uk-grid> 
                        <div class="uk-width-1-2@m uk-width-1-2@s uk-first-column"> 
                            <p class="uk-text-small"><i class="fas fa-copyright"></i> 2019 <span class="uk-text-bold">{{config('app.name')}}</span> . All rights reserved.</p> 
                        </div>                     
                        <div class="uk-width-1-3@m uk-width-1-2@s"> 
                            <a href="#" class="uk-icon-button uk-link-reset" uk-tooltip="title: Our Youtube Chanal; pos: top-center"><i class="fab fa-youtube" style=" color: #fb7575  !important;"></i></a>
                            <a href="#" class="uk-icon-button uk-link-reset" uk-tooltip="title: Our Facebook; pos: top-center"><i class="fab fa-Facebook" style=" color: #9160ec  !important;"></i></a>
                            <a href="#" class="uk-icon-button uk-link-reset" uk-tooltip="title: Our Instagram; pos: top-center"><i class="fab fa-Instagram" style=" color: #dc2d2d  !important;"></i></a>
                            <a href="#" class="uk-icon-button uk-link-reset" uk-tooltip="title: Our linkedin; pos: top-center"><i class="fab fa-linkedin " style=" color: #6949a5  !important;"></i></a>
                            <a href="#" class="uk-icon-button uk-link-reset" uk-tooltip="title: Our google-plus; pos: top-center"><i class="fab fa-google-plus" style=" color: #f77070 !important;"></i></a>
                            <a href="#" class="uk-icon-button uk-link-reset" uk-tooltip="title: Our Twitter; pos: top-center"><i class="fab fa-twitter" style=" color: #6f23ff !important;"></i></a>
                        </div>                     
                    </div>                 
                </div>             
            </div>         
            <!-- footer  end -->         
            <!-- app end -->         
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
