<template>
  <!-- code editor -->
  <div class="content">
    <codemirror
      ref="myCm"
      :value="code"
      :options="cmOptions"
      @ready="onCmReady"
      @focus="onCmFocus"
      @input="onCmCodeChange"
    />
  </div>
</template>

<script>
  import { codemirror } from 'vue-codemirror'

  require('codemirror/addon/dialog/dialog')
  require('codemirror/addon/display/placeholder')
  require('codemirror/addon/display/fullscreen')
  require('codemirror/addon/search/jump-to-line')
  require('codemirror/addon/hint/show-hint')
  require('codemirror/addon/selection/active-line')

  export default {
    name: 'MarkdownCreate',
    components: {
      codemirror
    },
    data () {
      return {
        cmOptions: {
          autofocus: true,
          foldGutter: true,
          fullScreen: false,
          hintOptions:{
            completeSingle: true
          },
          keyMap: 'default',
          lineNumbers: true,
          line: true,
          matchBrackets: true,
          mode: 'text/javascript',
          showCursorWhenSelecting: true,
          styleActiveLine: true,
          styleSelectedText: true,
          tabSize: 4,
          theme: 'mdn-like',
          placeholder: '# start by entering a title here',
        },
        code: '',
        endPoint: '/documents',
        users: {
          count: 0,
          channel: 'Offline',
        }
      }
    },
    methods: {
      addUser () {
        this.users.count++
      },
      onCmReady(cm) {
        console.log('the editor is readied!', cm)
      },
      onCmFocus(cm) {
        console.log('the editor is focus!', cm)
      },
      onCmCodeChange(newCode) {
        console.log('this is new code', newCode)
        this.code = newCode
      },
    },
    computed: {
      codemirror() {
        return this.$refs.myCm.codemirror
      },
      sectionContainer () {
        return document.getElementById('content')
      }
    },
    mounted() {
      console.log('this is current codemirror object', this.codemirror)
      // you can use this.codemirror to do something...
      this.addUser()
      console.log('adding class', this.sectionContainer.classList.add('is-full-height'))
      this.sectionContainer.classList.add('is-full-height')
    }
  }
</script>

<style>
  html, body {
    height: 100%;
  }
  #app {
    height: 90%;
  }
  .ui-content {
    height: 100%;
  }
  .ui-edit-area {
    height: 100%;
  }
  .CodeMirror {
    height: 100%;
  }
  .vue-codemirror {
    height: 100%;
  }
  .is-full-height {
    height: 100%;
  }
  .users-box {
    position: absolute;
    bottom: 10px;
    right: 5px;
  }
  .is-compiled {
    overflow-y: scroll;
  }
</style>
