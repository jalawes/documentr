<template>
  <toast>
    <div class="card is-alert-flash tooltip is-tooltip-bottom" data-tooltip="Hide"
         v-show="show"
         @click.prevent="hideNow">
      <div class="card-content">
        <div class="content">
          <p>{{ body }}</p>
        </div>
      </div>
    </div>
  </toast>
</template>

<script>
  export default {
    name: 'Notification',
    props: {
      message: {
        type: String,
      },
    },
    data() {
      return {
        body: '',
        show: false,
      };
    },
    methods: {

      /**
       * Display the notification after a short delay
       */
      flash(message) {
        setTimeout(() => {
          this.body = message;
          this.show = true;

          this.hide();
        }, 250);
      },

      /**
       * Hides the notification after a short delay
       */
      hide() {
        if (!this.show) return;

        setTimeout(() => {
          this.hideNow();
        }, 3000);
      },

      /**
       * Hides the notification immediately
       */
      hideNow() {
        if (!this.show) return;
        this.show = false;
      },
    },
    created() {
      if (this.message) {
        this.flash(this.message);
      }
      window.events.$on('flash', message => this.flash(message));
    },
  };
</script>

<style scoped lang="scss">
  .is-alert-flash {
    border-radius: 4px;
    box-shadow:    0 8px 8px rgba(10, 10, 10, 0.1), 0 0 0 1px rgba(10, 10, 10, 0.1);
    cursor:        pointer;
    max-width:     25%;
    position:      fixed;
    right:         24px;
    top:           72px;
    z-index:       1000;
  }

  .animated {
    animation-duration: 0.5s;
  }
</style>
