<template>
  <div class="row">
    <div class="col-3">
      <apartment-form @update:apartment="add"></apartment-form>
    </div>
    <div class="col">
      <div class="card-deck mb-4" v-for="chunk in recentApartments">
        <apartment-listing
          v-for="apartment in chunk"
          :key="apartment.id"
          :apartment="apartment"
        ></apartment-listing>
      </div>
      <nav aria-label="Apartment Listing Pagination Navigation Bar">
        <ul class="pagination">
          <li class="page-item" v-show="this.apartments.prev_page_url">
            <a class="page-link" :href="this.apartments.prev_page_url">Previous</a>
          </li>
          <li class="page-item" v-show="this.apartments.next_page_url"><a class="page-link" :href="this.apartments.next_page_url">Next</a></li>
        </ul>
      </nav>
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
      type: Object,
    },
  },
  data() {
    return {
      all: [],
      currentPage: undefined,
    };
  },
  computed: {
    // pages() {
    //   return [...Array(this.apartments.to).keys()]
    //     .map(x => x + 1);
    // },
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
    const { current_page: currentPage } = this.apartments;
    this.currentPage = currentPage;
    this.all = this.apartments.data;
  },
};
</script>
