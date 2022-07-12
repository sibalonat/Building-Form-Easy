<template>
  <div>
    <div id="form-editor" ref="form-editor" />
  </div>
</template>

<script>
require('jquery-ui-sortable')

export default {
  name: 'VFormBuilder',
  inject: ['formajson'],
  data() {
    return {
      fBuilder: null,
    }
  },
  mounted() {
    // eslint-disable-next-line no-undef, no-unused-vars
    var fbOptions = {
      disabledActionButtons: ['data', 'save', 'clear'],
      disabledAttrs: ['access', 'style', 'className'],
      disableFields: ['autocomplete', 'hidden', 'paragraph', 'button'],
      formData: this.formajson,
      i18n: {
        locale: 'en-US',
      },
    }
    // eslint-disable-next-line no-undef
    this.fBuilder = $('#form-editor').formBuilder(fbOptions)
  },
}
</script>
