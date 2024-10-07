<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import Header from '@/Components/header.vue';

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
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<style>
#main1{
    height: 700px;
    display: flex;
}

#left{
    height: 700px;
}

#right{
    height: 700px;
}

#main_top{
    height: 350px;
}

#main_bottom{
    height: 350px;
}

#text1{
    padding-top: 200px;
}

#main2{
    height: 700px;
}

#main3{
    height: 700px;
}
</style>

<template>
    <Head title="Welcome" />

    <div class="w-full h-full">
        <Header :header="$page.props.header" />

                <main class="w-full border bg-orange-100" id="main1">
                    <div class="w-1/2" id="left">
                        <div class="w-full" id="main_top">
                            <div id="text1" class="pl-40">
                                <h1 class="text-6xl font-bold">당신 근처의</h1>
                                <h1 class="text-6xl font-bold">지역 생활 커뮤니티</h1>
                            </div>
                        </div>
                        <div class="w-full" id="main_bottom">
                            <span class="text-stone-400 text-xl pl-40">동네라서 가능한 모든 것</span><br>
                            <span class="text-stone-400 text-xl pl-40">당근에서 가까운 이웃과 함께해요.</span><br><br>
                            <div class="w-70r pl-40">
                                <button class="h-10 w-40 border bg-orange-300 rounded-[10px] text-white hover:bg-orange-500">
                                    Google Play
                                </button>
                                <button class="h-10 w-40 border bg-orange-300 rounded-[10px] ml-3 text-white hover:bg-orange-500">
                                    App Store
                                </button>    
                            </div>
                        </div>
                    </div>
                    <div class="w-1/2 border" id="right">
                        
                    </div>
                </main>
                <div id="main2" class="w-full flex">
                    <div id="left2" class="w-1/2">
                        <img src="/images/ch.jpg" alt="" class="ml-32 mt-20">
                    </div>
                    <div id="right2" class="w-1/2">
                        <div class="w-90 mt-40">
                            <h1 class="text-orange-500 font-bold text-xl">중고거래</h1><br>
                            <h1 class="text-6xl font-bold">믿을만한</h1>
                            <h1 class="text-6xl font-bold">이웃 간 중고거래</h1><br>
                            <h1 class="text-stone-400 text-xl">동네 주민들과 가깝고 따뜻한 거래를</h1>
                            <h1 class="text-stone-400 text-xl">지금 경험해보세요.</h1><br>
                        </div>
                        <div class="w-full">
                            <button class="h-10 w-40 border bg-zinc-200 rounded-[10px] text-black hover:bg-zinc-300">
                                인기매물 보기
                            </button><br>
                            <button class="h-10 w-60 border bg-zinc-200 rounded-[10px] text-black hover:bg-zinc-300">
                                믿을 수 있는 중고거래
                            </button>
                        </div>
                    </div>
                </div>
                <div id="main3" class="w-full bg-orange-50 flex">
                    <div id="left3" class="w-1/2">
                        <div class="w-90 mt-32 ml-60">
                            <h1 class="text-orange-500 font-bold text-xl">동네생활</h1><br>
                            <h1 class="text-6xl font-bold">이웃만 아는</h1>
                            <h1 class="text-6xl font-bold">동네 정보와 이야기</h1><br>
                            <h1 class="text-stone-400 text-xl">우리동내의 다양한 정보와 이야기를</h1>
                            <h1 class="text-stone-400 text-xl">공감과 댓글로 나누어요.</h1><br>
                        </div>
                        <div class="w-full flex">
                            <div class="w-4/12 h-60">
                            </div>
                            <div class="w-4/12 h-60"></div>
                            <div class="w-4/12 h-60"></div>
                        </div>
                        <div id="right3" class="w-1/2"></div>
                    </div>
                </div>
                <footer class="w-full py-16 text-center text-sm text-black dark:text-white/70 border-t-2">
                    <div class="m-auto w-3/4">
                        <div class="">
                            <ul class="flex">
                                <li class="ml-8"><a href="#">제휴 문의</a></li>
                                <li class="ml-8"><a href="#">광고 문의</a></li>
                                <li class="ml-8"><a href="#">PR 문의</a></li>
                                <li class="ml-8"><a href="#">IR 문의</a></li>
                            </ul>
                        </div>
                        <div class="mt-6">
                            <ul class="flex">
                                <li class="ml-8"><a href="#">이용약관</a></li>
                                <li class="ml-8 font-bold"><a href="#">개인정보처리방침</a></li>
                                <li class="ml-8"><a href="#">운영정책</a></li>
                                <li class="ml-8"><a href="#">위치기반서비스 이용약관</a></li>
                                <li class="ml-8"><a href="#">이용자보호 비전과 계획</a></li>
                                <li class="ml-8"><a href="#">청소년보호정책</a></li>
                            </ul>
                        </div>
                    </div>
                </footer>
            </div>
</template>
