import { createStore } from 'vuex';
import axios from 'axios';

export default createStore({
  state: {
    activities: [],
    freeSlots: []
  },
  mutations: {
    setActivities(state, activities) {
      state.activities = activities;
    }
  },
  actions: {
    async fetchActivities({ commit }) {
      try {
        const response = await axios.get('http://localhost:8000/api/activities');
        commit('setActivities', response.data);
      } catch (error) {
        console.error('Erro ao buscar atividades:', error);
      }
    },
    async createActivity({ dispatch }, activity) {
      await axios.post('http://localhost:8000/api/activities', activity);
      dispatch('fetchActivities');
    }
  }
});