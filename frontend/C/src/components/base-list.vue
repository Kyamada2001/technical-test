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
    props: {
        lists: { type: Array, required: true }
    },
}
</script>
