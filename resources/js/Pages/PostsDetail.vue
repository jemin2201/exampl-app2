<template>
    <Header :header="$page.props.header" />
        <div v-if="post" class="container">
            <div class="box1">
                {{ post.title }}
        </div>
        <div class="box2">
            <div class="content">
                {{ post.content }}
                <br>
                작성일: {{ formatDate(post.created_at) }}
            </div>
        </div>
        <hr class="my-4">
        <div class="but">
            <div class="nextpage">
                <button class="btn1" @click="prevPage">이전</button>
                <button class="btn2" @click="nextPage">다음</button>
            </div>
            <div class="page">
                <button class="btn3" @click="goList">목록</button>
                <button class="btn4" @click="goEdit">수정</button>
                <button class="btn5" @click="deletePost">삭제</button>
            </div>  
        </div>
    </div>
    <div v-else>
        게시글을 찾을 수 없습니다.
    </div>
</template>

<script setup>
import { defineProps } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import Header from '@/Components/header.vue';

const props = defineProps(['post']);

const formatDate = (date) => {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(date).toLocaleDateString('ko-KR', options);
};

const goList = () => {
    Inertia.visit(route('Post'));
};

const goEdit = () => {
    Inertia.visit(route('posts.edit', { id: props.post.id }));
};

const prevPage = () => {
    const prevId = Number(props.post.id) - 1;
    if (prevId > 0) {
        Inertia.visit(route('posts.show', { id: prevId }));
    }
};

const nextPage = () => {
    const nextId = Number(props.post.id) + 1;
    Inertia.visit(route('posts.show', { id: nextId }));
};

const deletePost = async () => {
    if (confirm('정말로 이 게시글을 삭제하시겠습니까?')) {
        try {
            await axios.delete(`/posts/${props.post.id}`);
            Inertia.visit(route('posts.index'));
        } catch (error) {
            console.error('Error deleting post:', error);
        }
    }
};
</script>

<style>
.but {
    width: 1200px;
    height: 30px;
    margin: auto;
    display: flex;
}

.nextpage {
    width: 900px;
    height: 30px;
    margin: auto;
}

.btn1, .btn2 {
    width: 100px;
    height: 30px;
    border: 1px solid #000;
    border-radius: 5px;
}

.btn1:hover, .btn2:hover {
    font-weight: bold;
}

.btn3, .btn4, .btn5 {
    width: 70px;
    height: 30px;
    border-radius: 5px;
    margin-left: 5px;
}

.btn4 {
    border: 1px solid blue;
    color: blue;
}

.btn5 {
    border: 1px solid red;
    color: red;
}

.btn3 {
    border: 1px solid #000;
}

.btn3:hover, .btn4:hover, .btn5:hover {
    font-weight: bold;
}

.container{
    width: 100%;

}

.box1{
    width: 100%;
    text-align: center;
    margin-top: 30px;
    font-size: 25px;
}

.box2{
    width: 100%;
    text-align: center;
    margin-top: 50px;
}
</style>