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
              <!-- <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/organizations/${user.id}/edit`">
                {{ user.first_name }} {{ user.last_name }}
                <icon v-if="organization.deleted_at" name="trash" class="flex-shrink-0 w-3 h-3 ml-2 fill-gray-400" />
              </Link> -->
            </td>
            <td class="px-6 pt-6 pb-4 border-t">
              {{ user.email }}
              <!-- <Link class="flex items-center px-6 py-4" :href="`/organizations/${organization.id}/edit`" tabindex="-1">
                {{ user.email }}
              </Link> -->
            </td>
            <td class="w-px px-6 pt-6 pb-4 border-t">
              <Link class="flex items-center px-4" :href="`/permission/${user.id}/edit`" tabindex="-1">
                {{ user.roles[0].name }}
                <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
              </Link>
              <!-- <span>{{ user.roles[0].name }}</span> -->
            </td>
          </tr>
          <tr v-if="users.length === 0">
            <td class="px-6 py-4 border-t" colspan="4">No organizations found.</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Layout from '@/Shared/Layout'

export default {
  components: {
    Head,
    Link,
  },
  layout: Layout,
  props: {
    users: Object,
    // permissions: Object,
  },
  created() {
    console.log(this.users)
    console.log(this.permissions)
    console.log('created')
  },
}
</script>
