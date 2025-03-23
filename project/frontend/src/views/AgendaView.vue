<template>
  <div class="agenda-container">
    <h1>Agenda</h1>
    <vue-cal
      :events="formattedEvents"
      active-view="day"
      :time-from="8 * 60"
      :time-to="22 * 60"
      :disable-views="['years', 'year', 'month']"
    />
  </div>
</template>

<script>
import VueCal from 'vue-cal';
import 'vue-cal/dist/vuecal.css';

export default {
  components: { VueCal },
  computed: {
    formattedEvents() {
      const activities = this.$store.state.activities.map(activity => ({
        start: `${activity.date} ${activity.start_time}`,
        end: `${activity.date} ${activity.end_time}`,
        title: activity.name,
        class: 'activity'
      }));

      const freeSlots = [
        {
          start: '2025-03-21 08:00',
          end: '2025-03-21 09:00',
          title: 'Horário Livre',
          class: 'free-slot'
        },
        {
          start: '2025-03-21 11:00',
          end: '2025-03-21 12:00',
          title: 'Horário Livre',
          class: 'free-slot'
        }
      ];

      return [...activities, ...freeSlots];
    }
  },
  created() {
    this.$store.dispatch('fetchActivities');
  }
};
</script>

<style>
.agenda-container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

h1 {
  color: #333;
  text-align: center;
}

.activity {
  background-color: yellow;
}
.activity .vuecal__event-title {
  color: blue;
}

.free-slot {
  background-color: green;
}
.free-slot .vuecal__event-title {
  color: white;
}

/* Estilos responsivos */
@media (max-width: 768px) {
  .agenda-container {
    padding: 10px;
  }

  h1 {
    font-size: 1.5rem; 
  }

  /* Ajusta o vue-cal para telas menores */
  .vuecal__event {
    font-size: 0.8rem; 
  }

  .vuecal__time-cell-label {
    font-size: 0.7rem;
  }

  .vuecal__cell-content {
    padding: 2px; 
  }
}

@media (max-width: 480px) {
  h1 {
    font-size: 1.2rem;
  }

  .vuecal__event {
    font-size: 0.6rem;
  }

  .vuecal__time-cell-label {
    font-size: 0.6rem;
  }

  
  .vuecal {
    min-width: 100%;
  }
}
</style>