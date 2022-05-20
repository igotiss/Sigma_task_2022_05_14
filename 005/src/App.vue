<template>
  <nav>
    <router-link to="/">Каталог</router-link> |
    <router-link to="/about">Обране</router-link> |
    <router-link to="/cart" class="btn btn-warning">Кошик <span class="badge bg-danger" v-if="itemsCount">{{itemsCount}}</span></router-link>
  </nav>
  <router-view/>
</template>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: #42b983;
}
</style>

<script>
export default {
  name: "App",

  data () {
    return {
      itemsCount: 1,
    }
  },
  methods: {

  }
}
</script>