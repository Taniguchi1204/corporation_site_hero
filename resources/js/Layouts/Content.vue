<script setup>
defineProps({
    title: String,
    center: Boolean
});
</script>

<template>
    <div class="content">
        <h1 :class="{ 'title': !center, 'title_center': center }">{{ title }}</h1>
        <slot></slot>
    </div>
</template>

<style lang="scss" scope>
    .content {
        border-top: 2px solid black;
        width: 1600px;
        padding: 65px 124px 107px 124px;
        margin: 0 auto;
        position: relative;
        .title {
            font-weight: bold;
            font-size: 50px;
            margin-bottom: 60px;
        }

        .title_center {
            font-weight: bold;
            font-size: 50px;
            margin-bottom: 60px;
            text-align: center;
        }
    }
    @media screen and (max-width: 1650px) { 
        .content {
            border-top: 2px solid black;
            width: 946px;
            padding: 26px 61px 63px 61px;
            margin: 0 auto;
            position: relative;
            .title {
                font-weight: bold;
                font-size: 48px;
                margin-bottom: 24px;
            }

            .title_center {
                font-weight: bold;
                font-size: 48px;
                margin-bottom: 24px;
                text-align: center;
            }
        }
    }
    @media screen and (max-width: 1024px) { 
        .content {
            border-top: 2px solid black;
            width: 700px;
            padding: 40px 65px 50px 65px;
            margin: 0 auto;
            position: relative;
            .title {
                font-weight: bold;
                font-size: 40px;
                margin-bottom: 20px;
            }

            .title_center {
                font-weight: bold;
                font-size: 40px;
                margin-bottom: 30px;
                text-align: center;
            }
        }
    }
    @media screen and (max-width: 780px) { 
        .content {
            border-top: 2px solid black;
            width: 370px;
            padding: 25px 10px;
            margin: 0 auto;
            position: relative;
            .title {
                font-weight: bold;
                font-size: 32px;
                margin-bottom: 15px;
            }

            .title_center {
                font-weight: bold;
                font-size: 32px;
                margin-bottom: 15px;
                text-align: center;
            }
        }
    }
</style>