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
                <label for="type" class=" control-label">Property</label>
                <div class="">
                    <select id="type" name="type" class="form-control">
                       <option v-for="property_type in property_types " :key="property_type.id" v-bind:value="property_type.id">{{property_type.name}}</option>	
                    </select>
                </div>
            </div>




            <div class="form-group">
                <label for="type" class=" control-label">County</label>
                <div class="">
                    <select id="county" name="county" class="form-control" v-model="countyid" v-on:change="gettowns">
                        <option v-for="county in counties" :key="county.id" v-bind:value="county.id">{{county.name}}</option>	
                    </select>
                </div>
            </div>
            
            <div v-if="countyset" class="form-group">
                <label for="type" class=" control-label">Town</label>
                <div class="">
                    <input type="text" name="town" id="town" class="form-control" v-model="town_query" v-on:keyup="loadTowns" v-on:blur="getstreets">
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
            this.loadPropertyTypes();
        },
       data() { return { 
            town_query:'',
            countyset:false,
            townset:false,
            countyid:null,
            townid:null,
            counties:[],
            property_types:[],
            towns:[],
            streets:[],
            suggestions:false
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
            axios.post('http://liparent.com/api/location/town/search',{query:hii.town_query, county_id:this.countyid})
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
