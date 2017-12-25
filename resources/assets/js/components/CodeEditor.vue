<template>
  <textarea name="code"
            id="code"
            v-model="body"
            v-cloak
  ></textarea>
</template>

<script>
  import CodeMirror from 'codemirror'

  export default {
    name: 'code-editor',
    computed: {
      compiled () {
        return CodeMirror(this.textArea, this.config)
      },
      textArea () {
        return document.getElementById('code')
      }
    },
    data () {
      return {
        body: '',
        config: {

        }
      }
    }
  }
</script>

<style scoped>

</style>
