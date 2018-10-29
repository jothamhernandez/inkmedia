<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="float-left">Chart of Accounts</h1>
                <button class="btn btn-primary float-right" @click="addAccount"><i class='fa fa-plus'></i> Add a Account</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li v-for="coa_category in coa_categories" :key="coa_category.id">
                        <a :href="'#coa-' + coa_category.id" data-toggle="tab" aria-expanded="false" :class="{'active':activeTab == coa_category}">{{coa_category.category}}</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade" v-for="coa_category in coa_categories" :key="coa_category.id" :id="'coa-' + coa_category.id" :class="{'active show in':activeTab == coa_category}">
                        <h4>{{coa_category.category}}</h4>
                        <div v-for="coa_type in coa_category.coa_types" :key="coa_type.id">
                            <h2 class="inkmedia-header coa-type-header">
                                {{coa_type.type}} - ({{coa_type.accounts.length}})
                            </h2>
                            <div class="account-entries">
                                <span class="small" v-if="coa_type.accounts.length < 1">You haven't added any {{coa_type.type}} accounts yet.</span>
                                <div class="account-entry"  v-for="account in coa_type.accounts" :key="account.id" v-if="coa_type.accounts.length > 0">
                                    <div>
                                        <p style="margin: 0;">{{account.account_name}}</p>
                                    </div>
                                    <div>
                                        <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-link" @click="removeAccount($event, account, coa_type)"><i class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>

                             <div class="add-account-field">
                                <button type="button" class="btn btn-link" @click="addAccount(coa_category, coa_type)" ><i class="fa fa-plus"></i> Add a new Account</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="adminPanel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add an Account</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form">
                            <div class="form-group">
                                <div class="row">
                                    <label for="" class="col-md-4 col-form-label text-right">Account Type</label>
                                    <div class="col-md-8">
                                        <select name="" id="" class="form-control" v-model="accountForm.coa_type" @change="putAccount($event)">
                                            <option :value="option.id" v-for="option in newAccount.optionSelection" :key="option.id">{{newAccount.account.category || option.cat}} - {{option.type}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="" class="col-md-4 col-form-label text-right">Account Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" v-model="accountForm.account_name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="" class="col-md-4 col-form-label text-right">Account ID</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" v-model="accountForm.account_id">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="" class="col-md-4 col-form-label text-right">Description</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" v-model="accountForm.account_description">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" @click="submitAccount">Add Account</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  data() {
    return {
      coa_categories: [],
      activeTab: null,
      newAccount: {
          account: {},
          optionSelection: [],
          category: {}
      },
      accountForm: {
          coa_type: null,
          account_id: null,
          account_name: null,
          account_description: null,
      }
    };
  },
  mounted() {
    axios("/api/v1/coa").then(r => {
      this.coa_categories = r.data;
      this.activeTab = this.coa_categories[0];
    });
    var modal = $('<div class="modal-backdrop show in"></div>');
    $('#adminPanel').on('show.bs.modal', function(){
       $('body').append(modal);
    });

    $('#adminPanel').on('hidden.bs.modal', ()=>{
        console.log(modal);
        this.newAccount.optionSelection = [];
        this.newAccount.category = {};
        this.newAccount.account = {};
        modal.remove();
    })
  },
  methods: {
    addAccount(account, type) {
        if(account){
            this.accountForm.coa_type = account.id;
            this.newAccount.account = account;
            this.newAccount.category = account;
        }

        if(type){
            this.accountForm.coa_type = type.id;
            account.coa_types.map(i=>{
                this.newAccount.optionSelection.push(i);
            });
        } else {
            this.coa_categories.map(e=>{
                e.coa_types.map(d=>{
                    d.cat = e.category;
                    this.newAccount.optionSelection.push(d);
                })
            })
        }
        
        
        setTimeout(function(){
            $('#adminPanel').modal('show');
        }, 500);
    },
    submitAccount(){
        axios.post('/api/v1/coa',this.accountForm).then(r=>{
            console.log(r);
            var coa_type = this.coa_categories[this.coa_categories.indexOf(this.newAccount.category)].coa_types.find(i=>{
                return i.id == r.data.coa_type;
            }).accounts.push(r.data);
            $('#adminPanel').modal('hide');
            console.log(coa_type);
        });
    },
    putAccount(e){
        var coa_type = this.newAccount.optionSelection.find(i=>{
            return i.id == e.target.value;
        });
        // delete coa_type.cat;
        var coa_cat = this.coa_categories.filter(m=>{
            return m.coa_types.includes(coa_type);
        });
        console.log(coa_type);
        this.newAccount.category = coa_cat[0];
    },
    removeAccount(e, item, coa_type){
        let choice =confirm("are you sure you what to remove this product?");

        if(choice){
            axios.delete(`/api/v1/coa/${item.id}`).then(r=>{
                coa_type.accounts.splice(coa_type.accounts.indexOf(item), 1);
            });
        }
    }
  }
};
</script>

<style scoped>
.nav-tabs > li {
  padding: 10px;
}

.tab-content {
  padding: 10px;
}

.coa-type-header {
  background-color: lightgray;
  padding: 5px;
}

.account-entry {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-basis: 100%;
  border-bottom: 1px solid whitesmoke;
}

.account-entry > div {
  flex-shrink: 0;
  flex-grow: 0;
}

.account-entry > div:nth-child(1) {
  flex-basis: 90%;
}
.account-entry > div:nth-last-child() {
  flex-basis: 10%;
}

.modal {
    opacity: 1;
    z-index: 10000;
}

</style>
