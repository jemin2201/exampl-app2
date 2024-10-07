<template>
    <Header :header="$page.props.header" />
    <main>
        <div>
            <h2 class="Post">
                게시글 목록
            </h2>
            <hr class="my-4">
        </div>
        <Link
            v-if="$page.props.auth.user"
            class="write-btn hover:text-orange-300 font-bold"
            :href="route('PostsList')"
        >
            글쓰기
        </Link>
        <div class="Posttable w-full">
            <table>
                <tr>
                    <th class="th1">번호</th>
                    <th class="th3">작성자</th>
                    <th class="th2">제목</th>
                    <th class="th3">날짜</th>
                </tr>
                <tr v-for="post in posts" :key="post.id">
                    <td class="td1">{{ post.id }}</td>
                    <td class="td3">{{ post.user.name }}</td>
                    <td class="td2">
                        <Link :href="route('posts.show', { id: post.id })">
                            {{ post.title }}
                        </Link>
                    </td>
                    <td class="td3">{{ formatDate(post.created_at) }}</td>
                </tr>
            </table>
        </div>
    </main>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { Link } from '@inertiajs/vue3';
import axios from 'axios';
import Header from '@/Components/header.vue';

const posts = ref([]);

const formatDate = (dateString) => {
    const options = { year: 'numeric', month: '2-digit', day: '2-digit' };
    return new Date(dateString).toLocaleDateString('ko-KR', options);
};

const fetchPosts = async () => {
    try {
        const response = await axios.get('/posts');
        posts.value = response.data;
    } catch (error) {
        console.error('게시글을 가져오는 중 오류 발생:', error);
    }
};

onMounted(fetchPosts);
</script>

<style>
.write-btn {
    display: block;
    font-size: 20px;
    width: 150px;
    height: 40px;
    margin: 20px auto;
    border-radius: 20px;
    border: 2px solid #000;
    text-align: center;
    line-height: 40px;
}

.PL {
    display: block;
    font-size: 20px;
    width: 150px;
    height: 30px;
    margin: auto;
    border-radius: 50px;
    margin-top: 10px;
    border: 1px solid #000;
    text-align: center;
}

.Post {
    font-size: 25px;
    margin-top: 15px;
    text-align: center;
}

.Posttable {
    margin-top: 30px;
}

table {
    width: 1030px;
    margin: auto;
}

.tr {
    width: 1050px;
}

.th1 {
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

.td1, .td2, .td3 {
    text-align: center;
    padding: 10px;
    border: 1px solid #000;
}
</style>