<template>
  <codemirror :value="body"
              ref="myCm"
              :options="cmOptions"
              @ready="onCmReady"
              @focus="onCmFocus"
              @input="onCmCodeChange"
  ></codemirror>
</template>

<script>
import { codemirror } from 'vue-codemirror'
// import

export default {
  name: 'CodeMirror',
  components: {
    codemirror
  },
  props: {
    value: {
      required: false,
      type: String,
      default () {
        return 'const a = 10';
      }
    }
  },
  computed: {
    codemirror() {
      return this.$refs.myCm.codemirror
    }
  },
  methods: {
    onCmReady(cm) {
      console.log('the editor is readied!', cm)
    },
    onCmFocus(cm) {
      console.log('the editor is focus!', cm)
    },
    onCmCodeChange: _.debounce(function(newCode) {
      console.log('this is new code', newCode)
      console.log('this is current codemirror object', this.codemirror)
      this.body = newCode
      this.$emit('input', this.body)
    }, 500),
  },
  data () {
    return {
      body: this.code,
      cmOptions: {
        // codemirror options
        tabSize: 4,
        // mode: 'text/javascript',
        mode: "htmlmixed",
        theme: 'xq-light',
        lineNumbers: true,
        line: true,
        // more codemirror options, 更多 codemirror 的高级配置...
      }
    }
  }
}
</script>
