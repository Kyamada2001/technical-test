<template>
  <div>
    <left-contents/>
    <right-contents/>
  </div>
</template>

<script>
import leftContents from './components/left-contents.vue';
import rightContents from './components/right-contents.vue';
export default {
  components: {
    leftContents,
    rightContents
  }
}
</script>