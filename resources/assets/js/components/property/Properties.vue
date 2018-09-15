<template>

    <div class="row">
      <div class="col-xs-12">
            <div class="form-group">
					<a class="btn btn-primary" data-toggle="modal" data-target="#modal-new"> New </a>
            </div>
            
		    <div v-show="false" class="alert alert-success alert-dismissable">
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

                        <!-- /.box.house -->
                        <div v-for="property in the_landlord_properties" :key="property.key" class="box box-solid">
                            <div class="box-body text-left">
                                <div>
                                    <div> <h4>{{property.name}}</h4></div>
                                    <div><p><span class="fa fa-folder">  </span>{{property.type}}</p></div>
                                    <div><p><span class="fa fa-location-arrow">   </span>{{property.town}}</p></div>
                                    <div><p><span class="fa fa-building">    </span>{{property.description}}</p></div>                                  
                                </div>    
                                 <div class="pull-right">
                                    <button class="btn btn-warning" @click="editProperty">Edit</button>
                                    <button class="btn btn-danger" @click="deleteProperty">Delete</button>
                                </div>
                            </div>
                            <!-- /.box.house-body -->
                        </div>
                         <!-- /.box.house -->     
                    </div>
                    <!-- /.box-body -->    
                    <new-property  v-on:propertyAdded="pushProperty(data)" :landlord="landlord" :landlord_property="landlord_property" :property_types="property_types"></new-property>
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
            session_status:''
       }
       },

       methods: {
                clearError(){
                     if(this.fields.amount.valid==false) this.amount='' 
                     },
                editProperty(){
                        swal("Good job!", "You clicked the button!", "success");
                },
                pushProperty(data){
                        //this.landlord_properties.push(data);
                        Vue.set(this.the_landlord_properties, this.the_landlord_properties.length, data);
                        this.$forceUpdate();
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
           the_landlord_properties(){ return this.landlord_properties }
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
