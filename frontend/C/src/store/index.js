import { createApp } from 'vue';
import { createStore } from 'vuex';

const app = createApp({});

export default createStore({
  state: {
    lists: [
      'Apple',
      'Banana',
    ]
  },
  mutations: {}
});