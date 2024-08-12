<script setup>
import { onBeforeMount, onMounted, onUnmounted, ref } from 'vue';
import Header from '@/Layouts/Header.vue';
import Footer from '@/Layouts/Footer.vue';

defineProps({
    imageURL: String,
    top: Boolean,
    title: String,
    sub_comment: Object,
    errors: Object
});

const windowSize = ref('sp');

const language = ref('en');

const changeLanguage = () => {
    const lang = language.value == 'en' ? 'ja' : 'en';
    language.value = lang;
    localStorage.setItem("lang", lang);

}

const handleResize = () => {
    const sizeWidth = window.innerWidth
    if(sizeWidth > 1650) {
        windowSize.value = "pc"
    } else if (sizeWidth > 780) {
        windowSize.value = "tb"
    } else if (sizeWidth > 369) {
        windowSize.value = "sp"
    } else {
        windowSize.value = "sp"
    }
}

onBeforeMount(() => {
    handleResize()
    const lang = localStorage.getItem("lang");
    if(lang) language.value = lang
})

onMounted(() => {
    window.addEventListener('resize', handleResize);    
})

onUnmounted(() => {
    window.removeEventListener('resize', handleResize);
})

</script>

<template>
    <Header :windowSize=windowSize :imageURL=imageURL :top=top :title=title :sub_comment=sub_comment :language="language" @changeLanguage="changeLanguage"></Header>
    <div class="main_contents">
        <slot :windowSize=windowSize :language=language></slot>
    </div>
    <slot name="contact" :language=language></slot>  
    <Footer :windowSize=windowSize  :language=language></Footer>
</template>

<style lang="scss" scope>
    .main_contents {
        background-image: url("/images/cloth.jpg");
        background-size:100%; 
        padding: 90px 67px;
    }
    @media screen and (max-width: 1650px) { 
        .main_contents {
            background-image: url("/images/cloth.jpg");
            background-size:100%; 
            padding: 72px 67px;
        }
    }
    @media screen and (max-width: 1024px) { 
        .main_contents {
            background-image: url("/images/cloth.jpg");
            background-size:100%; 
            padding: 50px 67px;
        }
    }
    @media screen and (max-width: 780px) { 
        .main_contents {
            background-image: url("/images/cloth.jpg");
            background-size:100%; 
            padding: 38px 10px;
        }
    }
</style>
