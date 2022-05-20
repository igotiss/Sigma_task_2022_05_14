<template>
    <div class="cart">
        <h1>This is an cart page</h1>
      <product-cart/>
    </div>
</template>

<script>
import ProductCart from "../components/ProductCart"
    export default {
        name: "CartView",
      components: {
        ProductCart
      }

    }
</script>

<style scoped></style>