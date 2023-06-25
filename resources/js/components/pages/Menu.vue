<template>
    <NavBar />

    <!-- Boutons avec tous les categories -->
    <div class="flex justify-center">
        <select
            class="w-1/2 mt-4 mb-4 p-2 rounded-md border-2 border-gray-300"
            v-model="categorieId"
            @change="fetchMenusByCategorieId"
        >
            <option value="0">Tous les menus</option>
            <option
                v-for="categorie in AllCategories"
                :key="categorie.id"
                :value="categorie.id"
            >
                {{ categorie.name }}
            </option>
        </select>
    </div>

    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <MenuCard
            v-for="menu in menus"
            :key="menu.id"
            :id="menu.id"
            :name="menu.name"
            :status="menu.status"
            :date="menu.date"
            :categorie_id="menu.categorie_id"
            :url_image="menu.url_image"
        />
    </section>

    <!-- Si aucun menu afficher un message au centre de la page -->
    <div v-if="menus.length === 0" class="flex justify-center">
        <p class="text-2xl">Aucun menu disponible</p>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

// Import des composants
import NavBar from "../NavBar.vue";
import MenuCard from "../MenuCard.vue";

// Déclaration des variables
const menus = ref([]);
const AllCategories = ref([]);
const categorieId = ref(0);

// Fonction pour récupérer les repas de la base de donnée
const fetchMenus = async () => {
    const response = await axios.get("/api/menus/getAllMenus");
    menus.value = response.data;
};

// Fonction pour récupérer les catégories la base de donnée
const fetchCategories = async () => {
    const response = await axios.get("/api/categories/getAllCategories");
    AllCategories.value = response.data;
};

// Fonction pour récupérer les catégories des repas de la base de donnée
const fetchMenusByCategorieId = async () => {
    if (categorieId.value == 0) {
        fetchMenus();
    } else {
        const response = await axios.get(
            "/api/menus/getMenusByCategorieId/" + categorieId.value
        );
        menus.value = response.data;
    }
};

// Appel de la fonction fetchMenus lors du montage du composant
onMounted(fetchMenus);

// Appel de la fonction fetchCategories lors du montage du composant
onMounted(fetchCategories);
</script>
