/*
 * SW frontend library
 */
import Vue from 'vue';
Vue.config.productionTip = false;

// Import Bootstrap an BootstrapVue CSS files (order is important)
import '@/assets/scss/lib.scss';
/**
 * Import lib components and global registration
 */

import SwGallery from '@/components/ImgGallery.vue';
import SwGalleryItem from '@/components/ImgGalleryItem.vue';
Vue.component('sw-image-gallery', SwGallery);
Vue.component('sw-image-gallery-item', SwGalleryItem);


import SwReservForm from '@/components/ReservationForm.vue';
Vue.component('sw-reserv-form', SwReservForm);


import {
    BootstrapVue,
    IconsPlugin
} from 'bootstrap-vue';

Vue.use(BootstrapVue); // Make BootstrapVue available throughout project
Vue.use(IconsPlugin); // Optionally install the BootstrapVue icon components plugin