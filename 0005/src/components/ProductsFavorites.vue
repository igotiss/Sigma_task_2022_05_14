<template>
<div class="favorites mt-4" v-show="isActive">
  <h2>Тут ми зібрали товари, що вам сподобались :)</h2>
  <div class="container mt-4">
    <div class="box">
      <div class="card mb-3" style="max-width: 400px;" :key="product.id" v-for="product in favoritesProducts">
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
  name: "ProductsFavorites",
  props: ["activePage", "favoritesProducts"],
  emits: ['getOrderedItems', 'setAmountProducts', 'toggleFavorite'],

  computed: {
    isActive() {
      return (this.activePage==='Favorites')
    }
  }
}
</script>

<style scoped>
.box {
  display: flex;
  flex-wrap: wrap;
}

.box > * {
  flex: 1 1 160px;
  margin: 0 5px;
}
</style>