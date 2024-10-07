<template>
        <th class="th1">
            <Link :href="route('PostsDetail', { id: postId })">{{ title }}</Link>
        </th>
        <th class="th2"> {{ content }} </th>
        <th class="th3"> {{ createdAt }} </th>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    title: {
        type: String,
        required: true,
    },
    content: {
        type: String,
    },
    createdAt: {
        type: [String, Date, Number],
    },
    postId: {
        type: Number,
        required: true,
    },
});
</script>

<style>

.th1 {
    width: 150px;
    height: 50px;
    border: 1px solid #000;
}
.th1 > Link {
    width: 150px;
    height: 50px;
    border: 1px solid #000;
}

.th2 {
    width: 800px;
    height: 50px;
    border: 1px solid #000;
}

.th3 {
    width: 150px;
    height: 50px;
    border: 1px solid #000;
}
</style>