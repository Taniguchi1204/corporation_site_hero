<script setup>
import { Inertia } from '@inertiajs/inertia';
import { Link, useForm, router } from '@inertiajs/vue3';
import { reactive, ref, watch } from 'vue';
import VueElementLoading from "vue-element-loading";

const props = defineProps({
    errors: Object,
    language: String
})

const terms = ref(false)

const privacy_policy = ref(false)

const loading = ref(false)

const changeLanguage = ref(false)

const text = {
    nomal: {
        en: "texttexttexttexttexttexttexttext",
        ja: "説明texttexttexttexttexttexttexttext"
    },
    confirm: {
        en: "Would you like to contact us with the information you entered?",
        ja: "入力された内容でお問い合わせしますか？"
    },
    error: {
        en: "Sending failed. <br>We apologize for the inconvenience, please contact us again.",
        ja: "送信に失敗しました。<br>お手数ですが再度お問い合わせください。"
    },
    success: {
        en: "Your inquiry has been sent.",
        ja: "問い合わせがお送信されました。"
    },
    placeholder: {
        name: {
            en: "name (Required)",
            ja: "お名前(必須)"
        },
        tel: {
            en: "phone_number (Required)",
            ja: "電話番号（必須）"
        },
        mail: {
            en: "email (Required)",
            ja: "メールアドレス（必須）"
        },
        company: {
            en: "compnay_name",
            ja: "会社名"
        },
        address: {
            en: "address",
            ja: "住所"
        },
        message: {
            en: "message (Required)",
            ja: "お問い合わせ内容（必須）"
        },
        privacy_policy: {
            en: "privacy_policy",
            ja: "個人情報取扱い"
        },
        agree: {
            en: "agree",
            ja: "同意する"
        },
        confirm: {
            en: "confirm",
            ja: "確認"
        },
    },
}

const message = ref({
    type: "nomal",
    comment: text.nomal[props.language]
})

const form_input = ref({
    name: "",
    tel: "",
    mail: "",
    company: "",
    address: "",
    message: "",
    lang: props.language,
})

const submit = () => {
    const result = confirm(text.confirm[props.language]);
    if(!result) return;
    Inertia.post('/mail', form_input.value, {
        preserveScroll: true, // スクロール位置を維持
        onStart: () => {
            loading.value = true
            // 特定のidを持つ要素にスクロール
            const element = document.getElementById('contact');
            if (element) {
                element.scrollIntoView({
                    behavior: 'smooth', // スムーズにスクロールする
                    block: 'start' // 要素が表示される位置。'start'は画面のトップに表示されるようにする
                });
            }
        },
        onError: (errors) => {
            message.value = {
                type: "error",
                comment: text.error[props.language]
            }
            setTimeout(() => {
                loading.value = false;
            }, 1000)    
        },
        onSuccess: () => {
            form_input.value = {
                name: "",
                tel: "",
                mail: "",
                company: "",
                address: "",
                message: ""
            }
            terms.value = false
            message.value = {
                type: "success",
                comment: text.success[props.language]
            }
            loading.value = false;
        },
        onFinish: () => {
            changeLanguage.value = true;
        }
    });
};

watch(() => props.language, (newValue, oldValue) => {
    message.value = {
        type: 'nomal',
        comment: text.nomal[newValue]
    }
    form_input.value.lang = newValue
    changeLanguage.value = false;
})
</script>

<template>
    <div class="contact" id="contact">
        <div class="contents">
            <div class="title_contents">
                <h1 class="contact_title">CONTACT</h1>
                <img src="/images/takosuke.png">
            </div>
            <form class="contact_form" @submit.prevent="submit">
                <vue-element-loading :active="loading" spinner="bar-fade-scale" color="#FF6700" background-color="#D7CB9F" size="80"/>
                <p class="discription" :class="{success: message.type === 'success', error: message.type === 'error'}" v-html="message.comment"></p>
                <div v-if="errors.name && changeLanguage" class="error_message">{{ errors.name }}</div>
                <input class="form_input" :placeholder="text.placeholder.name[language]" v-model="form_input.name">
                <div v-if="errors.tel && changeLanguage" class="error_message">{{ errors.tel }}</div>
                <input class="form_input" :placeholder="text.placeholder.tel[language]" v-model="form_input.tel">
                <div v-if="errors.mail && changeLanguage" class="error_message">{{ errors.mail }}</div>
                <input class="form_input" :placeholder="text.placeholder.mail[language]" v-model="form_input.mail">
                <input class="form_input" :placeholder="text.placeholder.company[language]" v-model="form_input.company">
                <input class="form_input" :placeholder="text.placeholder.address[language]" v-model="form_input.address">
                <div v-if="errors.message && changeLanguage" class="error_message">{{ errors.message }}</div>
                <textarea :placeholder="text.placeholder.message[language]" v-model="form_input.message"></textarea>
                <input type="hidden" v-model="form_input.lang">
                <div class="confirm">
                    <a href="https://ja.wikipedia.org/wiki/%E5%80%8B%E4%BA%BA%E6%83%85%E5%A0%B1" target="_blank" class="privacy_policy" @click="privacy_policy = !privacy_policy">{{ text.placeholder.privacy_policy[language] }}</a>
                    <div class="checkbox" :class="{'checkbox_disabled': privacy_policy}">
                        <input  type="checkbox" id="terms" name="terms" v-model="terms" :disabled="privacy_policy"/>
                        <label  for="terms">{{ text.placeholder.agree[language] }}</label>
                    </div>
                    <button type="submit" :disabled="loading || !terms" :class="{ disabled_button: loading || !terms, able_button: terms }">{{ text.placeholder.confirm[language] }}</button>
                </div>   
                <div class="loader" v-if="loading">Loading...</div>
            </form>  
        </div>  
    </div>
</template>

<style lang="scss" scope>
    .contact {
        background-color: #D7CB9F;
        padding: 90px 67px;
        width: 100%; 
        .contents {
            display: block;
            padding: 65px 124px 0 124px;
            width: 1400px;
            margin: 0 auto;
            .title_contents {
                position: relative;
                .contact_title {
                    color: white;
                    font-weight: bold;
                    font-size: 80px;
                    margin-bottom: 32px;
                    z-index: 2;
                }
                img {
                    z-index: 1;
                    position: absolute;
                    top: -50px;
                    left: -150px;
                }

            }
            .contact_form {
                display:flex;
                flex-flow: column;
                width: 700px;
                margin: 0 auto;
                .form_input {
                    margin-bottom: 45px;
                }
                .discription {
                    text-align: center;
                    margin-bottom: 45px;
                    color: white;
                    font-size: 20px;
                }
                .success {
                    color: green;
                }
                .error {
                    color: red;
                }
                textarea{
                    height: 200px;
                }
                .error_message {
                    color: red;
                    font-size: 12px;
                }
            }
            .confirm {
                display: flex;
                justify-content: space-between;
                padding: 30px 100px 0 100px;
                align-items: center;
                p {
                    font-size: 16px;
                    cursor: pointer;
                }
                .privacy_policy {
                    color: -webkit-link;
                    cursor: pointer;
                    text-decoration: underline;
                }
                .checkbox {
                    display: flex;
                    vertical-align: middle;
                    align-items: center;
                    cursor: pointer;
                    input {
                        cursor: pointer;
                    }
                    label {
                        margin-left: 10px;
                        font-size: 16px;
                        cursor: pointer;
                    }
                }
                .checkbox_disabled {
                    cursor: not-allowed;
                    input {
                        cursor: not-allowed;
                    }
                    label {
                        cursor: not-allowed;
                    }
                }
                .disabled_button {
                    border: 1px solid black;
                    background-color: rgb(150, 150, 150);
                    width: 120px;
                    height: 40px;
                    cursor: not-allowed;
                }
                .able_button {
                    border: 1px solid black;
                    background-color: #DC924E;
                    width: 120px;
                    height: 40px;
                }
            }
        }
    }

    @media screen and (max-width: 1650px) { 
        .contact {
            background-color: #D7CB9F;
            padding: 68px 100px;
            width: 100%; 
            .contents {
                display: block;
                padding: 0;
                width: 720px;
                margin: 0 auto;
                .title_contents {
                    position: relative;
                    .contact_title {
                        color: white;
                        font-weight: bold;
                        font-size: 48px;
                        margin-bottom: 20px;
                        z-index: 2;
                    }
                    img {
                        width: 141px;
                        height: 101px;
                        z-index: 1;
                        position: absolute;
                        top: -40px;
                        left: -90px;
                    }

                }
                .contact_form {
                    display:flex;
                    flex-flow: column;
                    width: 414px;
                    margin: 0 auto;
                    .form_input {
                        margin-bottom: 26px;
                    }
                    .discription {
                        text-align: center;
                        margin-bottom: 28px;
                        color: white;
                        font-size: 12px;
                    }
                    .success {
                        color: green;
                    }
                    .error {
                        color: red;
                    }
                    textarea{
                        height: 115px;
                    }
                    .error_message {
                        color: red;
                        font-size: 12px;
                    }
                }
                .confirm {
                    display: flex;
                    justify-content: space-between;
                    padding: 40px 20px;
                    align-items: center;
                    font-size: 12px;
                    p {
                        font-size: 12px;
                        cursor: pointer;
                    }
                    .checkbox {
                        display: flex;
                        vertical-align: middle;
                        align-items: center;
                        cursor: pointer;
                        input {
                            cursor: pointer;
                        }
                        label {
                            margin-left: 10px;
                            font-size: 12px;
                            cursor: pointer;
                        }
                    }
                    .disabled_button {
                        font-size: 12px;
                        border: 1px solid black;
                        background-color: rgb(150, 150, 150);
                        width: 68px;
                        height: 23px;
                        cursor: not-allowed;
                    }
                    .able_button {
                        font-size: 12px;
                        border: 1px solid black;
                        background-color: #DC924E;
                        width: 68px;
                        height: 23px;
                    }
                }
            }
        } 
    }
    @media screen and (max-width: 1024px) { 
        .contact {
            background-color: #D7CB9F;
            padding: 20px 67px;
            width: 100%; 
            .contents {
                display: block;
                padding: 0;
                width: 620px;
                margin: 0 auto;
                .title_contents {
                    position: relative;
                    .contact_title {
                        color: white;
                        font-weight: bold;
                        font-size: 40px;
                        margin-bottom: 18px;
                        z-index: 2;
                    }
                    img {
                        width: 99px;
                        height: 70px;
                        z-index: 1;
                        position: absolute;
                        top: -0px;
                        left: -75px;
                    }

                }
                .contact_form {
                    display:flex;
                    flex-flow: column;
                    width: 291px;
                    margin: 0 auto;
                    .form_input {
                        margin-bottom: 20px;
                    }
                    .discription {
                        text-align: center;
                        margin-bottom: 34px;
                        color: white;
                        font-size: 12px;
                    }
                    .success {
                        color: green;
                    }
                    .error {
                        color: red;
                    }
                    textarea{
                        height: 81px;
                    }
                    .error_message {
                        color: red;
                        font-size: 12px;
                    }
                }
                .confirm {
                    display: flex;
                    justify-content: space-between;
                    padding: 25px 0;
                    align-items: center;
                    font-size: 12px;
                    p {
                        font-size: 12px;
                        cursor: pointer;
                    }
                    .checkbox {
                        display: flex;
                        vertical-align: middle;
                        align-items: center;
                        cursor: pointer;
                        input {
                            cursor: pointer;
                        }
                        label {
                            margin-left: 10px;
                            font-size: 12px;
                            cursor: pointer;
                        }
                    }
                    .disabled_button {
                        font-size: 12px;
                        border: 1px solid black;
                        background-color: rgb(150, 150, 150);
                        width: 60px;
                        height: 24px;
                        cursor: not-allowed;
                    }
                    .able_button {
                        font-size: 12px;
                        border: 1px solid black;
                        background-color: #DC924E;
                        width: 60px;
                        height: 24px;
                    }
                }
            }
        } 
    }
    @media screen and (max-width: 780px) { 
        .contact {
            background-color: #D7CB9F;
            padding: 25px 20px;
            width: 100%; 
            .contents {
                display: block;
                padding: 0;
                width: 370px;
                margin: 0 auto;
                .title_contents {
                    position: relative;
                    .contact_title {
                        color: white;
                        font-weight: bold;
                        font-size: 36px;
                        margin-bottom: 10px;
                        z-index: 2;
                    }
                    img {
                        width: 72px;
                        height: 52px;
                        z-index: 1;
                        position: absolute;
                        top: -20px;
                        left: -20px;
                    }

                }
                .contact_form {
                    display:flex;
                    flex-flow: column;
                    width: 280px;
                    margin: 0 auto;
                    .form_input {
                        margin-bottom: 20px;
                    }
                    .discription {
                        text-align: center;
                        margin-bottom: 34px;
                        color: white;
                        font-size: 12px;
                    }
                    .success {
                        color: green;
                    }
                    .error {
                        color: red;
                    }
                    textarea{
                        height: 85px;
                    }
                    .error_message {
                        color: red;
                        font-size: 12px;
                    }
                }
                .confirm {
                    display: flex;
                    justify-content: space-between;
                    padding: 25px 0;
                    align-items: center;
                    font-size: 12px;
                    p {
                        font-size: 12px;
                        cursor: pointer;
                    }
                    .checkbox {
                        display: flex;
                        vertical-align: middle;
                        align-items: center;
                        cursor: pointer;
                        input {
                            cursor: pointer;
                        }
                        label {
                            margin-left: 10px;
                            font-size: 12px;
                            cursor: pointer;
                        }
                    }
                    .disabled_button {
                        font-size: 12px;
                        border: 1px solid black;
                        background-color: rgb(150, 150, 150);
                        width: 86px;
                        height: 31px;
                        cursor: not-allowed;
                    }
                    .able_button {
                        font-size: 12px;
                        border: 1px solid black;
                        background-color: #DC924E;
                        width: 86px;
                        height: 31px;
                    }
                }
            }
        } 
    }
</style>