<template>
  <div>
    <div id="form-editor" />
    <!-- <div id="form-render" /> -->
  </div>
</template>

<script>
require('jquery-ui-sortable')
import { reactive } from 'vue'
// import { ref, onMounted } from 'vue'
// setup() {
//   const format = ref()
// },
export default {
  name: 'VFormBuilder',
  props: {},
  data() {
    return {
      fBuilder: null,
    }
  },
  // provide: {
  //   fBuilder:
  // },
  watch: {
    fBuilder : {
      handler(val) {
        if (val !== null) {
          // console.log(self)
          // console.log(this.fBuilder.formData)
          // this.thisValue()
          // eslint-disable-next-line no-constant-condition, no-undef
          // if (typeof val.target['prop'] === 'function') {
          //   console.log('form data exists')
          // }
          // if (val.formData) {
          //   console.log('form data exists')
          // }
          // console.log(val)
          // console.log(val.formData)
        }
      },
      immediate: true,
      flush: 'post',
      deep: true,
    },
  },
  mounted() {
    // console.log(this)
    // var self = this,
    // eslint-disable-next-line no-undef
    var fbOptions = {
      // onSave() {
      //   // eslint-disable-next-line no-undef
      //   // $('#form-render').formRender({ formData: fBuilder.formData })
      //   self.$emit('on-save', fBuilder.formData)
      //   // formBuilder.actions.getData('json')
      // },
      disabledActionButtons: ['data', 'save', 'clear'],
      disabledAttrs: ['access', 'style', 'className'],
      disableFields: ['autocomplete', 'hidden', 'paragraph', 'button'],
      i18n: {
        locale: 'en-US',
      },
    }
    // eslint-disable-next-line no-undef
    this.fBuilder = $('#form-editor').formBuilder(fbOptions)
    // eslint-disable-next-line no-undef
    // this.fBuilder = reactive(fBuilder)
    // this.fBuilder = reactive(fBuilder)
    console.log(this.fBuilder)
    // console.log(fBuilder)
    console.log(JSON.parse(JSON.stringify(this.fBuilder)))

    // this.$watch('fBuilder', (val) => {
    //   console.log(val)
    // })
    // console.log(this.fBuilder.formData === null)

    // { formData: fBuilder.formData }
    // console.log(this.fBuilder)
  },
  updated(){
    console.log('updated')
  },
  methods: {
    async thisValue(formd) {
      // this.formData = await this.fBuilder.actions.getData('json')
      await this.fBuilder.$data
      console.log(this.$data.formData)
      // console.log(this.fBuilder.formData)
    },

      // methods: {
  //   async extractValue(formData) {
  //     this.formdata = await formData
  //     console.log(this.formdata)
  //   },
  // },
  },
}
</script>
