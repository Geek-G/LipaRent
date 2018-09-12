<template>

    <div class="row">
      <div class="col-xs-12">
            <div class="form-group">
					<a class="btn btn-primary" data-toggle="modal" data-target="#modal-new"> New </a>
            </div>
            
		    <div v-show="{has_session}" class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert"
                aria-hidden="true">
                &times;
                </button>
                {{session_status}}
            </div>
            
            <div class="box mb-1">
                    <div class="box-header mb-1">
                      <h3 class="box-title ">{{landlord.name}}'s Properties </h3>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    
                    <div class="box-body mb-1">

                    <table class="table table-hover table-striped">
					<tbody>
					   <tr>
                            <th>Property Name</th>
                            <th>Property Town</th>
                            <th>Property Type</th>
                            <th>Property Description</th>
                            <th>Modify Property</th>
					  </tr>
					  <tr  v-for="property in landlord_properties" :key="property.key">
                            <td>{{property.name}}</td>
                            <td>{{property.town}}</td>
                            <td>{{property.type}}</td>
                            <td>{{property.description}}</td>
                            <td>
                                <button class="btn btn-warning" @click="editProperty">Edit</button>
                                <button class="btn btn-danger" @click="deleteProperty">Delete</button>
                            </td>
					  </tr>
                    </tbody>
                    </table>
                            
                    </div>
                    <!-- /.box-body -->    
                    <new-property :landlord="landlord" :landlord_property="landlord_property" :property_types="property_types"></new-property>
            </div>
      </div>         

</template>


<script>
import swal from 'sweetalert'
import NewProperty from './NewProperty'

    export default {
        props: ['landlord_properties','landlord','property_types'],
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
            session_status:'the message'
       }
       },

       methods: {
                clearError(){
                     if(this.fields.amount.valid==false) this.amount='' 
                     },
                editProperty(){
                        swal("Good job!", "You clicked the button!", "success");
                },
                deleteProperty(){
                        swal({
                                title: "Are you sure?",
                                text: "Once deleted, you will not be able to recover this imaginary file!",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                                })
                                .then((willDelete) => {
                                if (willDelete) {
                                    swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                    });
                                } else {
                                    swal("Your imaginary file is safe!");
                                }
                            });
                }      
                
       },
       computed:{
           rate(){  if(this.amount<=100)return 0; else return 1 },
           cost(){ return this.amount*this.rate/100 }
       },
       filters:{
           uppercase: function(value){
               return value.toUpperCase();
           },
        components:{
            'new-property': NewProperty
           }
       }
    } 
</script>
