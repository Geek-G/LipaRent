<template>
<div class="col-md-8 col-md-offset-2">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-text-width"></i>

              <h3 class="box-title">{{property.name}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <p class="lead">{{property.type}}</p>

              <p class="text-green">{{property.description}}</p>

              <p class="text-aqua">{{property.town}}</p>

              <p class="text-aqua">Street: {{property.street}}</p>

            </div>
            <!-- /.box-body -->
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
                }   
                
       },
       computed:{
           
       },
        components:{
           }
    }
    
</script>
