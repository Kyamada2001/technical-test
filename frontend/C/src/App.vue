<template>
  <div class="container">
    <div class="container-inner">
      <left-contents/>
      <right-contents/>
    </div>
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