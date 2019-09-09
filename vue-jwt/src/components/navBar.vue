<template>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <router-link  class="navbar-brand" to="/">Home</router-link>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto" v-if="userLoged">
          <li class="nav-item" v-for="item in navLoggedUser" :key="item.name">
             <router-link  class="nav-link" :to="item.to">{{ item.name }}</router-link>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto" v-else>
          <li class="nav-item" v-for="item in navNotLoggedUser" :key="item.name">
             <router-link  class="nav-link" :to="item.to">{{ item.name }}</router-link>
          </li>
          <li class="nav-item">
            <button class="btn  btn-sm btn-light" @click="logout">Logout</button>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import { Action } from 'vuex-class';
import authTypes from '../store/types/authTypes';
@Component({
  name: 'BlogsNavbar',
  data() {
    return {
      userLoged: false,
      navLoggedUser: [
        { name:"Register", to: "/register" },
        { name:"Login", to: "/login" },
      ],
      navNotLoggedUser: [
        { name:"Home", to: "/" },
        { name:"Profile", to: "/profile" },
        { name:"About", to: "/about" },
      ],
    }
  },
  components: {
  },
})
export default class navBar extends Vue {
  private created() {
    this.$data.userLoged = !window.localStorage.getItem('_token');
  }
  public logout() {
    this.cerrarSesion();
  }
  @Action(`authModule/${authTypes.actions.LOGOUTUSER}`) cerrarSesion: any;
}
</script>
