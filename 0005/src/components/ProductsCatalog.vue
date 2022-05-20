<template>
  <div class="prod mt-4" v-show="isActive">
    <div class="container">
      <div class="box">
        <div class="card mb-3" style="max-width: 400px;" :key="product.id" v-for="product in products">
          <div class="row g-0">
            <div class="col-md-3">
              <img :src=product.image class="img-fluid rounded-start" alt="..." v-if="product.image">
              <img src="../assets/noimage.png" class="img-fluid rounded-start" alt="..." v-else>
            </div>
            <div class="col-md-9">
              <div class="card-body">
                <h5 class="card-title">{{ product.name }}</h5>
                <p class="card-text">Опис товару: {{ product.description }}</p>
                <p class="card-text"><small class="text-muted">наявність на складі: {{ product.amount }}</small></p>
                <form>
                  <div class="input-group" v-if="product.amount">
                    <label class="input-group-text col-md-4" for="amount">Додати:</label>
                    <input type="number"
                           class="form-control col-md-3"
                           v-model="product.order"
                           id="amount"
                           name="amount"
                           min="1"
                           v-bind:max="product.amount">
                    <input type="submit"
                           class="btn btn-dark col-md-5"
                           name=""
                           id=""
                           value="В кошик"
                           @click.prevent="addToCart(product)"
                           :disabled = "product.order > product.amount"
                    >
                  </div>

                  <div class="form-check form-switch mt-4">
                    <input
                        v-model="product.favorite"
                        class="form-check-input"
                        type="checkbox"
                        role="switch"
                        id="flexSwitchCheckChecked"
                        :checked="product.favorite"
                        @click="toggleFavorite(product.id)"
                    >
                    <label class="form-check-label" for="flexSwitchCheckChecked" v-if="product.favorite">Видалити з обраного</label>
                    <label class="form-check-label" for="flexSwitchCheckChecked" v-else>Додати до обраного</label>
                  </div>

                </form>
                <p class="card-text mt-2 alert alert-danger" v-if="product.order > product.amount" role="alert">
                  Нажаль, ви не можете замовити таку кількість товару, на складі лише <strong>{{product.amount}}</strong>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ProductsCatalog",
  props: ["activePage", "products"],
  emits: ['getOrderedItems', 'setAmountProducts', 'toggleFavorite'],
  data() {
    return {
      amountCardItems: [],
    }
  },
  methods: {
    addToCart(product) {
      if (product.order <= this.products[product.id].amount){
        this.amountCardItems.push({id: product.id, name: product.name, amount: product.order})
        this.$emit('setAmountProducts', product)
        this.errors = []
        this.$emit('getOrderedItems', this.amountCardItems)
      }
    },
    toggleFavorite(id) {
      this.$emit('toggleFavorite', id)
    }
  },
  computed: {
    isActive() {
      return (this.activePage === 'Catalog')
    }
  }
}
</script>

<style scoped>
li {
  list-style-type: none;
}

.box {
  display: flex;
  flex-wrap: wrap;
}

.box > * {
  flex: 1 1 160px;
  margin: 0 5px;
}
</style>