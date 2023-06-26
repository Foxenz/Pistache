<template>
    <NavBarAdmin />

    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <MenuCard
            v-for="menu in menus"
            :key="menu.id"
            :id="menu.id"
            :name="menu.name"
            :description="menu.description"
            :status="menu.status"
            :date="menu.date"
            :categorie_id="menu.categorie_id"
            :url_image="menu.url_image"
            :price="menu.price"
        >
        </MenuCard>
    </section>

    <!-- Si aucun menu afficher un message au centre de la page -->
    <div v-if="menus.length === 0" class="flex justify-center">
        <p class="text-2xl">Plus aucun menu à afficher</p>
    </div>

    <!-- Bouton pour ajouter un menu -->
    <div class="flex justify-center">
        <router-link to="/create-menu/">
            <button
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
            >
                Ajouter un menu
            </button>
        </router-link>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

// Import des composants
import NavBarAdmin from "../NavBarAdmin.vue";
import MenuCard from "../MenuCard.vue";

// Déclaration des variables
const menus = ref([]);

// Fonction pour récupérer les repas de la base de donnée
const fetchMenus = async () => {
    const response = await axios.get("/api/menus/getAllMenusForAdmin");
    menus.value = response.data;
};

// Appel de la fonction fetchMenus lors du montage du composant
onMounted(fetchMenus);
</script>
