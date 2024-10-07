<template>
    <Header :header="$page.props.header" />
    <div>
        <h2 class="Post">
            게시글 쓰기
        </h2>
        <hr class="my-4">
    </div>
    <main class="w-full">
        <form @submit.prevent="savePost" class="form">
            <div class="title mb-3">
                <label for="title" class="label1">제목</label> <br>
                <input type="text" class="label2" id="title" v-model="formData.title" />
            </div>
            <div class="mb-3">
                <label for="content" class="label1">내용</label> <br>
                <textarea class="text" id="content" rows="3" v-model="formData.content"></textarea>
            </div>
            <div class="pt-4">
                <button class="listl" type="button" @click="goPost">목록</button>
                <button class="storage" type="submit">저장</button>
            </div>
        </form>
    </main>
</template>

<script setup>
import Header from '@/Components/header.vue';
import { Inertia } from '@inertiajs/inertia';
import { ref } from 'vue';
import axios from 'axios';

const formData = ref({
    title: '',
    content: '',
});

const goPost = () => {
    Inertia.visit(route('Post'));
};

const savePost = async () => {
    try {
        const response = await axios.post('/posts', formData.value);
        console.log('저장 성공:', response);
        Inertia.visit(route('Post'));  // 저장 후 목록 페이지로 이동
    } catch (error) {
        console.error('저장 중 오류 발생:', error.response ? error.response.data : error.message);
    }
};
</script>

<style>
.Post {
    font-size: 25px;
    margin-top: 15px;
    text-align: center;
}
main {
    height: 600px;
}

.form {
    width: 1200px;
    height: 500px;
    margin: auto;
    margin-top: 40px;
}
.label1 {
    font-weight: bold;
}
.label2 {
    width: 100%;
    border-radius: 5px;
    margin-top: 5px;
}
.text {
    width: 100%;
    border-radius: 5px;
    margin-top: 5px;
}

.listl {
    width: 60px;
    height: 45px;
    border-radius: 5px;
    font-weight: bold;
    border: 1.5px solid #000;
}

.storage {
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