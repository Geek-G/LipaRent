<template>
<div class="modal fade" id="vue-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Add House</h4>
      </div>


      <form @submit.prevent="validateBeforeSubmit">
        <div class="modal-body">
            <div class="form-group">
                <label for="name" class="control-label">Property Name</label>
                <div class="">
                    <input v-model="name" v-validate="'required|min:3|max:20'" :class="{'form-control': true, 'has-error': errors.has('name') }" type="text" placeholder="property name" name="name" required autofocus>
                    <i v-show="errors.has('name')" class="fa fa-warning"></i>
                    <span v-show="errors.has('name')" class="help-block has-error">{{ errors.first('name') }}</span>
                </div>
            </div>

            <div class="form-group">
                <label for="type" class=" control-label">Property Type</label>
                <div class="">
                    <select id="type" name="type" class="form-control">
                        <option value="1">1</option>	
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label for="type" class=" control-label">County</label>
                <div class="">
                    <select id="county" name="county" class="form-control">
                        <option value="1">1</option>	
                    </select>
                </div>
			</div>
            
		    <div class="form-group">
		        <label for="description" class=" control-label">Description</label>
                <div class="">
                    <textarea name="description" v-model="description" v-validate="'required|min:8|max:100'" :class="{'form-control': true, 'has-error': errors.has('description') }" type="text" placeholder="enter description" ></textarea> 
                    <i v-show="errors.has('description')" class="fa fa-warning"></i>
                    <span v-show="errors.has('description')" class="help-block has-error">{{ errors.first('description') }}</span>
       
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
        mounted() {
            this.loadCounties();
            this.printCounties();
        },
       data() { return { 
            name:'',
            description:'',
            status:'',
            stuff:[]

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
            this.status='Loading...';
            axios.get('http://liparent.com/api/property')
            .then(function(response){
                console.log(response.data.data[0].name); 
            })
            .catch(function(error){
               console.log(error); 
            })
        },

        printCounties(){
            console.log(this.stuff)
        }
                
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
