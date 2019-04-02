<template>
  <div class="row">
    <div class="col-3">
      <apartment-form @update:apartment="add"></apartment-form>
    </div>
    <div class="col">
      <div class="card-deck" v-for="chunk in recentApartments">
        <apartment-listing
          v-for="apartment in chunk"
          :key="apartment.id"
          :apartment="apartment"
        ></apartment-listing>
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
  data() {
    return {
      all: [],
    };
  },
  computed: {
    recentApartments() {
      return chunk(this.all, 3);
    },
  },
  methods: {
    add(apartment) {
      this.all.unshift(apartment);
    },
  },
  mounted() {
    this.all = this.apartments;
  },
};
</script>
