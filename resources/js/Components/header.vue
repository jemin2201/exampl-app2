<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import { usePage } from '@inertiajs/vue3';

const { props } = usePage();
const user = props.auth.user;

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
    props: {
        header: Object,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<style>
</style>

<template>
                <header class="w-full  h-20  flex flex-row  place-items-center border-b-2">
                    <div class="w-1/5 pl-8">
                        <Link :href="route('home')">
                            <img src="/images/unnamed.png" alt="market" class="w-16">
                        </Link>
                    </div>

                    <div class="w-2/5">
                        <ul class="flex space-x-8">
                            <li class="w-40 h-10 text-center leading-10 rounded-md">
                                <Link :href="route('used-market')" class="hover:text-orange-300 font-bold">중고거래</Link>
                            </li>
                            <li class="w-40 h-10 text-center leading-10 rounded-md"><a href="#" class="hover:text-orange-300 font-bold">동네업체</a></li>
                            <li class="w-40 h-10 text-center leading-10 rounded-md"><a href="#" class="hover:text-orange-300 font-bold">알바</a></li>
                            <li class="w-40 h-10 text-center leading-10 rounded-md"><a href="#" class="hover:text-orange-300 font-bold">부동산</a></li>
                            <li class="w-40 h-10 text-center leading-10 rounded-md">
                                <Link :href="route('Post')" class="hover:text-orange-300 font-bold">게시글</Link>
                            </li>
                        </ul>
                    </div>

                    <nav class="w-2/5 pl-40">
                        <template v-if="$page.props.auth.user">
                            <Link :href="route('dashboard')" class="rounded-md px-3 py-2">{{ user.name }}</Link>
                        </template>
                        <template v-else>
                            <Link :href="route('login')" class="rounded-md px-3 py-2">로그인</Link>
                            <Link :href="route('register')" class="rounded-md px-3 py-2">회원가입</Link>
                        </template>
                    </nav>
                </header>
</template>
