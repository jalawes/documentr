<script>
  import moment from 'moment';

  export default {
    name:     'Date',
    props:    {
      dateTime: {
        required: true,
      },
    },
    computed: {
      ago() {
        return moment(this.dateTime).fromNow();
      },

      now() {
        return moment(this.dateTime);
      },
    },
  };
</script>
