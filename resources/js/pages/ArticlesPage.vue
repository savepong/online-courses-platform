<template>
<div>
    <div class="hero-feature-bg uk-visible@s"></div>
    <div class="uk-container uk-visible@s">
        <div class="uk-container">
            <div class="uk-position-relative uk-margin-medium-top none-border uk-clearfix"> 
                <div class="uk-float-left"> 
                    <h1 class="uk-text-white">บทความ</h1>
                    <h4 class="uk-text-white uk-margin-remove uk-text-light"> บทความแนะนำ </h4>
                </div>                         
                <!-- <div class="uk-float-right"> 
                    <a href="#more" class="uk-button uk-button-default uk-button-white" uk-scroll>See more</a> 
                </div>                          -->
            </div>
        </div>
        <div class="uk-position-relative uk-visible-toggle  uk-container uk-padding-medium" uk-slider>
            <ul class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-3@m uk-grid"> 
                <li v-for="(post, index) in posts" :key="index" class="uk-active">
                    <router-link :to="{ name: 'post.show', params: { id: post.id, slug: post.slug } }">
                        <div class="uk-card-default uk-card-hover  uk-card-small feature-card uk-inline-clip">
                            <img class="course-img" :src="post.image_url"> 
                            <div class="uk-card-body"> 
                                <h4>{{ post.title }}</h4>
                                <!-- <p>{{ course.description }}</p>  -->
                            </div>                                     
                        </div>                                 
                    </router-link>                             
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

    <div class="uk-container">
         <!-- end slider -->                 
        <div class="section-heading uk-position-relative uk-margin-small-top none-border uk-clearfix"> 
            <div class="section-heading none-border">
                <h3 class="uk-margin-remove-bottom">บทความทั้งหมด</h3>
                <p>บทความล่าสุด</p> 
            </div>                    
            <!-- <div class="uk-float-right"> 
                <a href="blog-video-one.html" class="uk-button uk-button-grey">See more</a> 
            </div>                      -->
        </div>
        <div class="uk-margin-small uk-grid-match uk-child-width-1-3@m uk-child-width-1-2@s" uk-scrollspy="target: > div; cls:uk-animation-slide-bottom-small; delay: 200" uk-grid> 
            <div v-for="post in posts" :key="post.id"> 
                <router-link :to="{ name: 'post.show', params: { id: post.id, slug: post.slug } }">
                    <div class="uk-card-default uk-card-hover uk-card-small uk-margin-medium-bottom uk-inline-clip border-radius-6"> 
                        <img :src="post.image_url"> 
                        <div class="uk-card-body"> 
                            <h5 class="uk-margin uk-margin-remove-bottom"> {{post.title}}  </h5> 
                            <!-- <p> {{post.excerpt}}  </p> -->
                        </div>                                 
                    </div>
                </router-link>                      
            </div> 
        </div>
    </div>
</div>
</template>

<script>
export default {
    // props: ['posts'],

    components: {
        
    },

    data() {
        return {
            posts: []
        }
    },

    created () {
        this.fetch(`/api/post`);
    },

    methods: {
        fetch (endpoint) {
            // this.answerIds = [];
            axios.get(endpoint)
            .then(({data}) => {
                // this.answerIds = data.data.map(a => a.id);
                this.posts.push(...data.data);
                // this.nextUrl = data.next_page_url;
            })
            // .then(() => {
            //     this.answerIds.forEach(id => {
            //         this.highlight(`answer-${id}`)
            //     })
            // })
        },
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
