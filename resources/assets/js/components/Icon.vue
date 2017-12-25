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
        return 'icon ' + this.color
      },
      iconClass () {
        return 'fa fa-fw fa-' + this.name
      }
    }
  }
</script>
