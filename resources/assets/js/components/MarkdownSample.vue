<template>
  <div>
    <div class="content">
      <preview :code="input" v-if="!trying" />
    </div>
    <button class="button"
            v-if="!trying"
            @click="startTrying">Try</button>
    <div class="content">
      <div class="field">
        <textarea name="input"
                  id="input-code"
                  class="code textarea"
                  @input="update"
                  :value="input"
                  v-show="trying"
                  @focus="startTrying"
                  @blur="stopTrying"
                  title="input"></textarea>
        <p class="help" v-show="updatedBy">Last Updated by {{ updatedBy }}</p>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'MarkdownSample',
    methods: {
      update: _.debounce(function(event) {
        this.input = event.target.value;
        let msg = {
          username: this.user.first_name,
          body: this.input
        };
        console.log('sending message:', msg);
        axios.post('/', msg)
      }, 1000),
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
    computed: {
      user() {
        return window.App.user ? window.App.user : 'Anonymous';
      }
    },
    data() {
      return {
        input: 'Real time Markdown Editor for Developers',
        trying: false,
        message: {
          body: '',
        },
        updatedBy: '',
      };
    },
    created() {
      window.socket.on('test-channel:user-signed-up', (message) => {
        this.input = message.body;
        this.updatedBy = message.username
      });
    },
  };
</script>

<style scoped lang="scss">
  .code {
    font-size:   10px !important;
    font-family: 'Source Code Pro', monospace !important;
  }
</style>
