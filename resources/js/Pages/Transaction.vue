<template>
     <Header :header="$page.props.header" />
    <main>
        <div class="Up w-full h-6">
            <Link
                v-if="$page.props.auth.user"
                class="write-btn hover:text-orange-300 font-bold"
                :href="route('Upload')"
            >
                매물 올리기
            </Link>
        </div>
    </main>
</template>

<style>
.Up{
    padding-top: 10px;
    text-align: center;
    font-size: 20px;
    margin-top: 10px;
}

.Upbtn{
    margin: auto;
    display: block;
    width: 150px;
    height: 30px;
    border-radius: 50px;
    border: 1px solid #000;
}
</style>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import Header from '@/Components/header.vue';


</script>