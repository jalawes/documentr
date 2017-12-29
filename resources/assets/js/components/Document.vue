<script>
  export default {
    name: 'document',
    props: ['attributes'],

    data() {
      return {
        body: this.attributes.body,
        editing: false,
      };
    },

    methods: {

      destroy() {
        axios.delete('/documents/' + this.attributes.id);
        flash('Deleted!');
      },

      stopEditing() {
        this.editing = false
      },

      startEditing() {
        this.editing = true;
      },

      update() {
        axios.patch('/documents/' + this.attributes.id, {
          body: this.body
        });
        this.stopEditing();
        flash('Updated!');
      }
    },
  };
</script>
