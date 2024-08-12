<script setup>
import Main from '@/Layouts/Main.vue';
import Content from '@/Layouts/Content.vue';

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

const company_profile_contents = [
    {img: "/images/content1.png", title: {en: 'Wholesale of seafood products', ja: "海鮮商材卸売販売"}, ex: false},
    {img: "/images/content2.png", title: {en: 'U.S. Import Support', ja: "輸入"}, ex: true},
    {img: "/images/content3.png", title: {en: 'U.S. Sales Support', ja: "販売"}, ex: true},
    {img: "/images/content4.png", title: {en: 'U.S. Shipping Support', ja: "配送"}, ex: true},
    {img: "/images/content5.png", title: {en: 'Event Exhibit Support', ja: "イベント出展サポート"}, ex: false},
    {img: "/images/content6.png", title: {en: 'U.S. Export Support', ja: "米国輸出サポート"}, ex: false},
]

const event_sapport = [
    {img : "/images/event1.png", title: {en: 'Cooperation with Japanese Ministries and Agencies', ja: "日本国省庁との協力"}, discription: {en: 'Providing a variety of financial and administrative support to companies seeking to enter the U.S. market.', ja: "アメリカ市場に参入挑戦をされる企業様に様々な金銭的·事務的サポートを展開"}},
    {img : "/images/event2.png", title: {en: 'Clearing Import Regulations', ja: "輸入規制のクリア"}, discription: {en: 'Even if it`s your first time, you can rest assured that we will handle import regulations.<br>Complete support from export to import by our group companies, SASE Trading and HERO USA.', ja: "グループ企業であるサセトレーディングとHERO USAで輸出から輸入までを完全サポートし、初めての輸入時案でも安心"}},
    {img : "/images/event3.png", title: {en: 'Preparation of necessary items', ja: "必要品の準備"}, discription: {en: 'Support with difficult issues including but not limited to securing necessary goods and personnel for the event.', ja: "イベントを行う上で必要な物品や人員の確保まで様々な難題をサポート"}},
    {img : "/images/event4.png", title: {en: 'Invitation to Events', ja: "イベントへの招待"}, discription: {en: 'Introducing events suitable for your company in the U.S.<br>Provides information on various events throughout the year.', ja: "米国内の御社に適したイベントを紹介１年を通して様々なイベント開催情報を発信"}}
]

const text = {
    company_info: {
        name: {
            en: 'HERO USA Inc',
            ja: 'HERO USA Inc'
        },
        history: {
            en: 'This American company established in April 2023 as the trading company division of the Gindako Group.',
            ja: '2023年4月 銀だこグループの商社部門としてアメリカに発足'
        },
        business: {
            en: 'The core business of this company is the wholesale distribution of seafood products, especially octopus manufactured at our factory in Africa.<br>With our experience of importing our products to the U.S. and dealing with the regulatory barriers, we now offer a wide range of consulting services, including import support for U.S. imports, sales representation in the U.S., and logistics support in the U.S.​',
            ja: '事業の主軸は海鮮商材、特にアフリカの自社工場で製造しているタコの卸販売です。また自社商材をアメリカに輸入する際、規制の障壁の高さを実感し他国と比べた際にも高難易度である経験から、アメリカ輸入時における輸入サポートをはじめ、アメリカ販売の代行、アメリカ物流のサポートなど多岐にわたるコンサルティングを展開中。'
        },
    },
    content1: {
        content1_1: {
            en: 'High-quality octopus products manufactured in our factory in Mauritania, Africa, which are being sold throughout the United States. Expanding sales everyday to acquire new customers.',
            ja: 'アフリカ·モーリタニアの自社工場で製造した高品質なタコ製品を全米に展開中しており新たな販売先を獲得するため日々勢力拡大中'
        },
        content1_2: {
            en: 'Developing rare and high-quality seafood products such as European cuttlefish, which is scarce in the market.<br>Bringing unique products to wholesalers throughout the U.S. ',
            ja: '流通量の少ないヨーロッパコウイカをはじめとする希少価値の高いハイクオリティの海鮮商材を展開<br>他社と差別化した商品力で全米の問屋にアプローチ中'
        },
        content1_3: {
            en: 'Expanding the Japanese seafood business mainly in the Tokyo metropolitan area.<br>We are considering expanding business by acquiring customers who cannot enter events with 20,000 people or inside U.S. military bases.',
            ja: '日本の海産物を首都圏を主に展開中<br>また、2万人規模のイベントや米軍基地内といった通常では入れない顧客を独自ルートで獲得し、事業拡大を検討中'
        },
    },
    content2: {
        content2_1: {
            list1: {
                en: 'Export agency services include documentation and quarantine procedures for export.<br>Sase Trading along with Hero USA will support you through the process.',
                ja: '輸出代行は輸出にかかる書類作成・検疫処理をはじめとする手続きを代行します<br>グループ会社であるサセトレーディングの担当者が1からサポートいたします',
            },
            list2: {
                en: 'We also offer special rates for shipping companies.',
                ja: '配送業者も弊社特別レートにて輸送が可能です',
            },
            list3: {
                en: 'We serve as an import agent for various import regulations in the U.S.<br>Foods are regulated by the FDA, NOAA, USDA, TTB, Customs, etc.<br>We have experience in importing seafood, processed seafood, alcoholic beverages, agricultural products, confectionary, and <br>processed animal products.<br>Depending on the product there are various documents needed and regulations that need to be cleared in order to import it to the U.S. and <br>and we will help you with the process.<br>The Food Safety Management Act, changes on a daily basis.<br>Our strength lies in our ability to provide support that is tailored to each company`s size, product line, and time frame.',
                ja: '輸入代行はアメリカの様々な輸入規制を代行します<br>食品は特に、FDA·NOAA·USDA·TTB·Customなどあげれば数えきれないほどの管理組織があります<br>弊社の実績は【海鮮商材】【水産加工品】【お酒】【農作物】【製菓】【動物性加工品】<br>それぞれにクリアしなければならない規制があり、対象商材によって必要になる書類が違うのが現状です<br>そのサポートとともに、日々変化しているFSMAといわれる食品安全の法律に即した正規の方法で輸入を行います<br>各会社の規模·商材·時期に合わせて小回りの利くサポートが弊社の強みです',
            },
            list4: {
                en: 'We handle domestic shipping within the U.S. on your behalf.<br>We can ship at Hero USA`s special rates.',
                ja: 'アメリカ国内配送を代行します<br>HERO USAの特別レートで輸送が可能です',
            },
        },
    }
}
</script>

<template>
    <Main imageURL="/images/company_profile.png" :top="false" title="COMPANY<br>PROFILE" :sub_comment="sub_comment">
        <template v-slot:default="{ windowSize, language }">
            <Content title="COMPANY INFOMATION" :center=true>
                <div class="company_infomations">
                    <div class="infomation">
                        <p class="info_title">Company name</p>
                        <p class="info_discription" v-html="text.company_info.name[language]"></p>                    
                    </div>
                    <div class="infomation">
                        <p class="info_title">History</p>
                        <p class="info_discription" v-html="text.company_info.history[language]"></p>
                    </div>
                    <div class="infomation">
                        <p class="info_title">Business</p>
                        <p class="info_discription" v-html="text.company_info.business[language]"></p>
                    </div> 
                </div>
            </Content>
            <Content title="CONTENTS" :center=true>
                <div class="company_profile_contents">
                    <div class="company_profile_content" v-for="content in company_profile_contents">
                        <img :src="content.img">
                        <p>{{ content.ex && language == 'ja' ? "米国" : "" }}{{ content.title[language] }}{{ content.ex && language == 'ja' ? "サポート" : "" }}</p>
                    </div>
                </div>

                <div class="content1">
                    <div class="title">
                        <img :src="company_profile_contents[0].img">
                        <p>{{ company_profile_contents[0].title[language] }}</p>
                    </div>
                    <div class="content1_discriptions">
                        <div class="discription">
                            <div class="discription_img">
                                <img src="/images/content1_1.png">
                            </div>
                            <p v-html="text.content1.content1_1[language]"></p>
                        </div>
                        <div class="discription" v-if="windowSize !== 'sp'">
                            <div class="discription_img">
                                <img src="/images/content1_2.png">
                            </div>
                            <p v-html="text.content1.content1_2[language]"></p>
                        </div>
                        <div class="discription">
                            <div class="discription_img">
                                <img src="/images/content1_3.png">
                            </div>
                            <p v-html="text.content1.content1_3[language]"></p>
                        </div>
                    </div>
                </div>

                <div class="content2">
                    <div class="title">
                        <img :src="company_profile_contents[1].img">
                        <img :src="company_profile_contents[2].img">
                        <img :src="company_profile_contents[3].img">
                        <p>{{ language == 'ja' ? "米国" : "" }}{{ company_profile_contents[1].title[language] }}・{{ company_profile_contents[2].title[language]}}・{{ company_profile_contents[3].title[language] }}{{ language == 'ja' ? "サポート" : "" }}</p>
                    </div>
                    <div class="content2_1">
                        <img src="/images/content2_3_4.png">
                        <div class="list">
                            <ol>
                                <li v-html="text.content2.content2_1.list1[language]"></li>
                                <li v-html="text.content2.content2_1.list2[language]"></li>
                                <li v-html="text.content2.content2_1.list3[language]"></li>
                                <li v-html="text.content2.content2_1.list4[language]"></li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="content3">
                    <div class="title">
                        <img :src="company_profile_contents[4].img">
                        <p>{{ company_profile_contents[4].title[language] }}</p>
                    </div>
                    <div class="content3_1">
                        <div class="events">
                            <div class="event" v-for="event in event_sapport">
                                <img :src="event.img">
                                <div class="event_content">
                                    <p class="event_content_title">{{ event.title[language] }}</p>
                                    <p class="event_content_discription" v-html="event.discription[language]"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </Content>
        </template>
    </Main>
</template>

<style lang="scss" scope>
    .company_infomations {
        width: 1300px;
        margin: 0 auto;
        .infomation {
            display: flex;
            border-bottom: 1px solid black;
            margin-bottom: 50px;
            .info_title {
                width: 400px;
            }
            .info_discription {
                width: 1300px;
            }
        }
        p {
            font-size: 32px;
        }
    }

    .company_profile_contents {
        display: flex;
        justify-content:space-between;
        flex-wrap: wrap;
        margin: 0 auto;
        width: 1350px;
        .company_profile_content {
            display: flex;
            align-items: center;
            width: 33%;
            margin-bottom: 87px;
            img {
                width: 95px;
                height: 95px;
            }
            p {
                margin-left: 10px;
                font-size: 32px;
            }
        }
    }

    .content1 {
        .title {
            display: flex;
            align-items: center;
            margin-top: 87px;
            img {
                width: 49px;
                height: 49px;
            }
            p {
                margin-left: 10px;
                font-size: 36px;
            }
        }
        .content1_discriptions {
            display: flex;
            justify-content: space-between;
            .discription {
                width: 387px;
                .discription_img {
                    height: 458px;
                    display: flex;
                    align-items: center;
                }
                p {
                    font-size: 24px;
                    width: 371px;
                    margin: 30px auto;
                }
            }
        }
    }

    .content2 {
        .title {
            display: flex;
            align-items: center;
            margin-top: 87px;
            img {
                margin-right: 10px;
                width: 49px;
                height: 49px;
            }
            p {        
                font-size: 36px;
            }
        }
        .content2_1 {
            width: 1100px;
            margin: 0 auto;
            img {
                margin-bottom: 75px;
            }
            ol {
                list-style: decimal;
                li {
                    font-size: 24px;
                    margin-bottom: 24px;
                }
            }
        }
    }

    .content3 {
        .title {
            display: flex;
            align-items: center;
            margin-top: 87px;
            img {
                margin-right: 10px;
                width: 49px;
                height: 49px;
            }
            p {        
                font-size: 36px;
            }
        }
        .content3_1 {
            .events {
                display: flex;
                flex-wrap: wrap;
                .event {
                    display: flex;
                    width: 40%;
                    margin: 50px;
                    img {
                        width: 131px;
                        height: 152px;
                        margin-right: 18px;
                    }
                    .event_content {
                        .event_content_title {
                            font-size: 32px;
                        }
                    }
                    .event_content_discription {
                        font-size: 24px;
                        width: 487px;
                    }
                }
            }
        }
    }
@media screen and (max-width: 1650px) { 
    .company_infomations {
        width: 770px;
        margin: 0 auto;
        .infomation {
            display: flex;
            border-bottom: 1px solid black;
            margin-bottom: 33px;
            .info_title {
                font-size: 16px;
                width: 200px;
            }
            .info_discription {
                font-size: 16px;
                width: 550px;
            }
        }
    }

    .company_profile_contents {
        display: flex;
        justify-content:space-between;
        flex-wrap: wrap;
        margin: 0 auto;
        width: 850px;
        .company_profile_content {
            display: flex;
            align-items: center;
            width: 33%;
            margin-bottom: 51px;
            img {
                width: 56px;
                height: 56px;
            }
            p {
                margin-left: 7px;
                font-size: 20px;
            }
        }
    }

    .content1 {
        .title {
            display: flex;
            align-items: center;
            margin-top: 97px;
            img {
                width: 33px;
                height: 33px;
            }
            p {
                margin-left: 8px;
                font-size: 16px;
            }
        }
        .content1_discriptions {
            display: flex;
            justify-content: space-between;
            .discription {
                width: 216px;
                .discription_img {
                    width: 216px;
                    height: 256px;
                    display: flex;
                    align-items: center;
                }
                p {
                    font-size: 14px;
                    width: 208px;
                    margin: 11px auto;
                }
            }
        }
    }

    .content2 {
        .title {
            display: flex;
            align-items: center;
            margin-top: 104px;
            img {
                margin-right: 4px;
                width: 33px;
                height: 33px;
            }
            p {        
                font-size: 16px;
            }
        }
        .content2_1 {
            width: 700px;
            margin: 0 auto;
            img {
                margin-bottom: 44px;
            }
            ol {
                list-style: decimal;
                li {
                    font-size: 14px;
                    margin-bottom: 14px;
                }
            }
        }
    }

    .content3 {
        .title {
            display: flex;
            align-items: center;
            margin-top: 104px;
            img {
                margin-right: 4px;
                width: 33px;
                height: 33px;
            }
            p {        
                font-size: 16px;
            }
        }
        .content3_1 {
            .events {
                display: flex;
                flex-wrap: wrap;
                .event {
                    display: flex;
                    width: 40%;
                    margin: 20px;
                    img {
                        width: 77px;
                        height: 90px;
                        margin-right: 10px;
                    }
                    .event_content {
                        .event_content_title {
                            font-size: 16px;
                        }
                    }
                    .event_content_discription {
                        font-size: 14px;
                        width: 270px;
                    }
                }
            }
        }
    }
}
@media screen and (max-width: 1024px) { 
    .company_infomations {
        width: 600px;
        margin: 0 auto;
        .infomation {
            display: flex;
            border-bottom: 1px solid black;
            margin-bottom: 50px;
            .info_title {
                font-size: 14px;
                width: 200px;
            }
            .info_discription {
                font-size: 14px;
                width: 400px;
            }
        }
        p {
            font-size: 32px;
        }
    }

    .company_profile_contents {
        display: flex;
        justify-content:space-between;
        flex-wrap: wrap;
        margin: 0 auto;
        width: 620px;
        .company_profile_content {
            display: flex;
            align-items: center;
            width: 33%;
            margin-bottom: 35px;
            img {
                width: 40px;
                height: 40px;
            }
            p {
                margin-left: 5px;
                font-size: 16px;
            }
        }
    }

    .content1 {
        .title {
            display: flex;
            align-items: center;
            margin-top: 40px;
            img {
                width: 25px;
                height: 25px;
            }
            p {
                margin-left: 5px;
                font-size: 14px;
            }
        }
        .content1_discriptions {
            display: flex;
            justify-content: space-between;
            .discription {
                width: 178px;
                .discription_img {
                    width: 165px;
                    height: 195px;
                    display: flex;
                    align-items: center;
                }
                p {
                    font-size: 12px;
                    width: 159px;
                    margin: 30px auto;
                }
            }
        }
    }

    .content2 {
        .title {
            display: flex;
            align-items: center;
            margin-top: 28px;
            img {
                margin-right: 2px;
                width: 25px;
                height: 25px;
            }
            p {        
                font-size: 14px;
            }
        }
        .content2_1 {
            width: 485px;
            margin: 0 auto;
            img {
                margin-bottom: 38px;
            }
            ol {
                list-style: decimal;
                li {
                    font-size: 12px;
                    margin-bottom: 12px;
                }
            }
        }
    }

    .content3 {
        .title {
            display: flex;
            align-items: center;
            margin-top: 28px;
            img {
                margin-right: 2px;
                width: 25px;
                height: 25px;
            }
            p {        
                font-size: 14px;
            }
        }
        .content3_1 {
            .events {
                display: flex;
                flex-wrap: wrap;
                .event {
                    display: flex;
                    width: 40%;
                    margin: 25px;
                    img {
                        width: 60px;
                        height: 70px;
                        margin-right: 7px;
                    }
                    .event_content {
                        .event_content_title {
                            font-size: 14px;
                        }
                    }
                    .event_content_discription {
                        font-size: 12px;
                        width: 176px;
                    }
                }
            }
        }
    }
}
@media screen and (max-width: 780px) { 
    .company_infomations {
        width: 338px;
        margin: 0 auto;
        .infomation {
            display: flex;
            border-bottom: 1px solid black;
            margin-bottom: 27px;
            .info_title {
                font-size: 12px;
                width: 200px;
            }
            .info_discription {
                font-size: 12px;
                width: 400px;
            }
        }
    }

    .company_profile_contents {
        display: flex;
        justify-content:space-between;
        flex-flow: column;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        width: 285px;
        .company_profile_content {
            display: flex;
            width: 100%;
            margin-bottom: 16px;
            img {
                width: 50px;
                height: 50px;
            }
            p {
                margin-left: 29px;
                font-size: 20px;
            }
        }
    }

    .content1 {
        .title {
            display: flex;
            align-items: center;
            margin-top: 40px;
            img {
                width: 36px;
                height: 36px;
            }
            p {
                margin-left: 5px;
                font-size: 13px;
            }
        }
        .content1_discriptions {
            display: flex;
            justify-content: space-between;
            .discription {
                width: 50%;
                display: flex;
                align-items: center;
                flex-flow: column;
                .discription_img {
                    width: 95px;
                    height: 112px;
                    display: flex;
                    align-items: center;
                }
                p {
                    font-size: 12px;
                    width: 160px;
                    margin: 30px auto;
                }
            }
        }
    }

    .content2 {
        .title {
            display: flex;
            align-items: center;
            margin-top: 28px;
            img {
                margin-right: 4px;
                width: 36px;
                height: 36px;
            }
            p {        
                font-size: 13px;
            }
        }
        .content2_1 {
            width: 293px;
            margin: 0 auto;
            img {
                margin-bottom: 29px;
            }
            ol {
                list-style: decimal;
                li {
                    font-size: 12px;
                    margin-bottom: 12px;
                }
            }
        }
    }

    .content3 {
        .title {
            display: flex;
            align-items: center;
            margin-top: 28px;
            img {
                margin-right: 4px;
                width: 36px;
                height: 36px;
            }
            p {        
                font-size: 13px;
            }
        }
        .content3_1 {
            .events {
                display: flex;
                flex-flow: column;
                .event {
                    display: flex;
                    width: 40%;
                    margin: 7px;
                    img {
                        width: 55px;
                        height: 64px;
                        margin-right: 10px;
                    }
                    .event_content {
                        .event_content_title {
                            font-size: 13px;
                        }
                    }
                    .event_content_discription {
                        font-size: 12px;
                        width: 257px;
                    }
                }
            }
        }
    }
}
</style>
