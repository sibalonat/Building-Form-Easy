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
          {{ tab }}
          <div :id="`form-editortp${i}`" />
          <!-- <div :id="`form-editortp${i}`" :ref="el => { divs[i] = el }" /> -->
          <div :id="`form-editortp${i}`" />
          <!-- <div :id="`form-editortp${i}`" :ref="`${i}`" /> -->
          <!-- form-editor''+i+'' -->
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
      console.log(fbOptions)
      console.log(fbOptions.i18n)
      // console.log(tabarray.value)
      var fbOptions = {
        disabledActionButtons: ['data', 'save', 'clear'],
        disabledAttrs: ['access', 'style', 'className'],
        disableFields: ['autocomplete', 'hidden', 'paragraph', 'button'],
        i18n: {
          locale: 'en-US',
        },
      }
      tabs.value.map((el, index) => {
        // eslint-disable-next-line no-undef
        // console.log(state.selectedTab)
        // eslint-disable-next-line no-undef
        // tp${i}
        var i = `#form-editortp${index}`
        // eslint-disable-next-line no-undef
        $(i).formBuilder(fbOptions)
      })

      // console.log(fBuilder)
      console.log(state)
    })
    onUpdated(() => {
      console.log(state)
      // var fbOptions = {
      //     disabledActionButtons: ['data', 'save', 'clear'],
      //     disabledAttrs: ['access', 'style', 'className'],
      //     disableFields: ['autocomplete', 'hidden', 'paragraph', 'button'],
      //     i18n: {
      //       locale: 'en-US',
      //     },
      //   },
      //   // eslint-disable-next-line no-undef
      //   fBuilder = $('#form-editor').formBuilder(fbOptions)
      // console.log(fBuilder)
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

    // watch(tabs, () => {
    // watch(tabs.value, (newTab) => {
    //   // console.log(newTab)
    //   const itemToGo = newTab[newTab.length - 1]

    //   const reference = ref('')
    //   reference.value = tabs.value.indexOf(oldVal)

    //   // var last = newTab.slice(-1)[0]

    //   // // console.log(last)
    //   // // console.log(itemToGo)

    //   // state = reactive({
    //   // selectedTab
    //   // state.selectedTab =
    //   // tabs.value
    //   // eslint-disable-next-line no-undef
    //   console.log(state.selectedTab)
    //   console.log(tabs.value.length)
    //   // console.log(tabs.value)
    // })


      // eslint-disable-next-line no-undef
      // const newFormData = $(newReference.value).formBuilder('getData', 'json')
      // console.log(tabarray.value.length)


            // eslint-disable-next-line no-undef
      // const newFormData = $(newReference.value).formBuilder('getData', 'json')
      // console.log(newFormData)




      ketu jane shenime te tjera

            // if (!tabarray.value[oldReference.value]) {
      //   tabarray.value.push(oldFormData)
      //   console.log('this has some new data')
      //   // console.log(newReference.value)
      //   fbOptions.formData = tabarray.value[newReference.value]
      //   // console.log(fbOptions.formData)
      // } else if (!tabarray.value[newReference.value]) {
      //   tabarray.value.push(newFormData)
      //   console.log('or this other one')
      //   // console.log(oldReference.value)

      //   // console.log(fbOptions.formData)
      //   fbOptions.formData = tabarray.value[newReference.value]
      // }
      // if (!tabarray.value[newReference.value]) {
      //   tabarray.value.push(oldFormData)
      //   console.log('this has some new data')
      //   // console.log(newReference.value)
      //   fbOptions.formData = tabarray.value[oldReference.value]
      //   // console.log(fbOptions.formData)
      // } else if (!tabarray.value[oldReference.value]) {
      //   tabarray.value.push(newFormData)
      //   console.log('or this other one')
      //   // console.log(oldReference.value)

      //   // console.log(fbOptions.formData)
      //   fbOptions.formData = tabarray.value[newReference.value]
      // }
      // console.log(tabarray.value)
      // console.log(newFormData)

      // if (!tabarray.value[newReference.value] && !tabarray.value[oldReference.value]) {
      //   tabarray.value.push(oldFormData)
      // }

      // console.log(tabarray.value[newReference.value])
      // console.log(tabarray.value[oldReference.value])


            if (!tabarray.value[newReference.value]) {
        tabarray.value.push(oldFormData)
        console.log('this has some new data')
        console.log(oldReference.value)
        console.log(newReference.value)
        // console.log(newReference.value)
        // fbOptions.formData = tabarray.value[newReference.value]
        // console.log(fbOptions.formData)
      } else if (!tabarray.value[oldReference.value]) {
        // tabarray.value.push(newFormData)
        tabarray.value.push(oldFormData)
        console.log('or this other one')
        console.log(oldReference.value)

        // console.log(fbOptions.formData)
        // fbOptions.formData = tabarray.value[newReference.value]
      }


      ruje

            // console.log(oldFormData)

      if (!tabarray.value[oldReference.value]) {
        console.log('loads data')
        tabarray.value.push(oldFormData)
      } else if (!tabarray.value[newReference.value]) {
        console.log('loads data2')
        tabarray.value.push(oldFormData)
      }
      // if (!tabarray.value[newReference.value]) {
      //   console.log('loads data')
      //   tabarray.value.push(oldFormData)
      // } else if (!tabarray.value[oldReference.value]) {
      //   console.log('loads data2')
      //   tabarray.value.push(oldFormData)
      // }

      // fbOptions.formData


        console.log(!tabarray.value[newReference.value])
        console.log(!tabarray.value[oldReference.value])
        console.log('this triggers')


      // referenceNew.value = tabs.value.indexOf(newVal)
      // : tabs.value.indexOf(newVal)

      else if (!tabarray.value[newReference.value]) {
        console.log(!tabarray.value[newReference.value])
      }


      const reference = ref('')
      reference.value = tabs.value.indexOf(oldVal)
      // const string = reference.value

      // console.log(.substring(3, 2))
      // console.log(string)


      // eslint-disable-next-line no-undef
      const format = $(reference.value).formBuilder('getData', 'json')

      tabarray.value.push(format)

      // console.log(reference.value)
      // console.log(tabarray.value)

      // const referenceoth = ref('')
      // referenceoth.value = tabarray.value.indexOf(reference.value)
      // const othRef = ref([])
      // tabarray.value.indexOf(reference.value)

      // console.log(tabarray.value.indexOf(reference.value))

      // console.log(reference.value)
      // console.log(tabarray.value)

      console.log(oldVal)
      console.log(newVal)


      // console.log(tabarray.value.indexOf(reference.value))
      // tabarray.value.push(oldFormData)

      // else if (tabarray.value[oldReference.value]) {
      //   console.log('this has some old data')
      //   fbOptions.formdata = tabarray.value[oldReference.value]
      // }

      // console.log(referenceoth.value)
      // console.log(tabarray.value)


      // console.log(referenceoth.value)
      // console.log(tabarray.value)

      console.log(oldVal)
      console.log(newVal)

    // eslint-disable-next-line no-undef
    // if ($(id).formBuilder('getData', 'json') !== []) {
    //   fbOptions.formData = format
    // }
    // eslint-disable-next-line no-undef
    // const format = $(id).formBuilder('getData', 'json')

    // console.log(newVal)

    // function tabHandler() {
    //   tabi.value++
    //   if (tabs.value.length < 12) {
    //     tabs.value.push(`Tab ${tabi.value}`)
    //   } else if(tabs.value.length === 12)
    //     return
    // }

    // state.selectedTab = tabi.value
    console.log(state.selectedTab)
    console.log(tabs.value)

    const reference = ref('')
    reference.value = tabs.value.indexOf(state.selectedTab)
    console.log(reference.value)
    // const i = `#form-editortp${reference.value}`
    // eslint-disable-next-line no-undef
    // const forma = $(i).formBuilder(fbOptions)

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
