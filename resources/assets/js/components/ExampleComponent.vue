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
                    <div class="panel-heading">Input Binding</div>
                    <div class="panel-body">
                         <form>
                            <input type="text" placeholder="type anytything" v-model="typedData"/>
                            {{typedData | uppercase}}
                            <input type="checkbox" v-model="checked" v-on:keypress.enter="enterIsHit(event)"> {{checked}}
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
                    <div class="panel-heading">Animation </div>
                    <div class="panel-body">
                        <button v-on:click="show=!show">Toggle show</button>
                         <transition name="slide-fade">
                        <div v-if="show" class="togg">
                            <p>This is the toggle paragraph</p>
                        </div>
                        </transition>

                        <animation name="bounce">
                        <div v-if="show" class="togg">
                            <p>This is the toggle paragraph</p>
                        </div>
                        </animation>
                       
                        

                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<style>
.togg{
    background:coral;
    color:blue;
    padding: 5px;

}
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
/* Enter and leave animations can use different */
/* durations and timing functions.              */
.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}

.bounce-enter-active {
  animation: bounce-in .5s;
}
.bounce-leave-active {
  animation: bounce-in .5s reverse;
}
@keyframes bounce-in {
  0% {
    transform: scale(0);
  }
  50% {
    transform: scale(1.5);
  }
  100% {
    transform: scale(1);
  }
}

</style>

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
            selectedOpt:'',
            show:true

       }
       },
       methods: {changeSomething(){ this.msg='new data access' },
                changeSomething(){ this.msg='new data access' },
                increment(){this.clicks=this.clicks+1 },
                upvote: function(){this.upvotes++;},
                enterIsHit(event){alert('enter hit')}
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
