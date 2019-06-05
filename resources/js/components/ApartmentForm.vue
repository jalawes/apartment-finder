<template>
  <div class="card">
    <div class="card-header">New Apartment</div>
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
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="send-email" name="sendEmail" v-model="apartment.sendEmail">
          <label class="form-check-label" for="send-email">Send Email</label>
          <small id="emailHelp" class="form-text text-muted">Sends an email to provided email address during submission if checked.</small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <small class="text-muted">
        <a target="_blank" href="https://vancouver.craigslist.org/search/apa?query=-%22no+pet*%22+-%22pets%3A+no*%22+-%22zero+pet*%22+-%22Pets%3A+No*%22+-%22Pets%3A+sorry+not*%22&sort=date&hasPic=1&bundleDuplicates=1&min_price=1000&max_price=1600&availabilityMode=0&sale_date=all+dates">Click here to open the search.</a>
      </small>
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
        sendEmail: true,
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
        sendEmail: true,
        url: '',
      };
    },

    handleNewApartment(apartment) {
      this.$emit('update:apartment', apartment);
      flash('Success! Added new apartment!');
      this.resetForm();
    },

    /**
     * Store the apartment listing.
     */
    store() {
      axios
        .post('apartments', this.apartment)
        .then(({ data }) => this.handleNewApartment(data))
        .catch(e => window.flash(e, 'danger'));
    },
  },
};
</script>
