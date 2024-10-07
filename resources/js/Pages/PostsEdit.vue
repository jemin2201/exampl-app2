<template>
    <Header :header="$page.props.header" />
    <div>
        <h2 class="Post">
            게시글 수정
        </h2>
        <hr class="my-4">
    </div>
    <main class="w-full">
        <form action="" class="form" @submit.prevent>
            <div class="title mb-3">
                <label for="title" class="label1">제목</label> <br>
                <input type="text" class="label2" id="title" />
            </div>
            <div class="mb-3">
                <label for="content" class="label1">내용</label> <br>
                <textarea class="text" id="content" rows="3"></textarea>
            </div>
            <div class="pt-4">
                <button class="listl" type="button" @click="goDetail">취소</button>
                <button class="storage">수정</button>
            </div>
        </form>
    </main>
</template>

<script setup>
import { defineProps } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import Header from '@/Components/header.vue';
const props = defineProps(['id']);

const goDetail = () => {
    Inertia.visit(route('PostsDetail', { id: props.id }));
}
</script>

<style>
.Post{
    font-size: 25px;
    margin-top: 15px;
    text-align: center;
}
main{
    height: 600px;
}

.form{
    width: 1200px;
    height: 500px;
    margin: auto;
    margin-top: 40px;
}
.label1{
    font-weight: bold;
}
.label2{
    width: 100%;
    border-radius: 5px;
    margin-top: 5px;
}
.text{
    width: 100%;
    border-radius: 5px;
    margin-top: 5px;
}

.listl{
    width: 60px;
    height: 45px;
    border-radius: 5px;
    font-weight: bold;
    border: 1.5px solid red;
    color: red;
}

.storage{
    width: 60px;
    height: 45px;
    border-radius: 5px;
    font-weight: bold;
    color: white;
    margin-left: 8px;
    border: 1px solid rgb(63, 63, 250);
    background-color: rgb(70, 70, 255);
}
</style>