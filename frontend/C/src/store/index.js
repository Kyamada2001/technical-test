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
  mutations: {
    updateRightLists(state, payload) {
      state.rightLists = payload.rightLists;
    },
    updateLeftLists(state, payload) {
      state.leftLists = payload.leftLists;
    }
  },
  actions: {
    moveRightList(context) {
      let newLeftLists = [...this.state.leftLists];
      let newRightLists = [...this.state.rightLists];
      const lastLeftList = newLeftLists.pop();
      newRightLists.push(lastLeftList);
    
      if(lastLeftList === undefined) return false;

      context.commit('updateLeftLists', {
        leftLists: newLeftLists
      });
      context.commit('updateRightLists', {
        rightLists: newRightLists
      });
    },
    moveLeftList(context) {
      let newRightLists = [...this.state.rightLists];
      let newLeftLists = [...this.state.leftLists];
      const lastRightList = newRightLists.pop();
      newLeftLists.push(lastRightList);
    
      if(lastRightList === undefined) return false;

      context.commit('updateLeftLists', {
        leftLists: newLeftLists
      });
      context.commit('updateRightLists', {
        rightLists: newRightLists
      });
    }
  }
});