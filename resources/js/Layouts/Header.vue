<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { onBeforeMount, onMounted, onUnmounted, ref, watch } from 'vue';

const props = defineProps({
    imageURL: String,
    top: Boolean,
    title: String,
    sub_comment: Object,
    windowSize: String,
    language: String
})

defineEmits(['changeLanguage']);

const header_menu = ref(false)

const isScroll = ref(false);

const insta_img = ref(`/images/top/${props.windowSize}/insta_black.png`);

const menu_insta_img = ref(`/images/top/${props.windowSize}/insta_white.png`);

const lang_img = ref(`/images/top/${props.windowSize}/lang_mark.png`);

const logo_img = ref(`/images/top/${props.windowSize}/logo.png`);

const mouse_over_insta_img = () => {
    insta_img.value = `/images/top/${props.windowSize}/insta_rainbow.png`;
    menu_insta_img.value = `/images/top/${props.windowSize}/insta_black.png`;
}

const mouse_leave_insta_img = () => {
    insta_img.value = isScroll.value ? `/images/top/${props.windowSize}/insta_white.png` : `/images/top/${props.windowSize}/insta_black.png`;
    menu_insta_img.value = `/images/top/${props.windowSize}/insta_white.png`;
}

// データをローカルキャッシュから取得する関数
function getItemWithExpiry() {
  const itemStr = localStorage.getItem("sparsh_screen");
  if (!itemStr) {
    return null;
  }

  const expiry = JSON.parse(itemStr);
  const now = new Date();

  // データの有効期限が切れている場合は削除してnullを返す
  if (now.getTime() > expiry) {
    localStorage.removeItem("sparsh_screen");
    return null;
  }
  return expiry;
}
const handleScroll = () => {
      isScroll.value = window.scrollY > 50
}

watch(isScroll, (newValue) => {
    insta_img.value = newValue ? `/images/top/${props.windowSize}/insta_white.png` : `/images/top/${props.windowSize}/insta_black.png`;
    lang_img.value = newValue ? `/images/top/${props.windowSize}/lang_icon.png` : `/images/top/${props.windowSize}/lang_mark.png`;
    logo_img.value = newValue ? `/images/top/${props.windowSize}/herologo.png` : `/images/top/${props.windowSize}/logo.png`;
})

onBeforeMount(() => {
    getItemWithExpiry()
})

onMounted(() => {
    window.addEventListener("scroll", handleScroll);   
})

onUnmounted(() => {
    window.removeEventListener("scroll", handleScroll);
})



</script>

<template>
    <div class="header_content" :class="{ 'scrolled_header_content': isScroll }" >
        <div class="header_content_menu">
            <Link :href="route('top_redirect')">
                <img :src="logo_img" class="logo">
            </Link>
            
            <div class="right_items">
                <a href="https://www.instagram.com/hero_usa_inc?igsh=OGQ5ZDc2ODk2ZA%3D%3D&utm_source=qr" target="_blank">
                    <img :src="insta_img" class="instagram" @mouseover="mouse_over_insta_img" @mouseleave="mouse_leave_insta_img">
                </a>
                <div class="header_contact">
                    <Link :href="route('contact')">
                        <button>CONTACT</button>
                    </Link>
                    
                    <div class="lang" @click="$emit('changeLanguage')">
                        <img :src="lang_img" class="lang_mark">
                        {{ language === "en" ? "Japanese" : "English" }}
                    </div>
                </div>
                <div class="hmenuac10" @click="header_menu = true">
                    <span class="bar1st"></span>
                    <span class="bar2nd"></span>
                    <span class="bar3rd"></span>
                    <span class="text">menu</span>
                </div>
            </div>
            <div class="border1"></div>
            <div class="border2"></div>
        </div> 
    </div>
    
    <div id="header" class="top">
        <div class="top-image">
            <img :src="imageURL" alt="Background Image" class="responsive-image">
            <p class="eachTextAnime appeartext">
                <span v-if="top" v-for="(test, index) in 'Wholesale seafoods and Tread support'.split('')" :style="{ animationDelay: `${index * 0.1}s` }" class="letter">
                    {{ test }}
                    <span v-if="(index + 1) % 18 === 0"><br></span>
                    <span v-if="(index + 1) % 22 === 0"><br></span>
                </span>
            </p>
        </div>
        
        <div class="scroll-infinity" v-if="top">
            <div class="scroll-infinity__wrap">
                <ul class="scroll-infinity__list scroll-infinity__list--left">
                    <li class="scroll-infinity__item">HERO USA Inc.</li>                        
                    <li class="scroll-infinity__item">HERO USA Inc.</li>  
                </ul>
                <ul class="scroll-infinity__list scroll-infinity__list--left">
                    <li class="scroll-infinity__item">HERO USA Inc.</li>                        
                    <li class="scroll-infinity__item">HERO USA Inc.</li> 
                </ul>
            </div>
        </div>
        <div :class="{ 'header_contents': top, 'header_contents_other': !top }">
            <h1 v-if="title" class="other_title" v-html="title"></h1>
            <p v-if="sub_comment" class="other_sub_comment" v-html="sub_comment[language]"></p>
        </div>
        <div class="header_menu" v-if="header_menu">
            <img src="/images/close.png" class="colse_header_menu" @click="header_menu = false">
            <img src="/images/menu_log.png" class="header_menu_logo">
            <div class="header_menu_contents">
                <template v-if="windowSize !== 'sp'">
                    <div class="header_menu_left">
                        <Link :href="route('company_profile')">
                            <p> - COMPANY PROFILE</p>
                        </Link>
                        <Link :href="route('message')">
                            <p> - MESSAGE</p>
                        </Link>
                        <Link :href="route('products')">
                            <p> - PRODUCTS</p>
                        </Link>
                        <Link :href="route('factory')">
                            <p> - FACTORY</p>
                        </Link>
                    </div>
                    <div class="header_menu_right">
                        <Link :href="route('contact')">
                            <button>CONTACT</button>
                        </Link>
                        <a href="https://www.instagram.com/hero_usa_inc?igsh=OGQ5ZDc2ODk2ZA%3D%3D&utm_source=qr" target="_blank">
                            <div class="header_menu_right_instagram" @mouseover="mouse_over_insta_img" @mouseleave="mouse_leave_insta_img">
                                    <img :src="menu_insta_img">
                                    <p>Instagram</p>
                            </div>
                        </a>  
                        <div class="header_menu_company_info">
                            <h2>Head Quarter Office</h2>
                            <p>hero@herooctopus.com</p>
                            <p>+1 310-483-3588</p>
                            <p>+81 90-3483-0259</p>
                        </div>
                    </div>
                </template>
                <template v-if="windowSize === 'sp'">
                    <div class="header_menu_left">
                        <div class="header_menu_contact">
                            <Link :href="route('contact')">
                                <button>CONTACT</button>
                            </Link>
                            <img :src="menu_insta_img" @mouseover="mouse_over_insta_img" @mouseleave="mouse_leave_insta_img">
                        </div>
                        
                        <Link :href="route('company_profile')">
                            <p> - COMPANY PROFILE</p>
                        </Link>
                        <Link :href="route('message')">
                            <p> - MESSAGE</p>
                        </Link>
                        <Link :href="route('products')">
                            <p> - PRODUCTS</p>
                        </Link>
                        <Link :href="route('factory')">
                            <p> - FACTORY</p>
                        </Link>
                        <div class="header_menu_company_info">
                            <h2>Head Quarter Office</h2>
                            <p>hero@herooctopus.com</p>
                            <p>+1 310-483-3588</p>
                            <p>+81 90-3483-0259</p>
                        </div>
                    </div>
                </template>
                
            </div>         
        </div>
    </div>
    
</template>

<style lang="scss" scope>
    html,body {
        overflow-x: hidden;
        margin-bottom: 0;
        font-family: 'HiraMinProN-W6',cursive;
    }
    .top {
        width: 100%;
        position: relative;
        .top-image {
            position: relative;
            .responsive-image {
                width: 100%;
                height: auto;
                max-height: 1000px;
                background-size: cover;
            }
            .eachTextAnime {
                width: 1600px;
                margin: 0 auto;
                position: absolute;
                top: 300px;
                right: -1800px;
                left: 0;
                font-size: 40px;
                .letter:nth-child(9),
                .letter:nth-child(28){
                    margin-right: 20px;
                }
                span{
                    opacity: 0;
                }  
            }
            .appeartext span{ 
                animation:text_anime_on 1s ease-out forwards; 
            }
            @keyframes text_anime_on {
                0% {opacity:0;}
                100% {opacity:1;}
            }
        }
        
        @keyframes infinity-scroll-left {
            from {
            transform: translateX(0);
            }
            to {
            transform: translateX(-100%);
            }
        }
        .scroll-infinity__wrap {
            display: flex;
            overflow: hidden;
            position: absolute;
            bottom: 50px;
            left: 0;
            font-weight: bold;
            color: transparent;
            font-size: 150px;
	        -webkit-text-stroke: 3px rgb(19, 9, 46);
            .scroll-infinity__list {
                display: flex;
                list-style: none;
                padding: 0;
                .scroll-infinity__item {
                    width: 1500px;
                }
            }
            .scroll-infinity__list--left {
            animation: infinity-scroll-left 30s infinite linear 0.5s both;
            }
        }
        .header_menu_logo{
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }
        .header_menu {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #838181;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 3002;
            .colse_header_menu {
                position: absolute;
                top: 40px;
                right: 40px;
                width: 45px;
                height: 45px;
                cursor: pointer;
            }
            .header_menu_contents {
                display: flex;
                color: white;
                z-index: 9999;
                .header_menu_left {
                    margin-right: 100px;
                    display: flex;
                    justify-content: space-between;
                    flex-flow: column;
                    height: 500px;
                    p {
                        font-size: 36px;
                        color: white;
                        &:hover {
                            color: black;
                        }
                    }
                }
                .header_menu_right {
                    button {
                        width: 450px;
                        height: 120px;
                        color: white;
                        border: 4px solid white;                
                        font-weight: bold;
                        font-size: 48px;
                        margin-bottom: 40px;
                        &:hover {
                            color: black;
                            border-color: black;
                        }
                    }
                    .header_menu_right_instagram {
                        display: flex;
                        margin-bottom: 75px;
                        cursor: pointer;
                        &:hover {
                            color: black;
                        }
                        img {
                            margin-right: 15px;
                            width: 48px;
                            height: 48px;
                        }
                        p {
                            font-size: 36px;  
                        }
                    }
                    .header_menu_company_info {
                        font-size: 24px;
                        h2 {
                            font-size: 36px;
                        }
                    }
                    
                }
            }
        }
    }
    .header_contents {
        width: 1600px;
        margin: 0 auto;
    }
    .header_contents_other {
        width: 1600px;
        margin: 0 auto;
        position: relative;
    }
    .other_title {
        position: absolute;
        font-weight: bold;
        font-size: 80px;
        left: 150px;
        bottom: 10px;
    }
    .other_sub_comment {
        width: 500px;
        font-size: 20px;
        overflow-wrap:  break-word;
        position: absolute;
        right: 150px;
        bottom: 50px;
    }
    .header_content{
        position: fixed;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        padding: 40px 0 20px 0;
        width: 100vw;
        z-index: 3001;
        .header_content_menu {
            display: flex;
            margin: 0 auto;
            align-items: center;
            width: 1600px;   
            position: relative; 
            &::before {
                position: absolute;
                top: -10px;
                left: 0;
                content: '';
                height: 2px;
                background-color: black;
                width: 100%;
            }  
            &::after {
                position: absolute;
                top: -20px;
                left: 0;
                content: '';
                height: 4px;
                background-color: black;
                width: 100%;
            }  
            .logo {
                flex: 0 0 auto;
                width: 80px;
                height: 80px;
            }   
            .right_items {
                flex: 1;
                display: flex;
                justify-content: flex-end;
                align-items: center;
            }   
            .instagram {
                width: 45px;
                height: 45px;
            }
            .header_contact {
                position: relative;
                button {
                    color: black;
                    font-size: 20px;
                    border: 4px solid black;
                    padding: 10px 45px;
                    margin-left: 30px;
                    &:hover {
                        background-color: gray;
                    }
                }
                .lang {
                    display: flex;
                    position: absolute;
                    bottom: -30px;
                    right: 0;
                    align-items: center;
                    cursor: pointer;
                    .lang_mark {
                        width: 15px;
                        height: 15px;
                        margin-right: 6px;
                    }
                }                
            }
            .hmenuac10 {
                position: relative;
                width: 40px;
                height: 20px;
                margin: 0 18px 0 41px;
                padding: 1.5em 0;
                cursor: pointer;
                &:hover {
                    transform: rotate(360deg);
                    transition-duration: 0.5s;
                }
            }
            .hmenuac10 .bar1st,
            .hmenuac10 .bar2nd,
            .hmenuac10 .bar3rd {
                position: absolute;
                width: 40px;
                height: 5px;
                -webkit-transition: color 0s, opacity 0.5s ease-in-out, top 0.5s ease-in-out, bottom  0.5s ease-in-out;
                        transition: color 0s, opacity 0.5s ease-in-out, top 0.5s ease-in-out, bottom  0.5s ease-in-out;
                background: black;
            }
            .hmenuac10 .bar1st {
                top: 5px;
            }
            .hmenuac10 .bar2nd {
                top: 50%;
                -webkit-transition: opacity 0.3s ease-in-out;
                        transition: opacity 0.3s ease-in-out;
                transform: translateY(-50%);
            }
            .hmenuac10 .bar3rd {
                bottom: 5px;
            }
            .hmenuac10 .text {
                position: absolute;
                top: 50%;
                left: -5%;
                -webkit-transition: opacity 0.3s ease-in-out;
                        transition: opacity 0.3s ease-in-out;
                transform: translateY(-50%);
                opacity: 0;
                color: black;
            }
            .hmenuac10:hover .bar1st {
                top: 2px;
            }
            .hmenuac10:hover .bar3rd {
                bottom: 2px;
            }
            .hmenuac10:hover .bar2nd {
                opacity: 0;
            }
            .hmenuac10:hover .text {
                opacity: 1;
                margin: 0 auto;
            }
        }  
        .scrolled_header_content_menu {
            &::before {
                position: absolute;
                top: -10px;
                left: 0;
                content: '';
                height: 2px;
                background-color: white;
                width: 1600px;
            }  
            &::after {
                position: absolute;
                top: -20px;
                left: 0;
                content: '';
                height: 4px;
                background-color: white;
                width: 1600px;
            }
        }     
    }  
    .scrolled_header_content {
        background-color: rgba(#373737 , 0.5);
        .header_content_menu {
            &::before {
                position: absolute;
                top: -10px;
                left: 0;
                content: '';
                height: 2px;
                background-color: white;
                width: 1600px;
            }  
            &::after {
                position: absolute;
                top: -20px;
                left: 0;
                content: '';
                height: 4px;
                background-color: white;
                width: 1600px;
            }
            .logo {
                flex: 0 0 auto;
                width: 80px;
                height: 80px;
            }   
            .right_items {
                flex: 1;
                display: flex;
                justify-content: flex-end;
                align-items: center;
            }   
            .instagram {
                width: 45px;
                height: 45px;
            }
            .header_contact {
                position: relative;
                button {
                    color: white;
                    font-size: 20px;
                    border: 4px solid white;
                    padding: 10px 45px;
                    margin-left: 30px;
                    &:hover {
                        background-color: white;
                        color: black;
                    }
                }
                .lang {
                    display: flex;
                    position: absolute;
                    bottom: -30px;
                    right: 0;
                    align-items: center;
                    cursor: pointer;
                    color: white;
                    .lang_mark {
                        width: 15px;
                        height: 15px;
                        margin-right: 6px;
                    }
                }               
            }
            .hmenuac10 {
                position: relative;
                width: 40px;
                height: 20px;
                margin: 0 18px 0 41px;
                padding: 1.5em 0;
                cursor: pointer;
                &:hover {
                    transform: rotate(360deg);
                    transition-duration: 0.5s;
                }
            }
            .hmenuac10 .bar1st,
            .hmenuac10 .bar2nd,
            .hmenuac10 .bar3rd {
                position: absolute;
                width: 40px;
                height: 5px;
                -webkit-transition: color 0s, opacity 0.5s ease-in-out, top 0.5s ease-in-out, bottom  0.5s ease-in-out;
                        transition: color 0s, opacity 0.5s ease-in-out, top 0.5s ease-in-out, bottom  0.5s ease-in-out;
                background: white;
            }
            .hmenuac10 .bar1st {
                top: 5px;
            }
            .hmenuac10 .bar2nd {
                top: 50%;
                -webkit-transition: opacity 0.3s ease-in-out;
                        transition: opacity 0.3s ease-in-out;
                transform: translateY(-50%);
            }
            .hmenuac10 .bar3rd {
                bottom: 5px;
            }
            .hmenuac10 .text {
                position: absolute;
                top: 50%;
                left: -5%;
                -webkit-transition: opacity 0.3s ease-in-out;
                        transition: opacity 0.3s ease-in-out;
                transform: translateY(-50%);
                opacity: 0;
                color: white;
            }
            .hmenuac10:hover .bar1st {
                top: 2px;
            }
            .hmenuac10:hover .bar3rd {
                bottom: 2px;
            }
            .hmenuac10:hover .bar2nd {
                opacity: 0;
            }
            .hmenuac10:hover .text {
                opacity: 1;
                margin: 0 auto;
            }
        }    
    }  
    @media screen and (max-width: 1650px) { 
        .top {
            background-image: var(--bg-url);
            background-size:100%; 
            background-repeat: no-repeat;
            position: relative;
            .top-image {
                width: 100vw;
                position: relative;
                .responsive-image {
                    width: 100%;
                    height: auto;
                    min-height: 590px;
                    object-fit: cover;
                }
                .eachTextAnime {
                    width: 1010px;
                    margin: 0 auto;
                    position: absolute;
                    top: 250px;
                    right: -1000px;
                    font-size: 30px;
                    .letter:nth-child(9),
                    .letter:nth-child(28){
                        margin-right: 20px;
                    }
                    span{
                        opacity: 0;
                    }  
                }
                .appeartext span{ 
                    animation:text_anime_on 1s ease-out forwards; 
                }
                @keyframes text_anime_on {
                    0% {opacity:0;}
                    100% {opacity:1;}
                }
            }
            
            @keyframes infinity-scroll-left {
                from {
                transform: translateX(0);
                }
                to {
                transform: translateX(-100%);
                }
            }
            .scroll-infinity__wrap {
                display: flex;
                overflow: hidden;
                position: absolute;
                bottom: 20px;
                left: 0;
                font-weight: bold;
                color: transparent;
                font-size: 110px;
                -webkit-text-stroke: 3px rgb(19, 9, 46);
                .scroll-infinity__list {
                    display: flex;
                    list-style: none;
                    padding: 0;
                    .scroll-infinity__item {
                        width: 1010px;
                    }
                }
                .scroll-infinity__list--left {
                animation: infinity-scroll-left 30s infinite linear 0.5s both;
                }
            }
            .header_menu_logo{
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                width: 360px;
                height: 325px;
            }
            .header_menu {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: #838181;
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 3002;
                .colse_header_menu {
                    position: absolute;
                    top: 40px;
                    right: 34px;
                    width: 36px;
                    height: 36px;
                    cursor: pointer;
                }
                .header_menu_contents {
                    display: flex;
                    color: white;
                    z-index: 9999;
                    .header_menu_left {
                        margin-right: 42px;
                        display: flex;
                        justify-content: space-between;
                        flex-flow: column;
                        height: 300px;
                        p {
                            font-size: 24px;
                            color: white;
                            &:hover {
                                color: black;
                            }
                        }
                    }
                    .header_menu_right {
                        button {
                            width: 182px;
                            height: 48px;
                            color: white;
                            border: 4px solid white;                
                            font-weight: bold;
                            font-size: 24px;
                            margin-bottom: 23px;
                            &:hover {
                                color: black;
                                border-color: black;
                            }
                        }
                        .header_menu_right_instagram {
                            display: flex;
                            margin-bottom: 40px;
                            cursor: pointer;
                            align-items: center;
                            &:hover {
                                color: black;
                            }
                            img {
                                margin-right: 8px;
                                width: 27px;
                                height: 27px;
                            }
                            p {
                                font-size: 20px;
                            }
                        }
                        .header_menu_company_info {
                            font-size: 14px;
                            h2 {
                                font-size: 20px;
                            }
                        }
                        
                    }
                }
            }
        }
        .header_contents {
            width: 1010px;
            margin: 0 auto;
            .appeartext span{ 
                animation:text_anime_on 1s ease-out forwards; 
            }
            @keyframes text_anime_on {
                0% {opacity:0;}
                100% {opacity:1;}
            }
        }
        .header_contents_other {
            width: 1010px;
            margin: 0 auto;
            position: relative;
        }
        .other_title {
            position: absolute;
            font-weight: bold;
            font-size: 54px;
            left: 50px;
            bottom: 10px;
        }
        .other_sub_comment {
            width: 393px;
            font-size: 16px;
            overflow-wrap:  break-word;
            position: absolute;
            right: 50px;
            bottom: 20px;
        }
        .header_content{
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            padding: 40px 0 20px 0;
            width: 100vw;
            z-index: 3001;
            .header_content_menu {
                display: flex;
                margin: 0 auto;
                align-items: center;
                width: 1010px;   
                position: relative; 
                &::before {
                    position: absolute;
                    top: -10px;
                    left: 0;
                    content: '';
                    height: 2px;
                    background-color: black;
                    width: 100%;
                }  
                &::after {
                    position: absolute;
                    top: -20px;
                    left: 0;
                    content: '';
                    height: 4px;
                    background-color: black;
                    width: 100%;
                }  
                .logo {
                    flex: 0 0 auto;
                    width: 50px;
                    height: 50px;
                }   
                .right_items {
                    flex: 1;
                    display: flex;
                    justify-content: flex-end;
                    align-items: center;
                }   
                .instagram {
                    width: 30px;
                    height: 30px;
                }
                .header_contact {
                    position: relative;
                    button {
                        color: black;
                        font-size: 13px;
                        border: 4px solid black;
                        padding: 7px 30px;
                        margin-left: 15px;
                        &:hover {
                            background-color: gray;
                        }
                    }
                    .lang {
                        display: flex;
                        position: absolute;
                        bottom: -25px;
                        right: 0;
                        align-items: center;
                        cursor: pointer;
                        .lang_mark {
                            width: 15px;
                            height: 15px;
                            margin-right: 6px;
                        }
                    }                
                }
                .hmenuac10 {
                    position: relative;
                    width: 40px;
                    height: 20px;
                    margin: 0 18px 0 15px;
                    padding: 1.5em 0;
                    cursor: pointer;
                    &:hover {
                        transform: rotate(360deg);
                        transition-duration: 0.5s;
                    }
                }
                .hmenuac10 .bar1st,
                .hmenuac10 .bar2nd,
                .hmenuac10 .bar3rd {
                    position: absolute;
                    width: 40px;
                    height: 5px;
                    -webkit-transition: color 0s, opacity 0.5s ease-in-out, top 0.5s ease-in-out, bottom  0.5s ease-in-out;
                            transition: color 0s, opacity 0.5s ease-in-out, top 0.5s ease-in-out, bottom  0.5s ease-in-out;
                    background: black;
                }
                .hmenuac10 .bar1st {
                    top: 8px;
                }
                .hmenuac10 .bar2nd {
                    top: 50%;
                    -webkit-transition: opacity 0.3s ease-in-out;
                            transition: opacity 0.3s ease-in-out;
                    transform: translateY(-50%);
                }
                .hmenuac10 .bar3rd {
                    bottom: 8px;
                }
                .hmenuac10 .text {
                    position: absolute;
                    top: 50%;
                    left: -5%;
                    -webkit-transition: opacity 0.3s ease-in-out;
                            transition: opacity 0.3s ease-in-out;
                    transform: translateY(-50%);
                    opacity: 0;
                    color: black;
                }
                .hmenuac10:hover .bar1st {
                    top: 2px;
                }
                .hmenuac10:hover .bar3rd {
                    bottom: 2px;
                }
                .hmenuac10:hover .bar2nd {
                    opacity: 0;
                }
                .hmenuac10:hover .text {
                    opacity: 1;
                    margin: 0 auto;
                }
            }  
            .scrolled_header_content_menu {
                &::before {
                    position: absolute;
                    top: -10px;
                    left: 0;
                    content: '';
                    height: 2px;
                    background-color: white;
                    width: 1600px;
                }  
                &::after {
                    position: absolute;
                    top: -20px;
                    left: 0;
                    content: '';
                    height: 4px;
                    background-color: white;
                    width: 1600px;
                }
            }     
        }  
        .scrolled_header_content {
            background-color: rgba(#373737 , 0.5);
            .header_content_menu {
                &::before {
                    position: absolute;
                    top: -10px;
                    left: 0;
                    content: '';
                    height: 2px;
                    background-color: white;
                    width: 1010px;
                }  
                &::after {
                    position: absolute;
                    top: -20px;
                    left: 0;
                    content: '';
                    height: 4px;
                    background-color: white;
                    width: 1010px;
                }
                .logo {
                    flex: 0 0 auto;
                    width: 50px;
                    height: 50px;
                }   
                .right_items {
                    flex: 1;
                    display: flex;
                    justify-content: flex-end;
                    align-items: center;
                }   
                .instagram {
                    width: 30px;
                    height: 30px;
                }
                .header_contact {
                    position: relative;
                    button {
                        color: white;
                        font-size: 13px;
                        border: 4px solid white;
                        padding: 7px 30px;
                        margin-left: 15px;
                        &:hover {
                            background-color: white;
                            color: black;
                        }
                    }
                    .lang {
                        display: flex;
                        position: absolute;
                        bottom: -25px;
                        right: 0;
                        align-items: center;
                        cursor: pointer;
                        color: white;
                        .lang_mark {
                            width: 15px;
                            height: 15px;
                            margin-right: 6px;
                        }
                    }               
                }
                .hmenuac10 {
                    position: relative;
                    width: 40px;
                    height: 20px;
                    margin: 0 18px 0 15px;
                    padding: 1.5em 0;
                    cursor: pointer;
                    &:hover {
                        transform: rotate(360deg);
                        transition-duration: 0.5s;
                    }
                }
                .hmenuac10 .bar1st,
                .hmenuac10 .bar2nd,
                .hmenuac10 .bar3rd {
                    position: absolute;
                    width: 30px;
                    height: 5px;
                    -webkit-transition: color 0s, opacity 0.5s ease-in-out, top 0.5s ease-in-out, bottom  0.5s ease-in-out;
                            transition: color 0s, opacity 0.5s ease-in-out, top 0.5s ease-in-out, bottom  0.5s ease-in-out;
                    background: white;
                }
                .hmenuac10 .bar1st {
                    top: 8px;
                }
                .hmenuac10 .bar2nd {
                    top: 50%;
                    -webkit-transition: opacity 0.3s ease-in-out;
                            transition: opacity 0.3s ease-in-out;
                    transform: translateY(-50%);
                }
                .hmenuac10 .bar3rd {
                    bottom: 8px;
                }
                .hmenuac10 .text {
                    position: absolute;
                    top: 50%;
                    left: -5%;
                    -webkit-transition: opacity 0.3s ease-in-out;
                            transition: opacity 0.3s ease-in-out;
                    transform: translateY(-50%);
                    opacity: 0;
                    color: white;
                }
                .hmenuac10:hover .bar1st {
                    top: 2px;
                }
                .hmenuac10:hover .bar3rd {
                    bottom: 2px;
                }
                .hmenuac10:hover .bar2nd {
                    opacity: 0;
                }
                .hmenuac10:hover .text {
                    opacity: 1;
                    margin: 0 auto;
                }
            }    
        }
    }   
    @media screen and (max-width: 1024px) { 
        .top {
            background-image: var(--bg-url);
            background-size:100%; 
            background-repeat: no-repeat;
            position: relative;
            .top-image {
                width: 100vw;
                position: relative;
                .responsive-image {
                    width: 100%;
                    height: auto;
                    min-height: 500px;
                    object-fit: cover;
                }
                .eachTextAnime {
                    width: 749px;
                    margin: 0 auto;
                    position: absolute;
                    top: 200px;
                    right: -700px;
                    font-size: 24px;
                    .letter:nth-child(9),
                    .letter:nth-child(28){
                        margin-right: 20px;
                    }
                    span{
                        opacity: 0;
                    }  
                }
                .appeartext span{ 
                    animation:text_anime_on 1s ease-out forwards; 
                }
                @keyframes text_anime_on {
                    0% {opacity:0;}
                    100% {opacity:1;}
                }
            }
            
            @keyframes infinity-scroll-left {
                from {
                transform: translateX(0);
                }
                to {
                transform: translateX(-100%);
                }
            }
            .scroll-infinity__wrap {
                display: flex;
                overflow: hidden;
                position: absolute;
                bottom: 20px;
                left: 0;
                font-weight: bold;
                color: transparent;
                font-size: 80px;
                -webkit-text-stroke: 3px rgb(19, 9, 46);
                .scroll-infinity__list {
                    display: flex;
                    list-style: none;
                    padding: 0;
                    .scroll-infinity__item {
                        width: 749px;
                    }
                }
                .scroll-infinity__list--left {
                animation: infinity-scroll-left 30s infinite linear 0.5s both;
                }
            }
            .header_menu_logo{
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                width: 360px;
                height: 325px;
            }
            .header_menu {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: #838181;
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 3002;
                .colse_header_menu {
                    position: absolute;
                    top: 40px;
                    right: 40px;
                    width: 25px;
                    height: 25px;
                    cursor: pointer;
                }
                .header_menu_contents {
                    display: flex;
                    color: white;
                    z-index: 9999;
                    .header_menu_left {
                        margin-right: 50px;
                        display: flex;
                        justify-content: space-between;
                        flex-flow: column;
                        height: 300px;
                        p {
                            font-size: 20px;
                            color: white;
                            &:hover {
                                color: black;
                            }
                        }
                    }
                    .header_menu_right {
                        button {
                            width: 180px;
                            height: 50px;
                            color: white;
                            border: 4px solid white;                
                            font-weight: bold;
                            font-size: 24px;
                            margin-bottom: 8px;
                            &:hover {
                                color: black;
                                border-color: black;
                            }
                        }
                        .header_menu_right_instagram {
                            display: flex;
                            margin-bottom: 20px;
                            cursor: pointer;
                            align-items: center;
                            &:hover {
                                color: black;
                            }
                            img {
                                margin-right: 6px;
                                width: 18px;
                                height: 18px;
                            }
                            p {
                                font-size: 20px;
                            }
                        }
                        .header_menu_company_info {
                            font-size: 14px;
                            h2 {
                                font-size: 20px;
                            }
                        }
                        
                    }
                }
            }
        }
        .header_contents {
            width: 749px;
            margin: 0 auto;
            .appeartext span{ 
                animation:text_anime_on 1s ease-out forwards; 
            }
            @keyframes text_anime_on {
                0% {opacity:0;}
                100% {opacity:1;}
            }
        }
        .header_contents_other {
            width: 749px;
            margin: 0 auto;
            position: relative;
        }
        .other_title {
            position: absolute;
            font-weight: bold;
            font-size: 48px;
            left: 50px;
            bottom: 10px;
        }
        .other_sub_comment {
            width: 165px;
            font-size: 12px;
            overflow-wrap:  break-word;
            position: absolute;
            right: 50px;
            bottom: 20px;
        }
        .header_content{
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            padding: 40px 0 20px 0;
            width: 100vw;
            z-index: 3001;
            .header_content_menu {
                display: flex;
                margin: 0 auto;
                align-items: center;
                width: 749px;   
                position: relative; 
                &::before {
                    position: absolute;
                    top: -10px;
                    left: 0;
                    content: '';
                    height: 2px;
                    background-color: black;
                    width: 100%;
                }  
                &::after {
                    position: absolute;
                    top: -20px;
                    left: 0;
                    content: '';
                    height: 4px;
                    background-color: black;
                    width: 100%;
                }  
                .logo {
                    flex: 0 0 auto;
                    width: 50px;
                    height: 50px;
                }   
                .right_items {
                    flex: 1;
                    display: flex;
                    justify-content: flex-end;
                    align-items: center;
                }   
                .instagram {
                    width: 30px;
                    height: 30px;
                }
                .header_contact {
                    position: relative;
                    button {
                        color: black;
                        font-size: 13px;
                        border: 4px solid black;
                        padding: 7px 30px;
                        margin-left: 15px;
                        &:hover {
                            background-color: gray;
                        }
                    }
                    .lang {
                        display: flex;
                        position: absolute;
                        bottom: -25px;
                        right: 0;
                        align-items: center;
                        cursor: pointer;
                        .lang_mark {
                            width: 15px;
                            height: 15px;
                            margin-right: 6px;
                        }
                    }                
                }
                .hmenuac10 {
                    position: relative;
                    width: 40px;
                    height: 20px;
                    margin: 0 18px 0 15px;
                    padding: 1.5em 0;
                    cursor: pointer;
                    &:hover {
                        transform: rotate(360deg);
                        transition-duration: 0.5s;
                    }
                }
                .hmenuac10 .bar1st,
                .hmenuac10 .bar2nd,
                .hmenuac10 .bar3rd {
                    position: absolute;
                    width: 40px;
                    height: 5px;
                    -webkit-transition: color 0s, opacity 0.5s ease-in-out, top 0.5s ease-in-out, bottom  0.5s ease-in-out;
                            transition: color 0s, opacity 0.5s ease-in-out, top 0.5s ease-in-out, bottom  0.5s ease-in-out;
                    background: black;
                }
                .hmenuac10 .bar1st {
                    top: 8px;
                }
                .hmenuac10 .bar2nd {
                    top: 50%;
                    -webkit-transition: opacity 0.3s ease-in-out;
                            transition: opacity 0.3s ease-in-out;
                    transform: translateY(-50%);
                }
                .hmenuac10 .bar3rd {
                    bottom: 8px;
                }
                .hmenuac10 .text {
                    position: absolute;
                    top: 50%;
                    left: -5%;
                    -webkit-transition: opacity 0.3s ease-in-out;
                            transition: opacity 0.3s ease-in-out;
                    transform: translateY(-50%);
                    opacity: 0;
                    color: black;
                }
                .hmenuac10:hover .bar1st {
                    top: 2px;
                }
                .hmenuac10:hover .bar3rd {
                    bottom: 2px;
                }
                .hmenuac10:hover .bar2nd {
                    opacity: 0;
                }
                .hmenuac10:hover .text {
                    opacity: 1;
                    margin: 0 auto;
                }
            }  
            .scrolled_header_content_menu {
                &::before {
                    position: absolute;
                    top: -10px;
                    left: 0;
                    content: '';
                    height: 2px;
                    background-color: white;
                    width: 1600px;
                }  
                &::after {
                    position: absolute;
                    top: -20px;
                    left: 0;
                    content: '';
                    height: 4px;
                    background-color: white;
                    width: 1600px;
                }
            }     
        }  
        .scrolled_header_content {
            background-color: rgba(#373737 , 0.5);
            .header_content_menu {
                &::before {
                    position: absolute;
                    top: -10px;
                    left: 0;
                    content: '';
                    height: 2px;
                    background-color: white;
                    width: 749px;
                }  
                &::after {
                    position: absolute;
                    top: -20px;
                    left: 0;
                    content: '';
                    height: 4px;
                    background-color: white;
                    width: 749px;
                }
                .logo {
                    flex: 0 0 auto;
                    width: 50px;
                    height: 50px;
                }   
                .right_items {
                    flex: 1;
                    display: flex;
                    justify-content: flex-end;
                    align-items: center;
                }   
                .instagram {
                    width: 30px;
                    height: 30px;
                }
                .header_contact {
                    position: relative;
                    button {
                        color: white;
                        font-size: 13px;
                        border: 4px solid white;
                        padding: 7px 30px;
                        margin-left: 15px;
                        &:hover {
                            background-color: white;
                            color: black;
                        }
                    }
                    .lang {
                        display: flex;
                        position: absolute;
                        bottom: -25px;
                        right: 0;
                        align-items: center;
                        cursor: pointer;
                        color: white;
                        .lang_mark {
                            width: 15px;
                            height: 15px;
                            margin-right: 6px;
                        }
                    }               
                }
                .hmenuac10 {
                    position: relative;
                    width: 40px;
                    height: 20px;
                    margin: 0 18px 0 15px;
                    padding: 1.5em 0;
                    cursor: pointer;
                    &:hover {
                        transform: rotate(360deg);
                        transition-duration: 0.5s;
                    }
                }
                .hmenuac10 .bar1st,
                .hmenuac10 .bar2nd,
                .hmenuac10 .bar3rd {
                    position: absolute;
                    width: 30px;
                    height: 5px;
                    -webkit-transition: color 0s, opacity 0.5s ease-in-out, top 0.5s ease-in-out, bottom  0.5s ease-in-out;
                            transition: color 0s, opacity 0.5s ease-in-out, top 0.5s ease-in-out, bottom  0.5s ease-in-out;
                    background: white;
                }
                .hmenuac10 .bar1st {
                    top: 8px;
                }
                .hmenuac10 .bar2nd {
                    top: 50%;
                    -webkit-transition: opacity 0.3s ease-in-out;
                            transition: opacity 0.3s ease-in-out;
                    transform: translateY(-50%);
                }
                .hmenuac10 .bar3rd {
                    bottom: 8px;
                }
                .hmenuac10 .text {
                    position: absolute;
                    top: 50%;
                    left: -5%;
                    -webkit-transition: opacity 0.3s ease-in-out;
                            transition: opacity 0.3s ease-in-out;
                    transform: translateY(-50%);
                    opacity: 0;
                    color: white;
                }
                .hmenuac10:hover .bar1st {
                    top: 2px;
                }
                .hmenuac10:hover .bar3rd {
                    bottom: 2px;
                }
                .hmenuac10:hover .bar2nd {
                    opacity: 0;
                }
                .hmenuac10:hover .text {
                    opacity: 1;
                    margin: 0 auto;
                }
            }    
        }
    }
    @media screen and (max-width: 780px) { 
        .top {
            background-image: var(--bg-url);
            background-size:100%; 
            background-repeat: no-repeat;
            position: relative;
            .top-image {
                width: 100vw;
                position: relative;
                .responsive-image {
                    width: 100%;
                    height: auto;
                    min-height: 375px;
                    object-fit: cover;
                }
                .eachTextAnime {
                    width: 749px;
                    margin: 0 auto;
                    position: absolute;
                    top: 150px;
                    right: -700px;
                    font-size: 14px;
                    .letter:nth-child(9),
                    .letter:nth-child(28){
                        margin-right: 20px;
                    }
                    span{
                        opacity: 0;
                    }  
                }
                .appeartext span{ 
                    animation:text_anime_on 1s ease-out forwards; 
                }
                @keyframes text_anime_on {
                    0% {opacity:0;}
                    100% {opacity:1;}
                }
            }
            
            @keyframes infinity-scroll-left {
                from {
                transform: translateX(0);
                }
                to {
                transform: translateX(-100%);
                }
            }
            .scroll-infinity__wrap {
                display: flex;
                overflow: hidden;
                position: absolute;
                bottom: 20px;
                left: 0;
                font-weight: bold;
                color: transparent;
                font-size: 42px;
                -webkit-text-stroke: 3px rgb(19, 9, 46);
                .scroll-infinity__list {
                    display: flex;
                    list-style: none;
                    padding: 0;
                    .scroll-infinity__item {
                        width: 397px;
                    }
                }
                .scroll-infinity__list--left {
                animation: infinity-scroll-left 30s infinite linear 0.5s both;
                }
            }
            .header_menu_logo{
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                width: 360px;
                height: 325px;
            }
            .header_menu {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: #838181;
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 3002;
                .colse_header_menu {
                    position: absolute;
                    top: 27px;
                    right: 22px;
                    width: 25px;
                    height: 25px;
                    cursor: pointer;
                }
                .header_menu_contents {
                    display: flex;
                    color: white;
                    z-index: 9999;
                    .header_menu_left {
                        margin-right: 50px;
                        display: flex;
                        justify-content: space-between;
                        flex-flow: column;
                        height: 500px;
                        p {
                            font-size: 20px;
                            color: white;
                            &:hover {
                                color: black;
                            }
                        }
                        .header_menu_contact {
                            display: flex;
                            align-items: center;
                            margin-bottom: 52px;
                            button {
                                width: 180px;
                                height: 50px;
                                color: white;
                                border: 4px solid white;                
                                font-weight: bold;
                                font-size: 20px;     
                                &:hover {
                                   color: black;
                                   border-color: black;
                                }
                            }
                            img {
                                cursor: pointer;
                                margin-left: 20px;
                                width: 49px;
                                height: 48px;
                            }
                        }
                        .header_menu_company_info {
                            margin-top: 50px;
                            font-size: 16px;
                            h2 {
                                font-size: 24px;
                            }
                        }
                    }
                }
            }
        }
        .header_contents {
            width: 370px;
            margin: 0 auto;
            .appeartext span{ 
                animation:text_anime_on 1s ease-out forwards; 
            }
            @keyframes text_anime_on {
                0% {opacity:0;}
                100% {opacity:1;}
            }
        }
        .header_contents_other {
            width: 370px;
            margin: 0 auto;
            position: relative;
        }
        .other_title {
            position: absolute;
            font-weight: bold;
            font-size: 36px;
            left: 5px;
            bottom: 10px;
        }
        .other_sub_comment {
            width: 160px;
            font-size: 12px;
            overflow-wrap:  break-word;
            position: absolute;
            right: 5px;
            bottom: 20px;
        }
        .header_content{
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            padding: 18px 0 20px 0;
            width: 100vw;
            z-index: 3001;
            .header_content_menu {
                display: flex;
                margin: 0 auto;
                align-items: center;
                width: 370px;   
                position: relative; 
                &::before {
                    position: absolute;
                    top: -2px;
                    left: 0;
                    content: '';
                    height: 2px;
                    background-color: black;
                    width: 100%;
                }  
                &::after {
                    position: absolute;
                    top: -12px;
                    left: 0;
                    content: '';
                    height: 4px;
                    background-color: black;
                    width: 100%;
                }  
                .logo {
                    flex: 0 0 auto;
                    width: 40px;
                    height: 40px;
                }   
                .right_items {
                    flex: 1;
                    display: flex;
                    justify-content: flex-end;
                    align-items: center;
                }   
                .instagram {
                    width: 20px;
                    height: 20px;
                }
                .header_contact {
                    position: relative;
                    button {
                        color: black;
                        font-size: 12px;
                        border: 2px solid black;
                        padding: 2px 20px;
                        margin-left: 10px;
                        &:hover {
                            background-color: gray;
                        }
                    }
                    .lang {
                        display: flex;
                        position: absolute;
                        bottom: -20px;
                        right: 0;
                        align-items: center;
                        cursor: pointer;
                        font-size: 12px;
                        .lang_mark {
                            width: 10px;
                            height: 10px;
                            margin-right: 6px;
                        }
                    }                
                }
                .hmenuac10 {
                    position: relative;
                    width: 40px;
                    height: 20px;
                    margin: 0 5px 0 10px;
                    padding: 1.5em 0;
                    cursor: pointer;
                    &:hover {
                        transform: rotate(360deg);
                        transition-duration: 0.5s;
                    }
                }
                .hmenuac10 .bar1st,
                .hmenuac10 .bar2nd,
                .hmenuac10 .bar3rd {
                    position: absolute;
                    width: 30px;
                    height: 5px;
                    -webkit-transition: color 0s, opacity 0.5s ease-in-out, top 0.5s ease-in-out, bottom  0.5s ease-in-out;
                            transition: color 0s, opacity 0.5s ease-in-out, top 0.5s ease-in-out, bottom  0.5s ease-in-out;
                    background: black;
                }
                .hmenuac10 .bar1st {
                    top: 10px;
                }
                .hmenuac10 .bar2nd {
                    top: 50%;
                    -webkit-transition: opacity 0.3s ease-in-out;
                            transition: opacity 0.3s ease-in-out;
                    transform: translateY(-50%);
                }
                .hmenuac10 .bar3rd {
                    bottom: 10px;
                }
                .hmenuac10 .text {
                    position: absolute;
                    top: 50%;
                    -webkit-transition: opacity 0.3s ease-in-out;
                            transition: opacity 0.3s ease-in-out;
                    transform: translateY(-50%);
                    opacity: 0;
                    color: black;
                    font-size: 12px;
                }
                .hmenuac10:hover .bar1st {
                    top: 5px;
                }
                .hmenuac10:hover .bar3rd {
                    bottom: 5px;
                }
                .hmenuac10:hover .bar2nd {
                    opacity: 0;
                }
                .hmenuac10:hover .text {
                    opacity: 1;
                    margin: 0 auto;
                }
            }  
            .scrolled_header_content_menu {
                &::before {
                    position: absolute;
                    top: -10px;
                    left: 0;
                    content: '';
                    height: 2px;
                    background-color: white;
                    width: 1600px;
                }  
                &::after {
                    position: absolute;
                    top: -20px;
                    left: 0;
                    content: '';
                    height: 4px;
                    background-color: white;
                    width: 1600px;
                }
            }     
        }  
        .scrolled_header_content {
            background-color: rgba(#373737 , 0.5);
            .header_content_menu {
                &::before {
                    position: absolute;
                    top: -2px;
                    left: 0;
                    content: '';
                    height: 2px;
                    background-color: white;
                    width: 100%;
                }  
                &::after {
                    position: absolute;
                    top: -12px;
                    left: 0;
                    content: '';
                    height: 4px;
                    background-color: white;
                    width: 100%;
                }
                .logo {
                    flex: 0 0 auto;
                    width: 40px;
                    height: 40px;
                }   
                .right_items {
                    flex: 1;
                    display: flex;
                    justify-content: flex-end;
                    align-items: center;
                }   
                .instagram {
                    width: 20px;
                    height: 20px;
                }
                .header_contact {
                    position: relative;
                    button {
                        color: white;
                        font-size: 12px;
                        border: 2px solid white;
                        padding: 2px 20px;
                        margin-left: 10px;
                        &:hover {
                            background-color: black;
                        }
                    }
                    .lang {
                        display: flex;
                        position: absolute;
                        bottom: -20px;
                        right: 0;
                        align-items: center;
                        cursor: pointer;
                        color: white;
                        font-size: 12px;
                        .lang_mark {
                            width: 10px;
                            height: 10px;
                            margin-right: 6px;
                        }
                    }                
                }
                .hmenuac10 {
                    position: relative;
                    width: 40px;
                    height: 20px;
                    margin: 0 5px 0 10px;
                    padding: 1.5em 0;
                    cursor: pointer;
                    &:hover {
                        transform: rotate(360deg);
                        transition-duration: 0.5s;
                    }
                }
                .hmenuac10 .bar1st,
                .hmenuac10 .bar2nd,
                .hmenuac10 .bar3rd {
                    position: absolute;
                    width: 30px;
                    height: 5px;
                    -webkit-transition: color 0s, opacity 0.5s ease-in-out, top 0.5s ease-in-out, bottom  0.5s ease-in-out;
                            transition: color 0s, opacity 0.5s ease-in-out, top 0.5s ease-in-out, bottom  0.5s ease-in-out;
                    background: white;
                }
                .hmenuac10 .bar1st {
                    top: 10px;
                }
                .hmenuac10 .bar2nd {
                    top: 50%;
                    -webkit-transition: opacity 0.3s ease-in-out;
                            transition: opacity 0.3s ease-in-out;
                    transform: translateY(-50%);
                }
                .hmenuac10 .bar3rd {
                    bottom: 10px;
                }
                .hmenuac10 .text {
                    position: absolute;
                    top: 50%;
                    -webkit-transition: opacity 0.3s ease-in-out;
                            transition: opacity 0.3s ease-in-out;
                    transform: translateY(-50%);
                    opacity: 0;
                    color: white;
                }
                .hmenuac10:hover .bar1st {
                    top: 5px;
                }
                .hmenuac10:hover .bar3rd {
                    bottom: 5px;
                }
                .hmenuac10:hover .bar2nd {
                    opacity: 0;
                }
                .hmenuac10:hover .text {
                    opacity: 1;
                    margin: 0 auto;
                }
            }    
        }
    }  
</style>
