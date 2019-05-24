<html lang="en"> 
    <head> 
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{asset('themes/courseplus')}}/assets/images/favicon.png">
        <meta name="description" content="">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> {{config('app.name')}} </title>         
        <!-- Favicon -->
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
        <!-- PreLoader -->         
        <div id="spinneroverlay"> 
            <div class="spinner"></div>             
        </div>         
        <!-- header  -->
        <header class="tm-header" uk-sticky>
            <div class=" uk-background-grey uk-navbar-container uk-navbar-transparent uk-padding-small uk-navbar-sticky">
                <div class="uk-position-relative">
                    <nav class="uk-navbar-transparent tm-mobile-header uk-animation-slide-top uk-position-z-index" uk-navbar>
                        <!-- logo -->
                        <!-- mobile icon for side nav on nav-mobile-->                         
                        <span class="uk-hidden@m tm-mobile-menu-icon" uk-toggle="target: #mobile-sidebar"><i class="fas fa-bars icon-large"></i></span> 
                        <!-- mobile icon for user icon on nav-mobile -->                         
                        <span class="uk-hidden@m tm-mobile-user-icon uk-align-right" uk-toggle="target: #tm-show-on-mobile; cls: tm-show-on-mobile-active"><i class="fas fa-user icon-large"></i></span> 
                        <!-- mobile logo -->                         
                        <a class="uk-hidden@m uk-logo" href="Homepage.html"> CoursePlus</a> 
                        <div class="uk-navbar-left uk-visible@m">
                            <a href="Homepage.html" class="uk-logo uk-margin-left"> <i class="fas fa-graduation-cap"> </i> CoursePlace</a> 
                        </div>                         
                        <div class="uk-navbar-right tm-show-on-mobile uk-flex-right" id="tm-show-on-mobile"> 
                            <!-- this will clouse after display user icon -->                             
                            <span class="uk-hidden@m tm-mobile-user-close-icon uk-align-right" uk-toggle="target: #tm-show-on-mobile; cls: tm-show-on-mobile-active"><i class="fas fa-times icon-large"></i></span> 
                            <ul class="uk-navbar-nav uk-flex-middle"> 
                                <li> 
                                    <a href="#modal-full" uk-toggle><i class="fas fa-search icon-medium"></i></a> 
                                </li>                                 
                                <li> 
                                    <!-- your courses -->                                     
                                    <a href="#"> <i class="fas fa-play uk-hidden@m"></i> <span class="uk-visible@m"> Your Courses</span> </a> 
                                    <div uk-dropdown="pos: top-right ;mode : click; animation: uk-animation-slide-bottom-medium" class="uk-dropdown border-radius-6  uk-dropdown-top-right tm-dropdown-large uk-padding-remove"> 
                                        <div class="uk-clearfix"> 
                                            <div class="uk-float-left"> 
                                                <h5 class="uk-padding-small uk-margin-remove uk-text-bold  uk-text-left">  Your Courses </h5> 
                                            </div>                                             
                                            <div class="uk-float-right"> 
                                                <i class="fas fa-check uk-align-right  uk-margin-remove uk-margin-remove-left  uk-padding-small uk-text-small"> Completed 3 / 5 </i> 
                                            </div>                                             
                                        </div>                                         
                                        <hr class=" uk-margin-remove"> 
                                        <div class="uk-padding-smaluk-text-left uk-height-medium"> 
                                            <div class="demo1" data-simplebar> 
                                                <div class="uk-child-width-1-2@s  uk-grid-small uk-padding-small" uk-scrollspy="target: > div; cls:uk-animation-slide-bottom-small; delay: 100 ;repeat: true" uk-grid> 
                                                    <div> 
                                                        <a href="course-view.html" class="uk-link-reset"> 
                                                            <div class="uk-padding-small uk-card-default"> 
                                                                <progress id="js-progressbar" class="uk-progress progress-green uk-margin-small-bottom" value="100" max="100" style="height: 7px;"></progress>                                                                 
                                                                <img src="{{asset('themes/courseplus')}}/assets/images/courses/tags/css3.JPG" class="uk-align-left  uk-margin-small-right uk-margin-small-bottom  uk-width-1-3  uk-visible@s" alt=""> 
                                                                <p class="uk-text-bold uk-margin-remove">CSS3 Introduciton </p> 
                                                                <p class="uk-text-small uk-margin-remove"> by : Hamse mohamoud </p> 
                                                                <div class="uk-margin-small"> 
                                                                    <a class="Course-tags uk-margin-small-right   border-radius-6" href="#"> <i class="far fa-play"></i> Course resume</a> 
                                                                </div>                                                                 
                                                            </div>                                                             
                                                        </a>                                                         
                                                    </div>                                                     
                                                    <div> 
                                                        <a href="course-view.html" class="uk-link-reset"> 
                                                            <div class="uk-padding-small uk-card-default"> 
                                                                <progress id="js-progressbar" class="uk-progress progress-coral  uk-margin-small-bottom" value="15" max="100" style="height: 7px !important;"></progress>                                                                 
                                                                <img src="{{asset('themes/courseplus')}}/assets/images/courses/tags/html5.jpg" class="uk-align-left  uk-margin-small-right uk-margin-small-bottom  uk-width-1-3  uk-visible@s" alt=""> 
                                                                <p class="uk-text-bold uk-margin-remove">HTML5 Introduciton </p> 
                                                                <p class="uk-text-small uk-margin-remove"> by : Hamse mohamoud </p> 
                                                                <div class="uk-margin-small"> 
                                                                    <a class="Course-tags uk-margin-small-right   border-radius-6" href="#"> <i class="far fa-play"></i> Course resume</a> 
                                                                </div>                                                                 
                                                            </div>                                                             
                                                        </a>                                                         
                                                    </div>                                                     
                                                    <div> 
                                                        <a href="course-view.html" class="uk-link-reset"> 
                                                            <div class="uk-padding-small uk-card-default"> 
                                                                <progress id="js-progressbar" class="uk-progress uk-margin-small-bottom" value="50" max="100" style="height: 7px;"></progress>                                                                 
                                                                <img src="{{asset('themes/courseplus')}}/assets/images/courses/course-4.jpg" class="uk-align-left  uk-margin-small-right uk-margin-small-bottom  uk-width-1-3" alt=""> 
                                                                <p class="uk-text-bold uk-margin-remove">Html Introduciton </p> 
                                                                <p class="uk-text-small uk-margin-remove"> by : Hamse mohamoud </p> 
                                                            </div>                                                             
                                                        </a>                                                         
                                                    </div>                                                     
                                                    <div> 
                                                        <a href="course-view.html" class="uk-link-reset"> 
                                                            <div class="uk-padding-small uk-card-default"> 
                                                                <progress id="js-progressbar" class="uk-progress progress-green uk-margin-small-bottom" value="100" max="100" style="height: 7px;"></progress>                                                                 
                                                                <img src="{{asset('themes/courseplus')}}/assets/images/courses/course-5.jpg" class="uk-align-left  uk-margin-small-right uk-margin-small-bottom  uk-width-1-3" alt=""> 
                                                                <p class="uk-text-bold uk-margin-remove">Web Introduciton </p> 
                                                                <p class="uk-text-small uk-margin-remove"> by : Hamse mohamoud </p> 
                                                            </div>                                                             
                                                        </a>                                                         
                                                    </div>                                                     
                                                    <div> 
                                                        <a href="course-view.html" class="uk-link-reset"> 
                                                            <div class="uk-padding-small uk-card-default uk-position-relative"> 
                                                                <progress id="js-progressbar" class="uk-progress  uk-margin-small-bottom" value="30" max="100" style=" height: 7px;"></progress>                                                                 
                                                                <img src="{{asset('themes/courseplus')}}/assets/images/courses/course-10.jpg" alt=""> 
                                                                <div class="uk-position-absolute uk-position-medium uk-position-bottom-left uk-text-white"> 
                                                                    <p class="uk-text-bold uk-margin-remove">CSS3 Introduciton </p> 
                                                                    <p class="uk-text-small uk-margin-remove"> by : Hamse mohamoud </p> 
                                                                </div>                                                                 
                                                            </div>                                                             
                                                        </a>                                                         
                                                    </div>                                                     
                                                    <div> 
                                                        <a href="course-view.html" class="uk-link-reset"> 
                                                            <div class="uk-padding-small uk-card-default uk-position-relative"> 
                                                                <progress id="js-progressbar" class="uk-progress  uk-margin-small-bottom" value="70" max="100" style="height: 7px;"></progress>                                                                 
                                                                <img src="{{asset('themes/courseplus')}}/assets/images/courses/course-7.png" alt=""> 
                                                                <div class="uk-position-absolute uk-position-medium uk-position-bottom-left uk-text-white"> 
                                                                    <p class="uk-text-bold uk-margin-remove">Bootstrap Introduciton </p> 
                                                                    <p class="uk-text-small uk-margin-remove"> by : Hamse mohamoud </p> 
                                                                </div>                                                                 
                                                            </div>                                                             
                                                        </a>                                                         
                                                    </div>                                                     
                                                    <div> 
                                                        <a href="course-view.html" class="uk-link-reset"> 
                                                            <div class="uk-padding-small uk-card-default"> 
                                                                <progress id="js-progressbar" class="uk-progress progress-green uk-margin-small-bottom" value="100" max="100" style="height: 7px;"></progress>                                                                 
                                                                <img src="{{asset('themes/courseplus')}}/assets/images/courses/course-8.jpg" alt=""> 
                                                                <div class=""> 
                                                                    <p class="uk-text-bold uk-margin-small-top uk-margin-remove-bottom">Python Introduciton </p> 
                                                                    <p class="uk-text-small uk-margin-remove"> by : Hamse mohamoud </p> 
                                                                </div>                                                                 
                                                            </div>                                                             
                                                        </a>                                                         
                                                    </div>                                                     
                                                    <div> 
                                                        <a href="course-view.html" class="uk-link-reset"> 
                                                            <div class="uk-padding-small uk-card-default"> 
                                                                <progress id="js-progressbar" class="uk-progress  uk-margin-small-bottom" value="80" max="100" style="height: 7px;"></progress>                                                                 
                                                                <img src="{{asset('themes/courseplus')}}/assets/images/courses/course-9.jpg" alt=""> 
                                                                <div class=""> 
                                                                    <p class="uk-text-bold uk-margin-small-top uk-margin-remove-bottom"> JavaScript Introduciton </p> 
                                                                    <p class="uk-text-small uk-margin-remove"> by : Hamse mohamoud </p> 
                                                                </div>                                                                 
                                                            </div>                                                             
                                                        </a>                                                         
                                                    </div>                                                     
                                                </div>                                                 
                                            </div>                                             
                                        </div>                                         
                                        <hr class=" uk-margin-remove"> 
                                        <h5 class="uk-padding-small uk-margin-remove uk-text-bold uk-text-center"><a class="uk-link-heading" href="#"> See all </a> </h5> 
                                    </div>                                     
                                </li>                                 
                                <li> 
                                    <!-- messages -->                                     
                                    <a href="#"><i class="fas fa-envelope icon-medium"></i></a> 
                                    <div uk-dropdown="pos: top-right ;mode : click; animation: uk-animation-slide-bottom-small" class="uk-dropdown uk-dropdown-top-right  tm-dropdown-medium border-radius-6 uk-padding-remove uk-box-shadow-large angle-top-right"> 
                                        <h5 class="uk-padding-small uk-margin-remove uk-text-bold  uk-text-left"> Messages </h5> 
                                        <a href="#" class="uk-position-top-right uk-link-reset"> <i class="fas fa-trash uk-align-right uk-text-small uk-padding-small"> Clear all</i> </a> 
                                        <hr class=" uk-margin-remove"> 
                                        <div class="uk-text-left uk-height-medium"> 
                                            <div uk-scrollspy="target: > div; cls:uk-animation-slide-bottom-small; delay: 100" data-simplebar> 
                                                <hr class="uk-margin-remove uk-animation-slide-top-small"> 
                                                <div class=" uk-padding-small  uk-background-light uk-inline-clip uk-transition-toggle" tabindex="0"> 
                                                    <div class="uk-transition-slide-right-small uk-position-top-right uk-position-z-index"> 
                                                        <a class="uk-button uk-padding-small-right uk-padding-remove-left" href="#">    Delete </a> 
                                                    </div>                                                     
                                                    <div class="uk-transition-slide-right-medium uk-position-top-right uk-margin-medium-right"> 
                                                        <a class="uk-button uk-margin-small-right" href="#">    Replay </a> 
                                                    </div>                                                     
                                                    <div class="uk-flex-middle uk-grid-small uk-grid" uk-grid=""> 
                                                        <div class="uk-width-3-4"> 
                                                            <p class="uk-margin-remove-bottom uk-text-bold">John keni  </p> 
                                                            <p class="uk-margin-remove">Lorem ipsum dolor sit ame ..</p> 
                                                            <p class="uk-margin-remove-top uk-text-small uk-text-muted">25 min</p> 
                                                        </div>                                                         
                                                        <div class="uk-width-1-4 uk-flex-first uk-first-column"> 
                                                            <img src="{{asset('themes/courseplus')}}/assets/images/avatures/avature-3.png" alt="Image" class="uk-border-circle uk-animation-slide-left-small"> 
                                                        </div>                                                         
                                                    </div>                                                     
                                                </div>                                                 
                                                <hr class=" uk-margin-remove"> 
                                                <div class=" uk-padding-small  uk-background-light uk-inline-clip uk-transition-toggle" tabindex="0"> 
                                                    <div class="uk-transition-slide-right-small uk-position-top-right uk-position-z-index"> 
                                                        <a class="uk-button uk-padding-small-right uk-padding-remove-left" href="#">    Delete </a> 
                                                    </div>                                                     
                                                    <div class="uk-transition-slide-right-medium uk-position-top-right uk-margin-medium-right"> 
                                                        <a class="uk-button uk-margin-small-right" href="#">    Replay </a> 
                                                    </div>                                                     
                                                    <div class="uk-flex-middle uk-grid-small uk-grid" uk-grid=""> 
                                                        <div class="uk-width-3-4"> 
                                                            <p class="uk-margin-remove-bottom uk-text-bold">John keni  </p> 
                                                            <p class="uk-margin-remove">Lorem ipsum dolor sit ame ..</p> 
                                                            <p class="uk-margin-remove-top uk-text-small uk-text-muted">25 min</p> 
                                                        </div>                                                         
                                                        <div class="uk-width-1-4 uk-flex-first uk-first-column"> 
                                                            <img src="{{asset('themes/courseplus')}}/assets/images/avatures/avature.jpg" alt="Image" class="uk-border-circle uk-animation-slide-left-small"> 
                                                        </div>                                                         
                                                    </div>                                                     
                                                </div>                                                 
                                                <hr class=" uk-margin-remove"> 
                                                <div class=" uk-padding-small  uk-background-light uk-inline-clip uk-transition-toggle" tabindex="0"> 
                                                    <div class="uk-transition-slide-right-small uk-position-top-right uk-position-z-index"> 
                                                        <a class="uk-button uk-padding-small-right uk-padding-remove-left" href="#">    Delete </a> 
                                                    </div>                                                     
                                                    <div class="uk-transition-slide-right-medium uk-position-top-right uk-margin-medium-right"> 
                                                        <a class="uk-button uk-margin-small-right" href="#">    Replay </a> 
                                                    </div>                                                     
                                                    <div class="uk-flex-middle uk-grid-small uk-grid" uk-grid=""> 
                                                        <div class="uk-width-3-4"> 
                                                            <p class="uk-margin-remove-bottom uk-text-bold">John keni  </p> 
                                                            <p class="uk-margin-remove">Lorem ipsum dolor sit ame ..</p> 
                                                            <p class="uk-margin-remove-top uk-text-small uk-text-muted">25 min</p> 
                                                        </div>                                                         
                                                        <div class="uk-width-1-4 uk-flex-first uk-first-column"> 
                                                            <img src="{{asset('themes/courseplus')}}/assets/images/avatures/avature-5.png" alt="Image" class="uk-border-circle uk-animation-slide-left-small"> 
                                                        </div>                                                         
                                                    </div>                                                     
                                                </div>                                                 
                                                <hr class=" uk-margin-remove"> 
                                                <div class=" uk-padding-small  uk-background-light uk-inline-clip uk-transition-toggle" tabindex="0"> 
                                                    <div class="uk-transition-slide-right-small uk-position-top-right uk-position-z-index"> 
                                                        <a class="uk-button uk-padding-small-right uk-padding-remove-left" href="#">    Delete </a> 
                                                    </div>                                                     
                                                    <div class="uk-transition-slide-right-medium uk-position-top-right uk-margin-medium-right"> 
                                                        <a class="uk-button uk-margin-small-right" href="#">    Replay </a> 
                                                    </div>                                                     
                                                    <div class="uk-flex-middle uk-grid-small uk-grid" uk-grid=""> 
                                                        <div class="uk-width-3-4"> 
                                                            <p class="uk-margin-remove-bottom uk-text-bold">John keni  </p> 
                                                            <p class="uk-margin-remove">Lorem ipsum dolor sit ame ..</p> 
                                                            <p class="uk-margin-remove-top uk-text-small uk-text-muted">25 min</p> 
                                                        </div>                                                         
                                                        <div class="uk-width-1-4 uk-flex-first uk-first-column"> 
                                                            <img src="{{asset('themes/courseplus')}}/assets/images/avatures/avature-2.png" alt="Image" class="uk-border-circle uk-animation-slide-left-small"> 
                                                        </div>                                                         
                                                    </div>                                                     
                                                </div>                                                 
                                                <hr class=" uk-margin-remove"> 
                                                <div class=" uk-padding-small  uk-background-light uk-inline-clip uk-transition-toggle" tabindex="0"> 
                                                    <div class="uk-transition-slide-right-small uk-position-top-right uk-position-z-index"> 
                                                        <a class="uk-button uk-padding-small-right uk-padding-remove-left" href="#">    Delete </a> 
                                                    </div>                                                     
                                                    <div class="uk-transition-slide-right-medium uk-position-top-right uk-margin-medium-right"> 
                                                        <a class="uk-button uk-margin-small-right" href="#">    Replay </a> 
                                                    </div>                                                     
                                                    <div class="uk-flex-middle uk-grid-small uk-grid" uk-grid=""> 
                                                        <div class="uk-width-3-4"> 
                                                            <p class="uk-margin-remove-bottom uk-text-bold">John keni  </p> 
                                                            <p class="uk-margin-remove">Lorem ipsum dolor sit ame ..</p> 
                                                            <p class="uk-margin-remove-top uk-text-small uk-text-muted">25 min</p> 
                                                        </div>                                                         
                                                        <div class="uk-width-1-4 uk-flex-first uk-first-column"> 
                                                            <img src="{{asset('themes/courseplus')}}/assets/images/avatures/avature-1.png" alt="Image" class="uk-border-circle"> 
                                                        </div>                                                         
                                                    </div>                                                     
                                                </div>                                                 
                                                <hr class=" uk-margin-remove"> 
                                                <div class=" uk-padding-small  uk-background-light uk-inline-clip uk-transition-toggle" tabindex="0"> 
                                                    <div class="uk-transition-slide-right-small uk-position-top-right uk-position-z-index"> 
                                                        <a class="uk-button uk-padding-small-right uk-padding-remove-left" href="#">    Delete </a> 
                                                    </div>                                                     
                                                    <div class="uk-transition-slide-right-medium uk-position-top-right uk-margin-medium-right"> 
                                                        <a class="uk-button uk-margin-small-right" href="#">    Replay </a> 
                                                    </div>                                                     
                                                    <div class="uk-flex-middle uk-grid-small uk-grid" uk-grid=""> 
                                                        <div class="uk-width-3-4"> 
                                                            <p class="uk-margin-remove-bottom uk-text-bold">John keni  </p> 
                                                            <p class="uk-margin-remove">Lorem ipsum dolor sit ame ..</p> 
                                                            <p class="uk-margin-remove-top uk-text-small uk-text-muted">25 min</p> 
                                                        </div>                                                         
                                                        <div class="uk-width-1-4 uk-flex-first uk-first-column"> 
                                                            <img src="{{asset('themes/courseplus')}}/assets/images/avatures/avature.jpg" alt="Image" class="uk-border-circle"> 
                                                        </div>                                                         
                                                    </div>                                                     
                                                </div>                                                 
                                            </div>                                             
                                        </div>                                         
                                        <hr class=" uk-margin-remove"> 
                                        <h5 class="uk-padding-small uk-margin-remove uk-text-bold uk-text-center"><a class="uk-link-heading" href=""> See all </a> </h5> 
                                    </div>                                     
                                </li>                                 
                                <li> 
                                    <!-- Notivications -->                                     
                                    <a href="#"><i class="fas fa-bell icon-medium"></i></a> 
                                    <div uk-dropdown="pos: top-right ;mode : hover; animation: uk-animation-slide-bottom-small" class="uk-dropdown uk-dropdown-top-right  tm-dropdown-small border-radius-6 uk-padding-remove uk-box-shadow-large angle-top-right"> 
                                        <h5 class="uk-padding-small uk-margin-remove uk-text-bold  uk-text-left"> Notivications </h5> 
                                        <a href="#" class="uk-position-top-right uk-link-reset"> <i class="fas fa-trash uk-align-right uk-text-small uk-padding-small"> Clear all</i></a> 
                                        <hr class=" uk-margin-remove"> 
                                        <div class="uk-padding-smaluk-text-left uk-height-medium"> 
                                            <div data-simplebar> 
                                                <div class="uk-padding-small" uk-scrollspy="target: > div; cls:uk-animation-slide-bottom-small; delay: 100 ; repeat: true"> 
                                                    <div class="uk-flex-middle uk-grid-small" uk-grid> 
                                                        <div class="uk-width-3-4"> 
                                                            <p class="uk-margin-remove">Lorem ipsum dolor   ame ..</p> 
                                                            <p class="uk-margin-remove-top uk-text-small uk-text-muted">25 min</p> 
                                                        </div>                                                         
                                                        <div class="uk-width-1-5 uk-flex-first"> 
                                                            <img src="{{asset('themes/courseplus')}}/assets/images/avatures/avature-4.png" alt="Image" class="uk-border-circle"> 
                                                        </div>                                                         
                                                    </div>                                                     
                                                    <div class="uk-flex-middle uk-grid-small" uk-grid> 
                                                        <div class="uk-width-3-4"> 
                                                            <p class="uk-margin-remove">Lorem ipsum dolor   ame ..</p> 
                                                            <p class="uk-margin-remove-top uk-text-small uk-text-muted">25 min</p> 
                                                        </div>                                                         
                                                        <div class="uk-width-1-5 uk-flex-first"> 
                                                            <img src="{{asset('themes/courseplus')}}/assets/images/avatures/avature-1.png" alt="Image" class="uk-border-circle"> 
                                                        </div>                                                         
                                                    </div>                                                     
                                                    <div class="uk-flex-middle uk-grid-small" uk-grid> 
                                                        <div class="uk-width-3-4"> 
                                                            <p class="uk-margin-remove">Lorem ipsum dolor   ame ..</p> 
                                                            <p class="uk-margin-remove-top uk-text-small uk-text-muted">25 min</p> 
                                                        </div>                                                         
                                                        <div class="uk-width-1-5 uk-flex-first"> 
                                                            <img src="{{asset('themes/courseplus')}}/assets/images/avatures/avature.jpg" alt="Image" class="uk-border-circle"> 
                                                        </div>                                                         
                                                    </div>                                                     
                                                    <div class="uk-flex-middle uk-grid-small" uk-grid> 
                                                        <div class="uk-width-3-4"> 
                                                            <p class="uk-margin-remove">Lorem ipsum dolor   ame ..</p> 
                                                            <p class="uk-margin-remove-top uk-text-small uk-text-muted">25 min</p> 
                                                        </div>                                                         
                                                        <div class="uk-width-1-5 uk-flex-first"> 
                                                            <img src="{{asset('themes/courseplus')}}/assets/images/avatures/avature-2.png" alt="Image" class="uk-border-circle"> 
                                                        </div>                                                         
                                                    </div>                                                     
                                                    <div class="uk-flex-middle uk-grid-small" uk-grid> 
                                                        <div class="uk-width-3-4"> 
                                                            <p class="uk-margin-remove">Lorem ipsum dolor   ame ..</p> 
                                                            <p class="uk-margin-remove-top uk-text-small uk-text-muted">25 min</p> 
                                                        </div>                                                         
                                                        <div class="uk-width-1-5 uk-flex-first"> 
                                                            <img src="{{asset('themes/courseplus')}}/assets/images/avatures/avature-3.png" alt="Image" class="uk-border-circle"> 
                                                        </div>                                                         
                                                    </div>                                                     
                                                    <div class="uk-flex-middle uk-grid-small" uk-grid> 
                                                        <div class="uk-width-3-4"> 
                                                            <p class="uk-margin-remove">Lorem ipsum dolor   ame ..</p> 
                                                            <p class="uk-margin-remove-top uk-text-small uk-text-muted">25 min</p> 
                                                        </div>                                                         
                                                        <div class="uk-width-1-5 uk-flex-first"> 
                                                            <img src="{{asset('themes/courseplus')}}/assets/images/avatures/avature-4.png" alt="Image" class="uk-border-circle"> 
                                                        </div>                                                         
                                                    </div>                                                     
                                                    <div class="uk-flex-middle uk-grid-small" uk-grid> 
                                                        <div class="uk-width-3-4"> 
                                                            <p class="uk-margin-remove">Lorem ipsum dolor   ame ..</p> 
                                                            <p class="uk-margin-remove-top uk-text-small uk-text-muted">25 min</p> 
                                                        </div>                                                         
                                                        <div class="uk-width-1-5 uk-flex-first"> 
                                                            <img src="{{asset('themes/courseplus')}}/assets/images/avatures/avature-1.png" alt="Image" class="uk-border-circle"> 
                                                        </div>                                                         
                                                    </div>                                                     
                                                </div>                                                 
                                            </div>                                             
                                        </div>                                         
                                    </div>                                     
                                </li>
                                <li> 
                                    <!--  night mode  -->                                     
                                    <a href="#"><i class="fas fa-moon icon-medium"></i></a>
                                    <div uk-drop="pos: top-right ;mode:click ; offset: 20;animation: uk-animation-scale-up" class="uk-drop"> 
                                        <div class="uk-card-small uk-box-shadow-xlarge uk-card-default uk-maring-small-left  border-radius-6"> 
                                            <div class="uk-card uk-card-default border-radius-6"> 
                                                <div class="uk-card-header"> 
                                                    <h5 class="uk-card-title uk-margin-remove-bottom">Swich to night mode</h5> 
                                                </div>                                                 
                                                <div class="uk-card-body"> 
                                                    <p>Turns the light surfaces of the page dark, creating an experience ideal for night. Try it!</p> 
                                                    <p class="uk-text-small uk-align-left uk-margin-remove  uk-text-muted">DARK THEME </p> 
                                                    <!-- night mode button -->                                                     
                                                    <div class="btn-night uk-align-right" id="night-mode"> 
                                                        <label class="tm-switch"> 
                                                            <div class="uk-switch-button"></div>                                                             
                                                        </label>                                                         
                                                    </div>                                                     
                                                    <!-- end  night mode button -->                                                     
                                                </div>                                                 
                                            </div>                                             
                                        </div>                                         
                                    </div>                                     
                                </li>                                 
                                <li> 
                                    <!-- User profile -->                                     
                                    <a href="#"> 
                                        <img src="{{asset('themes/courseplus')}}/assets/images/avatures/avature-2.png" alt="" class="uk-border-circle user-profile-tiny"> 
                                    </a>                                     
                                    <div uk-dropdown="pos: top-right ;mode : click ;animation: uk-animation-slide-right" class="uk-dropdown uk-padding-small uk-dropdown-top-right  angle-top-right"> 
                                        <p class="uk-margin-remove-bottom uk-margin-small-top uk-text-bold"> Hamse Mohamoud  </p> 
                                        <p class="uk-margin-remove-top uk-text-small uk-margin-small-bottom"> Bankook China</p> 
                                        <ul class="uk-nav uk-dropdown-nav"> 
                                            <li> 
                                                <a href="Profile.html"> <i class="fas fa-user uk-margin-small-right"></i> Profile</a> 
                                            </li>                                             
                                            <li> 
                                                <a href="#"> <i class="fas fa-envelope uk-margin-small-right"></i> Messages </a> 
                                            </li>                                             
                                            <li> 
                                                <a href="#"> <i class="fas fa-share uk-margin-small-right"></i> Invite freind</a> 
                                            </li>                                             
                                            <li> 
                                                <a href="#"> <i class="fas fa-cog uk-margin-small-right"></i> Setting</a> 
                                            </li>                                             
                                            <li class="uk-nav-divider"></li>                                             
                                            <li> 
                                                <a href="#"> <i class="fas fa-sign-out-alt uk-margin-small-right"></i> Log out</a> 
                                            </li>                                             
                                        </ul>                                         
                                    </div>                                     
                                </li>                                 
                            </ul>                             
                        </div>
                        <!-- Navigation for mobile -->
                        <div id="mobile-sidebar" class="mobile-sidebar" uk-offcanvas="overlay:true">
                            <div class="uk-offcanvas-bar uk-preserve-color uk-padding-remove"> 
                                <ul uk-accordion> 
                                    <li class="uk-open"> 
                                        <a href="#" class="uk-accordion-title uk-text-black uk-padding-small"> <i class="fas fa-play-circle uk-margin-small-right"></i> Courses </a> 
                                        <div class="uk-accordion-content uk-margin-remove-top"> 
                                            <ul class="uk-list tm-drop-topic-list">
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
                                                    <a href="course-grid.html">  Software   </a>
                                                </li>                                                 
                                                <li>
                                                    <a href="course-grid.html">  Ecommerce  </a>
                                                </li>
                                                <li>
                                                    <a href="course-grid.html"> Training</a>
                                                </li>                                                 
                                            </ul>
                                        </div>                                         
                                    </li>
                                    <li class="uk-margin-remove-top"> 
                                        <a href="#" class="uk-accordion-title uk-text-black uk-padding-small"> <i class="fas fa-code uk-margin-small-right"></i> Scripts  </a> 
                                        <div class="uk-accordion-content uk-margin-remove-top"> 
                                            <ul class="uk-list tm-drop-topic-list">
                                                <li>
                                                    <a href="scripts.html"> Php scrips </a>
                                                </li>                                                 
                                                <li>
                                                    <a href="scripts.html"> HTML templates </a>
                                                </li>                                                 
                                                <li>
                                                    <a href="scripts.html">  Wordpress plugins  </a>
                                                </li>                                                 
                                                <li>
                                                    <a href="scripts.html">  Wordpress themes  </a>
                                                </li>                                                 
                                                <li>
                                                    <a href="scripts.html">  App source codes  </a>
                                                </li>                                                 
                                            </ul>
                                        </div>                                         
                                    </li>
                                    <li class="uk-margin-remove-top"> 
                                        <a href="#" class="uk-accordion-title uk-text-black uk-padding-small"> <i class="fas fa-clone uk-margin-small-right"></i> Pages </a> 
                                        <div class="uk-accordion-content uk-margin-remove-top"> 
                                            <ul class="uk-list tm-drop-topic-list"> 
                                                <li>
                                                    <a href="help.html"> Help </a>
                                                </li>
                                                <li>
                                                    <a href="pages-term.html"> Term </a>
                                                </li>                                                 
                                                <li>
                                                    <a href="pages-faq.html"> Faq </a>
                                                </li>                                                 
                                                <li>
                                                    <a href="ui-compuntes.html"> Ui Compuntes </a>
                                                </li>                                                 
                                                <li>
                                                    <a href="ui-elements.html"> Ui Elements </a>
                                                </li>
                                                <li>
                                                    <a href="ui-helpers.html"> Ui Helpers </a>
                                                </li>                                                 
                                            </ul>
                                        </div>                                         
                                    </li>                                     
                                    <li class="uk-margin-remove-top uk-padding-small"> 
                                        <a href="books.html" class="uk-text-black"> <i class="fas fa-book-open uk-margin-small-right"></i> Books </a> 
                                    </li>                                     
                                    <li class="uk-margin-remove-top uk-padding-small"> 
                                        <a href="blog.html" class="uk-text-black"> <i class="fas fa-file-alt uk-margin-small-right"></i> Blog </a> 
                                    </li>                                     
                                    <li class="uk-margin-remove-top uk-padding-small"> 
                                        <a href="#" class="uk-text-black"> <i class="fas fa-comment-alt uk-margin-small-right"></i> Discussion </a> 
                                    </li>
                                </ul>                                 
                            </div>
                        </div>                         
                        <!-- search box -->                         
                        <div id="modal-full" class="uk-modal-full uk-modal uk-animation-scale-down" uk-modal> 
                            <div class="uk-modal-dialog uk-flex uk-flex-center" uk-height-viewport> 
                                <button class="uk-modal-close-full" type="button" uk-close></button>                                 
                                <form class="uk-search uk-margin-xlarge-top uk-search-large uk-animation-slide-bottom-medium"> 
                                    <i class="fas fa-search uk-position-absolute uk-margin-top icon-xxlarge"></i> 
                                    <input class="uk-search-input uk-margin-large-left" type="search" placeholder="Search..." autofocus> 
                                </form>                                 
                            </div>                             
                        </div>                         
                    </nav>
                </div>
            </div>
        </header>
        <!-- Navigation  -->
        <div class="uk-navbar-sticky uk-background-grey " uk-sticky="show-on-up: true; animation: uk-animation-slide-top;offset: 85">
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
        </div>
        <main id="app">
            @yield('content')          
        </main>         
        <!-- footer -->         
        <div class="uk-section-small uk-margin-medium-top"> 
            <hr class="uk-margin-remove"> 
            <div class="uk-container uk-align-center uk-margin-remove-bottom uk-position-relative"> 
                <div uk-grid> 
                    <div class="uk-width-1-3@m uk-width-1-2@s uk-first-column"> 
                        <a href="pages-about.html" class="uk-link-heading uk-text-lead uk-text-bold"> <i class="fas fa-graduation-cap"></i>  CoursePlus</a> 
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
                <p class="uk-postion-absoult uk-margin-remove uk-position-bottom-right" style="bottom: 8px;right: 60px;" uk-tooltip="title: Visit Our Site; pos: top-center"> Powered By <a href="#" target="_blank" class="uk-text-bold uk-link-reset"> CoursePlus</a></p> 
                <div class="uk-margin-small" uk-grid> 
                    <div class="uk-width-1-2@m uk-width-1-2@s uk-first-column"> 
                        <p class="uk-text-small"><i class="fas fa-copyright"></i> 2019 <span class="uk-text-bold">CoursePlus</span> . All rights reserved.</p> 
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