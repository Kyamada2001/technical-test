<template>
    <div class="container-content">
        <base-list :lists="leftLists"/>
        <div class="list-under">
          <button v-on:click="moveRight" class="move-btn" type="button">右へ移動</button>
        </div>
    </div>
</template>
<script>
import baseList from './base-list.vue'
import { mapState } from 'vuex'

export default {
  components: { baseList },
  computed: mapState({
    leftLists: state => state.leftLists,
  }),
  methods: {
    moveRight() {
        this.$store.dispatch('moveRightList');
    }
  }
    
}
</script>