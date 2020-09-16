<template>
    <form class="col-md-12">
        <div class="row justify-content-between">
            <h5 class="col-md-4 col-lg-3 align-self-center mr-3">Memory</h5>
            <div class="col-md-9 col-lg-9 media-body">
                <div class="radio-toolbar d-flex">
                    <div class="mr-1" v-for="memory in memories">
                        <input type="radio" v-model="itemVariables.m" v-on:change="setItems($event)" v-bind:value="memory.id">
                        <label :for="memory.slug">{{ memory.name }}</label>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        name: "PriceChanger",
        props:{
            item:'',
            memories:[],
            conditions:[],
            colors:[],
            models:[],
            category:'',
        },
        data(){
            return{
                checkedTrue: '',
                getModelMemory: '',
                itemVariables:{
                    i:'',
                    s:'',
                    m:'',
                    c:'',
                    l:''
                }
            }
        },
        methods:{
            setItems(e){
                this.itemVariables = {
                    i: e.target.dataset.id, s:e.target.dataset.key, m:e.target.value
                }
                console.log(this.itemVariables);
            },
            // getPrice(){
            //     axios.get('/brand-new-price', this.itemVariables)
            //         .then(({ data })=> this.changePrice())
            //         .catch(({ response }) => this.unChangedPrice(response))
            // },
            // changePrice(){
            //     //modelPrice
            // },
            // unChangedPrice(response){},
        }
    }
</script>

<style scoped>

</style>
