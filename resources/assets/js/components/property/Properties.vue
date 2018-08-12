<template>
    <div class="row">
      <div class="col-xs-12">
            <div class="form-group">
					<a class="btn btn-primary" data-toggle="modal" data-target="#modal-default"> New </a>
                    <a class="btn btn-primary" data-toggle="modal" data-target="#vue-modal"> New Modal </a>
            </div>
            
		    <div v-show="{has_session}" class="alert alert-success alert-dismissable">
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
                    
                    <div class="box-body">

                    <table class="table table-hover table-bordered ">
					<tbody>
					   <tr>
                            <th>Property Name</th>
                            <th>Property Town</th>
                            <th>Property Description</th>
                            <th>Property Houses</th>
                            <th>Modify Property</th>
					  </tr>
					  <tr>
                            <td>{{landlord_properties}}</td>
					  </tr>
                    </tbody>
                    </table>
                            
                    </div>
                    <!-- /.box-body -->    
            </div>
      </div>         
</template>


<script>


    export default {
        props: ['landlord_properties'],
        mounted() {
            console.log('Component mounted.')
        },
       data() { return { 
           house:{
               name:'',
               price:'',
               property_id:'',
               housetype_id:''
           },
            has_session:true,
            session_status:'the message',
            landlord_user_name:'Name'
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
