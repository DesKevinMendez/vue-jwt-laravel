<template>
  <div id="app">
    <NavBar/>
    <Headers/>
    <router-view/>
    <Footer/>
  </div>
</template>
<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import Footer from '@/components/footer.vue';
import NavBar from '@/components/navBar.vue';
import Headers from '@/components/Header.vue';
@Component({
  name: 'App',
  data() {
    return {
    }
  },
  components: {
    Footer,
    NavBar,
    Headers
  },
})
export default class navBar extends Vue {}
</script>

