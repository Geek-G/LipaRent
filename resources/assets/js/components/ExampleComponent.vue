<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        {{msg}}
                        <button v-on:click="changeSomething"> Change something </button>
                        <span v-text="msg"></span>
                        <input type="text" v-on:input="cssString=$event.target.value"></span>

                        <input type="text"  v-bind:class="cssString" v-bind:value="cssString"></span>
                        
                        <div class="panel panel-default">
                            <div class="panel-heading">Computed Properties</div>
                            <div class="panel-body">
                                <button v-on:click="increment">Add Click</button>
                                <p>Clicks: {{clicks}}</p>
                                 <p>Counter: {{counter}}</p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">More Stuff</div>

                    <div class="container">
                        <button v-on:click="upvote">
                        Upvote! {{upvotes}}
                        </button>
                        </div>

                    <div class="panel-body">
                        

                    </div>
                </div>
            </div>




            <div class="col-md-6 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Stuff</div>
                    <div class="panel-body">
                         <form>
                            <input type="text" placeholder="type anytything" v-model="typedData"/>
                            {{typedData}}
                            <input type="checkbox" v-model="checked"> {{checked}}
                            <hr/>
                            <input type="checkbox" value="name1" v-model="checkedNames">
                            <input type="checkbox" value="name2" v-model="checkedNames">
                            <input type="checkbox" value="name3" v-model="checkedNames">
                            <input type="checkbox" value="name4" v-model="checkedNames">
                            <p>{{checkedNames}}</p>
                            <hr/>
                            <input type="radio" value="name1" v-model="radioName">
                            <input type="radio" value="name2" v-model="radioName">
                            <input type="radio" value="name3" v-model="radioName">
                            <input type="radio" value="name4" v-model="radioName">
                            <p>{{radioName}}</p>
                            <hr/>
                            <select v-model="selected">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                            <p>{{selected}}</p>
                             <hr/>
                            <select v-model="selectedOpt">
                                <option v-for="option in options" v-bind:value="option.value">{{option.text}}</option>
                            </select>
                            <p>{{selectedOpt}}</p>
                        </form>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">More Stuff</div>

                    <div class="panel-body">
                        

                    </div>
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
           msg:'This is the message',
            typedData:'',
            checked:false,
            cssString:'',
            upvotes: 0,
            clicks:0,
            checkedNames:[],
            radioName:'',
            selected:'',
            options:[
                {text:'one', value:'A'},
                {text:'two', value:'B'},
                {text:'three', value:'C'}
            ],
            selectedOpt:''

       }
       },
       methods: {changeSomething(){ this.msg='new data access' },
                changeSomething(){ this.msg='new data access' },
                increment(){this.clicks=this.clicks+1 },
                upvote: function(){this.upvotes++;}
       },
       computed:{
           counter(){ return this.clicks*2;}
       }
    } 
</script>
