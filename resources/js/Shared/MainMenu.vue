<template>
  <div>
    <div v-if="is('Super-Admin')">
      {{ is('Super-Admin') }}
      <div class="mb-4">
        <!-- Show admin tools -->
        <Link class="flex items-center py-3 group" href="/">
          <icon name="dashboard" class="w-4 h-4 mr-2" :class="isUrl('') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
          <div :class="isUrl('') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Dashboard</div>
        </Link>
      </div>
      <div class="mb-4">
        <!-- Show admin tools -->
        <Link class="flex items-center py-3 group" href="/questions">
          <icon name="dashboard" class="w-4 h-4 mr-2" :class="isUrl('questions') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
          <div :class="isUrl('questions') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Forms</div>
        </Link>
      </div>
      <div class="mb-4">
        <!-- Show admin tools -->
        <Link class="flex items-center py-3 group" href="/questions/create">
          <icon name="dashboard" class="w-4 h-4 mr-2" :class="isUrl('questions/create') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
          <div :class="isUrl('questions/create') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Forms create</div>
        </Link>
      </div>
    </div>
    <div class="mb-4">
      <Link class="flex items-center py-3 group" href="/organizations">
        <icon name="office" class="w-4 h-4 mr-2" :class="isUrl('organizations') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
        <div :class="isUrl('organizations') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Organizations</div>
      </Link>
    </div>
    <div class="mb-4">
      <Link class="flex items-center py-3 group" href="/contacts">
        <icon name="users" class="w-4 h-4 mr-2" :class="isUrl('contacts') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
        <div :class="isUrl('contacts') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Contacts</div>
      </Link>
    </div>
    <div class="mb-4">
      <Link class="flex items-center py-3 group" href="/reports">
        <icon name="printer" class="w-4 h-4 mr-2" :class="isUrl('reports') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
        <div :class="isUrl('reports') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Reports</div>
      </Link>
    </div>
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import Icon from '@/Shared/Icon'

export default {
  components: {
    Icon,
    Link,
  },
  methods: {
    isUrl(...urls) {
      let currentUrl = this.$page.url.substr(1)
      if (urls[0] === '') {
        return currentUrl === ''
      }
      return urls.filter((url) => currentUrl.startsWith(url)).length
    },
  },
}
</script>
