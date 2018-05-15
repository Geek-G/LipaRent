<template>

<div class="container" style="margin-top:10px">
<div class="row">
<div class="col-md-6-offset-3 text-center">
<form>
<input type="text" placeholder="Enter amount" v-model="amount" v-on:keypress.enter="amountDone" v-on:input="amount=$event.target.value">
</form>
</div>
</div>

<div class="row" style="margin-top:10px">    
<div class="col-md-6-offset-3">
<div class="panel panel-info">
        <div class="panel-heading">
            Pricing Table
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Payment Type</th>
                            <th>Amount</th>
                            <th>% charge</th>
                            <th>Cost</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>M-Pesa</td>
                            <td>{{amount}}</td> 
                            <td>1%</td>
                            <td>434</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>M-Pesa</td>
                            <td>{{amount}}</td> 
                            <td>1%</td>
                            <td>434</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>M-Pesa</td>
                            <td>{{amount}}</td> 
                            <td>1%</td>
                            <td>434</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>M-Pesa</td>
                            <td>{{amount}}</td> 
                            <td>1%</td>
                            <td>434</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
</div>    
</div>
</div>
    
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
                amountDone(event){alert('enter hit')}
       },
       computed:{
           counter(){ return this.clicks*2;}
       },
       filters:{
           uppercase: function(value){
               return value.toUpperCase();
           }
       }
    } 
</script>
