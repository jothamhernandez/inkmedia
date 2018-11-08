<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="float-left">Dashboard</h1>
                <button class="btn btn-primary float-right"><i class='fa fa-plus'></i> Create a new</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="floating-card col-md-12">
                    <h2 class="inkmedia-header">Things you can do</h2>
                    <div class="col-md-12">
                        <button class="btn btn-link clearfix">Add Customer</button>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-link clearfix">Add Vendor</button>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-link clearfix">Customize your invoice</button>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-7">
                <div class="col-md-12" v-if="fiscaldata != null">
                    <h3>Fiscal Year: {{fiscaldata.fiscal_year}}</h3>
                    <h5>Starting Date: <date-component :date="fiscaldata.start_date"></date-component> </h5>
                    <h5>End Date: <date-component :date="fiscaldata.end_date"></date-component> </h5>
                    <h5>Starting Balance: <currency currency="Php" :value="fiscaldata.starting_balance"></currency></h5>
                </div>
                <div class="floating-card col-md-12 clearfix">
                    <h2 class="inkmedia-header">Cash Flow</h2>
                    <div class="clearfix">
                        <p class="float-left">Cash coming in and going out of your business</p>
                        <button class="btn btn-link float-right">View Report</button>
                    </div>
                    <div class="graph-placeholder">
                        <div id="cashflow"></div>
                    </div>
                    
                </div>
                <div class="floating-card col-md-12 clearfix">
                    <h2 class="inkmedia-header">Profit &amp; Loss</h2>
                    <div class="clearfix">
                        <p class="float-left">Income and expenses only (includes unpaid invoices and bills).</p>
                        <button class="btn btn-link float-right">View Report</button>
                    </div>
                    <div class="graph-placeholder">
                        <!-- insert graph for profit and loss -->
                        <div id="profitloss"></div>
                    </div>
                </div>

                <div class="floating-card col-md-12 clearfix">
                    <h2 class="inkmedia-header">Payable &amp; Owing</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th colspan="2">Invoice payable to you</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>sample</td>
                                        <td>sample</td>
                                    </tr>
                                    <tr>
                                        <td>sample</td>
                                        <td>sample</td>
                                    </tr>
                                    <tr>
                                        <td>sample</td>
                                        <td>sample</td>
                                    </tr>
                                    <tr>
                                        <td>sample</td>
                                        <td>sample</td>
                                    </tr>
                                    <tr>
                                        <td>sample</td>
                                        <td>sample</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Bills you owe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>sample</td>
                                        <td>sample</td>
                                    </tr>
                                    <tr>
                                        <td>sample</td>
                                        <td>sample</td>
                                    </tr>
                                    <tr>
                                        <td>sample</td>
                                        <td>sample</td>
                                    </tr>
                                    <tr>
                                        <td>sample</td>
                                        <td>sample</td>
                                    </tr>
                                    <tr>
                                        <td>sample</td>
                                        <td>sample</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:'admin-dashboard',
    data(){
        return {
            fiscaldata: null
        }
    },
    mounted(){

        $(document).ready(()=>{

            axios.get('/api/v1/fiscaldata').then(response=>{
                this.fiscaldata = response.data[0];
            });
            
            axios.get('/api/v1/report?mode=cashflow&term=monthly').then(r=>{
                Morris.Line({
                // ID of the element in which to draw the chart.
                    element: 'cashflow',
                    // Chart data records -- each entry in this array corresponds to a point on
                    // the chart.
                    data: r.data,
                    // The name of the data record attribute that contains x-values.
                    xkey: 'Period',
                    // A list of names of data record attributes that contain y-values.
                    ykeys: ['Total'],
                    // Labels for the ykeys -- will be displayed when you hover over the
                    // chart.
                    labels: ['Value']
                });

            });

            axios.get('/api/v1/report?mode=pnl').then(r=>{
                 Morris.Bar({
                    element: 'profitloss',
                    data: r.data,
                    xkey: 'Month',
                    ykeys: ['Debit','Credit'],
                    labels: ['Debit','Credit'],
                    barColors: ['#00a918','#cb0000'],
                    barRatio: 0.4,
                    xLabelAngle: 35,
                    hideHover: 'auto'
                });
            })
        })
        
    }
}
</script>

<style>

</style>
