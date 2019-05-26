<template>
    <div>
        <!-- course feature bg -->
        <div class="hero-feature-bg uk-visible@s"> </div>
        <div class="uk-container uk-visible@s">
            <div class="uk-container">
                <div class="uk-position-relative uk-margin-medium-top none-border uk-clearfix"> 
                    <div class="uk-float-left"> 
                        <h1 class="uk-text-white">Latest Courses</h1>
                        <h4 class="uk-text-white uk-margin-remove uk-text-light"> New Courses </h4>
                    </div>                         
                    <div class="uk-float-right"> 
                        <a href="#more" class="uk-button uk-button-default uk-button-white" uk-scroll>See more</a> 
                    </div>                         
                </div>
            </div>
            <div class="uk-position-relative uk-visible-toggle  uk-container uk-padding-medium" uk-slider>
                <ul class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-3@m uk-grid"> 
                    <li v-for="(course, index) in courses" :key="index" class="uk-active">
                        <a href="#">
                            <div class="uk-card-default uk-card-hover  uk-card-small feature-card uk-inline-clip">
                                <img class="course-img" :src="course.image_url"> 
                                <div class="uk-card-body"> 
                                    <h4>{{ course.title }}</h4>
                                    <!-- <p>{{ course.description }}</p>  -->
                                </div>                                     
                            </div>                                 
                        </a>                             
                    </li>
                    
                </ul>
                <a class="uk-position-center-left uk-position-small uk-hidden-hover uk-hidden-hover uk-icon-button" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover uk-hidden-hover uk-icon-button" href="#" uk-slidenav-next uk-slider-item="next"></a>
                <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin">
                    <li uk-slider-item="0" class="">
                        <a href="#"></a>
                    </li>                         
                </ul>
            </div>
        </div>             
        <!-- end feature contant-->
        
        <!--  Page Contants  -->   
        <div class="uk-container uk-margin-medium-top" id="more">
            <categories :categories="categories"></categories>
            <articles :articles="articles"></articles>
            <course-filter :courses="courses"></course-filter>
        </div>
    </div>
</template>

<script>
import Categories from '../components/CategoriesComponent'
import CourseFilter from '../components/CourseFilterComponent'
import Articles from '../components/ArticlesComponent'

export default {
    props: ['courses', 'articles', 'categories'],

    components: {
        Categories,
        courseFilter: CourseFilter,
        Articles
    },

    data() {
        return {

        }
    }
}
</script>

<style scoped>
.hero-feature-bg {
    width: 100%;
    height: 360px;
    position: absolute;
    background: linear-gradient(220deg, #f69120 -10%, #ed2e24 70%);
}
</style>


