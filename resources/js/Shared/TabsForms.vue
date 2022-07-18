<!-- eslint-disable vue/v-on-event-hyphenation -->
<template>
  <tabs
    v-model="selectedTab"
    @update:modelValue="handleClick"
  >
    <button
      type="button"
      class="px-6 py-2 font-semibold text-gray-800 bg-white border border-gray-400 rounded shadow hover:bg-gray-100" @click="tabHandler"
    >
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
    </button>
    <tab
      v-for="(tab, i) in tabs"
      :key="`t${i}`"
      class="tab"
      :val="tab"
      :label="tab"
      :indicator="true"
    />
    <!--  -->
  </tabs>
  <tab-panels
    v-model="selectedTab"
    :animate="false"
  >
    <tab-panel
      v-for="(tab, i) in tabs"
      :key="`tp${i}`"
      :val="tab"
    >
      <div class="flex justify-between">
        <div class="w-10/12 grow">
          <!-- {{ tab }} -->
          <div :id="`form-editortp${i}`" />
        </div>
        <div class="w-1/12 my-auto">
          <button type="button" class="text-red-600" @click="tabRemover(i)">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
            </svg>
          </button>
        </div>
      </div>
    </tab-panel>
  </tab-panels>
</template>

<script>
require('jquery-ui-sortable')
import { onMounted, onUpdated, reactive, ref, toRefs, watch } from 'vue'
// import VFormBuilder from '@/Shared/formBuild'
export default {
  setup() {

    var fbOptions = {
      disabledActionButtons: ['data', 'save', 'clear'],
      disabledAttrs: ['access', 'style', 'className'],
      disableFields: ['autocomplete', 'hidden', 'paragraph', 'button'],
      i18n: {
        locale: 'en-US',
      },
      formData: '',
    }
    const tabs = ref(['Tab 1'])
    const tabarray = ref([])

    const state = reactive({
      selectedTab: tabs.value[0],
    })

    const handleClick = (val) => {

      const referenca = tabs.value.indexOf(val)
      // console.log(referenca)
      fbOptions.formData = tabarray.value[referenca]
    }

    const tabi = ref(1)

    onMounted(() => {
      const reference = ref('')
      reference.value = tabs.value.indexOf(state.selectedTab)
      // console.log(reference.value)
      const i = `#form-editortp${reference.value}`
      // eslint-disable-next-line no-undef
      $(i).formBuilder(fbOptions)
    })

    onUpdated(() => {
      const reference = ref('')
      reference.value = tabs.value.indexOf(state.selectedTab)
      // console.log(reference.value)
      const i = `#form-editortp${reference.value}`
      // eslint-disable-next-line no-undef
      $(i).formBuilder(fbOptions)
    })


    watch(() => state.selectedTab, (newVal, oldVal) => {

      const oldReference = ref('')
      const newReference = ref('')
      oldReference.value = tabs.value.indexOf(oldVal)
      newReference.value = tabs.value.indexOf(newVal)

      // eslint-disable-next-line no-undef
      const oldFormData = $(oldReference.value).formBuilder('getData', 'json')
      // console.log(oldFormData)

      if (!tabarray.value[oldReference.value]) {
        // console.log('loads data')
        tabarray.value.push(oldFormData)
      } else if (!tabarray.value[newReference.value]) {
        // console.log('loads data2')
        tabarray.value.push(oldFormData)
      } else if (tabarray.value[oldReference.value]) {
        // console.log('loads data3')
        tabarray.value[oldReference.value] = oldFormData
      }

    })

    const tabHandler = () => {
      tabi.value++
      if (tabs.value.length < 12) {
        tabs.value.push(`Tab ${tabi.value}`)
        state.selectedTab = `Tab ${tabi.value}`
        fbOptions.formData = ''
      } else if(tabs.value.length === 12)
        return
    }

    const tabRemover = (event) => {
      tabs.value.splice(event, 1)
    }

    return {
      tabs,
      tabi,
      tabarray,
      handleClick,
      tabRemover,
      tabHandler,
      ...toRefs(state),
    }
  },
}
</script>

<style scoped>
.tab {
  padding: 0 20px;
}
.tabs {
  margin-bottom: .5rem;
}
/* .form-wrap.form-builder .stage-wrap.empty { */
.stage-wrap.empty {
  border: 0 solid #fff !important;
}
</style>


