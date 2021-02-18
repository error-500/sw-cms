<template>
    <b-card @click="$emit('set-active-image', $props)"
        tag="div"
        no-body
        header-tag="header"
        class="border-0">
        <template v-slot.header v-if="!noLabels">
            <h5 class="m-2" v-html="title"></h5>
        </template>
        <b-card-img :src="imageSrc"></b-card-img>
        <b-card-body v-if="description && !noLabels">
            <aside v-html="description"></aside>
        </b-card-body>
    </b-card>
</template>
<script>
export default {
  name: 'sw-image-gallery-item',
  props: {
    title: {
      type: String,
      default: null
    },
    description: {
      type: String,
      default: null
    },
    imageSrc: {
      type: String,
      default: null
    },
    noLabels: {
      type: Boolean,
      default: false
    }
  }
}
</script>
