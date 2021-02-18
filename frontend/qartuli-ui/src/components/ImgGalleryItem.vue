<template>
    <b-card @click="$emit('set-active-image', $props)"
        tag="div"
        no-body
        header-tag="header">
        <template v-slot.header>
            <h5 class="m-2" v-html="title"></h5>
        </template>
        <b-card-img :src="imageSrc"></b-card-img>
        <b-card-body v-if="description">
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
    }
  }
}
</script>
