<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    windowSize: String
});

const insta_img = ref("/images/footer/pc/insta_gray.png")

const mouse_over_insta_img = () => {
    insta_img.value = '/images/top/pc/insta_black.png';
}

const mouse_leave_insta_img = () => {
    insta_img.value = '/images/footer/pc/insta_gray.png';
}
</script>

<template>
    <div class="footer">
        <img :src="`/images/footer/${windowSize}/footer.png`" class="reactive-footer-image">
        <div class="footer-contents">
            <div class="footer-content">
                <template v-if="windowSize !== 'sp'">
                    <div class="footer_left"> 
                        <Link :href="route('top_redirect')">
                            <img class="footer_logo" src="/images/top/pc/logo.png">
                        </Link>
                        
                        <div class="contact_button">
                            <Link :href="route('contact')">
                                <button>CONTACT</button>
                            </Link>
                            <a href="https://www.instagram.com/hero_usa_inc?igsh=OGQ5ZDc2ODk2ZA%3D%3D&utm_source=qr" target="_blank">
                                <img :src="insta_img"  @mouseover="mouse_over_insta_img" @mouseleave="mouse_leave_insta_img">
                            </a>
                        </div>
                        <div class="company_info">
                            <h2>Head Quarter Office</h2>
                            <p>hero@herooctopus.com</p>
                            <p>+1 310-483-3588</p>
                            <p>+81 90-3483-0259</p>
                        </div>
                    </div>
                    <div class="footer_right">
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
                </template>
                <template v-if="windowSize === 'sp'">
                    <div class="footer_left"> 
                        <Link :href="route('top_redirect')">
                            <img class="footer_logo" src="/images/top/pc/logo.png">
                        </Link>
                        <div class="company_info">
                            <h2>Head Quarter Office</h2>
                            <p>hero@herooctopus.com</p>
                            <p>+1 310-483-3588</p>
                            <p>+81 90-3483-0259</p>
                        </div>
                    </div>
                    <div class="footer_right">
                        <div class="contact_button">
                            <a href="https://www.instagram.com/hero_usa_inc?igsh=OGQ5ZDc2ODk2ZA%3D%3D&utm_source=qr" target="_blank">
                                <img :src="insta_img"  @mouseover="mouse_over_insta_img" @mouseleave="mouse_leave_insta_img">
                            </a>
                            <button>CONTACT</button>
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
                    </div>
                </template>
            </div>
        </div>
        <div class="footer-copy-right">
            <div class="footer-copy-right-border">
                <p>COPYRIGHT.︎HERO USA INC.</p>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scope>
    .footer {
        width: 100%;
        height: auto;
        position: relative;
        .reactive-footer-image {
            width: 100%;
        }
        .footer-contents {
            padding: 60px 180px 0;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            .footer-content {
                display: flex;
                width: 1400px;
                margin: 0 auto;
                .footer_logo {
                    width: 183px;
                    height: 165px;
                }
                .contact_button {
                    display: flex;
                    align-items: center;
                    margin: 30px 24px 78px 0;
                    button {
                        width: 190px;
                        height: 48px;
                        color: rgb(90, 90, 90);
                        border: 4px solid rgb(90, 90, 90);              
                        font-weight: bold;
                        font-size: 20px;
                        margin-right: 24px;
                        &:hover {
                            background-color: gray;
                            color: white;

                        }
                    }
                    img {
                        width: 48px;
                        height: 48px;
                    }
                }
                .company_info {
                    color: rgb(90, 90, 90);
                    font-size: 20px;
                    h2 {
                        font-size: 40px;
                    }
                }
                .footer_right {
                    margin-left: auto;
                    display: flex;
                    justify-content: space-between;
                    flex-flow: column;
                    height: 400px;
                    margin-top: 100px;
                    p {
                        font-size: 30px;
                        color: rgb(90, 90, 90);
                        &:hover {
                            color: black;
                        }
                    }
                }
            }   
        } 
        .footer-copy-right {
            width: 100%;
            position: absolute;
            bottom: 0;
            .footer-copy-right-border {
                width: 1600px;
                margin: 0 auto;
                position: relative;
                &::before {
                    position: absolute;
                    bottom: 10px;
                    left: 0;
                    content: '';
                    height: 4px;
                    background-color: rgb(90, 90, 90);
                    width: 100%;
                }  
                &::after {
                    position: absolute;
                    bottom: 20px;
                    left: 0;
                    content: '';
                    height: 2px;
                    background-color: rgb(90, 90, 90);
                    width: 100%;
                }
                p {
                    color: rgb(90, 90, 90);
                    position: absolute;
                    right: 0;
                    bottom: 20px;
                    font-size: 20px;
                }
            }
        }
    }
    @media screen and (max-width: 1650px) { 
        .footer {
            width: 100%;
            height: auto;
            max-height: 600px;
            position: relative;
            .reactive-footer-image {
                width: 100%;
                max-height: 600px;
            }
            .footer-contents {
                padding: 35px 157px 0;
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                .footer-content {
                    display: flex;
                    width: 600px;
                    margin: 0 auto;
                    .footer_logo {
                        width: 108px;
                        height: 97px;
                    }
                    .contact_button {
                        display: flex;
                        align-items: center;
                        margin: 17px 10px 44px 0;
                        button {
                            width: 112px;
                            height: 28px;
                            color: rgb(90, 90, 90);
                            border: 4px solid rgb(90, 90, 90);         
                            font-weight: bold;
                            font-size: 14px;
                            margin-right: 14px;
                            &:hover {
                                background-color: gray;
                                color: white;

                            }
                        }
                        img {
                            width: 28px;
                            height: 28px;
                        }
                    }
                    .company_info {
                        color: rgb(90, 90, 90);
                        font-size: 12px;
                        h2 {
                            font-size: 20px;
                        }
                    }
                    .footer_right {
                        margin-left: auto;
                        display: flex;
                        justify-content: space-between;
                        flex-flow: column;
                        height: 160px;
                        margin-top: 50px;
                        p {
                            font-size: 16px;
                            color: rgb(90, 90, 90);
                            &:hover {
                                color: black;
                            }
                        }
                    }
                }    
            }
            .footer-copy-right {
                width: 100%;
                position: absolute;
                bottom: 0;
                .footer-copy-right-border {
                    width: 1010px;
                    margin: 0 auto;
                    position: relative;
                    &::before {
                        position: absolute;
                        bottom: 10px;
                        left: 0;
                        content: '';
                        height: 4px;
                        background-color: rgb(90, 90, 90);
                        width: 100%;
                    }  
                    &::after {
                        position: absolute;
                        bottom: 20px;
                        left: 0;
                        content: '';
                        height: 2px;
                        background-color: rgb(90, 90, 90);
                        width: 100%;
                    }
                    p {
                        color: rgb(90, 90, 90);
                        position: absolute;
                        right: 0;
                        bottom: 20px;
                        font-size: 12px;
                    }
                }
            }     
        }
    }
    @media screen and (max-width: 1024px) { 
        .footer {
            width: 100%;
            height: auto;
            position: relative;
            .reactive-footer-image {
                width: 100%;
            }
            .footer-contents {
                padding: 18px 150px 0;
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                .footer-content {
                    display: flex;
                    width: 600px;
                    margin: 0 auto;
                    .footer_logo {
                        width: 75px;
                        height: 68px;
                    }
                    .contact_button {
                        display: flex;
                        align-items: center;
                        margin: 42px 10px 20px 0;
                        button {
                            width: 120px;
                            height: 30px;
                            color: rgb(90, 90, 90);
                            border: 4px solid rgb(90, 90, 90);         
                            font-weight: bold;
                            font-size: 13px;
                            margin-right: 10px;
                            &:hover {
                                background-color: gray;
                                color: white;

                            }
                        }
                        img {
                            width: 30px;
                            height: 30px;
                        }
                    }
                    .company_info {
                        color: rgb(90, 90, 90);
                        font-size: 12px;
                        h2 {
                            font-size: 20px;
                        }
                    }
                    .footer_right {
                        margin-left: auto;
                        display: flex;
                        justify-content: space-between;
                        flex-flow: column;
                        height: 150px;
                        margin-top: 50px;
                        p {
                            font-size: 16px;
                            color: rgb(90, 90, 90);
                            &:hover {
                                color: black;
                            }
                        }
                    }
                }    
            }
            .footer-copy-right {
                width: 100%;
                position: absolute;
                bottom: 0;
                .footer-copy-right-border {
                    width: 749px;
                    margin: 0 auto;
                    position: relative;
                    &::before {
                        position: absolute;
                        bottom: 10px;
                        left: 0;
                        content: '';
                        height: 4px;
                        background-color: rgb(90, 90, 90);
                        width: 100%;
                    }  
                    &::after {
                        position: absolute;
                        bottom: 20px;
                        left: 0;
                        content: '';
                        height: 2px;
                        background-color: rgb(90, 90, 90);
                        width: 100%;
                    }
                    p {
                        color: rgb(90, 90, 90);
                        position: absolute;
                        right: 0;
                        bottom: 20px;
                        font-size: 12px;
                    }
                }
            }     
        }
    }
    @media screen and (max-width: 780px) { 
        .footer {
            width: 100%;
            min-width: 370px;
            height: auto;
            min-height: 279px;
            position: relative;
            .reactive-footer-image {
                width: 100%;
                height: 100%;
            }
            .footer-contents {
                padding: 13px 26px 18px;
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                .footer-content {
                    display: flex;
                    width: 345px;
                    margin: 0 auto;
                    .footer_logo {
                        width: 78px;
                        height: 70px;
                        margin-bottom: 40px;
                    }
                    .company_info {
                        color: rgb(90, 90, 90);
                        font-size: 12px;
                        h2 {
                            font-size: 16px;
                        }
                    }
                    .footer_right {
                        margin-left: auto;
                        display: flex;
                        justify-content: space-between;
                        flex-flow: column;
                        height: 200px;
                        margin-top: 0;
                        p {
                            font-size: 12px;
                            color: rgb(90, 90, 90);
                            &:hover {
                                color: black;
                            }
                        }
                        .contact_button {
                            display: flex;
                            align-items: center;
                            margin: 20px 0 0 0;
                            button {
                                width: 120px;
                                height: 30px;
                                color: rgb(90, 90, 90);
                                border: 4px solid rgb(90, 90, 90);         
                                font-weight: bold;
                                font-size: 13px;
                                margin-left: 10px;
                                margin-right: 0;
                                &:hover {
                                    background-color: gray;
                                    color: white;

                                }
                            }
                            img {
                                width: 30px;
                                height: 30px;
                            }
                        }
                    }
                }    
            }
            .footer-copy-right {
                width: 100%;
                position: absolute;
                bottom: 0;
                .footer-copy-right-border {
                    width: 370px;
                    margin: 0 auto;
                    position: relative;
                    &::before {
                        position: absolute;
                        bottom: 10px;
                        left: 0;
                        content: '';
                        height: 4px;
                        background-color: rgb(90, 90, 90);
                        width: 100%;
                    }  
                    &::after {
                        position: absolute;
                        bottom: 20px;
                        left: 0;
                        content: '';
                        height: 2px;
                        background-color: rgb(90, 90, 90);
                        width: 100%;
                    }
                    p {
                        color: rgb(90, 90, 90);
                        position: absolute;
                        right: 0;
                        bottom: 20px;
                        font-size: 12px;
                    }
                }
            }     
        } 
    }
</style>
