<template>
  <transition
    name="alert"
    enter-active-class="animated slideInRight"
    leave-active-class="animated slideOutRight">
    <slot />
  </transition>
</template>

<script>
  export default {
    name: 'toast',
  };
</script>

<style scoped>

</style>
