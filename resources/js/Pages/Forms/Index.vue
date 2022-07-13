<template>
  <div>
    <Head title="Forms" />
    <h1 class="mb-8 text-3xl font-bold">Forms</h1>
    <div class="flex items-center justify-start mb-6">
      <Link class="mr-5 btn-indigo" href="/questions/create">
        <span>Create</span>
        <span class="hidden text-xs italic md:inline">&nbsp;simple</span>
      </Link>
      <Link class="ml-5 btn-indigo" href="/questions/create-multi">
        <span>Create</span>
        <span class="hidden text-xs italic md:inline">&nbsp;Multi-Tab</span>
      </Link>
    </div>
    <div class="overflow-x-auto bg-white rounded-md shadow">
      <table class="w-full whitespace-nowrap">
        <thead>
          <tr class="font-bold text-left">
            <th class="px-6 pt-6 pb-4">#</th>
            <th class="px-6 pt-6 pb-4">Name</th>
            <th class="px-6 pt-6 pb-4">Theme</th>
            <th class="px-6 pt-6 pb-4">Owner</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="forma in forms" :key="forma.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
            <td class="border-t">
              <Link class="flex items-center px-6 py-4 focus:text-indigo-500">
                {{ forma.id }}
                <!-- <icon v-if="organization.deleted_at" name="trash" class="flex-shrink-0 w-3 h-3 ml-2 fill-gray-400" /> -->
              </Link>
              <!-- <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/forma/${organization.id}/edit`">
                {{ organization.name }}
                <icon v-if="organization.deleted_at" name="trash" class="flex-shrink-0 w-3 h-3 ml-2 fill-gray-400" />
              </Link> -->
            </td>
            <td class="border-t">
              <Link class="flex items-center px-6 py-4" :href="`/questions/${forma.id}/edit`" tabindex="-1">
                {{ forma.name }}
                <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
              </Link>
              <!-- <Link class="flex items-center px-6 py-4" :href="`/organizations/${organization.id}/edit`" tabindex="-1">
                {{ organization.city }}
              </Link> -->
            </td>
            <td class="border-t">
              <Link class="flex items-center px-6 py-4" tabindex="-1">
                {{ forma.theme }}
              </Link>
              <!-- <Link class="flex items-center px-6 py-4" :href="`/organizations/${organization.id}/edit`" tabindex="-1">
                {{ organization.phone }}
              </Link> -->
            </td>
            <td class="w-px border-t">
              <Link class="flex items-center px-4" tabindex="-1">
                {{ forma.user.first_name }} {{ forma.user.last_name }}
              </Link>
              <!-- <Link class="flex items-center px-4" :href="`/organizations/${organization.id}/edit`" tabindex="-1">
                <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
              </Link> -->
            </td>
          </tr>
          <!-- <tr v-if="organizations.data.length === 0">
            <td class="px-6 py-4 border-t" colspan="4">No organizations found.</td>
          </tr> -->
        </tbody>
      </table>
    </div>
    <!-- <pagination class="mt-6" :links="organizations.links" /> -->
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Icon from '@/Shared/Icon'
// import pickBy from 'lodash/pickBy'
import Layout from '@/Shared/Layout'
// import throttle from 'lodash/throttle'
// import mapValues from 'lodash/mapValues'
// import Pagination from '@/Shared/Pagination'


export default {
  components: {
    Head,
    Icon,
    Link,
    // Pagination,
  },
  layout: Layout,
  props: {
    // filters: Object,
    forms: Object,
  },
  data() {
    return {
      // form: {
      //   search: this.filters.search,
      //   trashed: this.filters.trashed,
      // },
    }
  },
  created() {
    console.log(this.forms)
    // console.log(this.forms[])
  },
  // watch: {
  //   form: {
  //     deep: true,
  //     handler: throttle(function () {
  //       this.$inertia.get('/organizations', pickBy(this.form), { preserveState: true })
  //     }, 150),
  //   },
  // },
  // methods: {
  //   reset() {
  //     this.form = mapValues(this.form, () => null)
  //   },
  // },
}
</script>
