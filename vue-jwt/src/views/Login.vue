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
      <input type="text" v-model="data.email" id="login" class="fadeIn second"  name="login" placeholder="login">
      <input type="password" v-model="data.password" id="password" class="fadeIn third" name="login" placeholder="password">
      <input type="button" @click="login" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password? Good! :v</a>
    </div>

  </div>
</div>
  </div>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import { Action } from 'vuex-class';
import authTypes from '../store/types/authTypes';
const img = require('@/assets/logo.png');
@Component({
  name: 'Login',
  data() {
    return {
      img,
      data: {
        email: '',
        password: ''
      }
    }
  },
  components: {
  },
})
export default class Login extends Vue {
  public login() {
    // console.log(this.$data.data);
    this.loginUser(this.$data.data);
  }
  @Action(`authModule/${authTypes.actions.LOGINUSER}`) loginUser: any;
}
</script>
<style lang="scss" scoped>
  @import '../assets/scss/customer.scss';
</style>