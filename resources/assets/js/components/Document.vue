<script>
  import moment from 'moment';

  export default {
    name: 'document',
    props: ['attributes'],

    data() {
      return {
        body: this.attributes.body,
        editing: false,
      };
    },

    computed: {
      ago() {
        return moment(this.attributes.created_at).fromNow();
      },
    },

    methods: {

      /**
       * Delete the document.
       */
      destroy() {
        axios.delete('/documents/' + this.attributes.id).then((response) => {
          flash('Deleted ' + this.attributes.title + '.');
          // redirect to index
        }).catch(function(error) {
          flash('Error');
        });
      },

      stopEditing() {
        this.editing = false;
      },

      startEditing() {
        this.editing = true;
      },

      update: _.throttle(function() {
        this.stopEditing();
        axios.patch('/documents/' + this.attributes.id, {
          body: this.body,
        }).then((response) => {
          flash('Updated!');
        }).catch((error) => {
          flash('Error');
        });
      }, 300),
    },
  };
</script>
