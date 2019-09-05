<template>
    <div class="post-preview">
          <a href="post.html">
            <h2 class="post-title">
              I believe every human has a finite number of heartbeats. I don't intend to waste any of mine.
            </h2>
          </a>
          <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            on September 18, 2019</p>
            <div class="content-blog">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam nihil pariatur optio cupiditate accusamus temporibus corporis, illo ullam! Cupiditate nostrum, voluptate ut dolor dicta atque quod autem provident doloremque culpa.</p>
            </div>
            <comentarios/>
    </div>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import comentarios from '@/components/blog/comentario.vue'

@Component({
  name: 'Blogs',
  data() {
    return {
    }
  },
  components: {
      comentarios
  },
})
export default class blog extends Vue {}
</script>

<style lang="scss" scoped>
    .content-blog {
        p {
            font-size: 1.5rem;
        }
    }
</style>
