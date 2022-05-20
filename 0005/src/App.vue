<template>
  <header-part
      :activePage = "activePage"
      :countOrdered = "countOrdered"
      @getPosition="setActive"
  />

  <products-catalog
      :activePage = "activePage"
      :products = "products"
      @getOrderedItems = "setOrderedItems"
      @toggleFavorite = "setFavorite"
  />

  <products-cart
      :activePage="activePage"
      :orderedItems="orderedItems"
      @removeOrder="setRemoveOrder"
      @setAmountProducts="setAmountProducts"
  />

  <products-favorites
      :activePage="activePage"
      :favoritesProducts = "favoritesProducts"
  />
  <button class="btn btn-danger" @click="loadProducts"> Load</button>

</template>

<script>

import HeaderPart from './components/HeaderPart.vue'
import ProductsCatalog from "@/components/ProductsCatalog";
import ProductsCart from "@/components/ProductsCart";
import ProductsFavorites from "@/components/ProductsFavorites";
import axios from 'axios';

let id = 0;
export default {
  name: 'App',
  components: {
    HeaderPart,
    ProductsCatalog,
    ProductsCart,
    ProductsFavorites
  },
  data() {
    return{
      activePage: 'Catalog',
      orderedItems:[],
      products: [
        {id: id++, name: 'Phone', description: 'опис товару телефон', amount: 12, order:1,  },
        {id: id++, name: 'TV', description: 'опис товару телевізор', amount: 12, order:1, favorite: true},
        {id: id++, name: 'Computer', description: 'опис товару комп*ютер', amount: 12, order:1, favorite: false}
      ],
    }
  },
  methods: {
    setActive(value) {
      this.activePage = value;
    },
    setOrderedItems(value) {
      this.orderedItems = value;
      this.products[value[0].id].amount-=this.orderedItems[value[0].id].amount
    },
    setRemoveOrder(value) {
      this.orderedItems = this.orderedItems.filter((t) => t !== value)
      this.products[value.id].amount += value.amount
    },
    setAmountProducts(value) {
      this.products[value.id].amount-=value.order
    },
    setFavorite (id) {
      this.products[id].favorite = !this.products[id].favorite
    },
     async loadProducts() {

      /** first way */

       /*
       const mysql = require('mysql');
       const con = await mysql.createConnection({
         host     : 'localhost:3306',
         user     : 'root',
         password : '',
         database : 'sigma005'
       });
       con.connect(function(err) {
         if (err) throw err;
         //Select all products and return the result object:
         con.query("SELECT * FROM products", function (err, result) {
           if (err) throw err;
           this.products = (result);
         });
       });
       */

       /** second way */


       const {data} = await axios.get('../php/ajaxfile.php')
       this.products = Object.keys(data).map(key => {
         return {
           id: key,
           ...data[key]
         }
       })

     }
  },
  mounted() {
    this.loadProducts()
  },
  computed: {
    countOrdered() {
      let count = 0;
      for(let i=0; i<this.orderedItems.length; i++){
        count += this.orderedItems[i].amount;
      }
      return count;
    },
    favoritesProducts() {
      return this.products.filter(function (item){
        return item.favorite
      })
    }
  }
}
//https://console.firebase.google.com/project/sigmatask005/database/sigmatask005-default-rtdb/data/~2F
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
