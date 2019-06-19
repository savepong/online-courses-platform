<template>
  <div>
    <div class="course-dhashboard topic2">
      <div uk-grid class="uk-grid">
        <div class="uk-width-1-2@m uk-padding-remove-left uk-visible@m uk-first-column">
          <div class="course-video-demo uk-position-relative">
            <div class="video-responsive">
              <iframe
                :src="course.video"
                class="uk-padding-remove uk-responsive-width"
                uk-video="automute: true"
                frameborder="0"
                allowfullscreen
                uk-responsive
              ></iframe>
            </div>
          </div>
        </div>
        <div class="uk-width-1-2@m uk-padding">
          <h2 class="uk-light uk-text-uppercase uk-text-bold uk-text-white">{{course.title}}</h2>
          <p class="uk-light uk-text-bold" v-html="course.description"></p>
          <p class="uk-light uk-text-bold uk-text-small">
            <i class="fas fa-star icon-small icon-rate"></i>
            <i class="fas fa-star icon-small icon-rate"></i>
            <i class="fas fa-star icon-small icon-rate"></i>
            <i class="fas fa-star icon-small icon-rate"></i>
            <i class="fas fa-star icon-small icon-rate"></i>
            4.8 (228 ratings)
          </p>
          <!-- students images  -->
          <!-- <div
            class="avatar-group uk-margin"
            uk-scrollspy="target: > img; cls:uk-animation-slide-right; delay: 200"
          >
            <img src alt class="uk-scrollspy-inview uk-animation-slide-right" style>
            <img src alt class="uk-scrollspy-inview uk-animation-slide-right" style>
            <img src alt style class="uk-scrollspy-inview uk-animation-slide-right">
            <span class="uk-text-bold uk-light">5134 + students enrolled</span>
          </div>
          <div class="uk-grid-small uk-grid" uk-grid>
            <div class="uk-width-auto uk-first-column">
              <a
                class="uk-button uk-button-white uk-float-left"
                href="Course-lesson.html"
                uk-tooltip="title: Star This course now  ; delay: 300 ; pos: top ;animation:	uk-animation-slide-bottom-small"
                title
                aria-expanded="false"
              >Continue</a>
            </div>
            <div class="uk-width-expand">
              <span class="uk-light uk-text-small uk-text-bold">My progress</span>
              <progress
                id="js-progressbar"
                class="uk-progress progress-green uk-margin-small-bottom uk-margin-small-top"
                value="50"
                max="100"
                style="height: 8px;"
              ></progress>
            </div>
          </div>-->
        </div>
      </div>
    </div>
    <ul class="uk-child-width-expand course-dhashboard-subnav uk-tab" uk-tab>
      <li class aria-expanded="false">
        <a href="#" class="tablinks" onclick="openTabs(event, 'Discription')">Discription</a>
      </li>
      <li aria-expanded="false" class>
        <a href="#" class="tablinks" onclick="openTabs(event, 'Course-Videos')">
          <span class="uk-visible@m">Course</span> Videos
        </a>
      </li>
      <li aria-expanded="false" class>
        <a href="#" class="tablinks" onclick="openTabs(event, 'Discussions')">Discussions</a>
      </li>
      <li aria-expanded="true" class="uk-active">
        <a href="#" class="tablinks active" onclick="openTabs(event, 'Exercise-Files')">
          <span class="uk-visible@m">Exercise</span> Files
        </a>
      </li>
    </ul>
    <!-- course feature bg -->
    <!-- <div class="hero-feature-bg uk-visible@s"></div>
    <div class="uk-container uk-visible@s">
      <div class="uk-container">
        <div class="uk-position-relative uk-margin-medium-top none-border uk-clearfix">
          <div class="uk-float-left">
            <h1 class="uk-text-white">Latest Courses</h1>
            <h4 class="uk-text-white uk-margin-remove uk-text-light">New Courses</h4>
          </div>
          <div class="uk-float-right">
            <a href="#more" class="uk-button uk-button-default uk-button-white" uk-scroll>See more</a>
          </div>
        </div>
      </div>
      <div class="uk-position-relative uk-visible-toggle uk-container uk-padding-medium" uk-slider>
        <ul class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-3@m uk-grid">
          <li v-for="(course, index) in courses" :key="index" class="uk-active">
            <a href="#">
              <div class="uk-card-default uk-card-hover uk-card-small feature-card uk-inline-clip">
                <img class="course-img" :src="course.image_url">
                <div class="uk-card-body">
                  <h4>{{ course.title }}</h4>
                </div>
              </div>
            </a>
          </li>
        </ul>
        <a
          class="uk-position-center-left uk-position-small uk-hidden-hover uk-hidden-hover uk-icon-button"
          href="#"
          uk-slidenav-previous
          uk-slider-item="previous"
        ></a>
        <a
          class="uk-position-center-right uk-position-small uk-hidden-hover uk-hidden-hover uk-icon-button"
          href="#"
          uk-slidenav-next
          uk-slider-item="next"
        ></a>
        <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin">
          <li uk-slider-item="0" class>
            <a href="#"></a>
          </li>
        </ul>
      </div>
    </div>-->
    <!-- end feature contant-->

    <!--  Page Contants  -->
    <div class="uk-container uk-margin-medium-top" id="more">
      <articles :articles="posts"></articles>
      <categories :categories="categories"></categories>
      <!-- <course-filter :courses="courses"></course-filter> -->

      <a name="articles"></a>
      <div class="uk-container uk-margin-large-top">
        <!-- end slider -->
        <h3 class="uk-text-light">บทความทั้งหมด</h3>
        <div
          class="uk-margin-small uk-grid-match uk-child-width-1-3@m uk-child-width-1-2@s"
          uk-scrollspy="target: > div; cls:uk-animation-slide-bottom-small; delay: 200"
          uk-grid
        >
          <div v-for="post in posts" :key="post.id">
            <router-link :to="{ name: 'post.show', params: { id: post.id, slug: post.slug } }">
              <div
                class="uk-card-default uk-card-hover uk-card-small uk-margin-medium-bottom uk-inline-clip border-radius-6"
              >
                <img :src="post.image_url">
                <div class="uk-card-body">
                  <h5 class="uk-margin uk-margin-remove-bottom">{{post.title}}</h5>
                  <!-- <p> {{post.excerpt}}  </p> -->
                </div>
              </div>
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Categories from "../components/CategoriesComponent";
import CourseFilter from "../components/CourseFilterComponent";
import Articles from "../components/ArticlesComponent";

export default {
  // props: ["articles", "categories"],

  components: {
    Categories,
    courseFilter: CourseFilter,
    Articles
  },

  data() {
    return {
      course: [],
      posts: [],
      categories: []
    };
  },

  created() {
    this.fetch(`/api/course/42`);
    this.getPosts();
    this.getCategories();
  },

  methods: {
    fetch(endpoint) {
      axios.get(endpoint).then(({ data }) => {
        this.course = data.data;
      });
    },

    getPosts() {
      axios.get(`/api/post`).then(({ data }) => {
        this.posts.push(...data.data);
      });
    },

    getCategories() {
      axios.get(`/api/categories`).then(({ data }) => {
        this.categories.push(...data.data);
      });
    }
  }
};
</script>

<style>
.topic2 {
  background-color: #f36221 !important;
}
/* .hero-feature-bg {
  width: 100%;
  height: 360px;
  position: absolute;
  background: linear-gradient(220deg, #f69120 -10%, #ed2e24 70%);
} */
</style>


