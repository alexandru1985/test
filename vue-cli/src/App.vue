<template>
  <div id="app_task">
        <div :class="classObject">{{value}}</div>
        <div :style="{fontSize: (value*10) + 'px'}">{{value}}</div>

        <button @click="value++">+</button>
        <button @click="value--">-</button>
        <button @click="error =! error">Error</button>
        <button @click="warning =! warning">Warning</button>
  </div>
</template>

<script>
export default {
    name: 'app_task',
    data: function() {
        return {
            value: 1,
            error: false,
            warning: false,
        }
    },
    computed: {
      classObject: function() {
        return {
            'red-error' : this.value > 5,
            'warning' : this.warning
            }
        }
    }
}
</script>

<style>
body {
    font-size:40px;
    text-align:center;
    padding-top:100px;
}
.red-error {
background-color:darkred;
}
.warning {
text-decoration: underline;
}
</style>
