<template>
    <div class="uk-container">
         <!-- end slider -->                 
        <div class="section-heading uk-position-relative uk-margin-medium-top none-border uk-clearfix"> 
            <div class="uk-float-left"> 
                <h1 class="uk-margin-remove-bottom"> Articles</h1>
                <p>Adipisici elit, sed eiusmod tempor incidunt ut labore et</p> 
            </div>                     
            <!-- <div class="uk-float-right"> 
                <a href="blog-video-one.html" class="uk-button uk-button-grey">See more</a> 
            </div>                      -->
        </div>
        <div class="uk-margin uk-grid-match uk-child-width-1-3@m uk-child-width-1-2@s" uk-scrollspy="target: > div; cls:uk-animation-slide-bottom-small; delay: 200" uk-grid> 
            <div v-for="post in posts" :key="post.id"> 
                <router-link :to="{ name: 'post.show', params: { id: post.id, slug: post.slug } }">
                    <div class="uk-card-default uk-card-hover uk-card-small uk-margin-medium-bottom uk-inline-clip border-radius-6"> 
                        <img :src="post.image_url"> 
                        <div class="uk-card-body"> 
                            <h4 class="uk-margin uk-margin-remove-bottom"> {{post.title}}  </h4> 
                            <p> {{post.excerpt}}  </p>
                        </div>                                 
                    </div>
                </router-link>                      
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
