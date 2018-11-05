<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Create Bill</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="estimate_name">Estimate Name</label>
                    <input type="text" class="form-control" placeholder="Bill Name" v-model="form.bill_name">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                
                    <div class="form-group row ">
                        <label for="" class="col-md-12 col-form-label">Vendor</label>
                        <div class="col-md-12">
                            <select name="" id="" class="form-control" v-model="selectedCustomer" @change="setToBill">
                                <option :value="customer" v-for="customer in customers" :key="customer.id">{{customer.vendor_name}}</option>
                            </select>
                        </div>
                    </div>
                
            </div>
            <div class="col-md-4">
                
                    <div class="form-group row">
                        <label for="" class="col-md-12 col-form-label">Date</label>
                        <div class="col-md-12">
                            <input type="date" class="form-control" v-model="form.date_to_issued">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="" class="col-md-12 col-form-label">Expires on</label>
                        <div class="col-md-12">
                            <input type="date" class="form-control" v-model="form.date_to_expire">
                        </div>
                    </div>

            </div>
            <div class="col-md-4">
                    <div class="form-group row">
                        <label for="" class="col-md-12 col-form-label">Subheading</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" v-model="form.subheading">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-12 col-form-label">Footer</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" v-model="form.footer">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-12 col-form-label">Memo</label>
                        <div class="col-md-12">
                            <textarea name="" id="" cols="30" rows="5" class="form-control" v-model="form.memo"></textarea>
                        </div>
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Items</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Tax</th>
                            <th>Ammount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="n in rowNumber" :key="n">
                            <td>
                                <select v-model="form.items[n-1].item" name="" id="" class="form-control" @change="changeItem($event)" :data-id="n">
                                    <option :value="item" v-for="item in items" :key="item.id">{{item.name}}</option>
                                </select>
                            </td>
                            <td>
                                <input v-model="form.items[n-1].description" type="text" class="form-control">
                            </td>
                            <td>
                                <input v-model="form.items[n-1].quantity" type="number" class="form-control" :data-id="n">
                            </td>
                            <td>
                                <input v-model="form.items[n-1].price" type="number" class="form-control" :data-id="n">
                            </td>
                            <td>
                                <input v-model="form.items[n-1].tax" type="number" class="form-control" :data-id="n">
                            </td>
                            <td>
                                {{computeValue(form.items[n-1].quantity,form.items[n-1].price,form.items[n-1].tax)}}
                            </td>
                            <td>
                                <button class="btn btn-link" @click="removeRow(form.items[n-1])"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">
                                <button class="btn btn-link" @click="addLine"><i class="fa fa-plus-circle"></i> Add a line</button>
                            </td>
                            <td colspan="2">
                                <p class="text-right">Sub Total: {{compute('subTotal')}}</p>
                                <p class="text-right" v-if="compute('tax') != 0">Tax: {{compute('tax')}}</p>
                                <p class="text-right">Total: {{ compute() }}</p>
                            </td>
                        </tr>
                        
                    </tfoot>
                </table>
                <div class="col-md-12 text-right">
                    <button class="btn btn-primary" @click="saveEstimates">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            customers: [],
            items: [],
            selectedCustomer: null,
            rowNumber: 1,
            form: {
                bill_name: 'Bill',
                toBill: null,
                date_to_issued: null,
                date_to_expire: null,
                subheading: null,
                footer: null,
                memo: null,
                items: [
                    {
                        item_id:null,
                        description: null,
                        quantity: 1,
                        price: null,
                        tax: null
                    }
                ]
            },
            itemTemplate: {
                item_id:null,
                description: null,
                quantity: 1,
                price: null,
                tax: null
            }
        }
    },
    mounted(){
        axios('/api/v1/vendor').then(r=>{
            this.customers = r.data;
        });

        axios('/api/v1/items?category=buy').then(r=>{
            this.items = r.data;
        })
    },
    methods: {
        addLine(){
            this.form.items.push(clone(this.itemTemplate));
            this.rowNumber++;
        },
        removeRow(item){
            this.form.items.splice(this.form.items.indexOf(item), 1);
            this.rowNumber--;
        },
        changeItem(e){
            this.form.items[$(e.target).data('id')-1].price = this.form.items[$(e.target).data('id')-1].item.price;
            this.form.items[$(e.target).data('id')-1].description = this.form.items[$(e.target).data('id')-1].item.description;
            this.form.items[$(e.target).data('id')-1].tax = this.form.items[$(e.target).data('id')-1].item.sales_tax;
        },
        computeValue(a, b, c){
            return ((parseFloat(a || 0) * parseFloat(b || 0)));
        },
        compute(mode){
            var total = 0;
            if(mode == 'subTotal'){
                this.form.items.map(d=>{
                    total += parseFloat(d.price) * parseFloat(d.quantity);
                });
            } else if(mode == 'tax'){
                this.form.items.map(d=>{
                    total += parseFloat(d.tax || 0);
                });
            } else {
                this.form.items.map(d=>{
                    total += parseFloat(d.tax || 0) + (parseFloat(d.price) * parseFloat(d.quantity));
                });
            }

            return total;
        },
        saveEstimates(){
            axios.post('/api/v1/bills', this.form).then(r=>{
                window.location.href = "/admin/purchases/bills";
            });
        },
        setToBill(){
            this.form.toBill = this.selectedCustomer;
        }
    }
}
</script>

<style scoped>
    textarea {
        resize: none;
    }
</style>
