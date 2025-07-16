<script setup>
defineProps({
    title: String,
    user: Object,
});
</script>

<template>
    <header>
        <h1>{{ title }}</h1>
        <div v-if="user">Hoşgeldin, {{ user.name }}!</div>
    </header>
</template>
