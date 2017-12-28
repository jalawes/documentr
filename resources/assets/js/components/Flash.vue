<template>
  <div class="notification is-info is-alert-flash" v-show="show">
    <button class="delete"></button>
    {{ body }}
  </div>
</template>

<script>
  export default {
    name: 'Flash',
    props: {
      message: {
        type: String
      }
    },
    data () {
      return {
        body: '',
        show: false,
      }
    },
    created () {
      if (this.message) {
        this.flash(this.message)
      }

      window.events.$on('flash', message => this.flash(message));
    },
    methods: {
      flash (message) {
        this.body = message
        this.show = true

        this.hide()
      },
      hide () {
        setTimeout(() => {
          this.show = false
        }, 3000)
      }
    }
  }
</script>

<style scoped lang="scss">
  .is-alert-flash {
    position: fixed;
    right: 24px;
    top: 72px;
    border-radius: 4px;
    box-shadow: 0 2px 3px rgba(10, 10, 10, 0.1), 0 0 0 1px rgba(10, 10, 10, 0.1);
    z-index: 1000;
  }
</style>
