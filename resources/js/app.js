require('./bootstrap')

import { createApp } from 'vue'
import MyProducts from './components/order/Tab'
import Toaster from "@incuca/vue3-toaster";
import store from './store/store';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import VueLoading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';

const app = createApp({})
app.use(Toaster)
app.use(store)
app.use(VueSweetalert2)
app.use(VueLoading)
app.component('MyProducts',MyProducts)


app.mount('#app')