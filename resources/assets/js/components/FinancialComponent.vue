<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Financial Report</h1>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Fiscal Year</label>
                    <select v-model="fiscal" name="" id="" class="form-control" @change="getFinancialReport">
                        <option :value="fiscal" v-for="fiscal in fiscaldata" :key="fiscal.id">{{fiscal.fiscal_year}}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" v-if="fiscal">
                <h1>Starting Balance</h1>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Balance</td>
                            <td class="text-right"><currency currency="Php" :value="fiscal.starting_balance"></currency></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div v-for="(value, key) in report" :key="key" class="col-md-12">
                <h1>{{getEntry(key)}}</h1>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Accounts</th>
                                <th class="text-right">Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value2, key2) in value" :key="key2">
                                <td>{{key2}}</td>
                                <td class="text-right">{{compute(value2)}}<currency currency="Php" :value="getTotal(value2)"></currency></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12" v-if="finance.debit">
                <h1>Ending Balance</h1>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Balance</td>
                            <td class="text-right"><currency currency="Php" :value="fiscal.starting_balance + finance.debit - finance.credit"></currency></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            fiscal: null,
            report:[],
            fiscaldata:[],
            finance: {}
        }
    },
    mounted(){
        axios('/api/v1/fiscaldata').then(response=>{
            this.fiscaldata = response.data;
        });
    },
    methods:{
        getFinancialReport(){
            
            axios(`/api/v1/report/financial?fy=${this.fiscal.fiscal_year}`).then(response=>{
                this.finance = {};
                this.report = response.data;
            });
        },
        getTotal(array){
            let total = 0;
            array.forEach(data=>{
                total += data.price;
            });

            return total;
        },
        getEntry(e){
            return (e == "credit") ? "Expense" : "Income";
        },
        compute(array){
            array.forEach(data=>{
                if(this.finance[`${data.entry}`] == null){
                    this.finance[`${data.entry}`] = 0;
                }
                this.finance[`${data.entry}`] += parseFloat(data.price);
            });
        }
    }
}
</script>

<style>

</style>
