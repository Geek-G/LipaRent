<template>
    	<div class="col-xs-12">
			<div class="modal fade" id="modal-new">
					<div class="modal-dialog">
						<div class="modal-content row">
                            <div class="modal-header">
                                   New Property
                            </div>
                            
                            <div class="modal-body">
                <form autocomplete="off" >
					

					<div :class="{'form-group': true,'col-xs-10': true,'col-xs-offset-1': true,'has-error': backend_errors.name }">
						<label for="name" class="control-label">Property Name</label>
						<div>
						<input  v-model="new_property.name" v-validate="'required|min:2|max:20'" :class="{'form-control': true, 'has-error': errors.has('name') }" type="text" placeholder="property name" name="name" required autofocus>
						<span v-if="errors.has('name')" class="help-block"> <i class="fa fa-warning"></i><small>{{errors.first('name') }}</small></span>
						<span v-if="backend_errors.name" class="help-block"> <i class="fa fa-warning"></i><small>{{print_backend_errors() }}</small></span>
						</div>
					</div>


					<div :class="{'form-group': true,'col-xs-10': true ,'col-xs-offset-1': true, 'has-error': backend_errors.type }">
						<label for="type" class=" control-label">Property</label>
						<div>
						<select  v-validate="'required'" id="type" name="type" class="form-control" v-model="new_property.type_id">
						<option v-for="property_type in property_types " :key="property_type.id" v-bind:value="property_type.id">{{property_type.name}}</option>	
						</select>
						<span v-show="errors.has('type')" class="help-block"> <i class="fa fa-warning"></i> <small>{{ errors.first('type') }}</small></span>
						</div>
					</div>




					<div :class="{'form-group': true,'col-xs-10': true ,'col-xs-offset-1': true,'has-error': backend_errors.county }">
						<label for="type" class=" control-label">County</label>
						<div>
						<select v-validate="'required'" id="county" name="county" class="form-control" v-on:change="getTowns" v-model="new_property.location.county_id">
							<option v-for="county in counties" :key="county.id"  v-bind:value="county.id">{{county.name}}</option>	
						</select>
						<span v-show="errors.has('county')" class="help-block"> <i class="fa fa-warning"></i> <small>{{ errors.first('county') }}</small></span>
						</div>
					</div>
					
					<div v-if="countyset" :class="{'form-group': true,'col-xs-10': true ,'col-xs-offset-1': true, 'has-error': backend_errors.town }">
						<label for="type" class=" control-label">Town</label>
						<div class="">
						<div>
							<input v-validate="'required|max:20'" class="form-control"  v-model="town_query"  v-on:input="getStreets"  id="townInput" type="text" name="Town" placeholder="Town">
							<span v-show="errors.has('Town')" class="help-block"> <i class="fa fa-warning"></i> <small>{{ errors.first('Town') }}</small></span>
							<div v-if="towns.length" id="town_results" class="panel-footer">
								<ul class="list-group autocomplete-results"  v-if="towns && town_query">
									<li v-for="town in towns" :key="town.id" class="list-group-item autocomplete-result" v-on:click="setTown(town)">{{town.name}} </li>
								</ul>
						    </div>
						</div>
						</div>
					</div>
					
					
					<div v-if="townset" :class="{'form-group': true,'col-xs-10': true ,'col-xs-offset-1': true,'has-error': backend_errors.street }">
						<label for="type" class=" control-label">Street</label>
						<div class="">
						<div>
							<input v-validate="'required|max:20'" class="form-control"  v-model="street_query" id="streetInput" type="text" name="Street" placeholder="Street">
							<span v-show="errors.has('Street')" class="help-block"> <i class="fa fa-warning"></i> <small>{{ errors.first('Street') }}</small></span>
							<div v-if="streets.length" id="street_results"  class="panel-footer">
								<ul class="list-group autocomplete-results" v-if="streets && street_query">
									<li v-for="street in streets" :key="street.id" class="list-group-item autocomplete-result" v-on:click="setStreet(street)">{{street.name}} </li>
								</ul>
						    </div>
						</div>
						</div>
					</div>
					
					<div  :class="{'form-group': true,'col-xs-10': true ,'col-xs-offset-1': true, 'has-error': backend_errors.description}" rows="3" placeholder="Short details ...">
						<label>Description</label>
						<textarea v-model="new_property.description" class="form-control" placeholder="Short description here.."></textarea>
					</div>

            </form>	    
			    </div>
				<!-- /.modal-body -->
				

					<div class="col-xs-10">
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal"> <span class="fa fa-close"></span>Close</button>
						<button @click="validateBeforeSubmit"  class="btn btn-primary">  <span class="fa fa-save"></span> Save</button>
					</div>
					</div>

						</div>
						<!-- /.modal-content -->
				
					</div>
					<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
	    </div>	
    
</template>

<style scoped>
.autocomplete {
    position: relative;
	margin:0;
	padding: 0;
    width: 130px;
  }

  .autocomplete-results {
    padding: 0;
	position: relative;
    margin: 0;
    border: 1px solid #eeeeee;
    height: 100px;
    overflow: auto;
  }

  .autocomplete-result {
    list-style: none;
    text-align: left;
    padding: 4px 2px;
    cursor: pointer;
  }

  .autocomplete-result:hover {
    background-color: #4AAE9B;
    color: white;
  }
</style>


<script>
    export default {
	props: ['landlord','property_types'],	    
        mounted() {
        this.loadCounties();
		this.loadPropertyTypes();
		this.new_property.landlord_id=this.landlord.id
        },
       data() { return {
	    new_property:{
			name:'',
			description:'',
			type_id:null,
			landlord_id:null,
		    location:{
			    county_id:'',
			    town_id:'',
			    street_id:''
			},
			new_location:{
			    town_name:'',
			    street_name:''
		    }
	    },    
			town_query:'',
			street_query:'',
            countyset:false,
            townset:false,
            counties:[],
            property_types:[],
			towns:[],
			streets:[],
			backend_errors:[]
       }
       },
       methods: {
	    
				validateBeforeSubmit() {
					this.$validator.validateAll().then((result) => {
					if (result) {
					// eslint-disable-next-line
					this.postProperty()
					//alert('Form Submitted!');
					return;
					}

					swal("Correct Errors!", "Make sure all form fields are correct", "warning");
				});
				},
				loadCounties(){
					var counties=this.counties;
					var hii=this;
					axios.get('/api/location/county')
					.then((response) => {
							hii.counties = response.data;
							//console.log(hii.counties)
						})
					.catch(function(error){
					console.log(error); 
					})
				},

				loadPropertyTypes(){
					var property_types=this.property_types;
					var hii=this;
					axios.get('/api/property/type')
					.then((response) => {
							hii.property_types = response.data;
							//alert(property_types)
						})
					.catch(function(error){
					console.log(error); 
					}) 
				},

				loadTowns(q,i){
					var hii=this;
					axios.post('/api/location/town/search',{query:q, county_id:i})
					.then((response) => {
							hii.towns = response.data;
						})
					.catch(function(error){
					console.log(error); 
					}) 
				},

				getTowns(){
					this.countyset=true;
					this.loadTowns(this.town_query,this.new_property.location.county_id)
				},

				setTown(town){
					this.new_property.location.town_id=town.id
					this.town_query=town.name
					//$("#townInput").val(town.name);
					$("#town_results").hide();
					this.townset=true;
				},

				loadStreets(q,i){
					var streets=this.streets;
					var hii=this;
					axios.post('/api/location/street/search',{query:q, town_id:i})
					.then((response) => {
							hii.streets = response.data;
						})
					.catch(function(error){
					console.log(error); 
					}) 
				},
				getStreets(){
					this.townset=true;
					this.new_property.location.town_id=null;
					this.loadStreets(this.street_query,this.new_property.location.town_id)
				},

				setStreet(street){
					this.street_query=street.name
					$("#streetInput").val(street.name);
					this.new_property.location.street_id=street.id
					$("#street_results").hide();
				},
				clearForm(){
					this.new_property={
						name:'',
						description:'',
						type_id:null,
						landlord_id:null,
						new_town:'',
						new_street:'',
						location:{
							county_id:'',
							town_id:'',
							street_id:''
					}   }
					this.street_query=''
					this.town_query=''	
					this.backend_errors=[]
				},
				postProperty(){
					$('#modal-new').modal('hide')
					this.new_property.landlord_id=this.landlord.id
					this.new_property.new_location.town_name=this.town_query
					this.new_property.new_location.street_name=this.street_query
					axios.post('/api/property',this.new_property)
					.catch((error)=>{
						console.log(error);
						//swal(" Server Error!", "warning");
						if (error.response.status == 422) {
								this.backend_errors=error.response.data.errors
								swal("Validation Error!", JSON.stringify(this.backend_errors), "warning");
								return
							} 
						else if (error.response.status == 500) {
								//this.backend_errors=error.response.data
								swal("Internal Server Error!", "warning");
								return
							} 
						else   {
								swal("Unknown Error!", "warning");
								return
							} 		
					})
					.then((response) => {
							//$('#modal-new').modal('hide');
						if(response.status==201){
							this.$emit('propertyAdded',response.data);
						}	
					})
					.then(() => { 
						this.clearForm()
						this.$nextTick().then(() => {
						this.$validator.reset()
						//this.errors.clear();
						})
					})	
				},
				print_backend_errors(){
					return this.backend_errors.name[0]
				}              
		},
		watch: {
			town_query: function(val, oldVal) {
				$("#town_results").show();
				_.debounce(this.loadTowns(val,this.new_property.location.county_id), 2000)
			},
			
			'new_property.location.county_id': function(val, oldVal) {
				$("#town_results").show();
				this.loadTowns(this.town_query,val)
			},
			street_query: function(val, oldVal) {
				$("#street_results").show();
				_.debounce(this.loadStreets(val,this.new_property.location.town_id), 2000)
			},
			
			'new_property.location.town_id': function(val, oldVal) {
				$("#street_results").show();
				this.loadStreets(this.street_query,val)
			}
		},
        filters:{
           uppercase: function(value){
               return value.toUpperCase();
           }
       }
    } 
</script>
