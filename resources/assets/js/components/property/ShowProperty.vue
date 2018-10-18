<template>
<div class="col-md-8 col-md-offset-2">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-building"></i>

              <h3 class="box-title">{{property.name}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <p class="text-orange"><strong>Type:</strong> {{property.type}}</p>

              <p class="text-green"> <strong> Description: </strong> {{property.description}}</p>

              <p class="text-blue"> <strong> Town: </strong> {{property.town}} </p>

              <p class="text-aqua"><strong> Street:</strong> {{property.street}}</p>

            </div>
            <!-- /.box-body -->


          <div class="box-footer">
            <div class="form-group pull-right">
              <button @click="editProperty" class="btn btn-warning">Edit</button>
            </div>
          </div>  

          </div>
          <!-- /.box -->
        </div>
</template>



<script>
import swal from 'sweetalert'

    export default {
        props: ['property'],
        mounted() {
            
        },
       data() { return { 
          
       }
       },

       methods: {
                editProperty(){
                        swal("Good job!", "You clicked the button!", "success");
                },
       },
       computed:{
           
       },
        components:{
           }
    }
    
</script>
