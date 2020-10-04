<template>

  <div id="app">
  <p>
    <!-- use router-link component for navigation. -->
    <!-- specify the link by passing the `to` prop. -->
    <!-- `<router-link>` will be rendered as an `<a>` tag by default -->
    <router-link to="/">Home</router-link><br>
    <router-link to="/about">About</router-link><br>
    <router-link to="/pricing">Pricing</router-link><br>
    <router-link to="/tasks">Tasks</router-link><br>
    <router-link to="/test">Test</router-link><br>
    <router-link to="/user/123">User</router-link>
  </p>

  <router-view></router-view>
  </div>
</template>

<script>


export default {
  name: 'App',
  components: {

  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
