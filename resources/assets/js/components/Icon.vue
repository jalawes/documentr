<template>
<span :class="iconColor" v-cloak>
  <i :class="iconClass"></i>
</span>
</template>

<script>
  export default {
    name: 'Icon',
    props: {
      color: {
        type: String,
        required: false,
        default () {
          return ''
        }
      },
      name: {
        type: String,
        required: true
      }
    },
    computed: {
      iconColor () {
        let classes = 'icon';
        if (this.color) {
          classes += ' ' + this.color
        }
        return classes
      },
      iconClass () {
        return 'fa fa-' + this.name
      }
    }
  }
</script>
