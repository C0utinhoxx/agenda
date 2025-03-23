<template>
  <form @submit.prevent="submit" class="activity-form">
    <div class="form-group">
      <label for="name">Nome:</label>
      <input id="name" v-model="form.name" placeholder="Nome" required />
    </div>
    <div class="form-group">
      <label for="description">Descrição:</label>
      <textarea id="description" v-model="form.description" placeholder="Descrição" required></textarea>
    </div>
    <div class="form-group">
      <label for="date">Data:</label>
      <input id="date" type="date" v-model="form.date" required />
    </div>
    <div class="form-group">
      <label for="start_time">Início:</label>
      <input id="start_time" type="time" v-model="form.start_time" required />
    </div>
    <div class="form-group">
      <label for="end_time">Fim:</label>
      <input id="end_time" type="time" v-model="form.end_time" required />
    </div>
    <div class="form-group">
      <label for="recurrence">Recorrência:</label>
      <select id="recurrence" v-model="form.recurrence" required>
        <option value="once">Uma vez</option>
        <option value="weekly">Semanal</option>
      </select>
    </div>
    <div v-if="form.recurrence === 'weekly'" class="form-group">
      <label for="recurrence_weeks">Semanas:</label>
      <input id="recurrence_weeks" v-model="form.recurrence_weeks" type="number" placeholder="Semanas" />
    </div>
    <button type="submit">Cadastrar</button>
  </form>
</template>

<script>
export default {
  data() {
    return {
      form: {
        name: '',
        description: '',
        date: '',
        start_time: '',
        end_time: '',
        recurrence: 'once',
        recurrence_weeks: null
      }
    };
  },
  methods: {
    submit() {
      this.$store.dispatch('createActivity', this.form).then(() => {
        this.$router.push('/');
      });
    }
  }
};
</script>

<style scoped>
.activity-form {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
}

.form-group {
  margin-bottom: 15px;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

input,
textarea,
select {
  width: 100%;
  padding: 8px;
  box-sizing: border-box;
}

textarea {
  height: 100px;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  background-color: #45a049;
}

/* Estilos responsivos */
@media (max-width: 768px) {
  .activity-form {
    padding: 10px;
  }

  input,
  textarea,
  select {
    font-size: 0.9rem;
  }

  button {
    font-size: 0.9rem;
    padding: 8px;
  }
}

@media (max-width: 480px) {
  .activity-form {
    padding: 5px;
  }

  label {
    font-size: 0.9rem;
  }

  input,
  textarea,
  select {
    font-size: 0.8rem;
  }

  button {
    font-size: 0.8rem;
    padding: 6px;
  }
}
</style>