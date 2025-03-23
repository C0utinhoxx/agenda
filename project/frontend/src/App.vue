<template>
  <div id="app">
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: 'App'
};
</script>

<style>
#app {
  max-width: 100%;
  margin: 0 auto;
  padding: 0 10px;
  box-sizing: border-box;
}

@media (min-width: 1200px) {
  #app {
    max-width: 1200px;
  }
}
</style>