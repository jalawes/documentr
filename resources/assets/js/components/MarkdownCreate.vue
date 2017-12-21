<template>
  <div class="panel panel-default">
    <div class="panel-body">
      <form @submit.prevent="submit">
        <input type="text" v-model="form.body">
        <button>Submit</button>
      </form>

    </div>
  </div>
</template>

<script>
  export default {
    name: 'MarkdownCreate',
    methods: {
      submit () {
        console.log('submitting...')
        axios.post('/documents', this.form)
          .then((response) => {
            console.log('received response!')
            console.log(response)
          })
      }
    },
    data () {
      return {
        form: {
          body: ''
        }
      }
    }
  }
</script>
