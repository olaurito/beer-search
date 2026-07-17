<template>
    <div class="m-auto w-full p-5">
        <h1 class="text-2xl font-bold text-gray-700 mb-6 mt-4">{{  brewery.name }}

        <Link
        :href="dashboard()"
        class="text-sm text-blue-600 hover:text-blue-400"
        >[back]</Link>
        </h1>
        <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
            <table class="w-full text-sm text-left rtl:text-right text-body">
                <thead class="text-sm text-body bg-neutral-secondary-medium border-b border-default-medium">
                    <tr>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            ABV
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Placeholder
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Placeholder
                        </th>
                    </tr>
                </thead>
                <tbody v-for="brewery in beers.data" :key="brewery.id">
                    <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                               {{ brewery.name }}
                        </th>
                        <td class="px-6 py-4">
                           {{ brewery.abv }}
                        </td>
                        <td class="px-6 py-4">
                            placeholder
                        </td>
                        <td class="px-6 py-4">
                            placeholder
                        </td>
                    
                    </tr>
                  
                </tbody>
            </table>
            <div class="px-6 pb-4 bg-white">
                <pagination :data="beers" />
            </div>
        </div>
    </div>
</template>

<script>
import Pagination from './Shared/Pagination.vue';
import { dashboard } from '@/routes';
import { Link } from '@inertiajs/vue3';

export default {
    name: 'Beers',
    components:{Link, Pagination},
    props: {
        brewery: Object,
        beers: Object,
    },
    methods:{
        dashboard, 
    }
}
</script>
