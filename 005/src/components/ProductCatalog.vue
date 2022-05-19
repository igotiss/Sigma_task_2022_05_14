<template>
    Сторінка каталога
    <div class="container">

            <div class="box">
                <div class="card mb-3" style="max-width: 400px;"  :key="product.id" v-for="product in products">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="../assets/noimage.png" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{product.name}}</h5>
                                <p class="card-text">Опис товару: {{product.description}}</p>
                                <p class="card-text"><small class="text-muted">наявність на складі: {{product.amount}}</small></p>
                                <form action="" >
                                    <div class="input-group">
                                        <label class="input-group-text" for="amount">Придбати:</label>
                                        <input type="number"
                                           class="form-control w-25"
                                           id="amount"
                                           name="amount"
                                           value="1"
                                           min="1"
                                           v-bind:max="product.amount">
                                        <input type="submit"
                                           class="btn btn-dark"
                                           name=""
                                           id=""
                                           value="Додати в кошик">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>



</template>

<script>
    let id = 0;
    export default {
        name: "ProductCatalog",
        data () {
            return {
                products: [
                    {id: id++, name: 'Phone', description: 'опис товару телефон', amount: 12, },
                    {id: id++, name: 'TV', description: 'опис товару телевізор', amount: 12, },
                    {id: id++, name: 'Computer', description: 'опис товару комп*ютер', amount: 12, }
                ],
            }
        }
    }
</script>

<style scoped>
    li { list-style-type: none; /* Убираем маркеры */ }

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