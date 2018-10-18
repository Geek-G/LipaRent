<template>
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <p>{{units}}</p>
      </div>         
    </div>
</template>



<script>
    export default {
        props: ['units'],
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


