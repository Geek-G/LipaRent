<template>

<div class="container" style="margin-top:10px">
<div class="row">
<div class="col-md-6-offset-3 text-center">
<form>
    <div class="col-md-6 col-md-offset-3">
    <div class="input-group">
        <span class="input-group-addon">KSh</span>
                <input type="text" name="amount" placeholder="Enter amount" v-model="amount"  v-on:keyup="clearError"  v-validate="'numeric|max_value:100000'" :class="{'form-control': true, 'has-error': errors.has('amount') }">
        <span class="input-group-addon">.00</span>
    </div>
    <span v-show="false" class="has-error alert alert-danger help-block">{{ errors.first('amount') }}</span>
    </div>
</form>
</div>
</div>

<div class="row" style="margin-top:10px">    
<div class="col-md-6-offset-3">
<div class="panel panel-info">
        <div class="panel-heading text-center">
            Pricing Table
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Payment Method</th>
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
                            <td>{{rate}}%</td>
                            <td>{{cost}}</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Credit Card</td>
                            <td>{{amount}}</td> 
                            <td>{{rate}}%</td>
                            <td>{{cost}}</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Paypal</td>
                            <td>{{amount}}</td> 
                            <td>{{rate}}%</td>
                            <td>{{cost}}</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Bank</td>
                            <td>{{amount}}</td> 
                            <td>{{rate}}%</td>
                            <td>{{cost}}</td>
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
