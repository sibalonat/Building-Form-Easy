<template>
  <div>
    <div id="form-editor" ref="form-editor" />
    <!-- <div id="form-render" /> -->
  </div>
</template>

<script>
require('jquery-ui-sortable')

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
  watch: {
    fBuilder : {
      handler(val) {
        console.log(val)
      },
      deep: true,
      immediate: true,
    },
  },
  mounted() {
    // console.log(this)
    var self = this,
      fbOptions = {
        onSave() {
          // eslint-disable-next-line no-undef
          // $('#form-render').formRender({ formData: fBuilder.formData })
          self.$emit('on-save', fBuilder.formData)
          // formBuilder.actions.getData('json')
        },
        disabledActionButtons: ['data'],
        disabledAttrs: ['access', 'style', 'className'],
        disableFields: ['autocomplete', 'hidden', 'paragraph', 'button'],
        i18n: {
          locale: 'en-US',
        },
      },
      // eslint-disable-next-line no-undef
      fBuilder = $('#form-editor').formBuilder(fbOptions)
    this.fBuilder = fBuilder

    // console.log(this.fBuilder)
    // console.log(fBuilder)

  },
}
</script>
