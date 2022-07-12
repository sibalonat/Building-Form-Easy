<template>
  <div>
    <Head title="Create Organization" />
    <h1 class="mb-8 text-3xl font-bold">
      <Link class="text-indigo-400 hover:text-indigo-600" href="/forms">Forms</Link>
      <span class="font-medium text-indigo-400">/</span> Edit {{ questions.name }}
    </h1>

    <div class="max-w-full overflow-hidden bg-white rounded-md shadow">
      <form @submit.prevent="update">
        <div class="flex flex-wrap p-8 -mb-8 -mr-6">
          <text-input v-model="form.name" :error="form.errors.name" class="w-full pb-8 pr-6 lg:w-1/4" label="Name" />

          <Select2
            v-model="form.theme" :options="myOptions" label="Theme" class="w-full pb-3 pr-6 my-auto lg:w-1/4"
            :settings="{ width: '100%' }" @change="myChangeEvent($event)" @select="mySelectEvent($event)"
          />

          <text-input v-model="form.pages" :error="form.errors.pages" class="w-full pb-8 pr-6 lg:w-1/12" label="Pages" />

          <select-input v-model="form.visibility" class="w-full pb-8 pr-6 lg:w-1/4" label="Visibility">
            <option v-for="hidshow in visibility_options" :key="hidshow.id" class="w-full text-xs" :value="hidshow.id" :selected="hidshow.id">
              {{ hidshow.name }}
            </option>
          </select-input>

          <div class="inline-flex items-center w-1/6 my-auto">
            <input
              id="multi" v-model="form.multi_tab" type="checkbox"
              :error="form.errors.multi_tab"
              class="w-full h-8 pr-6 lg:w-1/12" label="Multi-tab"
            />
            <label for="multi" class="w-10/12 pl-3"> Multi-tab </label>
          </div>

          <VFormBuilder ref="gott" class="w-full" />
        </div>

        <div class="flex items-center px-8 py-4 border-t border-gray-100 bg-gray-50">
          <button v-if="!questions.deleted_at" class="text-red-600 hover:underline" tabindex="-1" type="button" @click="destroy">Delete Form</button>
          <loading-button :loading="form.processing" class="ml-auto btn-indigo" type="submit">Update Form</loading-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
// import { provide } from 'vue'
import Layout from '@/Shared/Layout'
import TextInput from '@/Shared/TextInput'
import SelectInput from '@/Shared/SelectInput'
import LoadingButton from '@/Shared/LoadingButton'
import Select2 from 'vue3-select2-component'
import VFormBuilder from '@/Shared/formBuildEdit'
import TrashedMessage from '@/Shared/TrashedMessage'

export default {
  components: {
    Head,
    Link,
    LoadingButton,
    SelectInput,
    TextInput,
    Select2,
    VFormBuilder,
    TrashedMessage,
  },
  provide() {
    return {
      formajson: this.form.form_builder_json,
    }
  },
  layout: Layout,
  props: {
    // eslint-disable-next-line vue/prop-name-casing
    questions: Object,
    // eslint-disable-next-line vue/prop-name-casing
    visibility_options: Object,
  },
  remember: 'form',
  data() {
    return {
      // formData: null,

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
        name: this.questions.name,
        theme: this.questions.theme,
        pages: this.questions.pages,
        visibility: this.questions.visibility,
        multi_tab: this.questions.multi_tab,
        form_builder_json: this.questions.form_builder_json,
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
    update() {
      this.form.form_builder_json = this.$refs.gott.$data.fBuilder.formData
      this.form.multi_tab ? false : this.form.multi_tab
      this.form.put(`/questions/${this.questions.id}`)
    },
    destroy() {
      if (confirm('Are you sure you want to delete this form?')) {
        this.$inertia.delete(`/questions/${this.questions.id}`)
      }
    },
  },
}
</script>

