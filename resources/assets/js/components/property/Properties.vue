<template>
    <div class="row">
      <div class="col-xs-12">
            <div class="form-group">
					<a class="btn btn-primary" data-toggle="modal" data-target="#modal-default"> New </a>
                    <a class="btn btn-primary" data-toggle="modal" data-target="#vue-modal"> New Modal </a>
            </div>
            
		    <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert"
                aria-hidden="true">
                &times;
                </button>
                {{session_status}}
            </div>
            
            <div class="box">
                    <div class="box-header">
                      <h3 class="box-title"> {{landlord_user_name}} Properties </h3>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    
                    <div class="box-body  no-padding">
                            
                    </div>
                    <!-- /.box-body -->    
            </div>
      </div>         
</template>


<script>


    export default {
        mounted() {
            console.log('Component mounted.')
        },
       data() { return { 
            amount:''
       }
       },
       methods: {
                clearError() { if(this.fields.amount.valid==false) this.amount='' },
                
       },
       computed:{
           rate(){  if(this.amount<=100)return 0; else return 1 },
           cost(){ return this.amount*this.rate/100 }
       },
       filters:{
           uppercase: function(value){
               return value.toUpperCase();
           }
       }
    } 
</script>
