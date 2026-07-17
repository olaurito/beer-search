<template>
<nav aria-label="Page navigation example">
  <ul class="flex -space-x-px text-sm justify-center items-center">
    <li>
      <Link
          v-if="data.prev_page_url"
          :href="data.prev_page_url"
       class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium rounded-s-base text-sm w-9 h-9 focus:outline-none"
       >
        <span class="sr-only">Previous</span>
        <svg class="w-4 h-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/></svg>
    </Link>
    </li>
     <li v-for="link in cleanLinks" :key="link.label">
    <Link
        v-if="link.url"
        :href="link.url"
        :class="{ 'border-indigo-500 text-indigo-600': link.active }"
        class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border-transparent border-t-2  border-default-medium hover:text-gray-700 hover:border-gray-300 hover:bg-neutral-tertiary-medium hover:text-heading font-medium text-sm w-9 h-9 focus:outline-none"
      >{{  link.label }}</Link>
    </li>
    
    <li>
      <Link
          v-if="data.next_page_url"
          :href="data.next_page_url"
      class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium rounded-e-base text-sm w-9 h-9 focus:outline-none"
     
      >
        <span class="sr-only">Next</span>
        <svg class="w-4 h-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/></svg>
    </Link>
    </li>
  </ul>
</nav>
</template>

<script>
import { Link } from '@inertiajs/vue3'
export default {
    name: 'Pagination',
    components: { Link },
    props: {
        data: Object,
    },
    computed:{
      cleanLinks() {
        const cleanLinks = [...this.data.links];
        cleanLinks.shift();
        cleanLinks.pop();
        return cleanLinks;
      } 
    }
}
</script>
