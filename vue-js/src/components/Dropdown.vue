<template>
    <div>
        <select id="dropdown" name="dropdown" v-model="selectedOption" @change="optionChanged"> 
            <option value="Option 1">Value 1</option>
            <option value="Option 2">Value 2</option>
            <option value="Option 3">Value 3</option>
        </select>
    </div>
</template>

<script>
    export default {
        name: "Dropdown",
        data: function() {
            return {
                selectedOption: null
            }
        },
        methods: {
            optionChanged: function(value) {
                return this.$emit('update:option', this.selectedOption);
            }
        }
    }
</script>
