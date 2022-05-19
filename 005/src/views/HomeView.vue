<template>
  <div class="home">
    <product-catalog></product-catalog>
  </div>
</template>

<script>
// @ is an alias to /src
import ProductCatalog from "../components/ProductCatalog";

export default {
  name: 'HomeView',
  components: {
    ProductCatalog
  }
}
</script>
