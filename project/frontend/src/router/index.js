import { createRouter, createWebHistory } from 'vue-router';
import AgendaView from '../views/AgendaView.vue';
import CreateActivityView from '../views/CreateActivityView.vue';

const routes = [
  { path: '/', name: 'Agenda', component: AgendaView },
  { path: '/create', name: 'CreateActivity', component: CreateActivityView }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;