<template>
    <section>
        <h3 v-html="title" v-show="title"></h3>
        <b-card-group columns>
            <slot>
                <sw-image-gallery-item
                    v-for="(image, idx) in images"
                    :key="`img-gallery-${_uid}-${idx}`"
                    v-bind="image"
                    :no-labels="noLabels"
                    class="clickable"
                    @set-active-image="activeImage = $event"></sw-image-gallery-item>
            </slot>
        </b-card-group>
        <b-modal :id="`img-gallery-modal-${_uid}`"
            :title="activeImage ? activeImage.title : null"
            v-model="modalShow"
            no-stacking
            size="xl"
            hide-footer
            @hidden="activeImage = null">
            <b-img fluid-grow :src="activeImage ? activeImage.imageSrc : null"></b-img>
            <div v-show="activeImage && activeImage.description" v-html="activeImage ? activeImage.description : null"></div>
        </b-modal>
    </section>
</template>
<style lang="scss">
    .clickable {
        cursor: pointer;
    }
</style>
<script>
import BImageGalleryItem from './ImgGalleryItem.vue'
export default {
  name: 'sw-image-gallery',
  props: {
    title: {
      type: String,
      default: null
    },
    images: {
      type: Array,
      default () {
        return []
      },
      validator (value) {
        let invalid = false
        value.forEach((obj) => {
          const props = Object.keys(obj)
          if (props.indexOf('title') === -1 ||
                        props.indexOf('description') === -1 ||
                        props.indexOf('image') === -1) {
            invalid = true
          }
        })
        return invalid
      }
    },
    noLabels: {
      type: Boolean,
      default: false
    }
  },
  data () {
    return {
      activeImage: null
    }
  },
  computed: {
    modalShow () {
      return Boolean(this.activeImage)
    }
  },
  components: {
    'sw-image-gallery-item': BImageGalleryItem
  }
}
</script>
