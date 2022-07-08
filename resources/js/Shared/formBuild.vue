<script>
require('jquery-ui-sortable')
export default {
  name: 'VFormBuilder',
  props: {},
  mounted: function () {
    var self = this,
      fbOptions = {
        onSave: function () {
          // eslint-disable-next-line no-undef
          $('#form-render').formRender({ formData: fBuilder.formData })
          self.$emit('on-save', fBuilder.formData)
        },
        disabledActionButtons: ['data'],
      },
      // eslint-disable-next-line no-undef
      fBuilder = $('#form-editor').formBuilder(fbOptions)
  },
  template: '<div><div id="form-editor"></div><div id="form-render"></div></div>',
}
</script>
