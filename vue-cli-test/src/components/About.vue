<template>
  <div class="about">

    <input type="text" class="bg-gray-300 px-4 py-2" v-model="state" autocomplete="off" @input="filterStates">
    <div v-if="filteredStates">
        <ul>
             <li v-for="filteredState in filteredStates" :key="filteredState">
                {{ filteredState }}
             </li>
        </ul>
    </div>
  </div>
</template>

<script>
export default {
    data: function() {
        return {
            state: '',
            states: ['Texas', 'Alabama', 'Florida', 'Alaska'],
            filteredStates: [],
        }
    },
    methods: {
        filterStates() {
        this.filteredStates = this.states.filter(state =>
            {return state.toLowerCase().startsWith(this.state.toLowerCase())});
        }
    }
}
</script>

<style>

</style>
