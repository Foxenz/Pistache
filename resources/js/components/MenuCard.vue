<template>
    <div>
        <p>ID :</p>
        <p>{{ id }}</p>
        <p>Nom :</p>
        <p>{{ name }}</p>
        <p>Status :</p>
        <p>{{ status }}</p>
        <p>Créé le :</p>
        <p>{{ date }}</p>
        <p>Image :</p>
        <img :src="url_image" :alt="name" />
        <p>Prix :</p>
        <p>{{ price }}</p>
    </div>

    <br />
</template>

<script setup>
import { defineProps } from "vue";
const props = defineProps({
    id: {
        type: Number,
        required: true,
    },
    name: {
        type: String,
        required: true,
    },
    status: {
        type: String,
        required: true,
    },
    date: {
        type: String,
        required: true,
    },
    url_image: {
        type: String,
        required: true,
    },
    price: {
        type: Number,
        required: true,
    },
});
</script>
