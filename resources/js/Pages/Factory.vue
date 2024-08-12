<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Main from '@/Layouts/Main.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

const factories = [
    {img: "/images/factory/factory_1.png", name: {en: 'Islamic Republic of Mauritania factory', ja: 'モーリタニア工場'}, products: {en: 'Frozen boiled octopus legs, frozen cut octopus', ja: '冷凍ボイルたこ足、冷凍カットたこ'}, certification_type: "BRCGS"},
    {img: "/images/factory/factory_2.png", name: {en: 'Vietnam factory', ja: 'ベトナム工場'}, products: {en: 'Frozen boiled octopus legs, frozen cut octopus', ja: '冷凍ボイルたこ足、冷凍カットたこ'}, certification_type: "HASSAP"},
    {img: "/images/factory/factory_3.png", name: {en: 'Indonesia factory', ja: 'インドネシア工場'}, products: {en: 'Frozen boiled octopus legs, frozen cut octopus', ja: '冷凍ボイルたこ足、冷凍カットたこ'}, certification_type: "HASSAP"},
    {img: "/images/factory/factory_4.png", name: {en: 'Chinese factory', ja: '中国工場'}, products: {en: 'Frozen boiled octopus legs, frozen cut octopus', ja: '冷凍ボイルたこ足、冷凍カットたこ'}, certification_type: "HASSAP"},
    {img: "/images/factory/factory_5.png", name: {en: 'Japanese factories (18 locations)', ja: '日本工場（18ヶ所）'}, products: {en: 'Frozen boiled octopus legs, frozen cut octopus', ja: '冷凍ボイルたこ足、冷凍カットたこ'}, certification_type: "HASSAP"},
    {img: "/images/factory/factory_6.png", name: {en: 'Japanese second factory', ja: '日本第２工場'}, products: {en: 'Frozen boiled octopus legs, frozen cut octopus', ja: '冷凍ボイルたこ足、冷凍カットたこ'}, certification_type: "HASSAP"},
]

const sub_comment = {
    en: 'texttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextte',
    ja: 'texttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextte'
}

const text = {
    map: {
        en: '*23 locations in total (17 other Japanese factories)',
        ja: '※全２３ヶ所(他日本工場１７ヶ所)'
    },
    list1: {
        en: 'Produce',
        ja: '生産物'
    },
    list2: {
        en: 'Certified',
        ja: '認証取得済み'
    }
}
</script>

<template>
    <Main imageURL="/images/factory_top.jpg" :top="false" title="FACTORY" :sub_comment="sub_comment">
        <template v-slot:default="{ language }">
            <div class="factory">
                <div class="map">
                    <p>{{ text.map[language] }}</p>
                    <img src="/images/factory_map.png">
                </div>
                <div class="factory_list">
                    <div class="factory" v-for="(factory, index) in factories" :key="index">
                        <img :src="factory.img">
                        <p>{{ factory.name[language] }}</p>
                        <ul>
                            <li>{{ text.list1[language] }}<br><span v-html="factory.products[language]"></span></li>
                            <li>{{ factory.certification_type }} {{ text.list2[language] }}</li>
                            <img :src="factory.certification_type === 'BRCGS' ? '/images/factory/BRCGS.png' : '/images/factory/HASSAP.png'">
                        </ul>
                    </div>              
                </div>
            </div>
        </template>
    </Main>
</template>

<style lang="scss" scope>
.factory {
    .map {
        width: 1655px;
        p {
            font-size: 24px;
            text-align: right;
        }
    }
    .factory_list {
        width: 1360px;
        margin: 50px auto 0 auto;
        display: flex;
        flex-wrap: wrap;
        .factory {
            padding: 50px 32px 0 0;
            border-bottom: 1px solid black;
            position: relative;
            &:nth-child(3n + 2) {
                padding: 50px 32px 0 32px;
                &:before {
                    position: absolute; /*positionをabsoluteに指定*/
                    content: "";
                    background-color: black; /*下線の色*/
                    width: 1px; /*線の幅*/
                    height: 600px; /*線の太さ*/
                    top: 50px;
                    right: 0;  /*線のヨコ位置*/
                }
                &:after {
                    position: absolute; /*positionをabsoluteに指定*/
                    content: "";
                    background-color: black; /*下線の色*/
                    width: 1px; /*線の幅*/
                    height: 600px; /*線の太さ*/
                    top: 50px;
                    left: 0;  /*線のヨコ位置*/
                }
            }
            &:nth-child(3n) {
                padding: 50px 0 0 32px;
            }
            img {
                width: 400px;
                height: 300px;
            }
            p {
                padding-left: 9px;
                margin-top: 12px;
                font-size: 24px;
                border-left: 5px solid black;
                max-width: 400px;
            }
            ul {
                margin-left: 16px;
                margin-bottom: 100px;
                margin-top: 27px;
                li {
                    list-style: inside;
                     margin-bottom: 19px;
                }
                img {
                    width: 133px;
                    height: 100px;
                }
            }
        }
    }
}
@media screen and (max-width: 1650px) { 
    .factory {
        .map {
            width: 980px;
            margin: 0 auto;
            p {
                font-size: 16px;
                text-align: right;
            }
        }
        .factory_list {
            width: 900px;
            margin: 67px auto 0 auto;
            display: flex;
            flex-wrap: wrap;
            .factory {
                width: 33%;
                padding: 30px 23px 0 0;
                border-bottom: 1px solid black;
                position: relative;
                &:nth-child(3n + 2) {
                    padding: 30px 23px 0 23px;
                    &:before {
                        position: absolute; /*positionをabsoluteに指定*/
                        content: "";
                        background-color: black; /*下線の色*/
                        width: 1px; /*線の幅*/
                        height: 355px; /*線の太さ*/
                        top: 30px;
                        right: 0;  /*線のヨコ位置*/
                    }
                    &:after {
                        position: absolute; /*positionをabsoluteに指定*/
                        content: "";
                        background-color: black; /*下線の色*/
                        width: 1px; /*線の幅*/
                        height: 355px; /*線の太さ*/
                        top: 30px;
                        left: 0;  /*線のヨコ位置*/
                    }
                }
                &:nth-child(3n) {
                    padding: 30px 0 0 23px;
                }
                img {
                    width: 245px;
                    height: 180px;
                }
                p {
                    padding-left: 6px;
                    margin-top: 2px;
                    font-size: 20px;
                    border-left: 5px solid black;
                }
                ul {
                    width: 257px;
                    margin-left: 7px;
                    margin-bottom:27px;
                    margin-top: 10px;
                    font-size: 16px;
                    li {
                        list-style: inside;
                        margin-bottom: 7px;
                    }
                    img {
                        width: 131px;
                        height: 59px;
                    }
                }
            }
        }
    }
}
@media screen and (max-width: 1024px) { 
    .factory {
        .map {
            width: 590px;
            margin: 0 auto;
            p {
                font-size: 12px;
                text-align: right;
            }
        }
        .factory_list {
            width: 700px;
            margin: 24px auto 0 auto;
            display: flex;
            flex-wrap: wrap;
            .factory {
                width: 33%;
                padding: 17px 17px 0 0;
                border-bottom: 1px solid black;
                position: relative;
                &:nth-child(3n + 2) {
                    padding: 17px 17px 0 17px;
                    &:before {
                        position: absolute; /*positionをabsoluteに指定*/
                        content: "";
                        background-color: black; /*下線の色*/
                        width: 1px; /*線の幅*/
                        height: 270px; /*線の太さ*/
                        top: 20px;
                        right: 0;  /*線のヨコ位置*/
                    }
                    &:after {
                        position: absolute; /*positionをabsoluteに指定*/
                        content: "";
                        background-color: black; /*下線の色*/
                        width: 1px; /*線の幅*/
                        height: 270px; /*線の太さ*/
                        top: 20px;
                        left: 0;  /*線のヨコ位置*/
                    }
                }
                &:nth-child(3n) {
                    padding: 17px 0 0 17px;
                }
                img {
                    width: 165px;
                    height: 125px;
                }
                p {
                    padding-left: 6px;
                    margin-top: 2px;
                    font-size: 16px;
                    border-left: 5px solid black;
                }
                ul {
                    width: 140px;
                    margin-left: 7px;
                    margin-bottom:27px;
                    margin-top: 10px;
                    font-size: 12px;
                    li {
                        list-style: inside;
                        margin-bottom: 7px;
                    }
                    img {
                        width: 70px;
                        height: 30px;
                    }
                }
            }
        }
    }
}
@media screen and (max-width: 780px) { 
    .factory {
        .map {
            width: 364px;
            margin: 0 auto;
            p {
                font-size: 12px;
                text-align: right;
            }
        }
        .factory_list {
            width: 370px;
            margin: 37px auto 0 auto;
            display: flex;
            flex-wrap: wrap;
            .factory {
                width: 50%;
                padding: 17px 17px 0 0;
                border-bottom: 1px solid black;
                position: relative;
                &:nth-child(3n + 2) {
                    padding: 17px 0;
                    &:before {
                        position: absolute; /*positionをabsoluteに指定*/
                        content: "";
                        background-color: black; /*下線の色*/
                        width: 0; /*線の幅*/
                        height: 0; /*線の太さ*/
                        top: 20px;
                        right: 0;  /*線のヨコ位置*/
                    }
                    &:after {
                        position: absolute; /*positionをabsoluteに指定*/
                        content: "";
                        background-color: black; /*下線の色*/
                        width: 0; /*線の幅*/
                        height: 0; /*線の太さ*/
                        top: 20px;
                        left: 0;  /*線のヨコ位置*/
                    }
                }
                &:nth-child(3n) {
                    padding: 17px 0;
                }
                &:nth-child(2n) {
                    padding: 17px 17px 0 17px;
                    &:before {
                        position: absolute; /*positionをabsoluteに指定*/
                        content: "";
                        background-color: black; /*下線の色*/
                        width: 0; /*線の幅*/
                        height: 0; /*線の太さ*/
                        top: 20px;
                        right: 0;  /*線のヨコ位置*/
                    }
                    &:after {
                        position: absolute; /*positionをabsoluteに指定*/
                        content: "";
                        background-color: black; /*下線の色*/
                        width: 1px; /*線の幅*/
                        height: 270px; /*線の太さ*/
                        top: 20px;
                        left: 0;  /*線のヨコ位置*/
                    }
                }
                img {
                    width: 157px;
                    height: 119px;
                }
                p {
                    padding-left: 6px;
                    margin-top: 2px;
                    font-size: 16px;
                    border-left: 5px solid black;
                }
                ul {
                    width: 140px;
                    margin-left: 7px;
                    margin-bottom:27px;
                    margin-top: 10px;
                    font-size: 12px;
                    li {
                        list-style: inside;
                        margin-bottom: 7px;
                    }
                    img {
                        width: 45px;
                        height: 33px;
                    }
                }
            }
        }
    }
}
</style>
