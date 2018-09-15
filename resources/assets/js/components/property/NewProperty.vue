<template>
    	<div col-md-10>
			<div class="modal fade" id="modal-new">
					<div class="modal-dialog">
						<div class="modal-content">
                            <div class="modal-header">
                                   New Property
                            </div>
                            
                            <div class="modal-body">
                <form autocomplete="off" @submit.prevent="validateBeforeSubmit">
					<div class="form-group">
						<label for="type" class=" control-label">Property</label>
						<div style="width:500px;">
						<select id="type" name="type" class="form-control" v-model="new_property.type_id">
						<option v-for="property_type in property_types " :key="property_type.id" v-bind:value="property_type.id">{{property_type.name}}</option>	
						</select>
						</div>
					</div>




					<div class="form-group">
						<label for="type" class=" control-label">County</label>
						<div style="width:500px;">
						<select id="county" name="county" class="form-control" v-on:change="getTowns" v-model="new_property.location.county_id">
							<option v-for="county in counties" :key="county.id"  v-bind:value="county.id">{{county.name}}</option>	
						</select>
						</div>
					</div>
					
					<div v-if="countyset" class="form-group">
						<label for="type" class=" control-label">Town</label>
						<div class="">
						<div style="width:500px;">
							<input class="form-control"  v-model="town_query"  v-on:input="getStreets"  id="townInput" type="text" name="Town" placeholder="Town">
							<div v-if="towns.length" id="town_results" class="panel-footer">
								<ul class="list-group autocomplete-results"  v-if="towns && town_query">
									<li v-for="town in towns" :key="town.id" class="list-group-item autocomplete-result" v-on:click="setTown(town)">{{town.name}} </li>
								</ul>
						    </div>
						</div>
						</div>
					</div>
					
					<div v-if="townset" class="form-group">
						<label for="type" class=" control-label">Street</label>
						<div class="">
						<div style="width:500px;">
							<input class="form-control"  v-model="street_query" id="streetInput" type="text" name="Street" placeholder="Street">
							<div v-if="streets.length" id="street_results"  class="panel-footer">
								<ul class="list-group autocomplete-results" v-if="streets && street_query">
									<li v-for="street in streets" :key="street.id" class="list-group-item autocomplete-result" v-on:click="setStreet(street)">{{street.name}} </li>
								</ul>
						    </div>
						</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="name" class="control-label">Property Name</label>
						<div class="">
						<input  style="width:500px;" v-model="new_property.name" v-validate="'required|min:3|max:20'" :class="{'form-control': true, 'has-error': errors.has('name') }" type="text" placeholder="property name" name="name" required autofocus>
						<i v-show="errors.has('name')" class="fa fa-warning"></i>
						<span v-show="errors.has('name')" class="help-block has-error">{{ errors.first('name') }}</span>
						</div>
					</div>


					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal"> <span class="fa fa-close"></span>Close</button>
						<button type="submit" class="btn btn-primary">  <span class="fa fa-save"></span> Save</button>
					</div>

            </form>	    
			    </div>
			    <!-- /.modal-body -->
                            

						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
	    </div>	
    
</template>

<style scoped>
.help-block {
    display: block;
}

.has-error{
    color: red;
}
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
	props: ['landlord','landlord_property','property_types'],	    
        mounted() {
        this.loadCounties();
		this.loadPropertyTypes();
		this.new_property.landlord_id=this.landlord.id
        },
       data() { return {
	    new_property:{
		    name:'',
			type_id:null,
			landlord_id:null,
		    location:{
			    county_id:'',
			    town_id:'',
			    street_id:''
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

					alert('Correct them errors!');
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
				postProperty(){
					axios.post('/api/property',this.new_property)
					.then((response) => {
							$('#modal-new').modal('hide');
							this.$emit('propertyAdded',response.data)
						})
					.catch(function(error){
					console.log(error); 
					})
				}              
		},
		watch: {
			town_query: function(val, oldVal) {
				$("#town_results").show();
				_.debounce(this.loadTowns(val,this.new_property.location.county_id), 500)
			},
			
			'new_property.location.county_id': function(val, oldVal) {
				$("#town_results").show();
				this.loadTowns(this.town_query,val)
			},
			street_query: function(val, oldVal) {
				$("#street_results").show();
				_.debounce(this.loadStreets(val,this.new_property.location.town_id), 500)
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
