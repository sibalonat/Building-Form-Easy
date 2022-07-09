<template>
  <div>
    <Head title="Create Organization" />
    <h1 class="mb-8 text-3xl font-bold">
      <Link class="text-indigo-400 hover:text-indigo-600" href="/forms">Forms</Link>
      <span class="font-medium text-indigo-400">/</span> Create
    </h1>
    <div class="max-w-full overflow-hidden bg-white rounded-md shadow">
      <form @submit.prevent="store">
        <div class="flex flex-wrap p-8 -mb-8 -mr-6">
          <text-input v-model="form.name" :error="form.errors.name" class="w-full pb-8 pr-6 lg:w-1/4" label="Name" />

          <Select2
            v-model="form.theme" :options="myOptions" label="Theme" class="w-full pb-3 pr-6 my-auto lg:w-1/4"
            :settings="{ width: '100%' }" @change="myChangeEvent($event)" @select="mySelectEvent($event)"
          />

          <text-input v-model="form.pages" :error="form.errors.pages" class="w-full pb-8 pr-6 lg:w-1/12" label="Pages" />

          <select-input v-model="form.visibility" class="w-full pb-8 pr-6 lg:w-1/3" label="Visibility">
            <option v-for="hidshow in visibility_options" :key="hidshow.id" class="w-full text-xs" :value="hidshow.id" :selected="hidshow.id">
              {{ hidshow.name }}
            </option>
          </select-input>

          <text-input
            v-model="form.identifier" :error="form.errors.identifier" class="w-full pb-8 pr-6 lg:w-1/5"
            label="Identifier"
          />

          <div class="inline-flex items-center w-1/5 my-auto">
            <input
              id="multi" v-model="form.multi_tab" type="checkbox"
              :error="form.errors.multi_tab"
              class="w-full h-8 pr-6 lg:w-1/12" label="Multi-tab"
            />
            <label for="multi" class="w-10/12 pl-3"> Multi-tab </label>
          </div>

          <VFormBuilder class="w-full" @on-save="onSave" />
        </div>
        <div class="flex items-center justify-end px-8 py-4 border-t border-gray-100 bg-gray-50">
          <loading-button :loading="form.processing" class="btn-indigo" type="submit">
            Create Form
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
import VFormBuilder from '@/Shared/formBuild'


export default {
  components: {
    Head,
    Link,
    LoadingButton,
    SelectInput,
    TextInput,
    Select2,
    // eslint-disable-next-line vue/no-unused-components
    VFormBuilder,
  },
  layout: Layout,
  props: {
    // eslint-disable-next-line vue/prop-name-casing
    visibility_options: Object,
  },
  remember: 'form',
  data() {
    return {
      formData: null,
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
  // watch: {
  //   form: {
  //     handler(value) {
  //       this.setPlace(value)
  //     },
  //     deep: true,
  //     immediate: true,
  //   },
  // },
  methods: {
    myChangeEvent(val) {
      console.log(val)
    },
    mySelectEvent({ id, text }) {
      console.log({ id, text })
    },
    store() {
      // eslint-disable-next-line no-undef
      // this.onSave(formData)
      
      // this.form.post('/organizations')
    },
    onSave: function (formData) {
      // alert(formData)
      console.log(formData)
    },
  },
}
</script>



  <!-- <text-input v-model="form.theme" :error="form.errors.theme" class="w-full pb-8 pr-6 lg:w-1/4" label="Theme" /> -->

  <!-- <Select2
    v-model="form.theme" :options="myOptions" label="Theme" class="w-full pb-8 pr-6 lg:w-1/2"
    :settings="{ width: '80%', settingOption: value }" @change="myChangeEvent($event)"
    @select="mySelectEvent($event)"
  /> -->

            <!-- <input
            v-model="form.multi_tab" type="checkbox" :error="form.errors.multi_tab"
            class="w-full pb-8 pr-6 lg:w-1/12" label="Multi-tab"
          /> -->
