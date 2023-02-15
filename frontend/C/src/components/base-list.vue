<template>
<div>
    <div v-for="(list, key) in lists" :key="key">
        <div>{{ list }}</div>
    </div>
</div>
</template>

<script>
import { mapState } from "vuex";

export default {
    computed: mapState({
            lists: state => state.lists,
    })
}
</script>
