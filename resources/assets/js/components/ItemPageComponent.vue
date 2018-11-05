<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="float-left">Item or Products</h1>
                <button class="btn btn-primary float-right" data-toggle="modal" data-target="#product-modal"><i class='fa fa-plus'></i> Add an item</button>
            </div>
        </div>
        <div class="row">
            <data-table url="/api/v1/items" :data="record" :columns="columns" v-on:remove="removeItem"></data-table>
        </div>
        <add-modal id="product-modal" :form="form" v-on:submit="submitForm"></add-modal>
    </div>
</template>

<script>
export default {
    data(){
        return {
            record: [],
            columns: [
                { title: "Product Name", mData: "name" },
                { title: "Price", mData: "price",
                    mRender: function(data){
                        return toCurrency("Php", data || 0);
                    }
                },
                { 
                    title: "Action", mData: 'id',
                    mRender: function(data){
                        return `<button class="btn btn-link" @click="testing"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-link" data-action="remove" data-id="${data}" ><i class="fa fa-trash"></i></button>`
                    }
                },
            ],
            form:{
                submitText: "Add Item or Service",
                url:"/api/v1/items",
                fields:[
                    {
                        name: "Product or Service Name",
                        type: "text",
                        model: 'name'
                    },
                    {
                        name: "Description",
                        type: "email",
                        model: 'description'
                    },
                    {
                        name: "Price",
                        type: "number",
                        model: 'price'
                    },
                    {
                        name: "Sell this",
                        type: "checkbox",
                        model: 'isSellable'
                    },
                    {
                        name: "Income Account",
                        type: "text",
                        model: 'income_account',
                        required: 'isSellable'
                    },
                    {
                        name: "Buy this",
                        type: "checkbox",
                        model: 'isBuyable'
                    },
                    {
                        name: "Expense Account",
                        type: "text",
                        model: 'expense_account',
                        required: 'isBuyable'
                    },
                    {
                        name: "Sales Tax",
                        type: "number",
                        model: 'sales_tax',
                    }
                ]
            },
            dataTable: null
        }
    },
    mounted(){
           
            axios('/api/v1/items').then(r=>{
                this.record = r.data;
            });
        
    },
    methods: {
        submitForm(e){
            this.record.push(e);
        },
        removeItem(e){
            this.record.splice(this.record.indexOf(e), 1);
        }
    }
}
</script>

<style>

</style>
