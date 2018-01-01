<template>
<form @submit.prevent="submit">
  <div class="field">
    <label class="label" for="title">Title</label>
      <div class="control has-icons-left">
          <input class="input"
                 type="text"
                 name="title"
                 placeholder="My New Document"
                 required
                 v-model="title">
          <span class="icon is-small is-left"><i class="fa fa-file-text-o"></i></span>
      </div>
    </div>
    <div class="field">
        <label class="label" for="body">Body</label>
        <div class="control has-icons-left has-icons-right">
          <code-mirror name="body" v-model="body" v-show="!showPreview"></code-mirror>
          <preview :code="body" v-if="showPreview"></preview>
        </div>
    </div>
    <div class="buttons is-right">
        <button class="button is-white tooltip"
                data-tooltip="Toggle Preview"
                v-if="canReset"
                @click.prevent="togglePreview">
          <icon :name="showPreview ? 'eye' : 'eye-slash'"></icon>
        </button>
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
                  v-if="canSubmit">
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
      reset() {
        this.title = '';
        this.body = '';
        this.library_id = '';
      },
      submit() {
        axios.post('/documents', {
          title: this.title,
          body: this.body,
          library_id: this.library_id,
        }).then((response) => {
          flash('Published ' + this.title + '!');
        }).catch(function (error) {
          flash('Error');
        });
      },

      togglePreview() {
        this.showPreview = !this.showPreview
      }
    },
    data () {
      return {
        title: '',
        body: '',
        library_id: null,
        showPreview: false,
      }
    },
    computed: {
      canReset() {
        return this.hasBody || this.hasTitle
      },
      canSubmit() {
        return this.canReset
      },
      hasBody() {
        return _.isString(this.body) && !_.isEmpty(this.body);
      },
      hasTitle() {
        return _.isString(this.title) && !_.isEmpty(this.title);
      }
    }
  }
</script>
