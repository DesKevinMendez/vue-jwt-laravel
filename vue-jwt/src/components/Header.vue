<template>
  
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('@~/assets/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Our Blog</h1>
            <span class="subheading">Blog example</span>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
@Component({
  name: 'Header',
  data() {
    return {
    }
  },
  components: {
  },
})
export default class navBar extends Vue {}
</script>
