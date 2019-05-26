<template>
    <div>
        <!--  latest articles  -->                 
        <div class="uk-container">
            <div class="section-heading uk-position-relative uk-margin-medium-top none-border uk-clearfix"> 
                <div class="uk-float-left"> 
                    <h2>Latest Articles</h2>
                    <p>Adipisici elit, sed eiusmod tempor incidunt ut labore et</p> 
                </div>                         
                <div class="uk-float-right"> 
                    <a href="blog-video-one.html" class="uk-button uk-button-default">See more</a> 
                </div>                         
            </div>
        </div>
        <div class="uk-position-relative uk-visible-toggle  uk-container uk-padding-medium" uk-slider>
            <ul class="uk-slider-items uk-child-width-1-3@m uk-child-width-1-2@s" uk-grid> 
                <li v-for="post in articles" :key="post.id" class="uk-active"> 
                    <div class="uk-card uk-card-default uk-card-small uk-card-hover border-radius-6"> 
                        <a href="Blog-post-single.html" class="uk-position-cover"></a> 
                        <img :src="post.image_url"> 
                        <div class="uk-card-body"> 
                            <h5 class="uk-margin uk-margin-remove-bottom">{{post.title}}</h5> 
                        </div>                                 
                    </div>                             
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
</template>

<script>
export default {
    props: ['articles'],

    data() {
        return {
            // articles
        }
    }
}
</script>
