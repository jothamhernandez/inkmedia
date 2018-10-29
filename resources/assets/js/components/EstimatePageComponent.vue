<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="float-left">Estimates</h1>
                <a href="/admin/sales/estimates/create" class="btn btn-primary float-right"><i class='fa fa-plus'></i> Create an Estimate</a>
            </div>
        </div>
        <div class="row">
            <table id="vendor-table" class="table">
                <thead>
                    <tr>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Number</th>
                        <th>Customer</th>
                        <th>Amount</th>
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
    </div>
</template>

<script>
export default {
    mounted(){

        Array.prototype.sum = function(){
            let total = 0;
            this.forEach(e=>{
                total += (e.price * e.quantity) + e.tax;
            });
            return total;
        }

        $(document).ready(()=>{
            this.dataTable = $('#vendor-table').DataTable(
                {
                    ajax: {
                        url: '/api/v1/estimates',
                        dataSrc: ''
                    },
                    columns:[
                        {data: 'status'},
                        {data:'date_to_issued'},
                        {data:'id'},
                        {
                            data:{
                                customer: 'customer'
                            },
                            mRender:function(data){
                                return data.customer.name;
                            }
                        },
                        {
                            data: {
                                items: 'items',
                            },
                            mRender: function(data){
                                return data.items.sum();
                            }
                        },
                        {
                            data: {
                                id: 'id'
                            },
                            defaultContent: `
                                <button class="btn btn-link" @click="testing"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-link" data-action='remove'><i class="fa fa-trash"></i></button>
                            `,
                            mRender: function(data){
                                return `
                                    <button class="btn btn-link" @click="testing"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-link" data-action='remove' data-id="${data.id}"><i class="fa fa-trash"></i></button>
                                    <button class="btn btn-link" data-action='to-invoice' data-id="${data.id}">convert to invoice</button>
                                    `
                            }
                        }
                    ]
                } 
            );

            this.dataTable.on( 'draw', (e) =>{
                $('[data-action=remove]').on('click', this.removeEstimate)
            });
        });
    },
    methods:{
        removeEstimate(e){
            console.log($(e.target).data())
            let choice =confirm("are you sure you what to remove this record?");

            if(choice){
                axios.delete(`/api/v1/estimates/${$(e.target).data('id')}`).then(r=>{
                    this.dataTable.ajax.reload();
                })
            }
            
        }
    }
}
</script>

<style>

</style>
