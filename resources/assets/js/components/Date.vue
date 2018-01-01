<script>
import moment from 'moment';

export default {
  name: 'Date',
  props: {
    dateTime: {
      required: true,
      validator: function(value) {
        return true;
      }
    }
  },

  data() {
    return {
      time: this.dateTime
    }
  },

  computed: {

    ago: _.throttle(function() {
      return moment(this.time).fromNow()
    }, 3600),

    dayAgo: _.throttle(function() {
      return moment().calendar(this.time, {
        sameDay: '[Today]',
        lastDay: '[Yesterday]',
      })
    }, 86400),

    secondsAgo() {
      return moment(this.time).format('LT');
    },

    now() {
      return moment(this.time)
    }
  }
}
</script>
