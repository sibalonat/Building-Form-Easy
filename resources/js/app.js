import { createApp, h, provide, inject } from 'vue'
import { InertiaProgress } from '@inertiajs/progress'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
// eslint-disable-next-line no-unused-vars
import LaravelPermissionToVueJS from 'laravel-permission-to-vuejs'

// eslint-disable-next-line no-undef
window.$ = window.jQuery = require('jquery')

// require("jquery-ui-sortable")
require('formBuilder')
require('formBuilder/dist/form-render.min.js')

InertiaProgress.init()

createInertiaApp({
  resolve: name => require(`./Pages/${name}`),
  title: title => title ? `${title} - Ping CRM` : 'Ping CRM',
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(provide, inject)
      .use(LaravelPermissionToVueJS)
      .mount(el)
  },
})



