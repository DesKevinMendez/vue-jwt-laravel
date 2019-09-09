import { GetterTree, ActionTree, MutationTree } from 'vuex';
import { State } from '@/store/interfaces/Auth';
import { http } from '@/utils/http.ts';
// Se encarga de hacer las peticiones asincronas con axios
// Trae las constantes globales
import AuthTypes from '@/store/types/authTypes';
const namespaced: boolean = true;;


const state: State = {
  user: {},
  token: !!window.localStorage.getItem('_token'),
};
const getters: GetterTree<State, any> = {
  [AuthTypes.getters.GETUSER]: (state) =>{
    return state.user;
  }
};
const mutations: MutationTree<State> = {
  [AuthTypes.mutations.SETUSER]: (state, user) =>{
    state.user = user;
  }
}

const actions: ActionTree<State, any> = {
  [AuthTypes.actions.LOGINUSER]: ({ commit }, data) => {
    console.log(data);
    return new Promise((resolve, reject) => {
      http
          .post(`api/auth/login`, data)
          .then((res : any) => {
                  commit(AuthTypes.mutations.SETUSER, res.data.user);
                  window.localStorage.setItem('_token', res.data.access_token);
                  window.location.reload();
                  resolve(res)
              })
          .catch((error: any) => {
              reject(error)
          })
          .finally(() => {
              return;
          });
      });
   
  },
  [AuthTypes.actions.LOGOUTUSER]: ({ commit }) => {
    return new Promise((resolve, reject) => {
      http
          .post(`api/auth/logout`)
          .then((res : any) => {
                  commit(AuthTypes.mutations.SETUSER, {});
                  window.localStorage.removeItem('_token');
                  window.location.reload();
                  resolve(res)
              })
          .catch((error: any) => {
              reject(error)
          })
          .finally(() => {
              return;
          });
      });
  },
  [AuthTypes.actions.REGISTERUSER]: ({ commit }, data) => {
    return new Promise((resolve, reject) => {
      http
          .post(`api/auth/register`, data)
          .then((res : any) => {
                  commit(AuthTypes.mutations.SETUSER, res.data.user);
                  window.localStorage.setItem('_token', res.data.access_token);
                  window.location.reload();
                  resolve(res)
              })
          .catch((error: any) => {
              reject(error)
          })
          .finally(() => {
              return;
          });
      });
  }
}

export default {
  namespaced,
  state,
  mutations,
  getters,
  actions,
};