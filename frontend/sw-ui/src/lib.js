/*
 * SW frontend library
 */
import Vue from 'vue';


// Import Bootstrap an BootstrapVue CSS files (order is important)
import {
    BootstrapVue,
    IconsPlugin
} from 'bootstrap-vue';
import '@/assets/scss/lib.scss';

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue);
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin);
/**
 * Import lib components and global registration
 */

import tinymce from 'vue-tinymce-editor';
Vue.component('sw-editor', tinymce);

import SwCodeEditor from '@/components/SwCodeEditor.vue';
Vue.component('sw-code-editor', SwCodeEditor);

Vue.config.productionTip = false;