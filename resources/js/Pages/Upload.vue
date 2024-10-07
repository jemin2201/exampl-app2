<script setup>
import { reactive } from 'vue';
import Header from '@/Components/header.vue';
const filearrayadd = (objs) =>{
    if(objs.length == 0) return;

    for(let i = 0, j = objs.length; i < j; i++){
        if(objs[i].type.split("/")[0] != "image") continue;
        if(!data.images.some((e) => e.name === objs[i].name)){
            data.images.push({name:objs[i].name, url: URL.createObjectURL(objs[i])});
        }
    }
}

const data = reactive({
    images : [],
    isDragging : false
})

const selectFiles = () =>{
    // const fileInput = document.querySelector('input[type=file]');
    // if(fileInput)
    //     fileInput.click();
    const fileInput = document.getElementById('fileInput');
    if (fileInput) fileInput.click();
}

const onFileSelect = (e) =>{
    console.log(e.target.files);
    filearrayadd(e.target.files);
}

const onDelete = (e) =>{
    data.images.splice(e,1);
}

const onDragOver = (e) =>{
    e.preventDefault();
    data.isDragging = true;
    e.dataTransfer.dropEffect ="copy";
}

const onDragLeave = (e) =>{
    e.preventDefault();
    data.isDragging = false;
}

const onDrop = (e) =>{
    e.preventDefault();
    data.isDragging = false;
    filearrayadd(e.dataTransfer.files);
}
</script>

<template>
    <Header :header="$page.props.header" />
    <main>
        <div class="card">
            <div class="top">
                Drag & Drop images
            </div>
            <div class="drag-area" @dragover.prevent="onDragOver" @dragleave.prevent="onDragLeave" @drop.prevent="onDrop">
                <span v-if="!data.isDragging">
                    Drag & Drop
                    <span class="select" role="button" @click="selectFiles">Choose</span>
                </span>
                <div v-else class="select">Drop Image</div>
                <input type="file" name="file" id="fileInput" class="file" multiple @change="onFileSelect">
            </div>
            <div class="container">
                <div class="image" v-for="(image, index) in data.images" :key="index">
                    <span class="delete" @click="onDelete(index)">&times;</span>
                    <img :src="image.url">
                </div>
            </div>
            <div class="iname">
                <input type="text" placeholder="이름을 쓰세요">
                <input type="number" value="0">
            </div>
            <button type="button">Upload</button>
        </div>
    </main>
    
</template>

<style>
.iname{
    width: 100%;
    height: 200px;
}

.iname > input{
    width: 800px;
    height: 35px;
    margin-top: 5px;
    border-radius: 30px;
    margin-left: 25%;
}

main{
    width: 100%;
    height: 100%;
}
.card{
    width: 90%;
    padding: 10px;
    box-shadow: 0 0 5px #ffdfdf;
    border-radius: 5px;
    border-color: #ff253a;
    overflow: hidden;
    margin: auto;
}

.card .top{
    text-align: center;
}

.card button{
    outline: 0;
    border: 0;
    color: #ffffff;
    border-radius: 4px;
    font-weight: 400;
    padding: 8px 13px;
    width: 100%;
    background: #0c84ff;
}

.card .drag-area{
    height: 150px;
    border-radius: 5px;
    border: 2px #0b2e13;
    background: #ffffff;
    color: #fe0000;
    display: flex;
    justify-content: center;
    justify-items: center;
    user-select: center;
    margin-top: 10px;
}

.card .drag-area .visible{
    font-size: 18px;
}

.card .select:hover{
    opacity: 0.7;
}

.card .container{
    width: 100%;
    height: auto;
    display: flex;
    justify-content: flex-start;
    align-items: flex-start;
    flex-flow: wrap;
    max-width: 200px;
    position: relative;
    margin-bottom: 8px;
    padding-top: 10px;
}

.card .container .image{
    width: 95px;
    margin-right: 5px;
    height: 95px;
    position: relative;
    margin-bottom: 8px;
}

.card .container .image img{
    width: 100%;
    height: 100%;
    border-radius: 5px;
}

.card .container .image span{
    position: absolute;
    top: -2px;
    right: 9px;
    font-size: 20px;
    cursor: pointer;
    color: #ff253a;
}
.card input.file {
    display: none;
}
.card .drag-area .on-drop
.card .drag-area.dragover .visible{
    display: none;

}
</style>

