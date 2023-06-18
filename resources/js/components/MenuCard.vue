<template>
    <div class="test w-full max-w-xs mx-auto p-4">
        <div class="bg-white rounded-lg shadow-md overflow-hidden card">
            <img
                :src="url_image"
                :alt="name"
                class="w-full h-40 object-cover"
            />
            <div class="p-4">
                <h3 class="text-xl font-semibold mb-2">{{ name }}</h3>
                <p class="text-gray-700 mb-2">{{ price }} €</p>

                <p v-if="categorie_id == 1" class="text-gray-500">Entrée</p>
                <p v-if="categorie_id == 2" class="text-gray-500">Plat</p>
                <p v-if="categorie_id == 3" class="text-gray-500">Dessert</p>
            </div>
        </div>
    </div>
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
    categorie_id: {
        type: Number,
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

<style scoped>
.card {
    transition: transform 0.2s;
}
.card:hover {
    transform: scale(1.05);
}
</style>
