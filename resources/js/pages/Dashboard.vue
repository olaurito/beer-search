<template>

    <div class="my-6 mx-8 p-6 bg-neutral-primary-soft border border-default rounded-base shadow-xs">
         <SearchInput />
        <h5 class="text-xl font-semibold text-heading mb-6">Beer and Code</h5>
        <div class="flow-root">
            <ul role="list" class="divide-y divide-default">
                <li v-for="brewery in breweries.data" :key="brewery.id" class="pb-4 sm:pb-4">
                    <div class="flex items-center gap-2">
                        <div class="shrink-0">
                            <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24"  
                            fill="currentColor" viewBox="0 0 24 24" >
                            <!--Boxicons v3.0.8 https://boxicons.com | License  https://docs.boxicons.com/free-->
                            <path d="m20,6h-2v-2c0-.55-.45-1-1-1H3c-.55,0-1,.45-1,1v14c0,1.65,1.35,3,3,3h10c1.65,0,3-1.35,3-3v-1h2c1.1,0,2-.9,2-2v-7c0-1.1-.9-2-2-2Zm-4,12c0,.55-.45,1-1,1H5c-.55,0-1-.45-1-1V5h12v13Zm4-3h-2v-7h2v7Z"/><path d="M6 7H8V16H6z"/><path d="M12 7H14V16H12z"/>
                            </svg>

                        </div>
                        <div class="flex-1 min-w-0">
                            <Link
                                :href="beers(brewery.id)"
                                class="text-sm font-medium text-heading hover:underline truncate"
                            >
                                <p class="font-medium text-heading truncate text-indigo-600">
                                    {{ brewery.name }}
                                </p>
                            </Link>
                            <p class="text-sm text-body truncate">
                                {{ brewery.city }}, {{ brewery.state }} - {{ brewery.country }}
                            </p>
                            <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                <p>
                                Quantidade de cervejas: {{ brewery.beers_count }}</p>
                            </div>
                        </div>
                        <div class="inline-flex items-center space-x-1.5">
                            <button type="button" class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-xs px-3 py-1.5 focus:outline-none shrink-0">Open NOW!</button>
                            <button data-tooltip-target="tooltip-remove-1" type="button" class="inline-flex items-center justify-center text-fg-danger bg-transparent box-border border border-transparent hover:bg-neutral-secondary-medium focus:ring-4 focus:ring-neutral-tertiary font-medium leading-5 rounded-base h-9 w-9 focus:outline-none">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/></svg>
                            </button>
                            <div id="tooltip-remove-1" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm leading-4 font-medium text-white transition-opacity duration-300 bg-dark rounded-base shadow-xs force:opacity-0 tooltip">
                            Remove
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div v-if="!shouldHidePagination" class="px-6 pb-4">
                <pagination :data="breweries" />
            </div>
        </div>
    </div>
</template>
<script>
import Pagination from './Shared/Pagination.vue';
import SearchInput from './Shared/SearchInput.vue'
import { Link } from '@inertiajs/vue3'
import { beers } from '@/routes/brewery'

export default {
    name: 'BeerDashboard',
    components:{Pagination, Link, SearchInput},
    props: {
        breweries: Object    
    },
    computed:{
        shouldHidePagination(){
            return !this.breweries.prev_page_url && !this.breweries.next_page_url
        }
    },
    methods: {
        beers,
    },
   
}
</script>
