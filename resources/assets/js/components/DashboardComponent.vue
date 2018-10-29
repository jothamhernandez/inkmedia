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
    mounted(){

        $(document).ready(function(){
            Morris.Line({
            // ID of the element in which to draw the chart.
                element: 'cashflow',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: [
                    { year: '2008', value: 20 },
                    { year: '2009', value: 10 },
                    { year: '2010', value: 5 },
                    { year: '2011', value: 5 },
                    { year: '2012', value: 20 }
                ],
                // The name of the data record attribute that contains x-values.
                xkey: 'year',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['value'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Value']
            });

            Morris.Bar({
                element: 'profitloss',
                data: [
                {device: 'iPhone', geekbench: 136},
                {device: 'iPhone 3G', geekbench: 137},
                {device: 'iPhone 3GS', geekbench: 275},
                {device: 'iPhone 4', geekbench: 380},
                {device: 'iPhone 4S', geekbench: 655},
                {device: 'iPhone 5', geekbench: 1571}
                ],
                xkey: 'device',
                ykeys: ['geekbench'],
                labels: ['Geekbench'],
                barRatio: 0.4,
                xLabelAngle: 35,
                hideHover: 'auto'
            });
        })
        
    }
}
</script>

<style>

</style>
