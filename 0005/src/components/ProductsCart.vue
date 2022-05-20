<template>
  <div class="cart mt-4 col-md-4" v-show="isActive">
    <table class="table table-success" v-if="orderedItems.length">
      <thead>
      <tr class="table-secondary">
        <th>№</th>
        <th>ID</th>
        <th>Назва</th>
        <th>Кількість</th>
        <th>#</th>
      </tr>
      <tr :key="item.id" v-for="(item, index) in orderedItems">
        <td>{{index+1}}</td>
        <td>{{item.id}}</td>
        <td>{{item.name}}</td>
        <td>{{item.amount}}</td>
        <td><button class="btn btn-danger" @click="removeOrder(item)">видалити</button></td>
      </tr>
      <tr>
        <td colspan="5" class="table-info p-4">Всього ви зробили замовленнь: <strong>{{orderedItems.length }}</strong>, загальною кількістю товарів: <strong>{{summInCart}}</strong> шт</td>
      </tr>
      </thead>
    </table>
    <h2 v-else> Кошик поки що порожній :(</h2>
  </div>
</template>

<script>
export default {
  name: "ProductsCart",
  props: ["activePage", "orderedItems"],
  emits:["removeOrder"],
  methods: {
    removeOrder(item) {
      this.$emit("removeOrder", item)
    }
  },
  computed: {
    isActive() {
      return (this.activePage==='Cart')
    },
    summInCart()  {
      let res = 0;
      for (let i=0; i<this.orderedItems.length; i++){
        res+=this.orderedItems[i].amount;
      }
      return res;
    }
  }
}
</script>

<style scoped>
  .cart {
    margin-left: auto;
    margin-right: auto;
  }
</style>