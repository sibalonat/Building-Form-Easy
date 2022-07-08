<template>
  <div>
    <Head title="Dashboard" />
    <h1 class="mb-8 text-3xl font-bold">Dashboard</h1>
    <p class="mb-8 leading-normal">Hey there! Welcome to Ping CRM, a demo app designed to help illustrate how <a class="text-indigo-500 underline hover:text-orange-600" href="https://inertiajs.com">Inertia.js</a> works.</p>
    <div class="overflow-x-auto bg-white rounded-md shadow">
      <table class="w-full whitespace-nowrap">
        <thead>
          <tr class="font-bold text-left">
            <th class="px-6 pt-6 pb-4">First Last Name</th>
            <th class="px-6 pt-6 pb-4">Email</th>
            <th class="px-6 pt-6 pb-4" colspan="2">Role</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in users" :key="user.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
            <td class="px-6 pt-6 pb-4 border-t">
              {{ user.first_name }} {{ user.last_name }}
            </td>
            <td class="px-6 pt-6 pb-4 border-t">
              {{ user.email }}
            </td>
            <td class="w-px px-6 pt-6 pb-4 border-t">
              <Link class="flex items-center px-4" :href="`/permission/${user.id}/edit`" tabindex="-1">
                {{ user.roles[0].name }}
                <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
              </Link>
            </td>
          </tr>
          <tr v-if="users.length === 0">
            <td class="px-6 py-4 border-t" colspan="4">No organizations found.</td>
          </tr>
        </tbody>
      </table>
    </div>
    <br />
    <br />
    <br />
    <VFormBuilder />
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Layout from '@/Shared/Layout'
import Icon from '@/Shared/Icon'
import VFormBuilder from '@/Shared/formBuild'


export default {
  components: {
    Head,
    Link,
    Icon,
    VFormBuilder,
  },
  layout: Layout,
  props: {
    users: Object,
    // permissions: Object,
  },
  created() {
    // eslint-disable-next-line no-undef
    // console.log(VueFormBuilderPlugin, options)
    console.log(this.users)
    console.log(this.permissions)
    console.log('created')
  },
}
</script>
