<template>
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
</template>
