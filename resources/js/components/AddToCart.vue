<template>
    <div class="pro-details-cart btn-hover">
        <a @click="addItem" v-model="cart" :data-id="item.slug" :data-key="category.id" class="add-it-now">
            <i class="ti-shopping-cart"></i>
            <span>ADD TO CART {{ inCartItem }}</span>
        </a>
    </div>
</template>

<script>
    export default {
        name: "AddToCart",
        props:{
            item:'',
            category:''
        },
        data(){
            return{
                cart:{
                    slug:'',
                    category:'',
                },
                inCartItem:null,
                errors:[]
            }
        },
        created () {
            axios.get('categories/'+this.cart.category+'/'+this.cart.slug)
                .then(response => (this.inCartItem = response.data.bpi)).catch(({response}) => this.inCartItem = response)
        },
        methods:{
            addItem(){
                axios.get('/add-to-cart', this.cart)
                    .then(({ data })=> this.itemAdded())
                    .catch(({response}) => this.setError(response))
            },
            itemAdded(){
                this.inCartItem = true;
            },
            setError(response){
                this.errors = response.error;
            },
        }
    }
</script>

<style scoped>

</style>
