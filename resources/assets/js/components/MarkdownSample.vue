<template>
  <div class="columns is-centered">
    <div class="column is-6">

      <div class="box sample" v-show="!trying" @click="startTrying">
        <preview :code="input" />
        <div class="field has-text-right">
          <p class="help" v-if="updatedBy">Last Updated by {{ updatedBy }}</p>
        </div>
      </div>

      <div class="sample box" v-show="trying">
        <code-mirror name="input"
                     @input="update"
                     :value="input"
                     @focus="startTrying"
                     @blur="stopTrying" />
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'MarkdownSample',
    methods: {

      addUser() {
        this.users.push(this.user);
      },

      update: _.debounce(function(message) {
        this.input = message;
        this.sendRequest();
      }, 1000),

      sendRequest() {
        axios.post('/', {
          username: this.name,
          body: this.input,
        });
      },

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
    filters: {
      getInitials(name) {
        let initials = name.match(/\b\w/g) || [];
        initials = ((initials.shift() || '') + (initials.pop() || '')).toUpperCase();
        return initials;
      },
    },
    computed: {
      user() {
        return window.App.user ? window.App.user : 'Anonymous';
      },
    },
    data() {
      return {
        input: 'Real time Markdown Editor for Developers',
        trying: false,
        message: {
          body: '',
        },
        updatedBy: '',
        users: [],
      };
    },
    created() {
      this.addUser();
      window.socket.on('test-channel:user-signed-up', (message) => {
        this.input = message.body;
        this.updatedBy = message.username;
      });
    },
  };
</script>

<style scoped lang="scss">
  .code {
    font-size: 14px !important;
    font-family: 'Source Code Pro', monospace !important;
  }

  .sample {
    text-align: left;
  }
</style>
