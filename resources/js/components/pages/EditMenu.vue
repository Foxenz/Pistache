<template>
    <NavBarAdmin />

    <!-- Formulaire pour créer un menu, l'utilisateur doit rentrer le nom du menu, sa description, son status entre "archived" et "published", ses catégories et l'upload d'une image  -->
    <form
        class="flex flex-col items-center justify-center"
        @submit.prevent="createMenu"
    >
        <h1 class="text-2xl font-semibold mb-4">Créer un menu</h1>
        <div class="flex flex-col mb-4">
            <label for="menu_image" class="mb-2"> Image du menu </label>
            <input
                type="file"
                id="menu_image"
                name="menu_image"
                @change="handleImageUpload"
                class="border border-gray-400 p-2 rounded-md"
            />
        </div>
        <div class="flex flex-col mb-4">
            <label for="name" class="mb-2"> Nom du menu </label>
            <input
                type="text"
                id="name"
                name="name"
                v-model="name"
                class="border border-gray-400 p-2 rounded-md"
            />
        </div>
        <div class="flex flex-col mb-4">
            <label for="description" class="mb-2"> Description du menu </label>
            <textarea
                id="description"
                name="description"
                v-model="description"
                class="border border-gray-400 p-2 rounded-md"
            ></textarea>
        </div>
        <div class="flex flex-col mb-4">
            <label for="categorie_id" class="mb-2"> Catégorie du menu </label>
            <div
                v-for="category in allCategories"
                :key="category.id"
                class="mb-2 flex items-center"
            >
                <input
                    type="checkbox"
                    :id="category.name"
                    :value="category"
                    class="mr-2"
                    v-model="categories"
                />
                <label :for="category.name" class="text-gray-700">
                    {{ category.name }}
                </label>
            </div>
        </div>
        <div class="flex mb-4 mt-4 mx-2 space-x-4">
            <button
                type="submit"
                class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 focus:outline-none"
            >
                Sauvegarder
            </button>
            <button
                type="submit"
                class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 focus:outline-none"
            >
                Publier
            </button>
        </div>
    </form>

    <div class="w-full max-w-xs mx-auto p-4">
        <div class="bg-white rounded-lg shadow-md overflow-hidden card">
            <img :src="menu_image" class="w-full h-40 object-cover" />
            <div class="p-4">
                <h3 class="text-xl font-semibold mb-2">{{ name }}</h3>
                <p class="text-gray-500 text-sm mb-2">{{ description }}</p>
                <span
                    v-for="category in categories"
                    :key="category.id"
                    class="bg-gray-200 rounded-full text-xs font-semibold text-gray-700 mr-2 mb-2 px-3 py-1"
                >
                    {{ category.name }}
                </span>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";

import axios from "axios";
import NavBarAdmin from "../NavBarAdmin.vue";
import router from "../../router";

const name = ref("");
const description = ref("");
const allCategories = ref([]);
const categories = ref([]);
const menu_image = ref("");

// Fonction pour récupérer les catégories la base de donnée
const fetchCategories = async () => {
    try {
        const response = await axios.get("/api/categories/getAllCategories");
        allCategories.value = response.data;
    } catch (error) {
        console.error(error);
    }
};

// Fonction pour récupérer l'image uploadée par l'utilisateur
const handleImageUpload = (event) => {
    const file = event.target.files[0];
    menu_image.value = URL.createObjectURL(file);
};

const createMenu = async () => {
    await axios
        .post("/api/menus/createMenu", {
            name: name.value,
            description: description.value,
            categories: categories.value,
        })
        .then((response) => {
            router.push("/menu-admin");
        });
};

// Appel de la fonction fetchCategories lors du montage du composant
fetchCategories();
</script>
