require('./bootstrap')

import { createApp } from 'vue'
import AllProducts from './components/order/AllProducts'
import MyProducts from './components/order/MyProducts'
import Toaster from "@incuca/vue3-toaster";

const app = createApp({})
app.use(Toaster)

app.component('AllProducts', AllProducts)
app.component('MyProducts',MyProducts)

app.mount('#app')