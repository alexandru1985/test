import Vue from 'vue';
Vue.component('accordion', {
    props: ['item'],
    template: `
            <div>
                <p>{{ item.title }} </p>
                <p @click = "toggle =! toggle">Details</p>
                <p v-if="toggle">{{ item.description }}</p>
            </div>
            `,
    data: function () {
        return {
            toggle: false
        }
    }
});
new Vue({
    el: "#app",
    data: {
        items: [
            {id: 1, title: "Title1", description: "Description for tab1"},
            {id: 2, title: "Title2", description: "Description for tab2"},
            {id: 3, title: "Title3", description: "Description for tab3"}
        ]
    }

});