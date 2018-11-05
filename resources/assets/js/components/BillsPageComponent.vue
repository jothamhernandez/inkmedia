<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="float-left">Bills</h1>
                <a href="/admin/purchases/bills/create" class="btn btn-primary float-right"><i class='fa fa-plus'></i> Create an Estimate</a>
            </div>
        </div>
        <div class="row">
            <data-table url="/api/v1/bills" :data="record" :columns="columns" v-on:void-bill="convertToVoid" v-on:pay-bill="convertToPaid"></data-table>
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
                    title:'ID',
                    mData:'id'
                },
                {
                    title: "Status",
                    mData: 'status'
                },
                {
                    title: "Date",
                    mData:'date_to_issued'
                },
                {   
                    title:"Vendor",
                    mData:function(source){
                        return source;
                    },
                    mRender:function(data){
                        return data.vendor.vendor_name;
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
                            <button class="btn btn-link" @click="testing" data-toggle="tooltip" data-placement="top" title="make payment" data-id="${data.id}" data-action="pay-bill"><i class="fa fa-money"></i></button>
                            <button class="btn btn-link" data-toggle="tooltip" data-placement="top" title="void" data-id="${data.id}" data-action="void-bill"><i class="fa fa-times"></i></button>
                            `
                        }
                        return ""
                    }
                }
            ]
        }
    },
    mounted(){

        axios('/api/v1/bills').then(r=>{
            this.record = r.data;
        });
    },
    methods:{
        convertToVoid(e){
            e.status = "void";
            // this.record.splice(this.record.indexOf(e), 1);
        },
        convertToPaid(e){
            e.status = "paid";
            // this.record.splice(this.record.indexOf(e), 1);
        }
    }
}
</script>

<style>

</style>
