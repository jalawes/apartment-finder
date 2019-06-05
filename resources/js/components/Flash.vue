<template>
  <div class="sticky-top container" v-show="show">
    <div
      :class="`alert alert-${notification.level}`"
      role="alert"
      v-for="notification in notifications"
      :key="notification.message"
    >
      {{ notification.message }}
    </div>
  </div>
</template>

<script>
export default {
  name: 'flash',

  props: {
    notification: {
      type: Object,
      required: false,
      validator(value) {
        return [
          'danger',
          'danger',
          'primary',
          'secondary',
          'success',
        ].indexOf(value.type) !== -1;
      },
    },
  },

  data() {
    return {
      notifications: [],
    };
  },

  created() {
    window.events.$on('flash', this.flash);
  },

  methods: {
    flash({ message, level = 'success', duration = 5000 }) {
      const notification = { message, level, duration };
      if (notification.message) {
        this.notifications.unshift(notification);
        setTimeout(() => {
          this.notifications.pop();
        }, duration);
      }
    },
  },
  computed: {
    show() {
      return Boolean(this.notifications.length);
    },
  },
};
</script>
