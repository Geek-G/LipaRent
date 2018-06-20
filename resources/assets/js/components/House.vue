<template>
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Add House</h4>
      </div>
      <form @submit.prevent="validateBeforeSubmit">
        <div class="modal-body">
           
           <div class="form-group">
                <label for="property" class=" control-label">Property</label>
                <div class="">
                    <select id="property" name="property" class="form-control">
                       <option v-for="property_type in property_types " :key="property_type.id" v-bind:value="property_type.id">{{property_type.name}}</option>	
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="type" class=" control-label">Type</label>
                <div class="">
                    <select id="type" name="type" class="form-control" v-model="countyid" v-on:change="gettowns">
                        <option v-for="county in counties" :key="county.id" v-bind:value="county.id">{{county.name}}</option>	
                    </select>
                </div>
            </div>
            
		    <div class="form-group">
		        <label for="price" class="control-label">Price</label>
                    <div class="">
                        <div class="form-group input-group  ">
                            <span class="input-group-addon">KSh</span>
                            <input id="price" type="text" class="form-control" name="price" required autofocus>
                            <span class="input-group-addon">.00</span>
                        </div>
                            <span class="help-block">
                                <strong>error</strong>
                            </span>
                    </div>
            </div>
                         
            
		    <div class="form-group">
		        <label for="name" class="control-label">Name</label>
                    <div class="">
                            <input id="name" type="text" class="form-control" name="name" required autofocus>
                            <span class="help-block">
                                <strong>error</strong>
                            </span>
                    </div>
            </div>

        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</template>                

<style scoped>
.help-block {
    display: block;
}

.has-error{
    color: red;
}

</style>



<script>
    export default {
        props: ['properties', 'housetypes'],
        mounted() {
            this.loadCounties();
            this.loadHouseTypes();
        },
       data() { return { 
            town_query:''
       }
       },
       methods: {
        validateBeforeSubmit() {
            this.$validator.validateAll().then((result) => {
            if (result) {
            // eslint-disable-next-line
            alert('Form Submitted!');
            return;
            }

            alert('Correct them errors!');
        });
        },
        loadCounties(){
            var counties=this.counties;
            var hii=this;
            axios.get('http://liparent.com/api/location/county')
            .then((response) => {
                    hii.counties = response.data;
                    //console.log(hii.counties)
                })
            .catch(function(error){
               console.log(error); 
            })
        },
        loadHouseTypes(){
            console.log(this.properties)
        },
        
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
