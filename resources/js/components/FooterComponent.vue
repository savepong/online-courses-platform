<template>
  <div class="uk-section-small uk-margin-medium-top">
    <hr class="uk-margin-remove">
    <div class="uk-container uk-align-center uk-margin-remove-bottom uk-position-relative">
      <div uk-grid>
        <div class="uk-width-1-3@m uk-width-1-2@s uk-first-column">
          <a href="pages-about.html" class="uk-link-heading uk-text-lead uk-text-bold">
            <i class="fas fa-graduation-cap"></i>
            {{appName}}
          </a>
          <!-- <div class="uk-width-xlarge tm-footer-description">A unique and beautiful collection of UI elements that are all flexible and modular.   building the website of your dreams.</div>                          -->
        </div>
        <div class="uk-width-expand@m uk-width-1-2@s">
          <ul class="uk-list tm-footer-list">
            <li>
              <a href="#">หน้าแรก</a>
            </li>
          </ul>
        </div>
        <div class="uk-width-expand@m uk-width-1-2@s">
          <ul class="uk-list tm-footer-list">
            <li>
              <a href="#">คอร์สเรียน</a>
            </li>
          </ul>
        </div>
        <div class="uk-width-expand@m uk-width-1-2@s">
          <ul class="uk-list tm-footer-list">
            <li>
              <a href="#articles">บทความ</a>
            </li>
          </ul>
        </div>
      </div>
      <hr>
      <p
        class="uk-postion-absoult uk-margin-remove uk-position-bottom-right"
        style="bottom: 8px;right: 60px;"
        uk-tooltip="title: Visit Our Site; pos: top-center"
      >
        Powered By
        <a
          href="https://ideagital.com"
          target="_blank"
          class="uk-text-bold uk-link-reset"
        >IDEAGITAL TECH</a>
      </p>
      <div class="uk-margin-small" uk-grid>
        <div class="uk-width-1-2@m uk-width-1-2@s uk-first-column">
          <p class="uk-text-small">
            <i class="fas fa-copyright"></i> 2019
            <span class="uk-text-bold">{{appName}}</span> . All rights reserved.
          </p>
        </div>
        <div class="uk-width-1-3@m uk-width-1-2@s">
          <a
            href="#"
            class="uk-icon-button uk-link-reset"
            uk-tooltip="title: Our Youtube Chanal; pos: top-center"
          >
            <i class="fab fa-youtube" style=" color: #fb7575  !important;"></i>
          </a>
          <a
            href="https://web.facebook.com/ideagital.tech/"
            class="uk-icon-button uk-link-reset"
            uk-tooltip="title: Our Facebook; pos: top-center"
          >
            <i class="fab fa-Facebook" style=" color: #9160ec  !important;"></i>
          </a>
          <a
            href="#"
            class="uk-icon-button uk-link-reset"
            uk-tooltip="title: Our Instagram; pos: top-center"
          >
            <i class="fab fa-Instagram" style=" color: #dc2d2d  !important;"></i>
          </a>
          <a
            href="#"
            class="uk-icon-button uk-link-reset"
            uk-tooltip="title: Our linkedin; pos: top-center"
          >
            <i class="fab fa-linkedin" style=" color: #6949a5  !important;"></i>
          </a>
          <a
            href="#"
            class="uk-icon-button uk-link-reset"
            uk-tooltip="title: Our google-plus; pos: top-center"
          >
            <i class="fab fa-google-plus" style=" color: #f77070 !important;"></i>
          </a>
          <a
            href="#"
            class="uk-icon-button uk-link-reset"
            uk-tooltip="title: Our Twitter; pos: top-center"
          >
            <i class="fab fa-twitter" style=" color: #6f23ff !important;"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      appName: process.env.MIX_APP_NAME
    };
  }
};
</script>
