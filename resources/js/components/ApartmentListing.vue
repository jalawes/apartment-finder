<template>
  <div class="card card-deck-card">
    <a :href="apartment.url" target=”_blank” class="card-img-top card-img-top-link">
      <img :src="thumbnailPath" class="card-img-top " alt="Recent Apartment Listing">
    </a>
    <div class="card-footer">
      <small class="text-muted">Updated <moment :date="apartment.updated_at" :ago="true"></moment>.</small>
    </div>
  </div>
</template>

<script>
export default {
  name: 'apartment-listing',
  props: {
    apartment: {
      required: true,
      type: Object,
    },
  },
  computed: {
    thumbnailPath() {
      return this.apartment.thumbnail_path || 'https://via.placeholder.com/253x189.jpg?text=No+Photo';
    },
  },
};
</script>
