<template>
  <form @submit.prevent="submit">
    <!--Title-->
    <div class="field">
      <label class="label" for="title">Title</label>
      <div class="control has-icons-left">
        <input class="input"
               type="text"
               id="title"
               name="title"
               placeholder="My New Document"
               required
               v-model="title">
        <span class="icon is-small is-left"><i class="fa fa-file-text-o"></i></span>
      </div>
    </div>

    <!--Body-->
    <div class="field">
      <label class="label" for="body">Body</label>
      <div class="control has-icons-left has-icons-right">
        <code-mirror id="body" name="body" v-model="body" v-show="!showPreview"></code-mirror>
        <preview :code="body" v-if="showPreview"></preview>
      </div>
    </div>

    <!--Button panel-->
    <div class="buttons is-right">
      <fade-in>
        <button class="button is-white tooltip"
                data-tooltip="Toggle Preview"
                v-if="canReset"
                @click.prevent="togglePreview">
          <icon :name="showPreview ? 'eye-slash' : 'eye'"></icon>
        </button>
      </fade-in>

      <fade-in>
        <button class="button is-white tooltip"
                data-tooltip="Reset"
                type="reset"
                v-if="canReset"
                @click.prevent="reset">
          <icon name="undo"></icon>
        </button>
      </fade-in>

      <fade-in>
        <button class="button is-white tooltip"
                data-tooltip="Send"
                type="submit"
                v-if="canReset">
          <icon name="send-o"></icon>
        </button>
      </fade-in>
    </div>
  </form>
</template>

<script>
  export default {
    name: 'DocumentCreate',

    methods: {
      /**
       * Return true if the document has the specified field filled
       */
      hasField(field) {
        return _.isString(field) && !_.isEmpty(field);
      },

      /**
       * Reset the input fields
       */
      reset() {
        this.title = '';
        this.body = '';
        this.library_id = '';
      },

      /**
       * Submit the form
       */
      submit() {
        axios.post('/documents', {
          title: this.title,
          body: this.body,
          library_id: this.library_id,
        }).then((response) => {
          flash('Published ' + this.title + '!');
        }).catch(function(error) {
          flash('Error');
          console.log(error);
        });
      },

      /**
       * Toggle display of the preview
       */
      togglePreview() {
        this.showPreview = !this.showPreview;
      },
    },

    data() {
      return {
        title: '',
        body: '',
        library_id: null,
        showPreview: false,
      };
    },

    computed: {
      canReset() {
        return this.hasField(this.body) || this.hasField(this.title);
      },
    },
  };
</script>
