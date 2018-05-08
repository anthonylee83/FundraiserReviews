<template>
    <div>
        <div class="input-group search">
            <input class="form-control" v-model="searchString" type="search" area-label="Search Fundraisers." />
            <div class="input-group-append">
                <button class="btn btn-outline-secondary"><i class="fas fa-search"></i></button>
            </div>
        </div>
        <div class="results">
            <div v-for="result in results" :key="result.slug" class="result">
                <a :href="_url(result.slug)">{{result.name}} {{result.location}}</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data:function(){
            return {
                searchString:"",
                results:[]
            }
        },
        methods:{
          _url:function(val){
              return '/fundraiser/' + val;
          }
        },
        watch:{
            searchString:function(val){
                 axios.get('/fundraiser/search/' + val)
                .then(response =>{
                    this.results = response.data;
                })
                .catch(error=>{
                    alert('An error has occurred');
                })
            }
        }
    }
</script>
<style>
    .results{
        background-color:#fff;
        width:60%;  
        margin:0px auto;
    }
    .result{
        Padding:10px;
    }
</style>