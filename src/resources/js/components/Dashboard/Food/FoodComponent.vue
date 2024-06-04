<template>
    <div class="content p-4 ">
        <div class="p-4 shadow rounded bg-white border position-relative">
            <div class="position-absolute bg-blue title">
                <h2 class="fs-16  text-white">{{ title }}</h2>
            </div>
            <FoodList/>
        </div>
    </div>
</template>

<script>
import FoodList from './FoodList.vue';
export default{
    components:{
        FoodList
    },
    data(){
        return{
            title:'Data Makanan'
        }
    }
}
</script>