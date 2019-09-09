<template>
  <div class="container">
      <div class="row">
          <div class="post-preview">
          
            <h2 class="post-title">
              I believe every human has a finite number of heartbeats. I don't intend to waste any of mine.
            </h2>
          <p class="post-meta">Posted by
            on September 18, 2019</p>
        </div>
      </div>
      
  </div>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
@Component({
  name: 'Profile',
  data() {
    return {
    }
  },
  components: {
  },
})
export default class Profile extends Vue {}
</script>

<style lang="scss" scoped>
  @import '../assets/scss/customer.scss';
</style>
