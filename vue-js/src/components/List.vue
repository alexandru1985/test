<template>
    <div>
        <p v-text="dropdownResult">ITEM</p>
        <dropdown @update:option="updateOption"></dropdown>
    </div>
</template>

<script>
    import Dropdown from './Dropdown.vue';
    export default {
        name: "List",
        components: {
            Dropdown,
        },
        data: function() {
            return {
                dropdownResult: '',
            }
        },
        methods: {
            updateOption: function(value) {
                this.dropdownResult = value;
            }
        }

    }
</script>
