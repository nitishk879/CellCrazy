<template>
    <a href="" onclick="removeModal(this.modelId)">Remove Model</a>
</template>

<script>
    export default {
        name: "RemoveModel",
        props:{
            modelId:''
        },

        methods:{
            removeModal(){
                axios.post( '/remove-model', this.contact)
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
        }
    }
</script>

<style scoped>

</style>
