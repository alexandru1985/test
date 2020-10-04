import Vue from 'vue';
window.axios = require('axios');

new Vue({
    el: "#app",
    components: {
     
    },
    
    mounted: function() {
        axios.get('https://jsonplaceholder.typicode.com/posts').then(response => this.posts = response.data)
                .catch(error => this.posts = [{title:"No post found."}]);
    },
    data: {
        posts: null
    }

});

