<template>
    	<div col-md-10>
			<div class="modal fade" id="modal-new">
					<div class="modal-dialog">
						<div class="modal-content">
                            <div class="modal-header">
                                   Title Here
                            </div>
                            
                            <div class="modal-body">
                                    <form @submit.prevent="validateBeforeSubmit">
					<div class="form-group">
						<label for="type" class=" control-label">Property</label>
						<div class="">
						<select id="type" name="type" class="form-control" v-model="new_property.type_id">
						<option v-for="property_type in property_types " :key="property_type.id" v-bind:value="property_type.id">{{property_type.name}}</option>	
						</select>
						</div>
					</div>




					<div class="form-group">
						<label for="type" class=" control-label">County</label>
						<div class="">
						<select id="county" name="county" class="form-control" v-model="new_property.county_id" v-on:change="gettowns">
							<option v-for="county in counties" :key="county.id" v-bind:value="county.id">{{county.name}}</option>	
						</select>
						</div>
					</div>
					
					<div v-if="countyset" class="form-group">
						<label for="type" class=" control-label">Town</label>
						<div class="">
						<input type="text" name="town" id="town" class="form-control" v-model="town_query" v-on:keyup="loadTowns" v-on:blur="getstreets">
						<div class="autocomplete" style="width:300px;">
							<input id="myInput" type="text" name="myCountry" placeholder="Country">
						</div>
						<div v-if="towns.length" class="panel-footer">
							<ul class="list-group" v-show="town_suggestions">
							<li v-for="town in towns" :key="town.id" class="list-group-item" v-on:click="fillTown">{{town.name}} </li>
							</ul>
						</div>
						</div>
					</div>
					
					<div v-if="townset" class="form-group">
						<label for="type" class=" control-label">Street</label>
						<div class="">
						<input type="text" name="street" id="street" class="form-control" v-model="street_query" v-on:keyup="loadStreets" >
						<div v-if="streets.length" class="panel-footer">
							<ul class="list-group" v-if="street_suggestions">
							<li v-for="street in streets" :key="street.id" class="list-group-item">{{street.name}} </li>
							</ul>
						</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="name" class="control-label">Property Name</label>
						<div class="">
						<input v-model="name" v-validate="'required|min:3|max:20'" :class="{'form-control': true, 'has-error': errors.has('name') }" type="text" placeholder="property name" name="name" required autofocus>
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
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}
input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}
input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
}
input[type=submit] {
  background-color: DodgerBlue;
  color: #fff;
}
.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}
.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}
.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9; 
}
.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}

</style>



<script>
    export default {
	props: ['landlord','landlord_property','property_types'],	    
        mounted() {
            this.loadCounties();
	    this.loadPropertyTypes();
        },
       data() { return {
	    new_property:{
		    name:'',
		    type_id:null,
		    location:{
			    county_id:'',
			    town_id:'',
			    street_id:''
		    }
	    },    
            town_query:'',
            countyset:false,
            townset:false,
            counties:[],
            property_types:[],
            towns:[],
            streets:[],
            suggestions:false
       }
       },
       methods: {
	    
	autocomplete(inp, arr) {
	/*the autocomplete function takes two arguments,
	the text field element and an array of possible autocompleted values:*/
	var currentFocus;
	/*execute a function when someone writes in the text field:*/
	inp.addEventListener("input", function(e) {
	var a, b, i, val = this.value;
	/*close any already open lists of autocompleted values*/
	closeAllLists();
	if (!val) { return false;}
	currentFocus = -1;
	/*create a DIV element that will contain the items (values):*/
	a = document.createElement("DIV");
	a.setAttribute("id", this.id + "autocomplete-list");
	a.setAttribute("class", "autocomplete-items");
	/*append the DIV element as a child of the autocomplete container:*/
	this.parentNode.appendChild(a);
	/*for each item in the array...*/
	for (i = 0; i < arr.length; i++) {
		/*check if the item starts with the same letters as the text field value:*/
		if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
		/*create a DIV element for each matching element:*/
		b = document.createElement("DIV");
		/*make the matching letters bold:*/
		b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
		b.innerHTML += arr[i].substr(val.length);
		/*insert a input field that will hold the current array item's value:*/
		b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
		/*execute a function when someone clicks on the item value (DIV element):*/
		b.addEventListener("click", function(e) {
		/*insert the value for the autocomplete text field:*/
		inp.value = this.getElementsByTagName("input")[0].value;
		/*close the list of autocompleted values,
		(or any other open lists of autocompleted values:*/
		closeAllLists();
		});
		a.appendChild(b);
		}
	}
	});
	/*execute a function presses a key on the keyboard:*/
	inp.addEventListener("keydown", function(e) {
	var x = document.getElementById(this.id + "autocomplete-list");
	if (x) x = x.getElementsByTagName("div");
	if (e.keyCode == 40) {
		/*If the arrow DOWN key is pressed,
		increase the currentFocus variable:*/
		currentFocus++;
		/*and and make the current item more visible:*/
		addActive(x);
	} else if (e.keyCode == 38) { //up
		/*If the arrow UP key is pressed,
		decrease the currentFocus variable:*/
		currentFocus--;
		/*and and make the current item more visible:*/
		addActive(x);
	} else if (e.keyCode == 13) {
		/*If the ENTER key is pressed, prevent the form from being submitted,*/
		e.preventDefault();
		if (currentFocus > -1) {
		/*and simulate a click on the "active" item:*/
		if (x) x[currentFocus].click();
		}
	}
	});
	function addActive(x) {
	/*a function to classify an item as "active":*/
	if (!x) return false;
	/*start by removing the "active" class on all items:*/
	removeActive(x);
	if (currentFocus >= x.length) currentFocus = 0;
	if (currentFocus < 0) currentFocus = (x.length - 1);
	/*add class "autocomplete-active":*/
	x[currentFocus].classList.add("autocomplete-active");
	}
	function removeActive(x) {
	/*a function to remove the "active" class from all autocomplete items:*/
	for (var i = 0; i < x.length; i++) {
	x[i].classList.remove("autocomplete-active");
	}
	}
	function closeAllLists(elmnt) {
	/*close all autocomplete lists in the document,
	except the one passed as an argument:*/
	var x = document.getElementsByClassName("autocomplete-items");
	for (var i = 0; i < x.length; i++) {
	if (elmnt != x[i] && elmnt != inp) {
	x[i].parentNode.removeChild(x[i]);
	}
	}
	}
	/*execute a function when someone clicks in the document:*/
	document.addEventListener("click", function (e) {
	closeAllLists(e.target);
	});
	},


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

        loadPropertyTypes(){
            var property_types=this.property_types;
            var hii=this;
            axios.get('http://liparent.com/api/property/type')
            .then((response) => {
                    hii.property_types = response.data;
                    //alert(property_types)
                })
            .catch(function(error){
               console.log(error); 
            }) 
        },

        
        loadTowns(){
            var towns=this.towns;
            var hii=this;
            axios.post('http://liparent.com/api/location/town/search',{query:hii.town_query, county_id:this.new_property.location.county_id})
            .then((response) => {
                    hii.towns = response.data;
                    this.town_suggestions=true;
                    //console.log(response.data )
                })
            .catch(function(error){
               console.log(error); 
            }) 
        },

            loadStreets(){
            var streets=this.streets;
            var hii=this;
            axios.post('http://liparent.com/api/location/street/search',{query:hii.street_query, town_id:this.townid})
            .then((response) => {
                    hii.streets = response.data;
                    hii.street_suggestions=true;
                    //console.log(response.data )
                })
            .catch(function(error){
               console.log(error); 
            }) 
        },


        gettowns(){
            this.countyset=true
	    this.loadTowns();
	    this.autocomplete(document.getElementById("myInput"), this.towns)

        },
        getstreets(){
            this.townset=true
            this.street_suggestions=true
            this.loadStreets();

        },

        fillTown(){
            this.town_query=this.towns[0].name;
            this.town_suggestions=false
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
