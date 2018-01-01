<template>
  <div>
    <div class="content">
      <p class="subtitle">
        <vue-markdown :source="input" />
      </p>
    </div>
    <button class="button"
            v-if="!trying"
            @click="startTrying">Try
    </button>
    <textarea name="input"
              id="input-code"
              class="code textarea"
              @input="update"
              v-html="input"
              v-if="trying"
              @focus="startTrying"
              @blur="stopTrying"
              title="input"></textarea>
  </div>
</template>

<script>
  export default {
    name: 'MarkdownSample',
    methods: {
      update: _.debounce(function(event) {
        this.input = event.target.value;
      }, 300),
      startTrying() {
        this.trying = true;
      },
      stopTrying() {
        this.trying = false;
        this.reset();
      },
      reset() {
        if (!this.input) {
          this.input = 'Real time Markdown Editor for Developers';
        }
      },
    },
    data() {
      return {
        input: 'Real time Markdown Editor for Developers',
        trying: false,
      };
    },
  };
</script>

<style scoped lang="scss">
  .code {
    font-size:   10px !important;
    font-family: 'Source Code Pro', monospace !important;
  }
</style>
