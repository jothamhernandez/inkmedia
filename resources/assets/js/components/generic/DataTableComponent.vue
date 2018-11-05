<template>
    <table id="tables" class="table"></table>
</template>

<script>
export default {
    name: 'datatable',
    props: {

        // REST URL
        url: String,
        // DATA OF THE TABLE
        data: Array,
        // COLUMN CONFIGURATION OF THE TABLE
        columns: Array
    },

    // Valores default del componente
    data(){
        return{
            
        }
    },
    
    watch: {
      data: {
        handler: function(val, oldVal) {
          this.DataTable.fnClearTable();
          if(val.length > 0){
            this.DataTable.fnAddData(val);
            $('[data-action=remove]').on('click', this.removeItem);
            $('[data-action=to-invoice').on('click', this.convertToInvioce);
            $('[data-action=pay-invoice').on('click', this.payInvoice);
            $('[data-action=cancel-invoice').on('click', this.cancelInvoice);

            $('[data-action=pay-bill').on('click', this.payBill);
            $('[data-action=void-bill').on('click', this.voidBill);
            $('#tables [data-toggle="tooltip"]').tooltip()
          }
          
        },
        deep: true
      }
    },    
    
    mounted: function() {
       
       $(document).ready(()=>{
            this.DataTable = $('#tables').dataTable({
                data: this.data,
                columns: this.columns
            }); 
            
       })
    },
    methods:{
        removeItem(e){
            let choice =confirm("are you sure you what to remove this record?");
            if(choice){
                axios.delete(this.url+`/${$(e.target).data('id')}`).then(r=>{
                    this.$emit("remove", this.data.find(f=>{
                        return f.id == $(e.target).data('id');
                    }));
                });
            }
        },
        convertToInvioce(e){
            let choice =confirm("are you sure this estimate is ready for invoice?");
            if(choice){
                axios.put(this.url+`/${$(e.target).data('id')}`).then(r=>{
                    this.$emit("invoice", this.data.find(f=>{
                        return f.id == $(e.target).data('id');
                    }));
                });
            }
        },
        payInvoice(e){
            let choice =confirm("change the status to paid?");
            if(choice){
                axios.put(this.url+`/${$(e.target).data('id')}?status=paid`).then(r=>{
                    this.$emit("pay-invoice", this.data.find(f=>{
                        return f.id == $(e.target).data('id');
                    }));
                });
            }
        },
        cancelInvoice(e){
             let choice =confirm("change the status to canceled?");
            if(choice){
                axios.put(this.url+`/${$(e.target).data('id')}?status=canceled`).then(r=>{
                    this.$emit("cancel-invoice", this.data.find(f=>{
                        return f.id == $(e.target).data('id');
                    }));
                });
            }
        },
        payBill(e){
            let choice =confirm("change the status to paid?");
            if(choice){
                axios.put(this.url+`/${$(e.target).data('id')}?status=paid`).then(r=>{
                    this.$emit("pay-bill", this.data.find(f=>{
                        return f.id == $(e.target).data('id');
                    }));
                });
            }
        },
        voidBill(e){
              let choice =confirm("change the status to void?");
            if(choice){
                axios.put(this.url+`/${$(e.target).data('id')}?status=void`).then(r=>{
                    this.$emit("void-bill", this.data.find(f=>{
                        return f.id == $(e.target).data('id');
                    }));
                });
            }
        }
    }
}
</script>

<style>
    .tooltip {
        opacity: 1 !important;
    }
</style>
