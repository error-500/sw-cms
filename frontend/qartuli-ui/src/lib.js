/*
 * SW frontend library
 */
import Vue from 'vue'
import {
  BootstrapVue,
  IconsPlugin
} from 'bootstrap-vue'

// Import Bootstrap an BootstrapVue CSS files (order is important)
import '@/assets/scss/lib.scss'
/**
 * Import lib components and global registration
 */

import SwGallery from '@/components/ImgGallery.vue'

import SwGalleryItem from '@/components/ImgGalleryItem.vue'

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

Vue.config.productionTip = false
Vue.component('sw-image-gallery', SwGallery)
Vue.component('sw-image-gallery-item', SwGalleryItem)
