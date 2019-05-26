<template>
    <div class="uk-container uk-margin-medium-top" id="more"> 
        <h3 class="uk-text-light"> Popular topics </h3>
        <div class="uk-grid-small uk-child-width-1-6 uk-margin-large-bottom uk-visible@s" uk-grid>
            <div v-for="(category, index) in categories" :key="index">
                <div class="uk-card-default uk-padding-small">
                    {{category}} Web 
                </div>                         
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            categories: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
        }
    }
}
</script>
