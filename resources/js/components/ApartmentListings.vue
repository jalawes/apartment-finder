<template>
  <div id="apartment-listing-controls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://via.placeholder.com/728x150.png?text=Your-Applied-Apartment+Listing+Image+1" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://via.placeholder.com/728x150.png?text=Your-Applied-Apartment+Listing+Image+2" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://via.placeholder.com/728x150.png?text=Your-Applied-Apartment+Listing+Image+3" class="d-block w-100" alt="...">
      </div>
    </div>
    <a class="carousel-control-prev" href="#apartment-listing-controls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#apartment-listing-controls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
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
};
</script>
