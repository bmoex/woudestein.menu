<template>
    <FlashMessages/>
    <Navigation/>
    <main class="2xl:pl-72 h-full">
        <slot/>
    </main>
</template>

<script setup>
import FlashMessages from "../Partials/FlashMessages.vue";
import Navigation from "../Partials/Navigation.vue";
</script>
