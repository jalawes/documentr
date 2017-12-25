<template>
  <div class="ui-content is-full-height">
    <div class="columns is-gapless is-full-height">
      <!-- code editor -->
      <div class="column is-half">
         <codemirror
            ref="myCm"
            :value="code"
            :options="cmOptions"
            @ready="onCmReady"
            @focus="onCmFocus"
            @input="onCmCodeChange"
          ></codemirror>
      </div>
      <!-- code preview -->
      <div class="column is-half content">
        <vue-markdown :source="code" />
      </div>
    </div>
    <div class="users-box">
      <icon name="users"></icon>
      Connected: {{ users.count }}
      <icon name="comment"></icon>
      Channel: {{ users.channel }}
    </div>
  </div>
</template>

<script>
  import { codemirror } from 'vue-codemirror'
  // dialog
  require('codemirror/addon/dialog/dialog')
  // display
  require('codemirror/addon/display/placeholder')
  require('codemirror/addon/display/fullscreen')
  // require('codemirror/addon/display/panel')
  import panel from 'codemirror/addon/display/panel'
  // search
  require('codemirror/addon/search/jump-to-line')
  // hints
  require('codemirror/addon/hint/show-hint')
  // selection
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
          theme: 'material',
          placeholder: '# start by entering a title here',
        },
        code: '',
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
    },
    mounted() {
      console.log('this is current codemirror object', this.codemirror)
      // you can use this.codemirror to do something...
      this.addUser()
    }
  }
</script>

<style>
  html, body {
    height: 100%;
    margin: 0px;
    padding: 0px;
  }
  #app {
    height: 90%;
  }
  .ui-content {
    margin-left:  0;
    margin-right: 0;
    height:       100%;
    overflow-y: scroll;
  }
  .ui-edit-area {
    height:        100%;
    padding-left:  0 !important;
    padding-right: 0 !important;
  }
  .ui-resizble {
    position: relative;
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
</style>
