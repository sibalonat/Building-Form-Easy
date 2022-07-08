import { createApp, h } from 'vue'
import { InertiaProgress } from '@inertiajs/progress'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
// eslint-disable-next-line no-unused-vars
import LaravelPermissionToVueJS from 'laravel-permission-to-vuejs'

import Select2 from 'vue3-select2-component';
// eslint-disable-next-line no-undef
window.$ = window.jQuery = require('jquery')

// require("jquery-ui-sortable")
require('formBuilder')

InertiaProgress.init()

createInertiaApp({
  resolve: name => require(`./Pages/${name}`),
  title: title => title ? `${title} - Ping CRM` : 'Ping CRM',
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(LaravelPermissionToVueJS)
      .mount(el)
  },
})



