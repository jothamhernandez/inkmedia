<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="float-left">Vendors</h1>
                <button class="btn btn-primary float-right" data-toggle="modal" data-target="#vendor-modal"><i class='fa fa-plus'></i> Add a vendor</button>
            </div>
        </div>
        <div class="row">
            <table id="vendor-table" class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Informatics</td>
                        <td></td>
                        <td></td>
                        <td><button class="btn btn-primary"><i class="fa fa-arrow-down"></i></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <add-modal id="vendor-modal" :form="form" v-on:submit="submitForm"></add-modal>
    </div>
</template>

<script>
export default {
    data(){
        return {
            form:{
                submitText: "Add Vendor",
                url:"/api/v1/vendor",
                fields:[
                    {
                        name: "Vendor Name",
                        type: "text",
                        model: 'vendor_name'
                    },
                    {
                        name: "Email",
                        type: "email",
                        model: 'email'
                    },
                    {
                        name: "First Name",
                        type: "text",
                        model: 'first_name'
                    },
                    {
                        name: "Last Name",
                        type: "text",
                        model: 'last_name'
                    },
                    {
                        name: "Contact No",
                        type: "text",
                        model: 'contact_no'
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
                        url: '/api/v1/vendor',
                        dataSrc: ''
                    },
                    columns:[
                        {
                            data:{vendor_name:'vendor_name', first_name: 'first_name', last_name: 'last_name'},
                            mRender: function(data, type, full){
                                return `<p class="row-header">${data.vendor_name}</p><p class="row-subheader">${data.first_name} ${data.last_name}</p>`;
                            }
                        },
                        {data:'email'},
                        {data:'contact_no'},
                        {
                            data:null,
                            defaultContent: `
                            <button class="btn btn-link" @click="testing"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-link" ><i class="fa fa-trash"></i></button>
                            `
                        }
                    ]
                } 
            );
        });
    },
    methods: {
        submitForm(e){
            this.dataTable.ajax.reload();
        }
    }
}
</script>

<style>
     td {
        vertical-align: middle !important;
    }
    .row-header{
        font-size: 20px;
        margin: 0;
        padding: 0;
    }
    .row-subheader {
        font-size: 15px;
        margin: 0px;
        padding: 0px;
        color: gray;
    }
</style>
