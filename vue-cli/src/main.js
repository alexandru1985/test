import Vue from 'vue'
import App from './App.vue'
import Tasks from './components/Tasks.vue';
import HelloWorld from './components/HelloWorld.vue';
import NotFound from './components/NotFound.vue';

Vue.config.productionTip = false

const routes = {
    '/': App,
    '/tasks': Tasks,
    '/test': HelloWorld,
    '/test/test': HelloWorld
};
new Vue({
    
  data: {
      currentRoute: window.location.pathname,
  },  
  computed: {
      currentCompenent() {
          return routes[this.currentRoute] || NotFound;
      }
  },  
  render: function(h){
      return h(this.currentCompenent);
  },
}).$mount('#app')
