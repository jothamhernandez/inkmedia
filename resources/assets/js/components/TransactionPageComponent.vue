<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="float-left">Transactions</h1>
                <a href="" class="btn btn-primary float-right m-1">Add Expense</a>
                <a href="" class="btn btn-primary float-right m-1">Add Income</a>
                <a class="btn btn-primary float-right m-1" href="/admin/accounting/transaction/add-journal"><i class='fa fa-plus'></i> Add Journal Trasaction</a>
            </div>
        </div>
        <div class="row">
            <data-table url="/api/v1/invoice" :data="transactions" :columns="columns" v-on:pay-invoice="payInvoice" v-on:cancel-invoice="cancelInvoice"></data-table>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            transactions:[],
            columns: [
                {
                    title: "Id",
                    mData: 'id'
                },
                {
                    title: "Date",
                    mData: 'created_at',
                    mRender: function(data){
                        console.log(data);
                        return datefixed(data);
                    }
                },
                {
                    title: "Details",
                    mData: function(source){
                        return source;
                    },
                    mRender: function(data){
                        return `<div">
                            <h5>${data.description}</h5>
                            <p class="small">${data.account}</p>
                        </div>`;
                    }
                },  
                {
                    title: "Price",
                    mData: function(source){
                        return source;
                    },
                    mRender: function(data){
                        return toCurrency("Php", data.price);
                    }
                }, 
                {
                    title: "Entry",
                    mData: function(source){
                        return source;
                    },
                    mRender: function(data){
                        return (data.entry == 'debit') ? "Deposit":"Withdrawal";
                    }
                }, 
                {
                    title: "Description",
                    mData: function(source){
                        return source;
                    },
                    mRender: function(data){
                        return `
                        <div">
                            <p>${data.description}</p>
                        </div>
                        `;
                    }
                }, 
            ]
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
