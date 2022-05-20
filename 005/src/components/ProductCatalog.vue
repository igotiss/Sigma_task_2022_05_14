<template>
    Сторінка каталога
    <div class="container">

            <div class="box">
                <div class="card mb-3" style="max-width: 400px;"  :key="product.id" v-for="product in products" >
                    <div class="row g-0">
                        <div class="col-md-3">
                            <img src="../assets/noimage.png" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <h5 class="card-title">{{product.name}}</h5>
                                <p class="card-text">Опис товару: {{product.description}}</p>
                                <p class="card-text"><small class="text-muted">наявність на складі: {{product.amount}}</small></p>
                                <form action="" >
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
                                            >
                                    </div>
                                </form>
                              <p class="card-text mt-2" v-if="product.errors.length" role="alert" >
                              <ul  class="alert alert-danger" role="alert">
                                <li  :key="error" v-for="error in product.errors">{{ error }} </li>
                              </ul>
                              </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
  
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
</template>

<script>
    let id = 0;
    export default {
      name: "ProductCatalog",
      emits: {},
      data () {
            return {
              errors: [],
              amountCardItems: [ ],
                products: [
                    {id: id++, name: 'Phone', description: 'опис товару телефон', amount: 12, order:1, errors: []},
                    {id: id++, name: 'TV', description: 'опис товару телевізор', amount: 12, order:1, errors: []},
                    {id: id++, name: 'Computer', description: 'опис товару комп*ютер', amount: 12, order:1, errors: []}
                ],
            }
        },
      methods: {
          addToCart(product) {
            if(product.order > this.products[product.id].amount) {
              this.products[product.id].errors.push('нажаль, ви не можете замовити таку кількість товару')
            } else {
              this.amountCardItems.push({id: product.id, name: product.name, amount: product.order})
              this.products[product.id].amount -=product.order
              this.products[product.id].order = 1;
              this.products[product.id].errors = [];

            }
          },


      },
      computed: {
        summInCart()  {
          let res = 0;
          for (let i=0; i<this.amountCardItems.length; i++){
            res+=this.amountCardItems[i].amount;
          }
          return res;
        }
      }
    }
</script>

<style scoped>
    li { list-style-type: none;}

    .box {
        display: flex;
        flex-wrap: wrap;
    }

    .box>* {
        flex: 1 1 160px;
        margin: 0 5px;
    }
    .bordered {
        border: solid black 1px;
    }
</style>