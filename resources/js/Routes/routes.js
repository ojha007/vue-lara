import Vue from 'vue'
import VueRouter from 'vue-router'
// import Home from '../components/Frontend/Home'
import Login from "../Pages/Login";
import Register from "../Pages/Register";
import Question from "../Pages/Question";
import Blog from "../Pages/Blog";
import Logout from "../Pages/Logout";
import Forum from "../Pages/Forum";
import SingleForum from "../Pages/SingleForum";
import Category from "../Pages/Category";

Vue.use(VueRouter);

const routes = [
    {
        path: '/login',
        component: Login,
        name: 'Login'

    },
    {
        path: '/register',
        component: Register,
        name: 'Register'

    }, {
        path: '/ask-question',
        component: Question,
        name: 'ask-question'
    }, {
        path: '/blog',
        component: Blog,
        name: 'blog'
    }, {
        path: '/logout',
        component: Logout,
        name: 'logout'
    },
    {
        path: '/forum',
        component: Forum,
        name: 'forum'

    },

    {
        path: '/forum/category/:slug',
        component: SingleForum,
        name: 'singleForum'

    },
    {
        path: '/add-category',
        component: Category,
        name: 'category'

    },

];
export default routes;
