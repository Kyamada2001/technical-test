<template>
<div class="item-list-card">
    <ul>
        <li v-for="(list, key) in lists" :key="key">
            {{ list }}
        </li>
    </ul>
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
