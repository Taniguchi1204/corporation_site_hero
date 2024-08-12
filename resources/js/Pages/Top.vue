<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Main from '@/Layouts/Main.vue';
import Content from '@/Layouts/Content.vue';
import Contact from '@/Layouts/Contact.vue';
import SprashScreen from '@/Layouts/SprashScreen.vue';
import { onBeforeMount, ref, inject } from 'vue';
import { Carousel, Pagination, Slide, Navigation } from 'vue3-carousel'

import 'vue3-carousel/dist/carousel.css'

const props = defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    errors: Object
});

const isShowSprashScreen = ref(false);

const products_images = ['tako.jpg','tako.jpg','tako.jpg','tako.jpg','tako.jpg','tako.jpg','tako.jpg','tako.jpg','tako.jpg'];

const text = {
    about_us: {
        en: "texttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttext",
        ja: "私たちは天才ですからこのようなサイトを作成し皆様に私たちは天才だということを知ってほしい！！！その一心でお見せしております。是非とも買ってください。よろしくお願いいたします"
    }
}

// データをローカルキャッシュに保存する関数
function setItemWithExpiry() {
  const now = new Date();
  const expiry = now.getTime() + 3600000
  // const expiry = now.getTime() + 10000
  localStorage.setItem("sparsh_screen", expiry);
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

onBeforeMount(() => {
    const expiry = getItemWithExpiry()
    if(expiry === null) {
        isShowSprashScreen.value = true
        setItemWithExpiry();
        setTimeout(() => {
            isShowSprashScreen.value = false;
        },4000)
    } else {
        isShowSprashScreen.value = false
    }
})
</script>

<template>
    <SprashScreen v-if="isShowSprashScreen"></SprashScreen>
    <Main imageURL="/images/top/pc/top_img.jpg" :top="true">
        <template v-slot:default="{ windowSize, language }">
            <div class="top">
                <Content title="ABOUT US">
                    {{ language }}
                    <template v-if="windowSize !== 'sp'">
                        <div class="about_us_all">
                            <div class="about_us_left">
                                <Link :href="route('company_profile')">
                                    <div class="company_profile">
                                        <h2 class="company_profile_title">Company<br>profile</h2>
                                    </div>
                                </Link>
                                <Link :href="route('factory')">
                                    <div class="factory">
                                        <h2 class="factory_title">Factory</h2>
                                    </div>
                                </Link>
                            </div>
                            <div class="about_us_right">
                                <div class="about_us_right_top">
                                    <div class="description">
                                        <img src="/images/top/pc/ikari_img.png">
                                        <p>{{ text.about_us[language] }}</p>
                                    </div>
                                    <div class="sns">
                                        <a href="https://www.instagram.com/hero_usa_inc?igsh=OGQ5ZDc2ODk2ZA%3D%3D&utm_source=qr" target="_blank">
                                            <div class="instagram_about_us">
                                                <h2 class="instagram_title"><img src="/images/top/pc/insta_rainbow.png">Instagram</h2>
                                                <!-- <p class="preparation">COMING SOON</p> -->
                                            </div>
                                        </a>
                                        <a href="https://youtube.com/@octopusherousa?si=PhuZMVq8Z6TExaDv" target="_blank">
                                            <div class="youtube">
                                                <h2 class="youtube_title">You<br>tube</h2>
                                                <img src="/images/top/pc/youtube.png">
                                                <!-- <p class="preparation">COMING SOON</p> -->
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <Link :href="route('message')">
                                    <div class="about_us_right_bottom">
                                        <h2 class="message_title">Message</h2>
                                    </div>
                                </Link>
                            </div>
                        </div>
                    </template>
                    <template v-if="windowSize === 'sp'">
                        <div class="about_us_all">
                            <div class="about_us_left">
                                <Link :href="route('company_profile')">
                                    <div class="company_profile">
                                        <h2 class="company_profile_title">Company<br>profile</h2>
                                    </div>
                                </Link>
                                <Link :href="route('factory')">
                                    <div class="factory">
                                        <h2 class="factory_title">Factory</h2>
                                    </div>
                                </Link>
                            </div>
                            <div class="about_us_right">
                                <div class="about_us_right_top">
                                    <div class="description">
                                        <img src="/images/top/pc/ikari_img.png">
                                        <p>{{ text.about_us[language] }}</p>
                                    </div>
                                    <div class="sns">
                                        <a href="https://www.instagram.com/hero_usa_inc?igsh=OGQ5ZDc2ODk2ZA%3D%3D&utm_source=qr" target="_blank">
                                            <div class="instagram_about_us">
                                                <h2 class="instagram_title"><img src="/images/top/pc/insta_rainbow.png">Instagram</h2>
                                                <!-- <p class="preparation">COMING SOON</p> -->
                                            </div>
                                        </a>
                                        <a href="https://youtube.com/@octopusherousa?si=PhuZMVq8Z6TExaDv" target="_blank">
                                            <div class="youtube">
                                                <h2 class="youtube_title">Youtube</h2>
                                                <img src="/images/top/pc/youtube.png">
                                                <!-- <p class="preparation">COMING SOON</p> -->
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="about_us_right_bottom">
                            <Link :href="route('message')">
                                <h2 class="message_title">Message</h2>
                            </Link>
                        </div>
                    </template>
                    
                </Content>
                <Content title="PRODUCTS">
                    <div class="products_top">
                        <Carousel :autoplay="2000" :itemsToShow="3.95" :wrapAround="true" :transition="500">
                            <Slide v-for="(image, index) in products_images" :key="index">
                                <img :src="`/images/products/${image}`">
                            </Slide>
                            <template #addons>
                                <Navigation />
                                <Pagination />
                            </template>
                        </Carousel>
                    </div>
                    <div class="to_products">
                        <Link :href="route('products')">
                            view more
                        </Link>
                    </div>
                    <img src="/images/bird.png" class="bird">
                </Content>
            </div>
        </template>
        
        <template v-slot:contact="{ language }">
            <Contact :errors="errors" :language="language"/>
        </template>
    </Main>
</template>

<style lang="scss" scope>
.top {
    .about_us_all {
        display: flex;
        .about_us_left {
            .company_profile {
                width: 600px;
                height: 730px;
                border: 2px solid black;
                position: relative;
                background-image: url("/images/top/pc/aboutus img1.jpg");
                background-size:100%; 
                &:hover {
                    background-image: url("/images/top/pc/aboutus img_color1.jpg");
                }
                .company_profile_title {
                    font-size: 30px;
                    font-weight: bold;
                    position: absolute;
                    top: 10px;
                    left: 53px;
                }
            }
            .factory {
                margin-top: 16px;
                width: 600px;
                height: 315px;
                border: 2px solid black;
                position: relative;
                background-image: url("/images/top/pc/aboutus img4.jpg");
                background-size:100%; 
                &:hover {
                    background-image: url("/images/top/pc/aboutus img_color4.jpg");
                }
                .factory_title {
                    font-size: 30px;
                    font-weight: bold;
                    position: absolute;
                    top: 10px;
                    right: 10px;
                }
            }    
        }
        .about_us_right {
            margin-left: 16px;
            .about_us_right_top {
                display: flex;
                .description {
                    width: 380px;
                    height: 516px;
                    border: 2px solid black;
                    margin-right: 16px;
                    padding: 25px;
                    img {
                        width: 278px;
                        height: 314px;
                        margin: 0 auto;
                    }
                    p {
                        overflow-wrap: break-word;
                    }
                }
                .sns {
                    .instagram_about_us {
                        width: 340px;
                        height: 250px;
                        border: 2px solid black;
                        position: relative;
                        background-image: url("/images/top/pc/aboutus img2.jpg");
                        background-size:100%; 
                        &:hover {
                            background-image: url("/images/top/pc/aboutus img_color2.jpg");
                            .preparation {
                                display: block;
                                position: absolute;
                                width: 100%;
                                background-color: gray;
                                text-align: center;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                                font-size: 24px;
                            }
                        }
                        .instagram_title {
                            font-size: 30px;
                            font-weight: bold;
                            position: absolute;
                            top: 10px;
                            left: 20px;
                            img {
                                display: inline;
                                width: 54px;
                                height: 54px;
                                margin-right: 10px;
                            }
                        }
                        .preparation {
                            display: none;
                            position: absolute;
                            width: 100%;
                            background-color: gray;
                            text-align: center;
                            top: 50%;
                            left: 50%;
                            transform: translate(-50%, -50%);
                            font-size: 24px;
                        }
                    }
                    .youtube {
                        margin-top: 16px;
                        width: 340px;
                        height: 250px;
                        border: 2px solid black;
                        position: relative;
                        background-image: url("/images/top/pc/aboutus img3.jpg");
                        background-size:100%; 
                        &:hover {
                            background-image: url("/images/top/pc/aboutus img_color3.jpg");
                            .preparation {
                                display: block;
                                position: absolute;
                                width: 100%;
                                background-color: gray;
                                text-align: center;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                                font-size: 24px;
                            }
                        }
                        .youtube_title {
                            font-size: 30px;
                            font-weight: bold;
                            position: absolute;
                            top: 10px;
                            left: 20px;
                        }
                        img {
                            position: absolute;
                            top: 50%;
                            left: 50%;
                            transform: translate(-50%, -50%);
                        }
                        .preparation {
                            display: none;
                            position: absolute;
                            width: 100%;
                            background-color: gray;
                            text-align: center;
                            top: 50%;
                            left: 50%;
                            transform: translate(-50%, -50%);
                            font-size: 24px;
                        }
                    }
                }
            }
            .about_us_right_bottom {
                margin-top: 16px;
                width: 736px;
                height: 529px;
                border: 2px solid black;
                position: relative;
                background-image: url("/images/top/pc/aboutus img5.jpg");
                background-size:100%; 
                &:hover {
                    background-image: url("/images/top/pc/aboutus img_color5.jpg");
                }
                .message_title {
                    font-size: 30px;
                    font-weight: bold;
                    position: absolute;
                    top: 10px;
                    left: 20px;
                }
            }
        }
    }
    .products_top {
        display: flex;
        .product_top {
            width: 440px;
            height: 590px;
            margin: 0 10px;
        }
        .carousel__viewport {
            perspective: 2000px;
            .carousel__track {
                transform-style: preserve-3d;
                .carousel__slide {
                    padding: 5px;
                }
                .carousel__slide--prev {
                    opacity: 0.8;
                    transform: rotateY(-20deg) scale(0.9);
                }
                .carousel__slide--next {
                    opacity: 0.8;
                    transform: rotateY(20deg) scale(0.9);
                }
                .carousel__slide--active + .carousel__slide + .carousel__slide {
                    transform: rotateY(20deg) scale(0.8);
                }
                .carousel__slide--sliding {
                    transition: 0.5s;
                }
                .carousel__slide--active {
                    opacity: 1;
                    transform: rotateY(0) scale(1.1);
                }
            }
            .carousel__slide {
                opacity: 0.5;
                transform: rotateY(-20deg) scale(0.8);
            }      
        } 
        .carousel__prev {
            left: -100px;
            font-size: 76px;
            width: 76px;
        }
        .carousel__next {
            right: -100px;
            font-size: 76px;
            width: 76px;
        }
    }
    .to_products {
        font-size: 40px;
        text-align: right;
        margin-top: 50px;
        display: flex;
        align-items: center; /* 垂直中心 */
        justify-content: right; /* 水平中心 */
        &::before {
            border-top: 1px solid;
            content: "";
            width: 50px; /* 線の長さ */
            margin-right: 20px;
        }
    }
    .bird {
        position: absolute;
        top: 40px;
        right: -80px;
        width: 183px;
        height: 90px;
    }
}

@media screen and (max-width: 1650px) { 
    .top {
        .about_us_all {
            display: flex;
            .about_us_left {
                .company_profile {
                    width: 354px;
                    height: 429px;
                    border: 2px solid black;
                    position: relative;
                    background-image: url("/images/top/pc/aboutus img1.jpg");
                    background-size:100%; 
                    &:hover {
                        background-image: url("/images/top/pc/aboutus img_color1.jpg");
                    }
                    .company_profile_title {
                        font-size: 32px;
                        font-weight: bold;
                        position: absolute;
                        top: 17px;
                        left: 39px;
                    }
                }
                .factory {
                    margin-top: 19px;
                    width: 354px;
                    height: 186px;
                    border: 2px solid black;
                    position: relative;
                    background-image: url("/images/top/pc/aboutus img4.jpg");
                    background-size:100%; 
                    &:hover {
                        background-image: url("/images/top/pc/aboutus img_color4.jpg");
                    }
                    .factory_title {
                        font-size: 32px;
                        font-weight: bold;
                        position: absolute;
                        top: 2px;
                        right: 11px;
                    }
                }    
            }
            .about_us_right {
                margin-left: 19px;
                .about_us_right_top {
                    display: flex;
                    .description {
                        width: 225px;
                        height: 308px;
                        border: 2px solid black;
                        margin-right: 18px;
                        padding: 10px;
                        img {
                            width: 135px;
                            height: 140px;
                            margin: 0 auto;
                        }
                        P {
                            font-size: 14px;
                            width: 196px;
                            height: 104px;
                        }
                    }
                    .sns {
                        .instagram_about_us {
                            width: 199px;
                            height: 144px;
                            border: 2px solid black;
                            position: relative;
                            background-image: url("/images/top/pc/aboutus img2.jpg");
                            background-size:100%; 
                            &:hover {
                                background-image: url("/images/top/pc/aboutus img_color2.jpg");
                                .preparation {
                                    display: block;
                                    position: absolute;
                                    width: 100%;
                                    background-color: gray;
                                    text-align: center;
                                    top: 50%;
                                    left: 50%;
                                    transform: translate(-50%, -50%);
                                    font-size: 16px;
                                }
                            }
                            .instagram_title {
                                font-size: 24px;
                                font-weight: bold;
                                position: absolute;
                                top: 8px;
                                left: 9px;
                                img {
                                    display: inline;
                                    width: 31px;
                                    height: 31px;
                                    margin-right: 8px;
                                }
                            }
                            .preparation {
                                display: none;
                                position: absolute;
                                width: 100%;
                                background-color: gray;
                                text-align: center;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                                font-size: 16px;
                            }
                        }
                        .youtube {
                            margin-top: 19px;
                            width: 199px;
                            height: 144px;
                            border: 2px solid black;
                            position: relative;
                            background-image: url("/images/top/pc/aboutus img3.jpg");
                            background-size:100%; 
                            &:hover {
                                background-image: url("/images/top/pc/aboutus img_color3.jpg");
                                .preparation {
                                    display: block;
                                    position: absolute;
                                    width: 100%;
                                    background-color: gray;
                                    text-align: center;
                                    top: 50%;
                                    left: 50%;
                                    transform: translate(-50%, -50%);
                                    font-size: 16px;
                                }
                            }
                            .youtube_title {
                                font-size: 24px;
                                font-weight: bold;
                                position: absolute;
                                top: 13px;
                                left: 10px;
                            }
                            img {
                                width: 28px;
                                height: 28px;
                                position: absolute;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                            }
                            .preparation {
                                display: none;
                                position: absolute;
                                width: 100%;
                                background-color: gray;
                                text-align: center;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                                font-size: 16px;
                            }
                        }
                    }
                }
                .about_us_right_bottom {
                    margin-top: 19px;
                    width: 443px;
                    height: 306px;
                    border: 2px solid black;
                    position: relative;
                    background-image: url("/images/top/pc/aboutus img5.jpg");
                    background-size:100%; 
                    &:hover {
                        background-image: url("/images/top/pc/aboutus img_color5.jpg");
                    }
                    .message_title {
                        font-size: 32px;
                        font-weight: bold;
                        position: absolute;
                        top: 18px;
                        left: 12px;
                    }
                }
            }
        }
        .products_top {
            display: flex;
            .product_top {
                width: 440px;
                height: 590px;
                margin: 0 10px;
            }
            .carousel__viewport {
                perspective: 2000px;
                .carousel__track {
                    transform-style: preserve-3d;
                    .carousel__slide {
                        padding: 5px;
                    }
                    .carousel__slide--prev {
                        opacity: 0.8;
                        transform: rotateY(-20deg) scale(0.9);
                    }
                    .carousel__slide--next {
                        opacity: 0.8;
                        transform: rotateY(20deg) scale(0.9);
                    }
                    .carousel__slide--active + .carousel__slide + .carousel__slide {
                        transform: rotateY(20deg) scale(0.8);
                    }
                    .carousel__slide--sliding {
                        transition: 0.5s;
                    }
                    .carousel__slide--active {
                        opacity: 1;
                        transform: rotateY(0) scale(1.1);
                    }    

                }
                
                .carousel__slide {
                    opacity: 0.5;
                    transform: rotateY(-20deg) scale(0.8);
                }      
            } 
            .carousel__prev {
                left: -80px;
                font-size: 40px;
                width: 76px;
            }
            .carousel__next {
                right: -80px;
                font-size: 40px;
                width: 76px;
            }
        }
        .to_products {
            font-size: 24px;
            text-align: right;
            margin-top: 20px;
            display: flex;
            align-items: center; /* 垂直中心 */
            justify-content: right; /* 水平中心 */
            &::before {
                border-top: 1px solid;
                content: "";
                width: 40px; /* 線の長さ */
                margin-right: 14px;
            }
        }
        .bird {
            position: absolute;
            top: 35px;
            right: -20px;
            width: 108px;
            height: 53px;
        }
    }
}
@media screen and (max-width: 1024px) { 
    .top {
        .about_us_all {
            display: flex;
            .about_us_left {
                .company_profile {
                    width: 249px;
                    height: 302px;
                    border: 2px solid black;
                    position: relative;
                    background-image: url("/images/top/pc/aboutus img1.jpg");
                    background-size:100%; 
                    &:hover {
                        background-image: url("/images/top/pc/aboutus img_color1.jpg");
                    }
                    .company_profile_title {
                        font-size: 20px;
                        font-weight: bold;
                        position: absolute;
                        top: 5px;
                        left: 25px;
                    }
                }
                .factory {
                    margin-top: 8px;
                    width: 249px;
                    height: 131px;
                    border: 2px solid black;
                    position: relative;
                    background-image: url("/images/top/pc/aboutus img4.jpg");
                    background-size:100%; 
                    &:hover {
                        background-image: url("/images/top/pc/aboutus img_color4.jpg");
                    }
                    .factory_title {
                        font-size: 20px;
                        font-weight: bold;
                        position: absolute;
                        top: 5px;
                        right: 10px;
                    }
                }    
            }
            .about_us_right {
                margin-left: 8px;
                .about_us_right_top {
                    display: flex;
                    .description {
                        width: 158px;
                        height: 215px;
                        border: 2px solid black;
                        margin-right: 8px;
                        padding: 10px;
                        img {
                            width: 90px;
                            height: 90px;
                            margin: 0 auto;
                        }
                        P {
                            font-size: 10px;
                            width: 138px;
                            height: 73px;
                        }
                    }
                    .sns {
                        .instagram_about_us {
                            width: 142px;
                            height: 103px;
                            border: 2px solid black;
                            position: relative;
                            background-image: url("/images/top/pc/aboutus img2.jpg");
                            background-size:100%; 
                            &:hover {
                                background-image: url("/images/top/pc/aboutus img_color2.jpg");
                                .preparation {
                                    display: block;
                                    position: absolute;
                                    width: 100%;
                                    background-color: gray;
                                    text-align: center;
                                    top: 50%;
                                    left: 50%;
                                    transform: translate(-50%, -50%);
                                    font-size: 12px;
                                }
                            }
                            .instagram_title {
                                font-size: 20px;
                                font-weight: bold;
                                position: absolute;
                                top: 3px;
                                left: 5px;
                                img {
                                    display: inline;
                                    width: 22px;
                                    height: 22px;
                                    margin-right: 6px;
                                }
                            }
                            .preparation {
                                display: none;
                                position: absolute;
                                width: 100%;
                                background-color: gray;
                                text-align: center;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                            }
                        }
                        .youtube {
                            margin-top: 7px;
                            width: 142px;
                            height: 105px;
                            border: 2px solid black;
                            position: relative;
                            background-image: url("/images/top/pc/aboutus img3.jpg");
                            background-size:100%; 
                            &:hover {
                                background-image: url("/images/top/pc/aboutus img_color3.jpg");
                                .preparation {
                                    display: block;
                                    position: absolute;
                                    width: 100%;
                                    background-color: gray;
                                    text-align: center;
                                    top: 50%;
                                    left: 50%;
                                    transform: translate(-50%, -50%);
                                    font-size: 12px;
                                }
                            }
                            .youtube_title {
                                font-size: 20px;
                                font-weight: bold;
                                position: absolute;
                                top: 5px;
                                left: 10px;
                            }
                            img {
                                width: 18px;
                                height: 18px;
                                position: absolute;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                            }
                            .preparation {
                                display: none;
                                position: absolute;
                                width: 100%;
                                background-color: gray;
                                text-align: center;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                            }
                        }
                    }
                }
                .about_us_right_bottom {
                    margin-top: 8px;
                    width: 308px;
                    height: 218px;
                    border: 2px solid black;
                    position: relative;
                    background-image: url("/images/top/pc/aboutus img5.jpg");
                    background-size:100%; 
                    &:hover {
                        background-image: url("/images/top/pc/aboutus img_color5.jpg");
                    }
                    .message_title {
                        font-size: 20px;
                        font-weight: bold;
                        position: absolute;
                        top: 5px;
                        left: 10px;
                    }
                }
            }
        }
        .products_top {
            display: flex;
            .product_top {
                width: 440px;
                height: 590px;
                margin: 0 10px;
            }
            .carousel__viewport {
                perspective: 2000px;
                .carousel__track {
                    transform-style: preserve-3d;
                    .carousel__slide {
                        padding: 5px;
                    }
                    .carousel__slide--prev {
                        opacity: 0.8;
                        transform: rotateY(-20deg) scale(0.9);
                    }
                    .carousel__slide--next {
                        opacity: 0.8;
                        transform: rotateY(20deg) scale(0.9);
                    }
                    .carousel__slide--active + .carousel__slide + .carousel__slide {
                        transform: rotateY(20deg) scale(0.8);
                    }
                    .carousel__slide--sliding {
                        transition: 0.5s;
                    }
                    .carousel__slide--active {
                        opacity: 1;
                        transform: rotateY(0) scale(1.1);
                    }    

                }
                
                .carousel__slide {
                    opacity: 0.5;
                    transform: rotateY(-20deg) scale(0.8);
                }      
            } 
            .carousel__prev {
                left: -80px;
                font-size: 40px;
                width: 76px;
            }
            .carousel__next {
                right: -80px;
                font-size: 40px;
                width: 76px;
            }
        }
        .to_products {
            font-size: 16px;
            text-align: right;
            margin-top: 20px;
            display: flex;
            align-items: center; /* 垂直中心 */
            justify-content: right; /* 水平中心 */
            &::before {
                border-top: 1px solid;
                content: "";
                width: 28px; /* 線の長さ */
                margin-right: 14px;
            }
        }
        .bird {
            position: absolute;
            top: 60px;
            right: -20px;
            width: 76px;
            height: 37px;
        }
    }
}
@media screen and (max-width: 780px) { 
    .top {
        .about_us_all {
            display: flex;
            .about_us_left {
                .company_profile {
                    width: 211px;
                    height: 260px;
                    border: 2px solid black;
                    position: relative;
                    background-image: url("/images/top/pc/aboutus img1.jpg");
                    background-size:100%; 
                    &:hover {
                        background-image: url("/images/top/pc/aboutus img_color1.jpg");
                    }
                    .company_profile_title {
                        font-size: 20px;
                        font-weight: bold;
                        position: absolute;
                        top: 8px;
                        left: 20px;
                    }
                }
                .factory {
                    margin-top: 5px;
                    width: 211px;
                    height: 115px;
                    border: 2px solid black;
                    position: relative;
                    background-image: url("/images/top/pc/aboutus img4.jpg");
                    background-size:100%; 
                    &:hover {
                        background-image: url("/images/top/pc/aboutus img_color4.jpg");
                    }
                    .factory_title {
                        font-size: 20px;
                        font-weight: bold;
                        position: absolute;
                        top: 2px;
                        right: 10px;
                    }
                }    
            }
            .about_us_right {
                margin-left: 5px;
                .about_us_right_top {
                    display: block;
                    .description {
                        width: 134px;
                        height: 174px;
                        border: 2px solid black;
                        margin-right: 0;
                        margin-bottom: 5px;
                        padding: 5px;
                        img {
                            width: 45px;
                            height: 45px;
                            margin: 0 auto;
                        }
                        P {
                            font-size: 10px;
                            width: 120px;
                            height: 73px;
                        }
                    }
                    .sns {
                        .instagram_about_us {
                            width: 135px;
                            height: 97px;
                            border: 2px solid black;
                            position: relative;
                            background-image: url("/images/top/pc/aboutus img2.jpg");
                            background-size:100%; 
                            &:hover {
                                background-image: url("/images/top/pc/aboutus img_color2.jpg");
                                .preparation {
                                    display: block;
                                    position: absolute;
                                    width: 100%;
                                    background-color: gray;
                                    text-align: center;
                                    top: 50%;
                                    left: 50%;
                                    transform: translate(-50%, -50%);
                                    font-size: 12px;
                                }
                            }
                            .instagram_title {
                                font-size: 20px;
                                font-weight: bold;
                                position: absolute;
                                top: 3px;
                                left: 5px;
                                img {
                                    display: inline;
                                    width: 22px;
                                    height: 22px;
                                    margin-right: 3px;
                                }
                            }
                            .preparation {
                                display: none;
                                position: absolute;
                                width: 100%;
                                background-color: gray;
                                text-align: center;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                            }
                        }
                        .youtube {
                            margin-top: 5px;
                            width: 134px;
                            height: 99px;
                            border: 2px solid black;
                            position: relative;
                            background-image: url("/images/top/pc/aboutus img3.jpg");
                            background-size:100%; 
                            &:hover {
                                background-image: url("/images/top/pc/aboutus img_color3.jpg");
                                .preparation {
                                    display: block;
                                    position: absolute;
                                    width: 100%;
                                    background-color: gray;
                                    text-align: center;
                                    top: 50%;
                                    left: 50%;
                                    transform: translate(-50%, -50%);
                                    font-size: 12px;
                                }
                            }
                            .youtube_title {
                                font-size: 20px;
                                font-weight: bold;
                                position: absolute;
                                top: 5px;
                                left: 10px;
                            }
                            img {
                                width: 18px;
                                height: 18px;
                                position: absolute;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                            }
                            .preparation {
                                display: none;
                                position: absolute;
                                width: 100%;
                                background-color: gray;
                                text-align: center;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                            }
                        }
                    }
                }
            }
        }
        .about_us_right_bottom {
            margin-top: 5px;
            width: 350px;
            height: 200px;
            border: 2px solid black;
            position: relative;
            background-image: url("/images/top/pc/aboutus img5.jpg");
            background-size:100%; 
            &:hover {
                background-image: url("/images/top/pc/aboutus img_color5.jpg");
            }
            .message_title {
                font-size: 20px;
                font-weight: bold;
                position: absolute;
                top: 5px;
                left: 10px;
            }
        }
        .products_top {
            display: flex;
            .product_top {
                width: 440px;
                height: 590px;
                margin: 0 10px;
            }
            .carousel__viewport {
                perspective: 2000px;
                .carousel__track {
                    transform-style: preserve-3d;
                    .carousel__slide {
                        padding: 5px;
                    }
                    .carousel__slide--prev {
                        opacity: 0.8;
                        transform: rotateY(-20deg) scale(0.9);
                    }
                    .carousel__slide--next {
                        opacity: 0.8;
                        transform: rotateY(20deg) scale(0.9);
                    }
                    .carousel__slide--active + .carousel__slide + .carousel__slide {
                        transform: rotateY(20deg) scale(0.8);
                    }
                    .carousel__slide--sliding {
                        transition: 0.5s;
                    }
                    .carousel__slide--active {
                        opacity: 1;
                        transform: rotateY(0) scale(1.1);
                    }    

                }
                
                .carousel__slide {
                    opacity: 0.5;
                    transform: rotateY(-20deg) scale(0.8);
                }      
            } 
            .carousel__prev {
                left: -58px;
                font-size: 35px;
                width: 76px;
            }
            .carousel__next {
                right: -58px;
                font-size: 35px;
                width: 76px;
            }
        }
        .to_products {
            font-size: 14px;
            text-align: right;
            margin-top: 20px;
            display: flex;
            align-items: center; /* 垂直中心 */
            justify-content: right; /* 水平中心 */
            &::before {
                border-top: 1px solid;
                content: "";
                width: 40px; /* 線の長さ */
                margin-right: 14px;
            }
        }
        .bird {
            position: absolute;
            top: 30px;
            right: -20px;
            width: 76px;
            height: 37px;
        }
    }
}
</style>
