<template>
 

<form 
    @submit.prevent="onSubmit" 
    class="mb-4 w-full md:w-1/2">   
    <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/></svg>
        </div>
        <input 
        v-model="searchTerm"
        type="search" 
        id="search" 
        class="block w-full p-3 ps-9 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body" placeholder="Search" required />
        <button 
        type="submit" 
        class="absolute end-1.5 bottom-1.5 bg-blue-700 hover:bg-blue-800 text-white box-border border border-transparent focus:ring-4 focus:ring-blue-300 shadow-xs font-medium leading-5 rounded text-xs px-3 py-1.5 focus:outline-none">Search</button>
    </div>
</form>



</template>
<script>
import { router } from '@inertiajs/vue3'

export default {
   props:{
    data: String,
   },
   data(){

        return{
            searchTerm: this.data ?? ''
        }
    },
    methods:{
        onSubmit(){
            router.get(
                '/',
                    {search: this.searchTerm},
                    {preserveState: true, replace: true}
            )
        },
    }
}
</script>
<style lang="">
    
</style>