<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="float-left">Fiscal Year Data</h1>
                <button class="btn btn-primary float-right" data-toggle="modal" data-target="#fiscal-modal"><i class='fa fa-plus'></i> Add a Fiscal Year</button>
            </div>
        </div>
        <div class="row">
            <data-table url="/api/v1/fiscaldata" :data="fiscaldata" :columns="columns" v-on:remove="removeItem"></data-table>
        </div>
        <div class="row">
            <add-modal id="fiscal-modal" :form="form" v-on:submit="addFiscalRecord"></add-modal>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            form: {
                url:'/api/v1/fiscaldata',
                submitText: "Add Fiscal Year",
                fields:[
                    {
                        name:'Fiscal Year',
                        type:'number',
                        model: 'fiscal_year'
                    },
                    {
                        name:'Start Date',
                        type:'date',
                        model: 'start_date'
                    },
                    {
                        name:'End Date',
                        type:'date',
                        model: 'end_date'
                    },
                    {
                        name:'Starting Balance',
                        type: 'number',
                        model: 'starting_balance'
                    }

                ]
            },
            fiscaldata: [],
            columns:[
                
                {
                    title: "Fiscal Year",
                    mData: 'fiscal_year'
                },
                {
                    title: "Starting Date",
                    mData: 'start_date',
                    mRender: function(data){
                        return datefixed(data);
                    }
                },
                {
                    title: "Ending Date",
                    mData: 'end_date',
                    mRender: function(data){
                        return datefixed(data);
                    }
                },
                {
                    title: "Starting Balance",
                    mData: 'starting_balance',
                    mRender: function(data){
                        return toCurrency('Php', data);
                    }
                },
                {
                    title: "Actions",
                    mData: function(data){
                        return data;
                    },
                    mRender: function(data){
                         return `
                            <button class="btn btn-link"  data-toggle="tooltip" data-placement="top" title="remove" data-action='remove' data-id="${data.id}"><i class="fa fa-times" label="cancel"></i></button>
                            `;
                    }
                }

            ]
        }
    },
    mounted(){
        axios('/api/v1/fiscaldata').then(response=>{
            this.fiscaldata = response.data;
        })
    },
    methods: {
        addFiscalRecord(e){
            console.log(e);
            this.fiscaldata.push(e);
        },
        removeItem(e){
            this.fiscaldata.splice(this.fiscaldata.indexOf(e), 1);
        }
    }
}
</script>

<style>

</style>
