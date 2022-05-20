<template>
  <header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">


        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" :class="activePage ==='Catalog' ? activeLink : link" @click="makeActive('Catalog')">Каталог</a></li>
          <li><a href="#" :class="activePage==='Favorites' ? activeLink : link" @click="makeActive('Favorites')">Обране</a></li>
        </ul>



        <div class="text-end">

          <button type="button" :class="activePage==='Cart' ? cartShownActive : cartShown" @click="makeActive('Cart')">
            Кошик
            <span class="badge bg-danger" v-if="countOrdered">{{countOrdered}}</span>
          </button>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
export default {
  name: "HeaderPart",
  props:["activePage", "countOrdered"],
  emits: ['getPosition'],
  data() {
    return{
      link: 'nav-link px-2 text-white',
      activeLink: 'nav-link px-2 text-secondary',
      cartShown: 'btn btn-warning text-white',
      cartShownActive: 'btn btn-warning text-secondary',

    }
  },
  methods: {
    makeActive(event) {
      let position = event;
      this.$emit('getPosition', position)
      },
  },
  computed: {

  }
}
</script>

<style scoped>

</style>