<template>
  <div>
    <Head :title="form.name" />
    <h1 class="mb-8 text-3xl font-bold">
      <Link class="text-indigo-400 hover:text-indigo-600" href="/">Dashboard</Link>
      <span class="font-medium text-indigo-400">/</span>
    </h1>

    <div class="mt-6 overflow-x-auto bg-white rounded shadow">
      <form @submit.prevent="update">
        <!-- {{ permission }} -->
        <div class="px-6 pt-6 pb-4">
          <div class="grid grid-cols-2 gap-4">
            <div class="col-auto">
              <select-input v-model="form.role" class="w-full pb-8 pr-6 lg:w-3/4" label="Role" @change="onChange($event)">
                <option v-for="single in permission" :key="single.id" :value="single.id" :selected="single.id">
                  {{ single.name }}
                </option>
              </select-input>
            </div>
            <div class="flex items-center">
              <loading-button :loading="form.processing" class="mr-auto btn-indigo" type="submit">Update Role</loading-button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import LoadingButton from '@/Shared/LoadingButton'
import Layout from '@/Shared/Layout'

import SelectInput from '@/Shared/SelectInput'

export default {
  components: {
    Head,
    Link,
    LoadingButton,
    SelectInput,
  },
  layout: Layout,
  props: {
    role: Object,
    permission: Object,
  },
  remember: 'form',
  data() {
    return {
      valueofrole: Object.keys(this.role)[0],
      form: this.$inertia.form({
        role: '',
      }),
    }
  },
  created() {
    this.form.role = Object.keys(this.role)[0]
  },
  methods: {
    update() {
      // console.log()
      this.form.put(`/organizations/${this.organization.id}`)
    },
    // onChange(event) {
    //   console.log(event.target.value)
    // },
    // destroy() {
    //   if (confirm('Are you sure you want to delete this organization?')) {
    //     this.$inertia.delete(`/organizations/${this.organization.id}`)
    //   }
    // },
    // restore() {
    //   if (confirm('Are you sure you want to restore this organization?')) {
    //     this.$inertia.put(`/organizations/${this.organization.id}/restore`)
    //   }
    // },
  },
}
</script>
