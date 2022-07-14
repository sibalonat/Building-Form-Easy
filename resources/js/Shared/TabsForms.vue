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
      {{ tab }}
      <button @click="tabRemover(i)"> - </button>
    </tab-panel>
  </tab-panels>
</template>

<script>
import { reactive, ref, toRefs, watch } from 'vue'
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

    watch(tabs, () => {
      // tabs.value
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
