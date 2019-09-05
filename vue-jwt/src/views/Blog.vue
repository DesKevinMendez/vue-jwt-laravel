<template>
 
  <!-- Post Content -->
   <section class="container">
    <div class="row">
      <div class="col-lg-12 col-md-10 mx-auto">
        
        <blogContent/>
        <blogContent/>
        <blogContent/>
        
      </div>
    </div>
  </section>
 
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import blogContent from '@/components/blog/blog.vue';

@Component({
  name: 'Blogs',
  data() {
    return {
    }
  },
  components: {
    blogContent,  
  },
})
export default class Home extends Vue {}
</script>
