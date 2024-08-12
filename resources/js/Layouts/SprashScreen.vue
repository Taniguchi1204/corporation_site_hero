<script setup>
import { Head, Link } from '@inertiajs/vue3';

</script>

<template>
    <div class="sprash_screen">
        <img src="/images/herologo.png" class="sprash_screen_img">
    </div>
</template>

<style lang="scss" scope>
    .sprash_screen {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-image: url("/images/load.jpg");
        background-repeat: no-repeat;
        background-size:cover; 
        background-size:100%; 
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;
        .sprash_screen_img {
            width: 500px;
            height: 500px;
            position: absolute;
            -webkit-animation: fadein 5s;
            animation: fadein 5s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
            -webkit-animation: slidein 5s;
            animation: slidein 5s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }
    }

    @-webkit-keyframes fadein {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
        }

        @keyframes fadein {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

    @-webkit-keyframes slidein {
        0% {
            opacity: 0;
            -webkit-transform: translateX(-40px);
                    transform: translateX(-40px);
        }
        100% {
            opacity: 1;
            -webkit-transform: translateX(0px);
                    transform: translateX(0px);
        }
    }

    @keyframes slidein {
        0% {
            opacity: 0;
            -webkit-transform: translateY(40px);
                    transform: translateY(40px);
        }
        100% {
            opacity: 1;
            -webkit-transform: translateY(0px);
                    transform: translateY(0px);
        }
    }
    @media screen and (max-width: 1650px) { 
        .sprash_screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-image: url("/images/load.jpg");
            background-repeat: no-repeat;
            background-size:cover; 
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            .sprash_screen_img {
                width: 260px;
                height: 260px;
                position: absolute;
                -webkit-animation: fadein 5s;
                animation: fadein 5s;
                -webkit-animation-fill-mode: both;
                animation-fill-mode: both;
                -webkit-animation: slidein 5s;
                animation: slidein 5s;
                -webkit-animation-fill-mode: both;
                animation-fill-mode: both;
            }
        }

        @-webkit-keyframes fadein {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
            }

            @keyframes fadein {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @-webkit-keyframes slidein {
            0% {
                opacity: 0;
                -webkit-transform: translateX(-40px);
                        transform: translateX(-40px);
            }
            100% {
                opacity: 1;
                -webkit-transform: translateX(0px);
                        transform: translateX(0px);
            }
        }

        @keyframes slidein {
            0% {
                opacity: 0;
                -webkit-transform: translateY(40px);
                        transform: translateY(40px);
            }
            100% {
                opacity: 1;
                -webkit-transform: translateY(0px);
                        transform: translateY(0px);
            }
        }
    }
    @media screen and (max-width: 1024px) { 
        .sprash_screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-image: url("/images/load.jpg");
            background-repeat: no-repeat;
            background-size:cover; 
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            .sprash_screen_img {
                width: 180px;
                height: 180px;
                position: absolute;
                -webkit-animation: fadein 5s;
                animation: fadein 5s;
                -webkit-animation-fill-mode: both;
                animation-fill-mode: both;
                -webkit-animation: slidein 5s;
                animation: slidein 5s;
                -webkit-animation-fill-mode: both;
                animation-fill-mode: both;
            }
        }

        @-webkit-keyframes fadein {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
            }

            @keyframes fadein {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @-webkit-keyframes slidein {
            0% {
                opacity: 0;
                -webkit-transform: translateX(-40px);
                        transform: translateX(-40px);
            }
            100% {
                opacity: 1;
                -webkit-transform: translateX(0px);
                        transform: translateX(0px);
            }
        }

        @keyframes slidein {
            0% {
                opacity: 0;
                -webkit-transform: translateY(40px);
                        transform: translateY(40px);
            }
            100% {
                opacity: 1;
                -webkit-transform: translateY(0px);
                        transform: translateY(0px);
            }
        }
    }
    @media screen and (max-width: 780px) { 
        .sprash_screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-image: url("/images/load.jpg");
            background-repeat: no-repeat;
            background-size:cover; 
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            .sprash_screen_img {
                width: 180px;
                height: 180px;
                position: absolute;
                -webkit-animation: fadein 5s;
                animation: fadein 5s;
                -webkit-animation-fill-mode: both;
                animation-fill-mode: both;
                -webkit-animation: slidein 5s;
                animation: slidein 5s;
                -webkit-animation-fill-mode: both;
                animation-fill-mode: both;
            }
        }

        @-webkit-keyframes fadein {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
            }

            @keyframes fadein {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @-webkit-keyframes slidein {
            0% {
                opacity: 0;
                -webkit-transform: translateX(-40px);
                        transform: translateX(-40px);
            }
            100% {
                opacity: 1;
                -webkit-transform: translateX(0px);
                        transform: translateX(0px);
            }
        }

        @keyframes slidein {
            0% {
                opacity: 0;
                -webkit-transform: translateY(40px);
                        transform: translateY(40px);
            }
            100% {
                opacity: 1;
                -webkit-transform: translateY(0px);
                        transform: translateY(0px);
            }
        }
    }
</style>
