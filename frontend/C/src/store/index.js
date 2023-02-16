import { createApp } from 'vue';
import { createStore } from 'vuex';

const app = createApp({});

export default createStore({
  state: {
    rightLists: [
      'Watermelon',
      'Banana',
      'Peach'
    ],
    leftLists: [
      'Apple',
      'Grape',
      'Strawberry',
      'Cherry',
      'Plum'
    ]
  },
  mutations: {}
});