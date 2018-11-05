<template>
    <div>
        <p>{{currencyValue}}</p>
    </div>
</template>

<script>
export default {
    computed:{
        currencyValue(){
            return this.currency + " " + this.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");;
        }
    },
    props:{
        value: Number,
        currency: String
    }
}
</script>

<style>

</style>
