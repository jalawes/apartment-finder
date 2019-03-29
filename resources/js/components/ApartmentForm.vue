<template>
  <div class="card mt-4">
    <div class="card-header">Apartment Form</div>
    <div class="card-body">
      <form @submit.prevent="store">
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" aria-describedby="listing-email" placeholder="Enter email" v-model="apartment.email">
          <small id="listing-email" class="form-text text-muted">We'll never share this email with anyone else. It will be used to send your canned template.</small>
        </div>
        <div class="form-group">
          <label for="url">URL</label>
          <input type="text" class="form-control" id="url" aria-describedby="listing-url" placeholder="Enter the url of the listing" v-model="apartment.url">
          <small id="listing-url" class="form-text text-muted">This is used to save a the listing so you won't lose it.</small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: 'apartment-finder',
  data() {
    return {
      apartment: {
        email: '',
        url: '',
      },
    };
  },
  methods: {
    /**
     * Reset the apartment submission form.
     */
    resetForm() {
      this.apartment = {
        email: '',
        url: '',
      };
    },

    /**
     * Store the apartment listing.
     */
    store() {
      axios
        .post('apartments', this.apartment)
        .then(({ data }) => {
          this.resetForm();
        })
        .catch(e => console.error('Oops! Looks like there was an error submitting the form!', e));
    },
  },
};
</script>
