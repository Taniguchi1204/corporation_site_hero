<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { computed } from 'vue';
import Main from '@/Layouts/Main.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

const sub_comment = {
    en: 'texttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextte',
    ja: 'texttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextte'
}

const users = [
    {size: true, name_en: "HIROHARU TAKEUCHI", name_ja: "竹内 太治", img: "/images/users/user1.png", message: {en: "texttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextttexttexttextexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttettexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextttexttexttextexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttextttttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttet", ja: "texttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextttexttexttextexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttettexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextttexttexttextexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttextttttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttet"}},
    {size: false, name_en: "HIROHARU TAKEUCHI", name_ja: "竹内 太治", img: "/images/users/user2.png", message: {en: "texttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextttexttexttextexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttettexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextttexttexttextexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttextttttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttet", ja: "texttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextttexttexttextexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttettexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextttexttexttextexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttextttttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttet"}},
    {size: false, name_en: "HIROHARU TAKEUCHI", name_ja: "竹内 太治", img: "/images/users/user3.png", message: {en: "texttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextttexttexttextexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttettexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextttexttexttextexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttextttttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttet", ja: "texttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextttexttexttextexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttettexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextttexttexttextexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttextttttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttet"}},
    {size: false, name_en: "HIROHARU TAKEUCHI", name_ja: "竹内 太治", img: "/images/users/user4.png", message: {en: "texttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextttexttexttextexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttettexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextttexttexttextexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttextttttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttet", ja: "texttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextttexttexttextexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttettexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextttexttexttextexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttextttttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttet"}},
    {size: false, name_en: "HIROHARU TAKEUCHI", name_ja: "竹内 太治", img: "/images/users/user5.png", message: {en: "texttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextttexttexttextexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttettexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextttexttexttextexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttextttttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttet", ja: "texttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextttexttexttextexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttettexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextttexttexttextexttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttextttttexttexttexttexttexttexttexttextexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttet"}},
]

const big_size_user = computed(() => {
    return users.filter((user) => {
        return user.size === true
    })
})

const small_size_user = computed(() => {
    return users.filter((user) => {
        return user.size === false
    })
})
</script>

<template>
    <Main  imageURL="/images/message_top.jpg" :top="false" title="MESSAGE" :sub_comment="sub_comment">
        <template v-slot:default="{ language }">
            <div class="messages">
                <div class="big_size_users">
                    <div v-for="user in big_size_user" class="big_user">
                        <img :src="user.img">
                        <div class="user_content">
                            <p class="name_en">{{ user.name_en }}</p>
                            <p class="name_ja">{{ user.name_ja }}</p>
                            <p class="message" v-html="user.message[language]"></p>
                        </div>
                    </div>
                </div>

                <div class="small_size_users">
                    <div v-for="(user, index) in small_size_user" class="small_user" :key="index" :class="{ 'left_small_user': index % 2 === 0, 'right_small_user': index % 2 !== 0}">
                        <img :src="user.img">
                        <div class="user_content">
                            <p class="name_en">{{ user.name_en }}</p>
                            <p class="name_ja">{{ user.name_ja }}</p>
                            <p class="message" v-html="user.message[language]"></p>
                        </div>
                    </div>
                </div>        
            </div>
        </template>
    </Main>
</template>

<style lang="scss" scope>
.messages {
    width: 1363px;
    margin: 0 auto;
    .big_user {
        display: flex;
        border-bottom: 1px solid black;
        padding-bottom: 74px;
        img {
            width: 650px;
            height: 450px;
            margin-right: 30px;
        }
        .user_content {
            flex-grow: 1;  
            .name_en {
                font-size: 32px;
            }    
            .name_ja {
                font-size: 24px;
                margin-bottom: 28px;
            }
            .message {
                overflow-wrap:  break-word;
                width: 683px;
                font-size: 20px;
            }
        }

    }

    .small_size_users {
        display: flex;
        flex-wrap: wrap;
        .small_user {
            display: flex;
            width: 650px;
            position: relative;
            img {
                height: 270px;
                width: 200px;
                margin-right: 52px;
            }
            .user_content {
                flex-grow: 1;      
                .name_en {
                    font-size: 20px;
                }
                .name_ja {
                    font-size: 16px;
                    margin-bottom: 20px;
                }
                .message {
                    font-size: 12px;
                    overflow-wrap:  break-word;
                    width: 350px;
                }
            }
        }

        .left_small_user {
            padding: 76px 30px 71px 0;
            &::after {
                position: absolute; /*positionをabsoluteに指定*/
                content: "";
                background-color: black; /*下線の色*/
                width: 1px; /*線の幅*/
                height: 300px; /*線の太さ*/
                bottom: -20px; /*線のタテ位置*/
                top: 50%;
                right: 0;  /*線のヨコ位置*/
                transform: translateY(-50%);/*線のヨコ位置*/
            }
            &::before {
                content: '';
                position: absolute;
                left: 0;
                bottom: 0;/*線の上下位置*/
                display: inline-block;
                width: 600px;/*線の長さ*/
                height: 1px;/*線の太さ*/
                background-color: black;/*線の色*/
            }
        }

        .right_small_user {
            padding: 76px 30px 71px 30px;
            &::before {
                content: '';
                position: absolute;
                left: 30px;
                bottom: 0;/*線の上下位置*/
                display: inline-block;
                width: 620px;/*線の長さ*/
                height: 1px;/*線の太さ*/
                background-color: black;/*線の色*/
            }

        }
    }
}
@media screen and (max-width: 1650px) { 
    .messages {
        width: 824px;
        margin: 0 auto;
        .big_user {
            display: flex;
            border-bottom: 1px solid black;
            padding-bottom: 45px;
            img {
                width: 385px;
                height: 265px;
                margin-right: 26px;
            }
            .user_content {
                flex-grow: 1;  
                .name_en {
                    font-size: 24px;
                }    
                .name_ja {
                    font-size: 20px;
                    margin-bottom: 20px;
                }
                .message {
                    overflow-wrap:  break-word;
                    width: 400px;
                    font-size: 14px;
                    
                }
            }

        }

        .small_size_users {
            display: flex;
            flex-wrap: wrap;
            .small_user {
                display: flex;
                width: 394px;
                position: relative;
                img {
                    height: 160px;
                    width: 120px;
                    margin-right: 20px;
                }
                .user_content {
                    flex-grow: 1;      
                    .name_en {
                        font-size: 20px;
                    }
                    .name_ja {
                        font-size: 16px;
                        margin-bottom: 11px;
                    }
                    .message {
                        font-size: 12px;
                        overflow-wrap:  break-word;
                        width: 250px;
                    }
                }
            }

            .left_small_user {
                padding: 45px 0;
                width: 424px;
                &::after {
                    position: absolute; /*positionをabsoluteに指定*/
                    content: "";
                    background-color: black; /*下線の色*/
                    width: 1px; /*線の幅*/
                    height: 400px; /*線の太さ*/
                    bottom: -20px; /*線のタテ位置*/
                    top: 50%;
                    right: 0;  /*線のヨコ位置*/
                    transform: translateY(-50%);/*線のヨコ位置*/
                }
                &::before {
                    content: '';
                    position: absolute;
                    left: 0;
                    bottom: 0;/*線の上下位置*/
                    display: inline-block;
                    width: 394px;/*線の長さ*/
                    height: 1px;/*線の太さ*/
                    background-color: black;/*線の色*/
                }
            }

            .right_small_user {
                padding: 45px 0 45px 17px;
                &::before {
                    content: '';
                    position: absolute;
                    left: 30px;
                    bottom: 0;/*線の上下位置*/
                    display: inline-block;
                    width: 394px;/*線の長さ*/
                    height: 1px;/*線の太さ*/
                    background-color: black;/*線の色*/
                }

            }
        }
    }
}
@media screen and (max-width: 1024px) { 
    .messages {
        width: 700px;
        margin: 0 auto;
        .big_user {
            display: flex;
            border-bottom: 1px solid black;
            padding-bottom: 29px;
            img {
                width: 260px;
                height: 190px;
                margin-right: 11px;
            }
            .user_content {
                flex-grow: 1;  
                .name_en {
                    font-size: 24px;
                }    
                .name_ja {
                    font-size: 16px;
                    margin-bottom: 12px;
                }
                .message {
                    overflow-wrap:  break-word;
                    width: 400px;
                    font-size: 12px;
                    
                }
            }

        }

        .small_size_users {
            display: flex;
            flex-wrap: wrap;
            .small_user {
                display: flex;
                width: 270px;
                position: relative;
                img {
                    height: 115px;
                    width: 80px;
                    margin-right: 5px;
                }
                .user_content {
                    flex-grow: 1;      
                    .name_en {
                        font-size: 16px;
                    }
                    .name_ja {
                        font-size: 12px;
                        margin-bottom: 11px;
                    }
                    .message {
                        font-size: 12px;
                        overflow-wrap:  break-word;
                        width: 230px;
                    }
                }
            }

            .left_small_user {
                padding: 30px 0;
                width: 350px;
                &::after {
                    position: absolute; /*positionをabsoluteに指定*/
                    content: "";
                    background-color: black; /*下線の色*/
                    width: 1px; /*線の幅*/
                    height: 320px; /*線の太さ*/
                    bottom: -20px; /*線のタテ位置*/
                    top: 50%;
                    right: 0;  /*線のヨコ位置*/
                    transform: translateY(-50%);/*線のヨコ位置*/
                }
                &::before {
                    content: '';
                    position: absolute;
                    left: 0;
                    bottom: 0;/*線の上下位置*/
                    display: inline-block;
                    width: 320px;/*線の長さ*/
                    height: 1px;/*線の太さ*/
                    background-color: black;/*線の色*/
                }
            }

            .right_small_user {
                padding: 30px 0 30px 30px;
                &::before {
                    content: '';
                    position: absolute;
                    left: 30px;
                    bottom: 0;/*線の上下位置*/
                    display: inline-block;
                    width: 320px;/*線の長さ*/
                    height: 1px;/*線の太さ*/
                    background-color: black;/*線の色*/
                }

            }
        }
    }
}
@media screen and (max-width: 780px) { 
    .messages {
        width: 350px;
        margin: 0 auto;
        .big_user {
            display: block;
            border-bottom: 1px solid black;
            padding-bottom: 29px;
            img {
                width: 287px;
                height: 199px;
                margin-right: 0;
            }
            .user_content {
                flex-grow: 1;  
                .name_en {
                    font-size: 20px;
                }    
                .name_ja {
                    font-size: 12px;
                    margin-bottom: 8px;
                }
                .message {
                    overflow-wrap:  break-word;
                    width: 351px;
                    font-size: 12px;
                    
                }
            }

        }

        .small_size_users {
            display: flex;
            flex-flow: column;
            .small_user {
                display: flex;
                width: 270px;
                position: relative;
                img {
                    height: 136px;
                    width: 183px;
                    margin-right: 10px;
                }
                .user_content {
                    flex-grow: 1;      
                    .name_en {
                        font-size: 16px;
                    }
                    .name_ja {
                        font-size: 12px;
                        margin-bottom: 11px;
                    }
                    .message {
                        font-size: 12px;
                        overflow-wrap:  break-word;
                        width: 230px;
                    }
                }
            }

            .left_small_user {
                padding: 30px 0;
                width: 350px;
                &::after {
                    position: absolute; /*positionをabsoluteに指定*/
                    content: "";
                    background-color: black; /*下線の色*/
                    width: 0; /*線の幅*/
                    height: 0; /*線の太さ*/
                    bottom: 0; /*線のタテ位置*/
                    top: 0;
                    right: 0;  /*線のヨコ位置*/
                    transform: translateY(-50%);/*線のヨコ位置*/
                }
                &::before {
                    content: '';
                    position: absolute;
                    left: 0;
                    bottom: 0;/*線の上下位置*/
                    display: inline-block;
                    width: 100%;/*線の長さ*/
                    height: 1px;/*線の太さ*/
                    background-color: black;/*線の色*/
                }
            }

            .right_small_user {
                padding: 30px 0;
                width: 350px;
                &::before {
                    content: '';
                    position: absolute;
                    left: 0;
                    bottom: 0;/*線の上下位置*/
                    display: inline-block;
                    width: 100%;/*線の長さ*/
                    height: 1px;/*線の太さ*/
                    background-color: black;/*線の色*/
                }

            }
        }
    }
}
</style>
