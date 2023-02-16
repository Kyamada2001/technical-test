<template>
    <div class="container-content">
        <base-list :lists="rightLists"/>
        <div class="list-under">
        <button class="move-btn" type="button">左へ移動</button>
        </div>
    </div>
</template>
<script>
import baseList from './base-list.vue'
import { mapState } from 'vuex'

export default {
  components: { baseList },
  computed: mapState({
    rightLists: state => state.rightLists,
  }),
  methods: {
    moveLeft() {

    }
  }
    
}
</script>