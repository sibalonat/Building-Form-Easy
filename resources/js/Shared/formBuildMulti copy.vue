<template>
  <div>
    <!-- <div id="form-editor" ref="form-editor" /> -->
    <ul id="tabs" class="px-0 mx-auto nav-tabs">
      <li><a href="#page-1">Page 1</a></li>
      <li id="add-page-tab"><a href="#new-page">+ Page</a></li>
    </ul>
    <div id="page-1" class="fb-editor" />
    <div id="new-page" />
    <!-- <div id="form-render" /> -->
  </div>
</template>

<script>
require('jquery-ui-sortable')
// require('jquery-ui-tabs')

export default {
  name: 'VFormBuilderMulti',
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
      i18n: {
        locale: 'en-US',
      },
    }
    // eslint-disable-next-line no-undef
    this.fBuilder = $('#form-editor').formBuilder(fbOptions)
    // eslint-disable-next-line no-undef
  },
}
</script>
