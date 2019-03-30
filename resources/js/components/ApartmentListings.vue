<template>
<div class="card-deck">
  <div class="card" v-for="apartment in recentApartments" :key="apartment.id">
    <img :src="apartment.thumbnail_path" class="card-img-top" alt="Recent Apartment Listing">
    <div class="card-body">
      <p class="card-text"><small class="text-muted">Last updated <moment :date="apartment.updated_at" :ago="true"></moment>.</small></p>
    </div>
  </div>
</div>
</template>

<script>

export default {
  name: 'apartment-listings',
  props: {
    apartments: {
      required: true,
      type: Array,
    },
  },
  computed: {
    recentApartments() {
      return this.apartments.slice(0, 3);
    },
  },
};
</script>
