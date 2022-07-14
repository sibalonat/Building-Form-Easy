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
      :ref="tab"
      :val="tab"
    >
      <div class="flex">
        <div class="w-10/12 grow">
          {{ tab }}
          <div :id="`form-editortp${i}`" ref="" />
          <!-- form-editor''+i+'' -->
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
    const tabs = ref(['Tab 1', 'Tab 2', 'Tab 3'])

    const state = reactive({
      selectedTab: tabs.value[1],
    })

    const handleClick = () => {
      console.log('you clicked')
      console.log(state)
    }

    const tabi = ref(5)

    onMounted(() => {
      var fbOptions = {
        disabledActionButtons: ['data', 'save', 'clear'],
        disabledAttrs: ['access', 'style', 'className'],
        disableFields: ['autocomplete', 'hidden', 'paragraph', 'button'],
        i18n: {
          locale: 'en-US',
        },
      }
      const reference = ref('')
      reference.value = tabs.value.indexOf(state.selectedTab)
      // console.log(reference.value)
      const i = `#form-editortp${reference.value}`
      // eslint-disable-next-line no-undef
      $(i).formBuilder(fbOptions)

      console.log(state)
    })
    onUpdated(() => {
      var fbOptions = {
        disabledActionButtons: ['data', 'save', 'clear'],
        disabledAttrs: ['access', 'style', 'className'],
        disableFields: ['autocomplete', 'hidden', 'paragraph', 'button'],
        i18n: {
          locale: 'en-US',
        },
      }
      const reference = ref('')
      reference.value = tabs.value.indexOf(state.selectedTab)
      // console.log(reference.value)
      const i = `#form-editortp${reference.value}`
      // eslint-disable-next-line no-undef
      $(i).formBuilder(fbOptions)
    })

    // watch(tabs, () => {
    watch(tabs.value, () => {
      // tabs.value
      // eslint-disable-next-line no-undef
      console.log(state.selectedTab)
      console.log(tabs.value.length)
      // console.log(tabs.value)
    })

    const tabHandler = () => {
      tabi.value++
      if (tabs.value.length < 12) {
        tabs.value.push(`Tab ${tabi.value}`)
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


 <!-- // console.log(event.target.__vueParentComponent.attrs.val) -->
