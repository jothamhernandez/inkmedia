<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Journals</h1>
            </div>
        </div>
        <div class="row">
            <data-table url="/api/v1/journal" :data="journals" :columns="columns" ></data-table>
        
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            journals: [],
            columns: [
                {
                    title:'Description',
                    mData: function(source){
                        return source;
                    },
                    mRender: function(data){
                        return `<a href="/admin/accounting/journaltransaction/${data.id}" class="btn btn-link">${data.description}</a>`
                    }
                },
                {
                    title: 'Type',
                    mData: 'type'
                },
                {
                    title: 'Date',
                    mData: 'journal_date',
                    mRender: function(data){
                        return `${datefixed(data)}`;
                    }
                },

            ]
        }
    },
    mounted(){
        axios('/api/v1/journal').then(response=>{
            this.journals = response.data;
        });
    }
}
</script>

<style>

</style>
