<template>
  <div>

    <Head title="Create Organization" />
    <h1 class="mb-8 text-3xl font-bold">
      <Link class="text-indigo-400 hover:text-indigo-600" href="/forms">Forms</Link>
      <span class="font-medium text-indigo-400">/</span> Create
    </h1>
    <div class="max-w-3xl overflow-hidden bg-white rounded-md shadow">
      <form @submit.prevent="store">
        <div class="flex flex-wrap p-8 -mb-8 -mr-6">
          <text-input v-model="form.name" :error="form.errors.name" class="w-full pb-8 pr-6 lg:w-1/2" label="Name" />
          <text-input v-model="form.theme" :error="form.errors.theme" class="w-full pb-8 pr-6 lg:w-1/2" label="Theme" />

          <Select2
            v-model="form.theme" :options="myOptions" class="w-full pb-8 pr-6 lg:w-1/2"
            :settings="{ settingOption: value, settingOption: value }" @change="myChangeEvent($event)"
            @select="mySelectEvent($event)"
          />
          <h4>Value: {{ myValue }}</h4>

          <!-- <select-input v-model="form.role" class="w-full pb-8 pr-6 lg:w-3/4" label="Color">
            <option v-for="color in permission" :key="single.id" :value="single.id" :selected="single.id">
              {{ single.name }}
            </option>
            <option v-for="color in permission" :key="single.id" :value="single.id" :selected="single.id">
              {{ single.name }}
            </option>
          </select-input> -->
          <text-input v-model="form.pages" :error="form.errors.pages" class="w-full pb-8 pr-6 lg:w-1/2" label="Pages" />
          <text-input v-model="form.visibility" :error="form.errors.visibility" class="w-full pb-8 pr-6 lg:w-1/2"
            label="Address" />
          <text-input v-model="form.city" :error="form.errors.city" class="w-full pb-8 pr-6 lg:w-1/2" label="City" />
          <text-input v-model="form.region" :error="form.errors.region" class="w-full pb-8 pr-6 lg:w-1/2"
            label="Province/State" />
          <select-input v-model="form.country" :error="form.errors.country" class="w-full pb-8 pr-6 lg:w-1/2"
            label="Country">
            <option :value="null" />
            <option value="CA">Canada</option>
            <option value="US">United States</option>
          </select-input>
          <text-input v-model="form.postal_code" :error="form.errors.postal_code" class="w-full pb-8 pr-6 lg:w-1/2"
            label="Postal code" />
        </div>
        <div class="flex items-center justify-end px-8 py-4 border-t border-gray-100 bg-gray-50">
          <loading-button :loading="form.processing" class="btn-indigo" type="submit">Create Organization
          </loading-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Layout from '@/Shared/Layout'
import TextInput from '@/Shared/TextInput'
import SelectInput from '@/Shared/SelectInput'
import LoadingButton from '@/Shared/LoadingButton'
import Select2 from 'vue3-select2-component'

export default {
  components: {
    Head,
    Link,
    LoadingButton,
    SelectInput,
    TextInput,
    Select2,
  },
  layout: Layout,
  remember: 'form',
  data() {
    return {
      // myValue: '',
      // or [{id: key, text: value}, {id: key, text: value}]
      myOptions: [
        {
          'id': '#ae0c21',
          'text': 'Red',
        },
        {
          'id': '#2683cc',
          'text': 'Blue',
        },
      ],
      myOptVisibility: [
        {
          'id': '#ae0c21',
          'text': 'Red',
        },
        {
          'id': '#2683cc',
          'text': 'Blue',
        },
      ],
      form: this.$inertia.form({
        name: null,
        theme: null,
        pages: null,
        visibility: null,
        identifier: null,
        multi_tab: null,
        form_builder_json: null,
      }),
    }
  },
  methods: {
    myChangeEvent(val) {
      console.log(val)
    },
    mySelectEvent({ id, text }) {
      console.log({ id, text })
    },
    store() {
      this.form.post('/organizations')
    },
  },
}
</script>
