<template>
    <form class="contact-form-style" @submit.prevent="onSubmit" method="post">
        <div class="alert alert-success alert-dismissible fade show" role="alert" v-if="saved">
            <strong>Congratulation!</strong> Your product has been added in the process. Our Expert will contact you back as soon as possible.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-3">
                <input id="name" :class="{'is-invalid': errors.name}" class="form-control" placeholder="Name *" v-model="sell.name" type="text" name="name" required/>
                <div v-if="errors.name" class="font-weight-bold invalid-feedback">{{ errors.name[0] }}</div>
            </div>
            <div class="col-lg-6 mb-3">
                <input name="email" :class="{'is-invalid': errors.email}" class="form-control" placeholder="Email*" v-model="sell.email" type="email"  required/>
                <div v-if="errors.email" class="font-weight-bold invalid-feedback">{{ errors.email[0] }}</div>
            </div>
            <div class="col-lg-6 mb-3">
                <input name="phone" :class="{'is-invalid': errors.phone}" class="form-control" placeholder="Phone*" v-model="sell.phone" type="text" required/>
                <div v-if="errors.phone" class="font-weight-bold invalid-feedback">{{ errors.phone[0] }}</div>
            </div>
            <div class="col-lg-6 mb-3">
                <input name="model_number" :class="{'is-invalid': errors.model}" class="form-control" placeholder="Model Number*" v-model="sell.model_number" type="text" required/>
                <div v-if="errors.model_number" class="font-weight-bold invalid-feedback">{{ errors.model_number[0] }}</div>
            </div>
            <div class="col-lg-12">
                <textarea name="message" placeholder="Details" v-model="sell.message"></textarea>
                <button class="submit" type="submit">Submit</button>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        name: "SellMacComponent",
        data(){
            return{
                errors:[],
                saved:false,
                sell:{
                    name:'',
                    email:'',
                    phone:'',
                    model_number:'',
                    message:'',
                }

            }
        },
        methods:{
            onSubmit(){
                this.saved = false;
                axios.post( '/sell-mac', this.sell)
                    .then(({data}) => this.setSuccessMessage())
                    .catch(({response}) => this.setErrors(response));
            },
            setSuccessMessage(){
                this.resetForm();
                this.saved = true;
            },

            setErrors(response){
                this.errors = response.data.errors;
            },
            resetForm() {
                this.errors = [];
                this.sell = {name: null, email: null, phone: null, model_number: null, message: null};
            }
        }
    }
</script>

<style scoped>

</style>
