<template>
    <header class="tm-header uk-sticky uk-sticky-fixed" uk-sticky="" style="position: fixed; top: 0px; width: 1381px;">
        <div class="uk-navbar-container uk-nav-dark  uk-navbar-sticky">
            <div class="uk-position-relative">
                <nav class="uk-navbar-transparent tm-mobile-header uk-animation-slide-top uk-position-z-index uk-navbar" uk-navbar="">
                    <!-- logo -->
                    <!-- mobile icon for side nav on nav-mobile-->                         
                    <span class="uk-hidden@m tm-mobile-menu-icon" uk-toggle="target: #mobile-sidebar"><i class="fas fa-bars icon-large"></i></span> 
                    <!-- mobile icon for user icon on nav-mobile -->                         
                    <span class="uk-hidden@m tm-mobile-user-icon uk-align-right" uk-toggle="target: #tm-show-on-mobile; cls: tm-show-on-mobile-active"><i class="fas fa-user icon-large"></i></span> 
                    <!-- mobile logo -->                         

                    <router-link to="/" class="uk-hidden@m uk-logo">{{appName}}</router-link>

                    <div class="uk-navbar-left uk-visible@m">
                        <router-link to="/" class="uk-logo"><i class="fas fa-graduation-cap"> </i> {{appName}}</router-link>

                        <ul class="uk-navbar-nav uk-margin-small-left">
                            <li >
                                <a href="#">คอร์สเรียน</a>
                                <!-- drop topic list -->
                                <!-- <div uk-drop="pos: top-left ;mode:click ; offset: 40;animation: uk-animation-slide-bottom-small" class="uk-drop angle-top-left"> 
                                    <div class="tm-drop-topic">
                                        <div class="uk-grid-collapse uk-grid-match uk-grid uk-grid-stack" uk-grid=""> 
                                            <div class="uk-width-1-2"> 
                                                <ul uk-tab="connect: #component-tab-left;animation: uk-animation-slide-left-small, uk-animation-slide-right-small" class="tm-drop-topic-list uk-card uk-card-default uk-margin-remove uk-box-shadow-large uk-tab"> 
                                                    <li aria-expanded="true" class="uk-active">
                                                        <a href="#"> <i class="far fa-credit-card  uk-margin-small-right"></i> Web Development <i class="fas fa-chevron-right uk-position-center-right uk-margin-right"></i> </a>
                                                    </li>
                                                    <li aria-expanded="false">
                                                        <a href="#"> <i class="fas fa-briefcase   uk-margin-small-right"></i>   Business  <i class="fas fa-chevron-right uk-position-center-right uk-margin-right"></i> </a> 
                                                    </li>                                                         
                                                    <li aria-expanded="false">
                                                        <a href="#"> <i class="fas fa-pencil-ruler  uk-margin-small-right"></i>   Office Productivity  <i class="fas fa-chevron-right uk-position-center-right uk-margin-right"></i> </a> 
                                                    </li>
                                                    <li aria-expanded="false">
                                                        <a href="#"> <i class="fas fa-brain  uk-margin-small-right"></i>    Personal Development <i class="fas fa-chevron-right uk-position-center-right uk-margin-right"></i> </a> 
                                                    </li>
                                                    <li aria-expanded="false">
                                                        <a href="#"> <i class="fas fa-bullhorn uk-margin-small-right"></i>   Marketing  <i class="fas fa-chevron-right uk-position-center-right uk-margin-right"></i> </a> 
                                                    </li>
                                                    <li aria-expanded="false">
                                                        <a href="#"> <i class="fas fa-life-ring  uk-margin-small-right"></i>   Life Style <i class="fas fa-chevron-right uk-position-center-right uk-margin-right"></i> </a> 
                                                    </li>
                                                    <li aria-expanded="false">
                                                        <a href="#"> <i class="fas fa-box uk-margin-small-right"></i>    IT &amp; Software <i class="fas fa-chevron-right  uk-position-center-right uk-margin-right"></i> </a> 
                                                    </li>
                                                    <li aria-expanded="false">
                                                        <a href="#"> <i class="fas fa-camera uk-margin-small-right"></i>   Photography <i class="fas fa-chevron-right uk-position-center-right uk-margin-right"></i> </a> 
                                                    </li>
                                                    <li aria-expanded="false">
                                                        <a href="#"> <i class="fas fa-briefcase-medical uk-margin-small-right"></i>   Health &amp; Fitness <i class="fas fa-chevron-right uk-position-center-right uk-margin-right"></i> </a> 
                                                    </li>
                                                    <li aria-expanded="false">
                                                        <a href="#"> <i class="fas fa-shopping-bag  uk-margin-small-right"></i>   Ecommerce <i class="fas fa-chevron-right uk-position-center-right uk-margin-right"></i> </a> 
                                                    </li>
                                                    <li aria-expanded="false">
                                                        <a href="#"> <i class="fas fa-utensils  uk-margin-small-right"></i>   Food &amp; cooking <i class="fas fa-chevron-right uk-position-center-right uk-margin-right"></i> </a> 
                                                    </li>
                                                </ul>
                                            </div>                                                 
                                            <div class="uk-width-1-2 uk-width-1-2"> 
                                                <ul id="component-tab-left" class="uk-switcher uk-card uk-card-default uk-box-shadow-large">
                                                    <li class="uk-active">
                                                        <ul class="tm-drop-topic-list uk-padding-remove">
                                                            <li>
                                                                <a href="#"> All Development</a>
                                                            </li>                                                                 
                                                            <li>
                                                                <a href="#"> Web  Development </a>
                                                            </li>                                                                 
                                                            <li>
                                                                <a href="#">  Mobile App  </a>
                                                            </li>                                                                 
                                                            <li>
                                                                <a href="#">  Programming language  </a>
                                                            </li>                                                                 
                                                            <li>
                                                                <a href="#">  Game Development  </a>
                                                            </li>                                                                 
                                                            <li>
                                                                <a href="#">  Software   </a>
                                                            </li>                                                                 
                                                            <li>
                                                                <a href="#">  Development tools  </a>
                                                            </li>                                                                 
                                                            <li>
                                                                <a href="#">  Ecommerce  </a>
                                                            </li>
                                                            <li>
                                                                <a href="#"> Training</a>
                                                            </li>                                                                 
                                                        </ul>                                                             
                                                    </li>
                                                    <li>
                                                        <ul class="tm-drop-topic-list uk-padding-remove">
                                                            <li>
                                                                <a href="#"> All Business </a>
                                                            </li>                                                                 
                                                            <li>
                                                                <a href="#"> Finance </a>
                                                            </li>                                                                 
                                                            <li>
                                                                <a href="#">  Sales  </a>
                                                            </li>                                                                 
                                                            <li>
                                                                <a href="#">  Startegy  </a>
                                                            </li>                                                                 
                                                            <li>
                                                                <a href="#">  Sales  </a>
                                                            </li>                                                                 
                                                            <li>
                                                                <a href="#">  Other  </a>
                                                            </li>                                                                 
                                                        </ul>                                                             
                                                    </li>
                                                    <li>
                                                        <ul class="tm-drop-topic-list uk-padding-remove"> 
                                                            <li>
                                                                <a href="#"> Hadware   </a>
                                                            </li>                                                                 
                                                            <li>
                                                                <a href="#"> Operating system  </a>
                                                            </li>                                                                 
                                                            <li>
                                                                <a href="#"> Network  </a>
                                                            </li>                                                                 
                                                            <li>
                                                                <a href="#"> Other  </a>
                                                            </li>                                                                 
                                                        </ul>                                                             
                                                    </li>
                                                    <li>
                                                        <ul class="tm-drop-topic-list uk-padding-remove"> 
                                                            <li>
                                                                <a href="#"> Leadership   </a>
                                                            </li>                                                                 
                                                            <li>
                                                                <a href="#"> Productivity    </a>
                                                            </li>                                                                 
                                                            <li>
                                                                <a href="#"> Personal Finance  </a>
                                                            </li>                                                                 
                                                            <li>
                                                                <a href="#"> Other  </a>
                                                            </li>                                                                 
                                                        </ul>                                                             
                                                    </li>
                                                    <li>
                                                        <ul class="tm-drop-topic-list uk-padding-remove"> 
                                                            <li>
                                                                <a href="#"> All Marketing   </a>
                                                            </li>                                                                 
                                                            <li>
                                                                <a href="#"> Digital Marketing    </a>
                                                            </li>                                                                 
                                                            <li>
                                                                <a href="#"> Search Engine Optimization  </a>
                                                            </li>                                                                 
                                                            <li>
                                                                <a href="#"> Other  </a>
                                                            </li>                                                                 
                                                        </ul>                                                             
                                                    </li>
                                                    <li>
                                                        <ul class="tm-drop-topic-list uk-padding-remove"> 
                                                            <li>
                                                                <a href="#"> Food   </a>
                                                            </li>                                                                 
                                                            <li>
                                                                <a href="#"> Travel    </a>
                                                            </li>                                                                 
                                                            <li>
                                                                <a href="#"> Gaming   </a>
                                                            </li>                                                                 
                                                            <li>
                                                                <a href="#"> Other  </a>
                                                            </li>                                                                 
                                                        </ul>                                                             
                                                    </li>
                                                </ul>                                                     
                                            </div>                                                 
                                        </div>                                             
                                    </div>                                         
                                </div> -->
                            </li>      
                            <li>
                                <router-link :to="{ name: 'post.index' }">บทความ</router-link>
                            </li>                              
                        </ul>
                    </div>                         
                    <!-- <user-courses-component></user-courses-component> -->
                    
                    <!-- Navigation for mobile -->
                    <!-- <div id="mobile-sidebar" class="mobile-sidebar uk-offcanvas" uk-offcanvas="overlay:true">
                        <div class="uk-offcanvas-bar uk-preserve-color uk-padding-remove"> 
                            <ul uk-accordion="" class="uk-accordion"> 
                                <li class="uk-open"> 
                                    <a href="#" class="uk-accordion-title uk-text-black uk-padding-small"> <i class="fas fa-play-circle uk-margin-small-right"></i> Courses </a> 
                                    <div class="uk-accordion-content uk-margin-remove-top" aria-hidden="false"> 
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
                                    <div class="uk-accordion-content uk-margin-remove-top" hidden="" aria-hidden="true"> 
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
                                    <div class="uk-accordion-content uk-margin-remove-top" hidden="" aria-hidden="true"> 
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
                    </div>                          -->
                    <!-- search box -->                         
                    <div id="modal-full" class="uk-modal-full uk-modal uk-animation-scale-down" uk-modal=""> 
                        <div class="uk-modal-dialog uk-flex uk-flex-center" uk-height-viewport="" style="box-sizing: border-box; min-height: calc(100vh); height: 547px;"> 
                            <button class="uk-modal-close-full uk-close uk-icon" type="button" uk-close=""><svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg"><line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line><line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line></svg></button>                                 
                            <form class="uk-search uk-margin-xlarge-top uk-search-large uk-animation-slide-bottom-medium"> 
                                <i class="fas fa-search uk-position-absolute uk-margin-top icon-xxlarge"></i> 
                                <input class="uk-search-input uk-margin-large-left" type="search" placeholder="Search..." autofocus=""> 
                            </form>                                 
                        </div>                             
                    </div>                         
                </nav>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    // props: ['appName'],

    data () {
        return {
            appName: "OnlineCourses"
        }
    }
}
</script>

<style>
body, a {
    font-family: Prompt !important
}
</style>
