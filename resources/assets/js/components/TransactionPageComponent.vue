<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="float-left">Transactions</h1>
                <button class="btn btn-primary float-right" data-toggle="modal" data-target="#product-modal"><i class='fa fa-plus'></i> Add an item</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="transactions">
                    <div class="transaction" v-for="transaction in transactions" :key="transaction.id">
                        <div style="flex-basis: 20%; flex-shrink: 0;">
                            <p>{{transaction.created_at}}</p>
                        </div>
                        <div style="flex-basis: 30%; flex-shrink: 0;">
                            <h4>{{transaction.description}}</h4>
                            <p class="small">{{transaction.account}}</p>
                        </div>
                        <div style="flex-basis: 20%; flex-shrink: 0;">
                            <p>{{transaction.price}}</p>
                        </div>
                        <div style="flex-basis: 30%; flex-shrink: 0;">
                            <p>{{transaction.description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            transactions:[]
        }
    },
    mounted(){
        axios('/api/v1/transactions').then(r=>{
            this.transactions = r.data;
        })
    }
}
</script>

<style scoped>
.transaction {
    display:flex;
    border-bottom: solid 2px whitesmoke;
    justify-content: center;
    align-items: center;
    min-width: 100%;
}
</style>
