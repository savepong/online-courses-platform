<template>
<div>
    <div class="uk-container-small uk-margin-auto uk-margin-medium-top uk-padding-small">
        <h2 class="uk-heading-bullet">{{post.title}}</h2>
        <div class="">
            <img :src="author.avatar_url" class="img-small">
            <span class="uk-text-middle">by <a href="#"> {{author.name}}</a>.</span>
        </div>
    </div>

    <div class="uk-container uk-margin-auto">
        <img :src="post.image_url" alt="">
    </div>

    <div class="uk-container-small uk-margin-auto uk-padding-large">
        <p class="uk-text-lead">{{post.excerpt}}</p>
        <div v-html="post.body"></div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            postId: this.$route.params.id,
            post: {},
            author: {
                name: '',
                avatar_url: ''
            }
        }
    },

    created () {
        this.fetch(`/api/post/${this.postId}`);
    },

    methods: {
        fetch (endpoint) {
            axios.get(endpoint)
            .then(({data}) => {
                this.post = data.data
                this.author = data.data.author
            })
        },
    }
}
</script>
