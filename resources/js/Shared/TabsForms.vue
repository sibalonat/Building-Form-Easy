<!-- eslint-disable vue/v-on-event-hyphenation -->
<template>
  <tabs
    v-model="selectedTab"
    @update:modelValue="handleClick"
  >
    <button @click="tabHandler">+</button>
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
    :animate="true"
  >
    <tab-panel
      v-for="(tab, i) in tabs"
      :key="`tp${i}`"
      :val="tab"
    >
      <div class="flex">
        <div class="w-10/12 grow">
          <!-- {{ tab }} -->
          <div :id="`form-editortp${i}`" />
        </div>
        <div class="flex-none">
          <button @click="tabRemover(i)"> - </button>
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
      console.log(val)
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

      // console.log(oldReference.value)

      // eslint-disable-next-line no-undef
      const oldFormData = $(oldReference.value).formBuilder('getData', 'json')
      // console.log(oldFormData)

      if (!tabarray.value[oldReference.value]) {
        console.log('loads data')
        tabarray.value.push(oldFormData)
      } else if (!tabarray.value[newReference.value]) {
        console.log('loads data2')
        tabarray.value.push(oldFormData)
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
  padding: 10px 20px;
}
</style>


