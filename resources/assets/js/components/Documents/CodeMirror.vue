<template>
  <codemirror :value="body"
              ref="myCm"
              :options="cmOptions"
              @blur="onCmBlur"
              @ready="onCmReady"
              @focus="onCmFocus"
              @input="onCmCodeChange" />
</template>

<script>
  import {codemirror} from 'vue-codemirror';

  export default {
    name: 'CodeMirror',
    components: {
      codemirror,
    },
    props: {
      value: {
        required: false,
        type: String,
        default() {
          return 'const a = 10';
        },
      },
    },
    computed: {
      codemirror() {
        return this.$refs.myCm.codemirror;
      },
    },
    methods: {
      onCmBlur() {
        this.$emit('blur');
      },
      onCmReady(cm) {
        console.log('the editor is readied!', cm);
      },
      onCmFocus(cm) {
        console.log('the editor is focus!', cm);
      },
      onCmCodeChange(newCode) {
        this.body = newCode;
        this.$emit('input', this.body);
      },
    },
    data() {
      return {
        body: this.code,
        cmOptions: {
          tabSize: 4,
          mode: 'text/javascript',
          theme: 'xq-light',
          lineNumbers: true,
          line: true,
        },
      };
    },
  };
</script>
