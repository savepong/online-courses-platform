<template>
    <div class="uk-navbar-right tm-show-on-mobile uk-flex-right" id="tm-show-on-mobile"> 
        <!-- this will clouse after display user icon -->                             
        <span class="uk-hidden@m tm-mobile-user-close-icon uk-align-right" uk-toggle="target: #tm-show-on-mobile; cls: tm-show-on-mobile-active"><i class="fas fa-times icon-large"></i></span> 
        <ul class="uk-navbar-nav uk-flex-middle"> 
            <li> 
                <a href="#modal-full" uk-toggle=""><i class="fas fa-search icon-medium"></i></a> 
            </li>                                 
            <li> 
                <!-- your courses -->                                     
                <a href="#"> <i class="fas fa-play uk-hidden@m"></i> <span class="uk-visible@m"> Your Courses</span> </a> 
                <div uk-dropdown="pos: top-right ;mode : click; animation: uk-animation-slide-bottom-medium" class="uk-dropdown border-radius-6 uk-dropdown-top-right tm-dropdown-large uk-padding-remove"> 
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
                        <div class="demo1" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content" style="padding: 0px; height: auto; overflow: hidden;"> 
                            <div class="uk-child-width-1-2@s uk-grid-small uk-padding-small uk-grid uk-grid-stack" uk-scrollspy="target: > div; cls:uk-animation-slide-bottom-small; delay: 100 ;repeat: true" uk-grid=""> 
                                <div style="visibility: hidden;"> 
                                    <a href="course-view.html" class="uk-link-reset"> 
                                        </a><div class="uk-padding-small uk-card-default"><a href="course-view.html" class="uk-link-reset"> 
                                            <progress id="js-progressbar" class="uk-progress progress-green uk-margin-small-bottom" value="100" max="100" style="height: 7px;"></progress>                                                                 
                                            <img src="{{asset('themes/courseplus')}}/assets/images/courses/tags/css3.JPG" class="uk-align-left  uk-margin-small-right uk-margin-small-bottom  uk-width-1-3  uk-visible@s" alt=""> 
                                            <p class="uk-text-bold uk-margin-remove">CSS3 Introduciton </p> 
                                            <p class="uk-text-small uk-margin-remove"> by : Hamse mohamoud </p> 
                                            </a><div class="uk-margin-small"><a href="course-view.html" class="uk-link-reset"> 
                                                </a><a class="Course-tags uk-margin-small-right   border-radius-6" href="#"> <i class="far fa-play"></i> Course resume</a> 
                                            </div>                                                                 
                                        </div>                                                             
                                                                                                
                                </div>                                                     
                                <div style="visibility: hidden;"> 
                                    <a href="course-view.html" class="uk-link-reset"> 
                                        </a><div class="uk-padding-small uk-card-default"><a href="course-view.html" class="uk-link-reset"> 
                                            <progress id="js-progressbar" class="uk-progress progress-coral  uk-margin-small-bottom" value="15" max="100" style="height: 7px !important;"></progress>                                                                 
                                            <img src="{{asset('themes/courseplus')}}/assets/images/courses/tags/html5.jpg" class="uk-align-left  uk-margin-small-right uk-margin-small-bottom  uk-width-1-3  uk-visible@s" alt=""> 
                                            <p class="uk-text-bold uk-margin-remove">HTML5 Introduciton </p> 
                                            <p class="uk-text-small uk-margin-remove"> by : Hamse mohamoud </p> 
                                            </a><div class="uk-margin-small"><a href="course-view.html" class="uk-link-reset"> 
                                                </a><a class="Course-tags uk-margin-small-right   border-radius-6" href="#"> <i class="far fa-play"></i> Course resume</a> 
                                            </div>                                                                 
                                        </div>                                                             
                                                                                                
                                </div>                                                     
                                                                                    
                            </div>                                                 
                        </div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div></div>                                             
                    </div>                                         
                    <hr class=" uk-margin-remove"> 
                    <h5 class="uk-padding-small uk-margin-remove uk-text-bold uk-text-center"><a class="uk-link-heading" href="#"> See all </a> </h5> 
                </div>                                     
            </li>                                 
            <li> 
                <!-- messages -->                                     
                <a href="#"><i class="fas fa-envelope icon-medium"></i></a> 
                <div uk-dropdown="pos: top-right ;mode : click; animation: uk-animation-slide-bottom-small" class="uk-dropdown uk-dropdown-top-right tm-dropdown-medium border-radius-6 uk-padding-remove uk-box-shadow-large angle-top-right"> 
                    <h5 class="uk-padding-small uk-margin-remove uk-text-bold  uk-text-left"> Messages </h5> 
                    <a href="#" class="uk-position-top-right uk-link-reset"> <i class="fas fa-trash uk-align-right uk-text-small uk-padding-small"> Clear all</i> </a> 
                    <hr class=" uk-margin-remove"> 
                    <div class="uk-text-left uk-height-medium"> 
                        <div uk-scrollspy="target: > div; cls:uk-animation-slide-bottom-small; delay: 100" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px; visibility: hidden;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content" style="padding: 0px; height: auto; overflow: hidden;"> 
                            <hr class="uk-margin-remove uk-animation-slide-top-small"> 
                            <div class=" uk-padding-small  uk-background-light uk-inline-clip uk-transition-toggle" tabindex="0"> 
                                <div class="uk-transition-slide-right-small uk-position-top-right uk-position-z-index"> 
                                    <a class="uk-button uk-padding-small-right uk-padding-remove-left" href="#">    Delete </a> 
                                </div>                                                     
                                <div class="uk-transition-slide-right-medium uk-position-top-right uk-margin-medium-right"> 
                                    <a class="uk-button uk-margin-small-right" href="#">    Replay </a> 
                                </div>                                                     
                                <div class="uk-flex-middle uk-grid-small uk-grid uk-grid-stack" uk-grid=""> 
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
                                <div class="uk-flex-middle uk-grid-small uk-grid uk-grid-stack" uk-grid=""> 
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
                                <div class="uk-flex-middle uk-grid-small uk-grid uk-grid-stack" uk-grid=""> 
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
                                <div class="uk-flex-middle uk-grid-small uk-grid uk-grid-stack" uk-grid=""> 
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
                                <div class="uk-flex-middle uk-grid-small uk-grid uk-grid-stack" uk-grid=""> 
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
                                <div class="uk-flex-middle uk-grid-small uk-grid uk-grid-stack" uk-grid=""> 
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
                        </div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div></div>                                             
                    </div>                                         
                    <hr class=" uk-margin-remove"> 
                    <h5 class="uk-padding-small uk-margin-remove uk-text-bold uk-text-center"><a class="uk-link-heading" href=""> See all </a> </h5> 
                </div>                                     
            </li>                                 
            <li> 
                <!-- Notivications -->                                     
                <a href="#"><i class="fas fa-bell icon-medium"></i></a> 
                <div uk-dropdown="pos: top-right ;mode : hover; animation: uk-animation-slide-bottom-small" class="uk-dropdown uk-dropdown-top-right tm-dropdown-small border-radius-6 uk-padding-remove uk-box-shadow-large angle-top-right"> 
                    <h5 class="uk-padding-small uk-margin-remove uk-text-bold  uk-text-left"> Notivications </h5> 
                    <a href="#" class="uk-position-top-right uk-link-reset"> <i class="fas fa-trash uk-align-right uk-text-small uk-padding-small"> Clear all</i></a> 
                    <hr class=" uk-margin-remove"> 
                    <div class="uk-padding-smaluk-text-left uk-height-medium"> 
                        <div data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content" style="padding: 0px; height: auto; overflow: hidden;"> 
                            <div class="uk-padding-small" uk-scrollspy="target: > div; cls:uk-animation-slide-bottom-small; delay: 100 ; repeat: true"> 
                                <div class="uk-flex-middle uk-grid-small uk-grid uk-grid-stack" uk-grid="" style="visibility: hidden;"> 
                                    <div class="uk-width-3-4"> 
                                        <p class="uk-margin-remove">Lorem ipsum dolor   ame ..</p> 
                                        <p class="uk-margin-remove-top uk-text-small uk-text-muted">25 min</p> 
                                    </div>                                                         
                                    <div class="uk-width-1-5 uk-flex-first"> 
                                        <img src="{{asset('themes/courseplus')}}/assets/images/avatures/avature-4.png" alt="Image" class="uk-border-circle"> 
                                    </div>                                                         
                                </div>                                                     
                                <div class="uk-flex-middle uk-grid-small uk-grid uk-grid-stack" uk-grid="" style="visibility: hidden;"> 
                                    <div class="uk-width-3-4"> 
                                        <p class="uk-margin-remove">Lorem ipsum dolor   ame ..</p> 
                                        <p class="uk-margin-remove-top uk-text-small uk-text-muted">25 min</p> 
                                    </div>                                                         
                                    <div class="uk-width-1-5 uk-flex-first"> 
                                        <img src="{{asset('themes/courseplus')}}/assets/images/avatures/avature-1.png" alt="Image" class="uk-border-circle"> 
                                    </div>                                                         
                                </div>                                                     
                                <div class="uk-flex-middle uk-grid-small uk-grid uk-grid-stack" uk-grid="" style="visibility: hidden;"> 
                                    <div class="uk-width-3-4"> 
                                        <p class="uk-margin-remove">Lorem ipsum dolor   ame ..</p> 
                                        <p class="uk-margin-remove-top uk-text-small uk-text-muted">25 min</p> 
                                    </div>                                                         
                                    <div class="uk-width-1-5 uk-flex-first"> 
                                        <img src="{{asset('themes/courseplus')}}/assets/images/avatures/avature.jpg" alt="Image" class="uk-border-circle"> 
                                    </div>                                                         
                                </div>                                                     
                                <div class="uk-flex-middle uk-grid-small uk-grid uk-grid-stack" uk-grid="" style="visibility: hidden;"> 
                                    <div class="uk-width-3-4"> 
                                        <p class="uk-margin-remove">Lorem ipsum dolor   ame ..</p> 
                                        <p class="uk-margin-remove-top uk-text-small uk-text-muted">25 min</p> 
                                    </div>                                                         
                                    <div class="uk-width-1-5 uk-flex-first"> 
                                        <img src="{{asset('themes/courseplus')}}/assets/images/avatures/avature-2.png" alt="Image" class="uk-border-circle"> 
                                    </div>                                                         
                                </div>                                                     
                                <div class="uk-flex-middle uk-grid-small uk-grid uk-grid-stack" uk-grid="" style="visibility: hidden;"> 
                                    <div class="uk-width-3-4"> 
                                        <p class="uk-margin-remove">Lorem ipsum dolor   ame ..</p> 
                                        <p class="uk-margin-remove-top uk-text-small uk-text-muted">25 min</p> 
                                    </div>                                                         
                                    <div class="uk-width-1-5 uk-flex-first"> 
                                        <img src="{{asset('themes/courseplus')}}/assets/images/avatures/avature-3.png" alt="Image" class="uk-border-circle"> 
                                    </div>                                                         
                                </div>                                                     
                                <div class="uk-flex-middle uk-grid-small uk-grid uk-grid-stack" uk-grid="" style="visibility: hidden;"> 
                                    <div class="uk-width-3-4"> 
                                        <p class="uk-margin-remove">Lorem ipsum dolor   ame ..</p> 
                                        <p class="uk-margin-remove-top uk-text-small uk-text-muted">25 min</p> 
                                    </div>                                                         
                                    <div class="uk-width-1-5 uk-flex-first"> 
                                        <img src="{{asset('themes/courseplus')}}/assets/images/avatures/avature-4.png" alt="Image" class="uk-border-circle"> 
                                    </div>                                                         
                                </div>                                                     
                                <div class="uk-flex-middle uk-grid-small uk-grid uk-grid-stack" uk-grid="" style="visibility: hidden;"> 
                                    <div class="uk-width-3-4"> 
                                        <p class="uk-margin-remove">Lorem ipsum dolor   ame ..</p> 
                                        <p class="uk-margin-remove-top uk-text-small uk-text-muted">25 min</p> 
                                    </div>                                                         
                                    <div class="uk-width-1-5 uk-flex-first"> 
                                        <img src="{{asset('themes/courseplus')}}/assets/images/avatures/avature-1.png" alt="Image" class="uk-border-circle"> 
                                    </div>                                                         
                                </div>                                                     
                            </div>                                                 
                        </div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div></div>                                             
                    </div>                                         
                </div>                                     
            </li>
            <li> 
                <!--  night mode  -->                                     
                <a href="#"><i class="fas fa-moon icon-medium"></i></a>
                <div uk-drop="pos: top-right ;mode:click ; offset: 40;animation: uk-animation-scale-up" class="uk-drop"> 
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
                <div uk-dropdown="pos: top-right ;mode : click ;animation: uk-animation-slide-right" class="uk-dropdown uk-dropdown-top-right tm-dropdown-small border-radius-6 angle-top-right"> 
                    <div class="uk-grid-small uk-flex-middle uk-margin-small-bottom uk-grid uk-grid-stack" uk-grid=""> 
                        <div class="uk-width-1-4  uk-first-column"> 
                            <img src="{{asset('themes/courseplus')}}/assets/images/avatures/avature-2.png" alt="Image" class="uk-align-center uk-border-circle"> 
                        </div>                                             
                        <div class="uk-width-3-4"> 
                            <p class="uk-margin-remove-bottom uk-margin-small-top uk-text-bold"> Hamse Mohamoud  </p> 
                            <p class="uk-margin-remove-top uk-text-small uk-margin-small-bottom"> Bankook China</p> 
                        </div>                                             
                    </div>                                         
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
</template>
