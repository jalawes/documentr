<template>
  <button class="button is-white" @click.prevent="toggle">
    <span class="has-text-warning icon is-small tooltip" :data-tooltip="tooltip">
      <icon :name="icon" />
    </span>
  </button>
</template>

<script>
  export default {
    name: 'favorite',
    props: ['document'],

    data() {
      return {
        favoritesCount: this.document.favorites_count,
        isFavorited: this.document.isFavorited,
      };
    },

    computed: {

      icon() {
        if (this.isFavorited) {
          return 'star';
        } else {
          return 'star-o';
        }
      },

      tooltip() {
        return 'Favorited ' + this.favoritesCount + ' times.';
      },
    },

    methods: {

      favorite() {
        axios.post('/documents/' + this.document.id + '/favorites');
        this.isFavorited = true;
        this.favoritesCount++;
        flash('Added to your favorites!');
      },

      toggle: _.debounce(function() {
        if (this.isFavorited) {
          this.unFavorite();
        } else {
          this.favorite();
        }
      }, 300, {leading: true, trailing: false}),

      unFavorite() {
        axios.delete('/documents/' + this.document.id + '/favorites');
        this.isFavorited = false;
        this.favoritesCount--;
        flash('Removed from your favorites!');
      },
    },
  };
</script>
