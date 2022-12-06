require('./bootstrap')

import { createApp } from 'vue'
import AllProducts from './components/order/AllProducts'
import MyProducts from './components/order/MyProducts'
import Search from './components/order/Search'
import SearchList from './components/order/SearchList'
import Toaster from "@incuca/vue3-toaster";
import store from './store/store'

const app = createApp({})
app.use(Toaster)
app.use(store)
app.component('AllProducts', AllProducts)
app.component('MyProducts',MyProducts)
app.component('Search', Search)
app.component('SearchList', SearchList)


app.mount('#app')