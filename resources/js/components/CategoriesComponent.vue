<template>
  <div>
    <h3 class="uk-text-light">หมวดหมู่ทั้งหมด</h3>
    <div class="uk-grid-small uk-child-width-1-6 uk-margin-large-bottom uk-visible@s" uk-grid>
      <div v-for="category in categories" :key="category.id">
        <div class="uk-card-default uk-padding-small">{{category.title}}</div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["categories"],

  data() {
    return {
      // categories: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
    };
  }
};
</script>
