<script>
  import moment from 'moment';

  export default {
    name: 'Date',
    props: {
      dateTime: {
        required: true,
      },
    },
    computed: {

      /**
       * Return the relative time since the dateTime prop..
       *
       * @returns {*|moment.Moment}
       */
      ago() {
        return moment(this.dateTime).fromNow();
      },

      /**
       * Return the date and time for the dateTime prop.
       *
       * @returns {*|moment.Moment}
       */
      now() {
        return moment(this.dateTime);
      },

    },
  };
</script>
