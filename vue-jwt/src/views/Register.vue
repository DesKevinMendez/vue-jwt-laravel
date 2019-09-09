<template>
  <div class="home">
    <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img :src="img" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form>
      <input type="text" id="name" v-model="data.name" class="fadeIn first" name="name" placeholder="Name">
      <input type="text" id="email" v-model="data.email" class="fadeIn first" name="name" placeholder="Email">
      <input type="password" id="password" v-model="data.password" class="fadeIn third" name="login" placeholder="Password">
      <input type="password" id="password_confirmation" v-model="data.password_confirmation" class="fadeIn third" name="login" placeholder="Confirm password">
      <input type="button" @click="registerNow" class="fadeIn fourth" value="Register now">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
       <router-link to="/">Login</router-link> |
    </div>

  </div>
</div>
  </div>
</template>

<script lang="ts">
const img = require('@/assets/logo.png');
import { Component, Vue } from 'vue-property-decorator';
import axios from 'axios';
import authTypes from '../store/types/authTypes';
import { Action } from 'vuex-class';
@Component({
  name: 'Register',
  data() {
    return {
      img,
      data : {
        name: '',
        email: '',
        password: '',
        password_confirmation: ''
      }
    }
  },
  
})
export default class Home extends Vue {
  registerNow() {
    this.registerUser(this.$data.data);
  }
  @Action(`authModule/${authTypes.actions.REGISTERUSER}`) registerUser: any;
}
</script>

<style lang="scss" scoped>
  @import '../assets/scss/customer.scss';
</style>