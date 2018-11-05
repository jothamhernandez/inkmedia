<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="float-left">Invoices</h1>
                <!-- <a href="/admin/sales/estimates/create" class="btn btn-primary float-right"><i class='fa fa-plus'></i> Create an Estimate</a> -->
            </div>
        </div>
        <div class="row">
            <data-table url="/api/v1/invoice" :data="record" :columns="columns" v-on:pay-invoice="payInvoice" v-on:cancel-invoice="cancelInvoice"></data-table>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            record:[],
            columns: [
                {
                    title: "Status",
                    mData: 'status'
                },
                {
                    title: "Date",
                    mData:'date_to_issued'
                },
                {
                    title:'id',
                    mData:'id'
                },
                {   
                    title:"Customer",
                    mData:function(source){
                        return source;
                    },
                    mRender:function(data){
                        return data.customer.name;
                    }
                },
                {
                    title: "Price",
                    mData: {
                        items: 'items',
                    },
                    mRender: function(data){
                        
                        return toCurrency("Php", JSON.parse(data.items).sum());
                    }
                },
                {
                    title: "Actions",
                    mData: function(source){
                        return source;
                    },
                    mRender: function(data){

                        if(data.status == 'saved'){
                        return `
                            <button class="btn btn-link" data-toggle="tooltip" data-placement="top" title="pay" data-action="pay-invoice" data-id="${data.id}"><i class="fa fa-money"></i></button>
                            <button class="btn btn-link"  data-toggle="tooltip" data-placement="top" title="cancel" data-action='cancel-invoice' data-id="${data.id}"><i class="fa fa-times" label="cancel"></i></button>
                            `;
                        }
                        return ""
                    }
                }
            ]
        }
    },
    mounted(){
        axios('/api/v1/invoice').then(r=>{
            this.record = r.data;

        });
        
        
    },
    methods: {
        payInvoice(r){
            r.status = "paid";
        },
        cancelInvoice(r){
            r.status = "cancelled";
        }
    }
}
</script>

<style>

</style>
