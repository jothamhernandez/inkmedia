<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Add Journal Transaction</h1>
            </div>
            <div class="col-md-12">
                <div class="form">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Journal Title</label>
                                <input type="text" class="form-control" v-model="form.description">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Journal Date</label>
                                <input type="date" class="form-control" v-model="form.journal_date">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Journal type</label>
                                <select name="" id="" class="form-control" v-model="form.type">
                                    <option value="purchase">Purchase</option>
                                    <option value="sales">Sales</option>
                                    <option value="cash receipts">Cash Receipts</option>
                                    <option value="cash payment/disbursement">Cash Payment/Disbursement</option>
                                    <option value="purchase return"> Purchase Return</option>
                                    <option value="sales return">Sales Return</option>
                                    <option value="general">General</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-success" @click="addDebit">Add Debit</button>
                            <button class="btn btn-danger" @click="addCredit">Add Credit</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Account</th>
                                        <th>Account Code</th>
                                        <th>Description</th>
                                        <th>Entry</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="transaction in form.transactions" :key="transaction.id" v-if="form.transactions">
                                        <th>
                                            <select name="" id="" v-model="transaction.account" @change="getAccountDetails(transaction)" class="form-control">
                                                <option :value="account.account_name" v-for="account in accounts" :key="account.id">{{account.account_name}}</option>
                                            </select>
                                        </th>
                                        <th>
                                            <input type="text" class="form-control" disabled v-model="transaction.account_code">    
                                        </th>
                                        <th>
                                            <input type="text" class="form-control" v-model="transaction.description" placeholder="description">
                                        </th>
                                        <th><button class="btn btn-sm" :class="{'btn-success': transaction.entry == 'debit', 'btn-danger': transaction.entry == 'credit'}">{{transaction.entry}}</button></th>
                                        <th>
                                            <input type="text" class="form-control" placeholder="price" v-model="transaction.price">
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 text-center">
                           <currency :value="totalDebit" currency="Php"></currency>
                        </div>
                        <div class="col-md-4 text-center">
                            <p>{{(totalDebit != totalCredit) ? "Unbalanced" : "Balanced"}}</p>
                            <button class="btn btn-primary" @click="saveJournal">Save</button>
                        </div>
                        <div class="col-md-4 text-center">
                            <currency :value="totalCredit" currency="Php"></currency>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    watch:{
        form:{
            handler(val){
                this.totalCredit = 0;
                this.totalDebit = 0;
                val.transactions.forEach(e=>{
                    console.log(e);
                    if(e.entry == 'credit'){
                        this.totalCredit += parseFloat(e.price) || 0;
                    }
                    if(e.entry == 'debit'){
                        this.totalDebit += parseFloat(e.price) || 0;
                    }
                });
            },
            deep: true
        }
    },
    data(){
        return {
            totalDebit:0,
            totalCredit:0,
            accounts:[],
            form:{
                description:"",
                type:null,
                journal_date: null,
                transactions: []
            },
            transaction: {
                account:null,
                account_code: null,
                description: null,
                entry:null,
                price: null,
                status: 'approved'
            },
            index: 1,
        }
    },
    mounted(){
        axios('/api/v1/coa').then(r=>{
            let data = r.data;
           
            data.forEach((d)=>{
                d.coa_types.forEach((e)=>{
                    e.accounts.forEach((f)=>{
                        this.accounts.push(f);
                        console.log(f);
                    });
                });
            });
        });

        if(window.data != null){
            this.form = window.data;
        }
    },
    methods:{
        addDebit(){
            var data = clone(this.transaction);
            data.id = this.index;
            data.entry = "debit";
            this.form.transactions.push(data);
            this.index++;
        },
        addCredit(){
            var data = clone(this.transaction);
            data.id = this.index;
            data.entry = 'credit';
            this.form.transactions.push(data);
            this.index++;
        },
        getAccountDetails(transaction){
            transaction.account_code = this.accounts.find(e=>{
                return e.account_name == transaction.account;
            }).account_id;
        },
        saveJournal(){
            if(window.data){
                axios.put(`/api/v1/journal/${window.data.id}`, this.form).then(response=>{
                    // window.location.href = "/admin/accounting/journaltransaction"
                });
            } else {
                axios.post('/api/v1/journal', this.form).then(response=>{
                    window.location.href = "/admin/accounting/journaltransaction"
                });
            }
            
        }
    }
}
</script>

<style>

</style>
