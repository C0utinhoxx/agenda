<template>
  <vue-cal
    :events="formattedEvents"
    :time-from="8 * 60"
    :time-to="22 * 60"
  />
</template>

<script>
import VueCal from 'vue-cal';
import 'vue-cal/dist/vuecal.css';

export default {
  components: { VueCal },
  computed: {
    formattedEvents() {
      return this.$store.state.activities.map(activity => ({
        start: `${activity.date} ${activity.start_time}`,
        end: `${activity.date} ${activity.end_time}`,
        title: activity.name,
        class: 'activity'
      }));
    }
  },
  created() {
    this.$store.dispatch('fetchActivities');
  }
};
</script>

<style>
.activity { background-color: yellow; }
.free-slot { background-color: green; }
</style>