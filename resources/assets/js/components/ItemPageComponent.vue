<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="float-left">Item or Products</h1>
                <button class="btn btn-primary float-right" data-toggle="modal" data-target="#product-modal"><i class='fa fa-plus'></i> Add an item</button>
            </div>
        </div>
        <div class="row">
            <table id="vendor-table" class="table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <add-modal id="product-modal" :form="form" v-on:submit="submitForm"></add-modal>
    </div>
</template>

<script>
export default {
    data(){
        return {
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
                        model: 'sales_tax'
                    }
                ]
            },
            dataTable: null
        }
    },
    mounted(){

        $(document).ready(()=>{
            this.dataTable = $('#vendor-table').DataTable(
                {
                    ajax: {
                        url: '/api/v1/items',
                        dataSrc: ''
                    },
                    columns:[
                        {
                            data:'name'
                        },
                        {data:'price'},
                        {
                            data:{id:'id'},
                            mRender: function(data){
                                return `<button class="btn btn-link" @click="testing"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-link" data-action="remove" data-id="${data.id}" ><i class="fa fa-trash"></i></button>
                            `;
                            }
                        }
                    ]
                } 
            );
            this.dataTable.on('draw', (e)=>{
                $('[data-action=remove]').on('click', this.removeItem)
            });
        });
    },
    methods: {
        submitForm(e){
            this.dataTable.ajax.reload();
        },
        removeItem(e){
            let choice =confirm("are you sure you what to remove this product?");

            if(choice){
                axios.delete(`/api/v1/items/${$(e.target).data('id')}`).then(r=>{
                    this.dataTable.ajax.reload();
                });
            }
        }
    }
}
</script>

<style>

</style>
