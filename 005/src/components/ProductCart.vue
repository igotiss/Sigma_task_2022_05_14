<template>
  <div class="">
    <table class="table" v-if="amountCardItems.length">
      <thead>
      <tr class="table-dark">
        <th>ID</th>
        <th>Назва</th>
        <th>Кількість</th>
      </tr>
      <tr :key="item.id" v-for="(item, index) in amountCardItems">
        <td>{{index+1}}</td>
        <td>{{item.name}}</td>
        <td>{{item.amount}}</td>
      </tr>
      <tr>
        <td>Всього:{{amountCardItems.length }}</td>
        <td></td>
        <td>{{summInCart}}</td>
      </tr>
      </thead>
    </table>
  </div>
</template>

<script>
export default {
  name: "ProductCart"
}
</script>

<style scoped>

</style>