require('./bootstrap')

import { createApp } from 'vue'
import MyProducts from './components/order/Tab'
import Toaster from "@incuca/vue3-toaster";
import store from './store/store';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css'

const app = createApp({})
app.use(Toaster)
app.use(store)
app.use(VueSweetalert2)
app.component('MyProducts',MyProducts)


app.mount('#app')