require('./bootstrap')

import { createApp } from 'vue'
import MyProducts from './components/order/Tab'
import Toaster from "@incuca/vue3-toaster";
import store from './store/store'

const app = createApp({})
app.use(Toaster)
app.use(store)
app.component('MyProducts',MyProducts)



app.mount('#app')