<template>
  <span>
    <span v-if="ago">{{ calendarTime }}</span>
    <span v-text="now" v-else></span>
  </span>
</template>

<script>
import moment from 'moment';

export default {
  name: 'moment',
  props: {
    ago: {
      required: false,
      type: Boolean,
      default: true,
    },
    date: {
      required: true,
      type: String,
    },
  },
  computed: {
    calendarTime() {
      return moment(this.date).fromNow();
    },
    now() {
      return moment();
    },
  },
};
</script>
