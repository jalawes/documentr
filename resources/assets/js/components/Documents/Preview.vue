<template>
  <div class="content">
    <vue-markdown :source="code"></vue-markdown>
  </div>
</template>

<script>
  export default {
    name: 'Preview',
    props: {
      code: {
        type: String,
        required: true
      }
    }
  }
</script>
