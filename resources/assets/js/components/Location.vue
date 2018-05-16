<template>
<div class="modal fade" id="vue-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Add House</h4>
      </div>


      <form>
        <div class="modal-body">
            <div class="form-group">
                <label for="name" class="control-label">Property Name</label>
                <div class="">
                    <input id="name" type="text" class="form-control" name="name" required autofocus>
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
                    <textarea name="description" id="desc"  class="form-control"></textarea>        
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
