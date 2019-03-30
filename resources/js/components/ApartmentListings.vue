<template>
  <div>
    <div class="card-deck" v-for="chunk in recentApartments">
      <div class="card listing-card-deck" v-for="apartment in chunk" :key="apartment.id">
        <img :src="apartment.thumbnail_path || 'https://via.placeholder.com/253x189.jpg?text=No+Photo'" class="card-img-top " alt="Recent Apartment Listing">
        <div class="card-footer">
          <small class="text-muted">Last updated <moment :date="apartment.updated_at" :ago="true"></moment>.</small>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { chunk } from '../helpers/Array';

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
      return chunk(this.apartments, 3);
    },
  },
};
</script>
