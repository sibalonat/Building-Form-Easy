<template>
  <div>
    <div id="form-editor" />
    <div id="form-render" />
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
  async mounted() {
    var self = this,
      fbOptions = {
        onSave: function () {
          // eslint-disable-next-line no-undef
          $('#form-render').formRender({ formData: fBuilder.formData })
          self.$emit('on-save', fBuilder.formData)
        },
        disabledActionButtons: ['data'],
        disabledAttrs: ['access', 'style', 'className'],
        disableFields: ['autocomplete'],
      },
      // eslint-disable-next-line no-undef
      fBuilder = await $('#form-editor').formBuilder(fbOptions)
  },
}
</script>
