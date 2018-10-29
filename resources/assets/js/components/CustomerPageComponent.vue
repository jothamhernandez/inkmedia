<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="float-left">Customers</h1>
                <button class="btn btn-primary float-right" data-toggle="modal" data-target="#customer-modal"><i class='fa fa-plus'></i> Add a customer</button>
            </div>
        </div>
        <div class="row">
            <table id="customer-table" class="table">
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
                        <td>Name</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Action</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <add-modal id="customer-modal" :form="form" v-on:submit="submitForm"></add-modal>
    </div>
</template>

<script>
export default {
    data(){
        return {
            form:{
                submitText: "Add Customer",
                url:"/api/v1/customer",
                fields:[
                    {
                        name: "Name",
                        type: "text",
                        model: 'name'
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
            this.dataTable = $('#customer-table').DataTable(
                {
                    ajax: {
                        url: '/api/v1/customer',
                        dataSrc: ''
                    },
                    columns:[
                        {
                            data:{name:'name', first_name: 'first_name', last_name: 'last_name'},
                            mRender: function(data, type, full){
                                return `<p class="row-header">${data.name}</p><p class="row-subheader">${data.first_name} ${data.last_name}</p>`;
                            }
                        },
                        {data:'email'},
                        {data:'contact_no'},
                        {
                            data:{id:'id'},
                            mRender: function(data){
                                return `
                                    <button class="btn btn-link" @click="testing"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-link" data-action="remove" data-id="${data.id}"><i class="fa fa-trash"></i></button>
                                    `
                            }
                        }
                    ]
                } 
            );
            this.dataTable.on( 'draw', (e) =>{
                $('[data-action=remove]').on('click', this.removeCustomer)
            });
        });

        

        
       
    },
    methods:{
        submitForm(e){
            this.dataTable.ajax.reload();
        },
        removeCustomer(e){
            console.log($(e.target).data())
            let choice =confirm("are you sure you what to remove this customer?");

            if(choice){
                axios.delete(`/api/v1/customer/${$(e.target).data('id')}`).then(r=>{
                    this.dataTable.ajax.reload();
                })
            }
        }
    }
}
</script>

<style  >
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
