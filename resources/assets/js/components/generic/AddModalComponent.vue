<template>
    <div class="modal fade" :id="id" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{form.submitText}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <div class="form">
                       <div class="form-group" v-for="field in form.fields" :key="field.name" v-if="field.required == null || newForm[field.required]">
                           <div class="row">
                               <label for="" class="col-form-label col-md-3 text-right">{{field.name}}</label>
                               <div class="col-md-9" v-if="field.type == 'select'">
                                   <select name="" id="" class="form-control" v-model="newForm[field.model]">
                                       <option :value="options[field.model]" v-for="options in field.options" :key="options.id" v-if="field.options != null">{{options[field.model]}}</option>
                                   </select>
                                </div>
                                <div class="col-md-9" v-if="field.type != 'select'">
                                    {{getValues(field)}}
                                    <input :type="field.type" :placeholder="field.name" class="form-control" v-bind:value="field.value" v-model="newForm[field.model]"  :disabled="field.disabled" >
                                </div>
                           </div>
                       </div>
                   </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" @click="submit">{{form.submitText}}</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    watch:{
        newForm:{
            handler(val){
                this.getValues();
            },
            deep: true
        }
    },
    props:{
        id: String,
        form: {
            url: String,
            fields: Object,
            submitText: String
        }
    },
    data(){
        return {
            newForm:{}
        }
    },
    mounted(){
        $('.modal').on('hidden.bs.modal', ()=>{
            $('body')[0].style =  "";
            this.newForm = {};
        });
    },
    methods: {
        submit(){
            axios.post(this.form.url, this.newForm).then(r=>{
                this.$emit('submit', r.data);
                $("[data-dismiss=modal]").click()
            });
        },
        getValues(field){
            if(field && field.value){
                this.newForm[field.model] = field.value;
            }
        }
    }
}
</script>

<style>

</style>
