<template>
  <div>
    <div class="content">
      <p class="subtitle">
        <vue-markdown :source="input"></vue-markdown>
      </p>
    </div>
    <button class="button" v-if="!trying" @click="trying = true">Try</button>
    <textarea name="input" id="input" cols="30" rows="10" @input="update" v-html="input" v-if="trying" @blur="trying = false"/>
  </div>
</template>

<script>
  export default {
    name: 'MarkdownSample',
    methods: {
      update: _.debounce(function (e) {
        this.input = e.target.value
      }, 300)
    },
    data () {
      return {
        input: 'Realtime Markdown Editor for Developers',
        trying: false
      }
    }
  }
</script>
