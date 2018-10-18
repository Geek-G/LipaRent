<template>

    <div class="row">
      <div class="col-md-10 col-md-offset-1">
            <div class="form-group">
					<a class="btn btn-primary" data-toggle="modal" data-target="#modal-new"> New </a>
            </div>
            

            <div class="box mb-1">
                    <div class="box-header mb-1">
                      <h3 class="box-title ">{{landlord.name}}'s Properties </h3>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div v-show="the_landlord_properties.length<1" class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">
                        &times;
                        </button>
                        You do not have any proprties yet
                    </div>
                    
                    <div class="box-body mb-1">

                        <!-- /.box.house -->
                        <div v-for="(aproperty,index) in the_landlord_properties" :key="aproperty.key" class="box box-solid">
                            <div class="box-body text-left">
                                <div>
                                    <a href="/house"><div> <h4>{{aproperty.name}}</h4></div></a>
                                    <div><p><span class="fa fa-folder">  </span>{{aproperty.type}}</p></div>
                                    <div><p><span class="fa fa-location-arrow">   </span>{{aproperty.town}}</p></div>
                                    <div><p><span class="fa fa-building">    </span>{{aproperty.description}}</p></div>                                  
                                </div>    
                                 <div class="pull-right">
                                    <a  v-bind:href="'/property/'+aproperty.id" class="btn btn-default">Show</a>
                                    <a  @click="deleteProperty(aproperty,index)" class="btn btn-danger">Delete</a>
                                    
                                </div>
                            </div>
                            <!-- /.box.house-body -->
                        </div>
                         <!-- /.box.house -->     
                    </div>
                    <!-- /.box-body -->    
                    <new-property  v-on:propertyAdded="pushProperty($event)" :landlord="landlord" :property_types="property_types"></new-property>
            </div>
      </div>         

</template>


<script>
import swal from 'sweetalert'
import NewProperty from './NewProperty'

    export default {
        props: ['landlord_properties','landlord','property_types'],
        mounted() {
            
        },
       data() { return { 
           house:{
               name:'',
               price:'',
               property_id:'',
               housetype_id:''
           },
            has_session:true,
            session_status:'',
            the_landlord_properties:this.landlord_properties,
            showProperty:[],
       }
       },

       methods: {

                pushProperty(event){
                        //this.the_landlord_properties.push(event);
                        this.the_landlord_properties.splice(0, 0, event);
                        swal("Good job!", JSON.stringify(event.name)+" has been added!", "success");
                        //this.set(this.landlord_properties, this.landlord_properties.length, data);
                        //this.$forceUpdate();
                },
                deleteProperty(aproperty,index){
                        swal({
                            title: "Are you sure?",
                            text: "Once deleted, you will not be able to recover this property!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                            })
                            .then((willDelete) => {
                            if (willDelete) {
                                      axios.delete('/api/property/'+aproperty.id)
                                      .then((response) => {
                                      swal( JSON.stringify(response.data.name)+" has been deleted!", {
                                      icon: "success",
                                      });
                                      this.the_landlord_properties.splice(index,1)
                                      })
                                      .catch(function(error){
                                      console.log(error);
                                      swal("Error! Property Not deleted!","warning"); 
                                      }) 
                            } else {
                                swal("Property Safe!");
                            }
                            });
                }                   
       },
       computed:{
           
       },
        components:{
            'new-property': NewProperty
           }
       }
    
</script>
