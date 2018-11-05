<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="float-left">Transactions</h1>
                <a href="" class="btn btn-primary float-right m-1" data-toggle="modal" data-target="#transaction-modal" @click="addExpense">Add Expense</a>
                <a href="" class="btn btn-primary float-right m-1" data-toggle="modal" data-target="#transaction-modal" @click="addIncome">Add Income</a>
                <a class="btn btn-primary float-right m-1" href="/admin/accounting/transaction/add-journal"><i class='fa fa-plus'></i> Add Journal Trasaction</a>
            </div>
        </div>
        <div class="row">
            <data-table url="/api/v1/invoice" :data="transactions" :columns="columns"></data-table>
        </div>
        <div class="row">
            <add-modal id="transaction-modal" :form="form" v-on:submit="addTransaction"></add-modal>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            form: {
                url:'/api/v1/transactions',
                submitText: null,
                fields:[
                    {
                        name:'Accounts',
                        type:'select',
                        options: [

                        ],
                        model: 'account_name'
                    },
                    {
                        name:'Description',
                        type:'text',
                        model: 'description'
                    },
                    {
                        name:'Price',
                        type:'number',
                        model: 'price'
                    },
                    {
                        name:'Entry',
                        type: 'text',
                        model: 'entry',
                        value: null,
                        disabled: true
                    }

                ]
            },
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
        });
        axios('/api/v1/coa').then(r=>{
            let data = r.data;
           
            data.forEach((d)=>{
                
                d.coa_types.forEach((e)=>{
                    
                    e.accounts.forEach((f)=>{
                        this.form.fields[0].options.push(f);
                    });
                });
            });
        });
    },
    methods:{
        addExpense(){
            this.form.submitText = "Add Expense";
            this.form.fields[this.form.fields.length - 1].value = "credit";
        },
        addIncome(){
            this.form.submitText = "Add Income";
            console.log(this.form.fields[this.form.fields.length - 1].name);
            console.log(this.form.fields[this.form.fields.length - 1].value);
            this.form.fields[this.form.fields.length - 1].value = "debit";
        },
        addTransaction(e){
            console.log(e);
            this.transactions.push(e);
        }
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
