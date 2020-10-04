import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'
import HelloWorld from './components/HelloWorld.vue';
import Tasks from './components/Tasks.vue';
import Test from './components/Test.vue';
import User from './components/User.vue';
import NotFound from './components/NotFound.vue';
import About from './components/About.vue';
import Pricing from './components/Pricing.vue';
import './main.css';

Vue.use(VueRouter);

Vue.config.productionTip = false

const router = new VueRouter({

    routes: [
        {path: '/', component: HelloWorld},
        {path: '/about', component: About},
        {path: '/pricing', component: Pricing},
        {path: '/tasks', component: Tasks},
        {path: '/test', component: Test},
        {path: '/user/:id', component: User},
        {path: '*', component: NotFound},
    ],
    mode: 'history'
});

new Vue({
    router,
    render: h => h(App),
}).$mount('#app')
