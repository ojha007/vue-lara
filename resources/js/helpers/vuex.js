import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
import User from '../helpers/User';

Vue.use(Vuex);
const Store = new Vuex.Store({

    state: {
        categories: [],
        replies: [],
        currentUser: User.logedIn(),
    },
    mutations: {
        FETCH_CATEGORY(state, payload) {
            state.categories = payload;
        },
        FETCH_REPLIES(state, payload) {
            state.replies = payload;
        },
        FETCH_CURRENT_USER(state, payload) {
            state.currentUser = payload;
        }

    },
    actions: {
        fetchCategory({commit}) {
            axios.get('/api/v1/category')
                .then((response) => {
                    commit("FETCH_CATEGORY", response.data.data);
                })
                .catch(error => {
                    console.log(error.data);
                    this.errored = true;
                })
        },
        fetchReplies({commit}, questionSlug) {
            axios.get('/api/v1/reply/question/' + questionSlug)
                .then((response) => {
                    commit("FETCH_REPLIES", response.data);


                })
                .catch(error => {
                    console.log(error.data);
                    this.errored = true;
                });
        },
        getCurrentUser({commit}) {
            commit('FETCH_CURRENT_USER')
        }


    },
    getter: {}
});
export default Store;
