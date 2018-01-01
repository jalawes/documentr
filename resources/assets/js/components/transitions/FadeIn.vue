<template>
  <transition name="fade-in"
              enter-active-class="animated fadeIn"
              leave-active-class="animated fadeOut">
    <slot></slot>
  </transition>
</template>

<script>
  export default {
    name: 'FadeIn',
  }
</script>
