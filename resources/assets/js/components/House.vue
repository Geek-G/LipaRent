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
                    <select id="property" name="property" class="form-control" v-model="house.property_id" v-validate="'required'">
                       <option v-for="property in properties " :key="property.key" v-bind:value="property.id">{{property.name}}</option>	
                    </select>
                    <span class="help-block"  v-show="errors.has('property') " :class="{'has-error': errors.has('property') }">
                        <strong>{{ errors.first('property')}}</strong>
                    </span>
                </div>
            </div>

            <div class="form-group">
                <label for="type" class=" control-label">Type</label>
                <div class="">
                    <select id="type" name="type" class="form-control" v-model="house.housetype_id" v-validate="'required'" >
                        <option v-for="housetype in housetypes" :key="housetype.key" v-bind:value="housetype.id">{{housetype.name}}</option>	
                    </select>
                    <span class="help-block"  v-show="errors.has('type') " :class="{'has-error': errors.has('type') }">
                        <strong>{{ errors.first('type')}}</strong>
                    </span>
                </div>
            </div>
            
		    <div class="form-group">
		        <label for="price" class="control-label">Price</label>
                    <div class="">
                        <div class="form-group input-group  ">
                            <span class="input-group-addon">KSh</span>
                            <input id="price" type="text"  name="price" v-validate="'numeric|max_value:1000000|min_value:100'" :class="{'form-control': true, 'has-error': errors.has('price') }" required autofocus v-model="house.price">
                            <span class="input-group-addon">.00</span>
                        </div>
                            <span class="help-block" v-show="errors.has('price') " :class="{'has-error': errors.has('price') }">
                                <strong>{{ errors.first('price')}}</strong>
                            </span>
                    </div>
            </div>
                         
            
		    <div class="form-group">
		        <label for="name" class="control-label">Name</label>
                    <div class="">
                            <input id="name" type="text" v-validate="'required|max:10|min:1'" :class="{'form-control': true, 'has-error': errors.has('name') }" name="name" required autofocus v-model="house.name">
                            <span v-show="errors.has('name') " :class="{'help-block': true, 'has-error': errors.has('name'), 'help-block': true }">
                                <strong>{{ errors.first('name')}}</strong>
                            </span>
                    </div>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Multiple Units</label>
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
        
        },
       data() { return { 
           house:{
               name:'',
               price:'',
               property_id:'',
               housetype_id:''
           },
            show_modal:true
       }
       },
       methods: {
        validateBeforeSubmit() {
            this.$validator.validateAll().then((result) => {
            if (result) {
            this.postHouse();
            this.closeModal();
            return;
            }

            alert('Correct them errors!');
        });
        },
        postHouse(){
            var vm= this
            axios.post('/api/newhouse',vm.house)
            .then((response) => {
                    alert('house added')
                })
            .catch(function(error){
               console.log(error); 
            })
        },
        closeModal(){
            $('#modal-default').modal('hide');
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


