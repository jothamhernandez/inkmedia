<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="float-left">Estimates</h1>
                <a href="/admin/sales/estimates/create" class="btn btn-primary float-right"><i class='fa fa-plus'></i> Create an Estimate</a>
            </div>
        </div>
        <div class="row">
            <data-table url="/api/v1/estimates" :data="record" :columns="columns" v-on:remove="removeEstimate" v-on:invoice="convertToInvoice"></data-table>
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
                        return toCurrency("Php", data.items.sum());
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
                            <button class="btn btn-link" @click="testing"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-link" data-action='remove' data-id="${data.id}"><i class="fa fa-trash"></i></button>
                            <button class="btn btn-link" data-action='to-invoice' data-id="${data.id}">convert to invoice</button>
                            `
                        }
                        return ""
                    }
                }
            ]
        }
    },
    mounted(){

        axios('/api/v1/estimates').then(r=>{
            this.record = r.data;
        });
    },
    methods:{
        removeEstimate(e){
            this.record.splice(this.record.indexOf(e), 1);
        },
        convertToInvoice(e){
            e.status = "accepted";
            // this.record.splice(this.record.indexOf(e), 1);
        }
    }
}
</script>

<style>

</style>
