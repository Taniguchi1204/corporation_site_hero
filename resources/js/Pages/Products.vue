<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { computed, reactive, ref, watch, onBeforeMount } from 'vue';
import Main from '@/Layouts/Main.vue';
import Contact from '@/Layouts/Contact.vue';
import { Carousel, Pagination, Slide, Navigation } from 'vue3-carousel'

import 'vue3-carousel/dist/carousel.css'

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    errors: Object,
});

const sub_comment = {
    en: 'texttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextte',
    ja: 'texttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttextte'
}

const text = {
    category: {
        en: "Category",
        ja: "カテゴリー"
    },
    all: {
        en: "All products",
        ja: "全ての商品"
    },
}

const selectedCategoryAll = ref(true);

const selectedCategories = ref([])

const selectedProduct = ref(null)

const currentSlide = ref(0)

const categories = ref([
    {
        id: "food", 
        name: {en: "food", ja: "食品"}, 
        selected: true,
        details: [
            {id: "1_1",name: {en: "seafood", ja: "海鮮"}, selected: true},
            {id: "1_2",name: {en: "vegetables", ja: "野菜"}, selected: true},
            {id: "1_3",name: {en: "meat", ja: "食肉"}, selected: true},
            {id: "1_4",name: {en: "processed food", ja: "加工食品"}, selected: true},
            {id: "1_5",name: {en: "dessert", ja: "デザート"}, selected: true},
        ]
    },
    {
        id: "non_food", 
        name: {en: "non-food", ja: "非食品"},
        selected: true,
        details: [
            {id: "2_1",name: {en: "Wet towel", ja: "おしぼり"}, selected: true},
            {id: "2_2",name: {en: "gloves", ja: "手袋"}, selected: true}
        ]
    }
]);

const products = [
    {
        img_top: "/images/products/product_1.png",
        images: ["/images/products/product_1.png","/images/products/product_3.png","/images/products/product_1.png","/images/products/product_3.png","/images/products/product_1.png","/images/products/product_3.png"],
        name: {en: "frozen boiled octopus legs", ja: "冷凍ボイルタコ足"},
        title: {en: "Tsukiji Gindako's octopus factory established in Mauritania", ja: "築地銀だこ”のたこ工場をモーリタニアに新設"},
        discription: {en: "We have established our own factory in a country that is one of the world's three largest fishing grounds and has the world's top market share for octopus exports, and we centrally manage everything from purchasing to processing. This is the main product of HERO USA, the only American company that can stably supply the world's highest quality octopus at low prices. We offer several types of specifications to suit different applications while maintaining Japanese processing technology.", ja: "世界三大漁場の一つでもあり、世界トップシェアのタコ輸出国に自社工場を設立し、仕入れから加工までを一元管理しています。世界最高品質の真蛸を安価に安定供給できる唯一のアメリカ企業である我々HERO USAの主力商品です。日本の加工技術をそのままに、用途に合わせた数種類の規格をご用意しております。"},
        category: ["1_1"]
    },
    {
        img_top: "/images/products/product_2.png",
        images: ["/images/products/product_1.png","/images/products/product_3.png","/images/products/product_1.png","/images/products/product_3.png","/images/products/product_1.png","/images/products/product_3.png"],
        name: {en: "Frozen boiled octopus", ja: "冷凍ボイル丸だこ"},
        title: {en: "Tsukiji Gindako's octopus factory established in Mauritania", ja: "築地銀だこ”のたこ工場をモーリタニアに新設"},
        discription: {en: "We have established our own factory in a country that is one of the world's three largest fishing grounds and has the world's top market share for octopus exports, and we centrally manage everything from purchasing to processing. This is the main product of HERO USA, the only American company that can stably supply the world's highest quality octopus at low prices. We offer several types of specifications to suit different applications while maintaining Japanese processing technology.", ja: "世界三大漁場の一つでもあり、世界トップシェアのタコ輸出国に自社工場を設立し、仕入れから加工までを一元管理しています。世界最高品質の真蛸を安価に安定供給できる唯一のアメリカ企業である我々HERO USAの主力商品です。日本の加工技術をそのままに、用途に合わせた数種類の規格をご用意しております。"},
        category: ["1_2"]
    },
    {
        img_top: "/images/products/product_3.png",
        images: ["/images/products/product_1.png","/images/products/product_3.png","/images/products/product_1.png","/images/products/product_3.png","/images/products/product_1.png","/images/products/product_3.png"],
        name: {en: "Frozen cut octopus", ja: "冷凍カットたこ"},
        title: {en: "Tsukiji Gindako's octopus factory established in Mauritania", ja: "築地銀だこ”のたこ工場をモーリタニアに新設"},
        discription: {en: "We have established our own factory in a country that is one of the world's three largest fishing grounds and has the world's top market share for octopus exports, and we centrally manage everything from purchasing to processing. This is the main product of HERO USA, the only American company that can stably supply the world's highest quality octopus at low prices. We offer several types of specifications to suit different applications while maintaining Japanese processing technology.", ja: "世界三大漁場の一つでもあり、世界トップシェアのタコ輸出国に自社工場を設立し、仕入れから加工までを一元管理しています。世界最高品質の真蛸を安価に安定供給できる唯一のアメリカ企業である我々HERO USAの主力商品です。日本の加工技術をそのままに、用途に合わせた数種類の規格をご用意しております。"},
        category: ["1_3"]
    },
    {
        img_top: "/images/products/product_1.png",
        images: ["/images/products/product_1.png","/images/products/product_3.png","/images/products/product_1.png","/images/products/product_3.png","/images/products/product_1.png","/images/products/product_3.png"],
        name: {en: "frozen boiled octopus legs", ja: "冷凍ボイルタコ足"},
        title: {en: "Tsukiji Gindako's octopus factory established in Mauritania", ja: "築地銀だこ”のたこ工場をモーリタニアに新設"},
        discription: {en: "We have established our own factory in a country that is one of the world's three largest fishing grounds and has the world's top market share for octopus exports, and we centrally manage everything from purchasing to processing. This is the main product of HERO USA, the only American company that can stably supply the world's highest quality octopus at low prices. We offer several types of specifications to suit different applications while maintaining Japanese processing technology.", ja: "世界三大漁場の一つでもあり、世界トップシェアのタコ輸出国に自社工場を設立し、仕入れから加工までを一元管理しています。世界最高品質の真蛸を安価に安定供給できる唯一のアメリカ企業である我々HERO USAの主力商品です。日本の加工技術をそのままに、用途に合わせた数種類の規格をご用意しております。"},
        category: ["1_4"]
    },
    {
        img_top: "/images/products/product_2.png",
        images: ["/images/products/product_1.png","/images/products/product_3.png","/images/products/product_1.png","/images/products/product_3.png","/images/products/product_1.png","/images/products/product_3.png"],
        name: {en: "Frozen boiled octopus", ja: "冷凍ボイル丸だこ"},
        title: {en: "Tsukiji Gindako's octopus factory established in Mauritania", ja: "築地銀だこ”のたこ工場をモーリタニアに新設"},
        discription: {en: "We have established our own factory in a country that is one of the world's three largest fishing grounds and has the world's top market share for octopus exports, and we centrally manage everything from purchasing to processing. This is the main product of HERO USA, the only American company that can stably supply the world's highest quality octopus at low prices. We offer several types of specifications to suit different applications while maintaining Japanese processing technology.", ja: "世界三大漁場の一つでもあり、世界トップシェアのタコ輸出国に自社工場を設立し、仕入れから加工までを一元管理しています。世界最高品質の真蛸を安価に安定供給できる唯一のアメリカ企業である我々HERO USAの主力商品です。日本の加工技術をそのままに、用途に合わせた数種類の規格をご用意しております。"},
        category: ["1_1"]
    },
    {
        img_top: "/images/products/product_3.png",
        images: ["/images/products/product_1.png","/images/products/product_3.png","/images/products/product_1.png","/images/products/product_3.png","/images/products/product_1.png","/images/products/product_3.png"],
        name: {en: "Frozen cut octopus", ja: "冷凍カットたこ"},
        title: {en: "Tsukiji Gindako's octopus factory established in Mauritania", ja: "築地銀だこ”のたこ工場をモーリタニアに新設"},
        discription: {en: "We have established our own factory in a country that is one of the world's three largest fishing grounds and has the world's top market share for octopus exports, and we centrally manage everything from purchasing to processing. This is the main product of HERO USA, the only American company that can stably supply the world's highest quality octopus at low prices. We offer several types of specifications to suit different applications while maintaining Japanese processing technology.", ja: "世界三大漁場の一つでもあり、世界トップシェアのタコ輸出国に自社工場を設立し、仕入れから加工までを一元管理しています。世界最高品質の真蛸を安価に安定供給できる唯一のアメリカ企業である我々HERO USAの主力商品です。日本の加工技術をそのままに、用途に合わせた数種類の規格をご用意しております。"},
        category: ["1_5"]
    },
    {
        img_top: "/images/products/product_1.png",
        images: ["/images/products/product_1.png","/images/products/product_3.png","/images/products/product_1.png","/images/products/product_3.png","/images/products/product_1.png","/images/products/product_3.png"],
        name: {en: "frozen boiled octopus legs", ja: "冷凍ボイルタコ足"},
        title: {en: "Tsukiji Gindako's octopus factory established in Mauritania", ja: "築地銀だこ”のたこ工場をモーリタニアに新設"},
        discription: {en: "We have established our own factory in a country that is one of the world's three largest fishing grounds and has the world's top market share for octopus exports, and we centrally manage everything from purchasing to processing. This is the main product of HERO USA, the only American company that can stably supply the world's highest quality octopus at low prices. We offer several types of specifications to suit different applications while maintaining Japanese processing technology.", ja: "世界三大漁場の一つでもあり、世界トップシェアのタコ輸出国に自社工場を設立し、仕入れから加工までを一元管理しています。世界最高品質の真蛸を安価に安定供給できる唯一のアメリカ企業である我々HERO USAの主力商品です。日本の加工技術をそのままに、用途に合わせた数種類の規格をご用意しております。"},
        category: ["2_1"]
    },
    {
        img_top: "/images/products/product_2.png",
        images: ["/images/products/product_1.png","/images/products/product_3.png","/images/products/product_1.png","/images/products/product_3.png","/images/products/product_1.png","/images/products/product_3.png"],
        name: {en: "Frozen boiled octopus", ja: "冷凍ボイル丸だこ"},
        title: {en: "Tsukiji Gindako's octopus factory established in Mauritania", ja: "築地銀だこ”のたこ工場をモーリタニアに新設"},
        discription: {en: "We have established our own factory in a country that is one of the world's three largest fishing grounds and has the world's top market share for octopus exports, and we centrally manage everything from purchasing to processing. This is the main product of HERO USA, the only American company that can stably supply the world's highest quality octopus at low prices. We offer several types of specifications to suit different applications while maintaining Japanese processing technology.", ja: "世界三大漁場の一つでもあり、世界トップシェアのタコ輸出国に自社工場を設立し、仕入れから加工までを一元管理しています。世界最高品質の真蛸を安価に安定供給できる唯一のアメリカ企業である我々HERO USAの主力商品です。日本の加工技術をそのままに、用途に合わせた数種類の規格をご用意しております。"},
        category: ["2_2","1_1"]
    }
]

const slideTo = (val) => {
    currentSlide.value = val
}

const selectedProdcuts = computed(() => {
    return products.filter(product =>
        product.category.some(id => selectedCategories.value.includes(id))
      );
})

const selectedNames = (language) => {
    let names = [];

    categories.value.forEach(category => {
        if (category.selected) {
            names.push(category.name[language]);
        } else {
            category.details.forEach(subcategory => {
                if (subcategory.selected) {
                    names.push(subcategory.name[language]);
                }
            });
        }
    });

    return names.join(', ');
};

const checkCategory = (category_index, selected) => {
    categories.value[category_index].details.forEach((detail) => {
        detail.selected = !selected;  
        if (!selected === true) {
            selectedCategories.value.push(detail.id)
        } else {
            selectedCategories.value = selectedCategories.value.filter(test => {
                return test !== detail.id;
            })
        }
    })
}

const checkCategorydetail = (category_index, detail_index, selected) => {
    const detail = categories.value[category_index].details[detail_index]
    detail.selected = !selected;  
    if(selectedCategories.value.includes(detail.id)) {
        selectedCategories.value = selectedCategories.value.filter(test => {
                return test !== detail.id;
            })
    } else {
        selectedCategories.value.push(detail.id)
    }

}

const toggleSelectedAll = () => {
    if (selectedCategoryAll.value) {
        categories.value.forEach((category) => {
            category.selected = selectedCategoryAll.value;
            category.details.forEach((detail) => {
                detail.selected = selectedCategoryAll.value;
                selectedCategories.value.push(detail.id);
            })
        })
    } else {
        categories.value.forEach((category) => {
            category.selected = selectedCategoryAll.value;
            category.details.forEach((detail) => {
                detail.selected = selectedCategoryAll.value;
                selectedCategories.value.push(detail.id);
            })
        })
        selectedCategories.value.splice(0, selectedCategories.value.length);
    }
}

watch(categories.value, (newValue) => { 
    newValue.forEach(category => {
        const uncheckedDetail = category.details.some(detail => detail.selected === false)
        category.selected = !uncheckedDetail
    })
    const uncheckedCategory = newValue.some(category => category.selected === false)
    selectedCategoryAll.value = !uncheckedCategory
})

onBeforeMount(() => {
    categories.value.forEach((category) => {
        category.details.forEach((detail) => {
            selectedCategories.value.push(detail.id);
        })
    })
})
</script>

<template>
    <Main imageURL="/images/products_top.jpg" :top="false" title="PRODUCTS" :sub_comment="sub_comment">
        <template v-slot:default="{ language }">
            <div class="products" :class="{ 'products_prevent_scoll': selectedProduct }">
                <div class="category_search">
                    <p class="title">{{ text.category[language] }}</p>
                    <div class="category_checkbox">
                        <input type="checkbox" id="all" name="all" v-model="selectedCategoryAll" @change="toggleSelectedAll"/>
                        <label for="all">{{ text.all[language] }}</label>
                        <div v-for="(category, index) in categories" class="cateroy" :key="index">
                            <input type="checkbox" v-model="category.selected" :id="category.id" :name="category.name[language]" @click="checkCategory(index, category.selected)"/>
                            <label :for="category.id">{{ category.name[language] }}</label>
                            <div class="cateory_detail" v-for="(detail, detail_index) in category.details" :key="detail_index">
                                <input type="checkbox" v-model="detail.selected" :id="detail.id" :name="detail.name[language]"  @click="checkCategorydetail(index, detail_index, category.selected)" />
                                <label :for="detail.id">{{ detail.name[language] }}</label>
                            </div>
                        </div>
                    </div>       
                </div>
                <div class="products_list">
                    <p class="title">{{ selectedCategoryAll ? text.all[language] : selectedNames(language) }}</p>
                    <div class="result_products">
                        <div class="result_product" v-for="(product, index) in selectedProdcuts" :key="index" @click="selectedProduct = product">
                            <img :src="product.img_top">
                            <p>{{ product.name[language] }}</p>
                        </div>
                    </div>
                </div>
                <div v-if="selectedProduct" class="select_product">     
                    <div class="select_product_detail">
                        <img src="/images/close.png" class="colse_modal" @click="selectedProduct = null">
                        <div class="select_product_left">
                            <h2 class="select_product_left_title">{{ selectedProduct.name[language] }}</h2>
                            <Carousel id="gallery" :items-to-show="1" :wrap-around="false" v-model="currentSlide">
                                <Slide v-for="(imageURL, key) in selectedProduct.images" :key="key">
                                    <div class="carousel__item">
                                        <img class="select_product_left_main_img" :src="imageURL">
                                    </div>
                                </Slide>
                            </Carousel>

                            <Carousel
                                id="thumbnails"
                                :items-to-show="4"
                                :wrap-around="true"
                                v-model="currentSlide"
                                ref="carousel"
                            >
                                <Slide v-for="(imageURL, key) in selectedProduct.images" :key="key">
                                    <div class="carousel__item" @click="slideTo(key)">
                                        <img class="select_product_left_sub_img" :src="imageURL">
                                    </div>
                                </Slide>
                            </Carousel>
                        </div>
                        <div class="select_product_right">
                            <div class="select_product_right_discriptions">
                                <p class="select_product_right_discription_title">{{ selectedProduct.title[language] }}</p>
                                <p class="select_product_right_discription" v-html="selectedProduct.discription[language]"></p>
                            </div>  
                        </div>
                    </div>      
                </div>
            </div>
        </template>
        
        
        <template v-slot:contact="{ language }">
            <Contact :errors="errors" :language="language"/>
        </template>
    </Main>
</template>

<style lang="scss" scope>
    .products_prevent_scoll {
        overflow: hidden;
    }
    .products {
        width: 1600px;
        margin:0 auto;
        display: flex;
        .category_search {
            width: 233px;
            margin-right: 86px;
            input {
                margin-right: 5px;
            }
            .title {
                font-size: 24px;
                border-bottom: 1px solid black;
            }
            .category_checkbox {
                padding: 13px 0 0 27px;
            }
            .cateory_detail {
                margin: 5px 0;
                padding-left: 31px;
            }
            .cateroy {
                margin-top: 15px;
            }
        }
        .products_list {
            min-height: 1000px;
            .title {
                font-size: 48px;
            }
            .result_products {
                width: 1044px;
                display: flex;
                flex-wrap: wrap;
                .result_product {
                    margin: 29px 0;
                    cursor: pointer;
                    img {
                        width: 320px;
                        height: 215px;
                    }
                    p {
                        margin-top: 10px;
                    }
                    &:nth-child(3n + 2) {
                        margin: 29px 41px;
                    }
                }
                
            }
        }
        .select_product {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            .select_product_detail {
                background-image: url("/images/cloth.jpg");
                background-size:100%; 
                width: 1500px;
                height: 800px;
                margin: 0 auto;
                padding: 70px 63px 107px 101px;
                z-index: 9999;
                display: flex;
                position: relative;
                .colse_modal {
                    position: absolute;
                    top: 48px;
                    right: 78px;
                    width: 63px;
                    height: 63px;
                    cursor: pointer;
                }
                .select_product_left {
                    width: 796px;
                    margin-right: 72px;
                    .select_product_left_title {
                        font-size: 48px;
                    }
                    .select_product_left_main_img {
                        width: 596px;
                        margin: 15px 0;
                    }
                    .select_product_left_sub_img {
                        margin: 0 5px;
                    }
                    .arrow_button {
                        display: flex;
                        justify-content: center;
                        .select_product_left_left {
                            width: 83px;
                            height: 83px;
                            margin-right: 107px;
                        }
                        .select_product_left_right {
                            width: 83px;
                            height: 83px;
                        }
                    }
                    
                }
                .select_product_right {
                    width: 696px;
                    margin-top: 80px;
                    .select_product_right_discriptions {
                        width: 537px;
                        .select_product_right_discription_title {
                            font-size: 24px;
                            margin-bottom: 20px;
                        }
                        .select_product_right_discription {
                            font-size: 18px;
                        }
                    }
                }
            }
        }
    }
    @media screen and (max-width: 1650px) { 
        .products_prevent_scoll {
            overflow: hidden;
        }
        .products {
            width: 900px;
            margin:0 auto;
            display: flex;
            .category_search {
                width: 138px;
                margin-right: 60px;
                input {
                    margin-right: 5px;
                }
                .title {
                    font-size: 14px;
                    border-bottom: 1px solid black;
                }
                .category_checkbox {
                    padding: 7px 0 0 16px;
                    font-size: 14px;
                }
                .cateory_detail {
                    margin: 5px 0;
                    padding-left: 18px;
                }
                .cateroy {
                    margin-top: 27px;
                }
            }
            .products_list {
                min-height: 500px;
                .title {
                    font-size: 40px;
                }
                .result_products {
                    width: 650px;
                    display: flex;
                    flex-wrap: wrap;
                    .result_product {
                        margin: 14px 0;
                        cursor: pointer;
                        img {
                            width: 189px;
                            height: 127px;
                        }
                        p {
                            font-size: 14px;
                            margin-top: 6px;
                        }
                        &:nth-child(3n + 2) {
                            margin: 14px 24px;
                        }
                    }
                    
                }
            }
            .select_product {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 9999;
                .select_product_detail {
                    background-image: url("/images/cloth.jpg");
                    background-size:100%; 
                    width: 1024px;
                    height: 590px;
                    margin: 0 auto;
                    padding: 60px 70px 64px 57px;
                    z-index: 9999;
                    display: flex;
                    position: relative;
                    .colse_modal {
                        position: absolute;
                        top: 33px;
                        right: 33px;
                        width: 35px;
                        height: 35px;
                        cursor: pointer;
                    }
                    .select_product_left {
                        width: 400px;
                        margin-right: 74px;
                        .select_product_left_title {
                            font-size: 32px;
                        }
                        .select_product_left_main_img {
                            width: 400px;
                            height: 264px;
                            margin: 37px 0;
                        }
                        .arrow_button {
                            display: flex;
                            justify-content: center;
                            .select_product_left_left {
                                width: 83px;
                                height: 83px;
                                margin-right: 107px;
                            }
                            .select_product_left_right {
                                width: 83px;
                                height: 83px;
                            }
                        }
                        
                    }
                    .select_product_right {
                        width: 400px;
                        margin-top: 90px;
                        .select_product_right_discriptions {
                            width: 400px;
                            .select_product_right_discription_title {
                                font-size: 15px;
                                margin-bottom: 15px;
                            }
                            .select_product_right_discription {
                                font-size: 12px;
                            }
                        }
                    }
                }
            }
        }
    }
    @media screen and (max-width: 1024px) { 
        .products_prevent_scoll {
            overflow: hidden;
        }
        .products {
            width: 700px;
            margin:0 auto;
            display: flex;
            .category_search {
                width: 115px;
                margin-right: 43px;
                input {
                    margin-right: 5px;
                }
                .title {
                    font-size: 12px;
                    border-bottom: 1px solid black;
                }
                .category_checkbox {
                    padding: 7px 0 0 12px;
                    font-size: 12px;
                }
                .cateory_detail {
                    margin: 5px 0;
                    padding-left: 16px;
                }
                .cateroy {
                    margin-top: 15px;
                }
            }
            .products_list {
                min-height: 500px;
                .title {
                    font-size: 32px;
                }
                .result_products {
                    width: 520px;
                    display: flex;
                    flex-wrap: wrap;
                    .result_product {
                        margin: 10px 0;
                        cursor: pointer;
                        img {
                            width: 127px;
                            height: 85px;
                        }
                        p {
                            font-size: 12px;
                            margin-top: 5px;
                        }
                        &:nth-child(3n + 2) {
                            margin: 10px 40px;
                        }
                    }
                    
                }
            }
            .select_product {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 9999;
                .select_product_detail {
                    background-image: url("/images/cloth.jpg");
                    background-size:100%; 
                    width: 700px;
                    height: 446px;
                    margin: 0 auto;
                    padding: 46px 50px 50px 43px;
                    z-index: 9999;
                    display: flex;
                    position: relative;
                    .colse_modal {
                        position: absolute;
                        top: 25px;
                        right: 25px;
                        width: 27px;
                        height: 27px;
                        cursor: pointer;
                    }
                    .select_product_left {
                        width: 300px;
                        margin-right: 25px;
                        .select_product_left_title {
                            font-size: 32px;
                        }
                        .select_product_left_main_img {
                            width: 300px;
                            height: 200px;
                            margin: 15px 0;
                        }
                        .select_product_left_sub_img {
                            margin: 0 24px;
                        }
                        .arrow_button {
                            display: flex;
                            justify-content: center;
                            .select_product_left_left {
                                width: 83px;
                                height: 83px;
                                margin-right: 107px;
                            }
                            .select_product_left_right {
                                width: 83px;
                                height: 83px;
                            }
                        }
                        
                    }
                    .select_product_right {
                        width: 300px;
                        margin-top: 60px;
                        .select_product_right_discriptions {
                            width: 300px;
                            .select_product_right_discription_title {
                                font-size: 15px;
                                margin-bottom: 15px;
                            }
                            .select_product_right_discription {
                                font-size: 12px;
                            }
                        }
                    }
                }
            }
        }
    }
    @media screen and (max-width: 780px) { 
        .products_prevent_scoll {
            overflow: hidden;
        }
        .products {
            width: 350px;
            margin:0 auto;
            display: flex;
            flex-flow: column;
            .category_search {
                width: 115px;
                margin-right: 0;
                input {
                    margin-right: 5px;
                }
                .title {
                    font-size: 16px;
                    border-bottom: 1px solid black;
                }
                .category_checkbox {
                    padding: 7px 0 0 12px;
                    font-size: 12px;
                }
                .cateory_detail {
                    margin: 5px 0;
                    padding-left: 16px;
                }
                .cateroy {
                    margin-top: 15px;
                }
            }
            .products_list {
                margin-top: 50px;
                min-height: 0;
                .title {
                    font-size: 32px;
                }
                .result_products {
                    width: 350px;
                    display: flex;
                    flex-wrap: wrap;
                    .result_product {
                        margin: 10px 0;
                        cursor: pointer;
                        img {
                            width: 161px;
                            height: 209px;
                        }
                        p {
                            font-size: 16px;
                            margin-top: 8px;
                        }
                        &:nth-child(3n + 2) {
                            margin: 10px 0;
                        }
                        &:nth-child(2n) {
                            margin: 10px 0 10px 28px;
                        }
                    }
                    
                }
            }
            .select_product {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 9999;
                .select_product_detail {
                    background-image: url("/images/cloth.jpg");
                    background-size:100%; 
                    width: 390px;
                    height: 80%;
                    max-height: 844px;
                    margin: 0 auto;
                    padding: 80px 45px 50px 45px;
                    z-index: 9999;
                    display: block;
                    overflow-y: auto;
                    overflow-x: hidden;
                    position: relative;
                    .colse_modal {
                        position: absolute;
                        top: 31px;
                        right: 22px;
                        width: 35px;
                        height: 35px;
                        cursor: pointer;
                    }
                    .select_product_left {
                        width: 300px;
                        margin-right: 25px;
                        .select_product_left_title {
                            font-size: 24px;
                        }
                        .select_product_left_main_img {
                            width: 300px;
                            height: 200px;
                            margin: 15px 0;
                        }
                        .select_product_left_sub_img {
                            margin: 0;
                        }
                        .arrow_button {
                            display: flex;
                            justify-content: center;
                            .select_product_left_left {
                                width: 83px;
                                height: 83px;
                                margin-right: 107px;
                            }
                            .select_product_left_right {
                                width: 83px;
                                height: 83px;
                            }
                        }
                        
                    }
                    .select_product_right {
                        width: 320px;
                        margin-top: 48px;
                        .select_product_right_discriptions {
                            width: 300px;
                            .select_product_right_discription_title {
                                font-size: 14px;
                                margin-bottom: 14px;
                            }
                            .select_product_right_discription {
                                font-size: 12px;
                            }
                        }
                    }
                }
            }
        }
    }
</style>
