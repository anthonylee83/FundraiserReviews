<template>
   <span>
        <input type="hidden" name="rating" :value="rating" />
       <div class="rating">
            <div v-for="i in max" :class="{'selected': rating >=i,'hover':hoverable >=i}"
                :key="i" @click="rating = i" @mouseover="hoverable = i" @mouseleave="hoverable = 0">
                    <i :class="['fas fa-star', {'selectable':!readOnly}]"></i>
            </div>
          
    </div>
</span>
</template>

<script>
export default {
    props:['score'],
    data:function(){
        return {
            rating:0,
            max:5,
            readOnly:false,
            hoverable:0
        }
    },
    mounted:function(){
        if(this.score !== undefined){
            this.rating = this.score;
            this.readONly = true;
        }
    }
}
</script>

<style>
.rating>div{
    display:inline;
    font-size:1.3em;
}
.selected{
    color:rgb(214, 196, 0)
}
.selectable{
    cursor:pointer;
}
.hover{
    color:#d4090f
}
</style>