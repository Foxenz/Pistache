<template>
    <div class="w-full max-w-xs mx-auto p-4">
        <div class="bg-white rounded-lg shadow-md overflow-hidden card">
            <img
                :src="url_image"
                :alt="name"
                class="w-full h-40 object-cover"
            />
            <div class="p-4">
                <h3 class="text-xl font-semibold mb-2">{{ name }}</h3>
                <p class="text-gray-500 text-sm mb-2">{{ description }}</p>
                <p v-if="isMenuAdmin" class="text-gray-500">
                    {{ statusButton == "published" ? "Publié" : "Archivé" }}
                </p>
                <p v-if="isMenuAdmin" class="text-gray-500">{{ localDate }}</p>

                <!-- Affichage des categories en appelant la fonction getCategoriesWithMenuId -->
                <div class="flex flex-wrap mt-2">
                    <span
                        v-for="categorie in categoriesOfMenu"
                        :key="categorie.id"
                        class="bg-gray-200 rounded-full text-xs font-semibold text-gray-700 mr-2 mb-2 px-3 py-1"
                    >
                        {{ categorie }}
                    </span>
                </div>
            </div>

            <!-- Boutons archiver, editer, supprimer seulement visible quand on est dans le menu admin -->
            <div v-if="isMenuAdmin" class="flex">
                <button
                    @click="showConfirmation('archive', id)"
                    v-show="statusButton == 'published'"
                    class="flex-1 bg-orange-500 text-white py-2 px-4 rounded-md hover:bg-orange-600 focus:outline-none"
                >
                    Archiver
                </button>
                <button
                    @click="showConfirmation('publish', id)"
                    v-show="statusButton == 'archived'"
                    class="flex-1 bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 focus:outline-none"
                >
                    Publier
                </button>

                <router-link
                    :to="{
                        name: 'EditMenu',
                        params: {
                            id: id,
                        },
                    }"
                >
                    <button
                        class="flex-1 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none"
                    >
                        Editer
                    </button>
                </router-link>
                <button
                    @click="showConfirmation('delete', id)"
                    class="flex-1 bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600 focus:outline-none"
                >
                    Supprimer
                </button>
            </div>
        </div>

        <!-- Dialogue de confirmation -->
        <div
            v-if="showDialog"
            class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-75"
        >
            <div class="bg-white p-6 rounded shadow-lg">
                <h2 class="text-lg font-semibold mb-4">Confirmation</h2>
                <p>
                    Êtes-vous sûr de vouloir {{ confirmationAction }} le menu ?
                </p>
                <div class="mt-4 flex justify-end">
                    <button
                        @click="cancelConfirmation"
                        class="bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600 focus:outline-none"
                    >
                        Annuler
                    </button>
                    <button
                        @click="confirmAction"
                        class="ml-2 bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 focus:outline-none"
                    >
                        Confirmer
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps, ref } from "vue";
import router from "../router";
import axios from "axios";

const props = defineProps({
    id: {
        type: Number,
        required: true,
    },
    name: {
        type: String,
        required: true,
    },
    description: {
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
});
const isMenuAdmin = ref(
    router.currentRoute.value.fullPath.includes("menu-admin") ? true : false
);
const statusButton = ref(props.status);
const showDialog = ref(false);
const confirmationAction = ref("");
const categoriesOfMenu = ref([]);
const localDate = ref(
    new Date(props.date).toLocaleDateString("fr-FR", {
        year: "numeric",
        month: "long",
        day: "numeric",
    })
);
let menuId;

// Fonction pour afficher la fenêtre de confirmation
const showConfirmation = (action, id) => {
    if (action === "archive") {
        confirmationAction.value = "archiver";
        menuId = id;
    } else if (action === "publish") {
        confirmationAction.value = "publier";
        menuId = id;
    } else if (action === "delete") {
        confirmationAction.value = "supprimer";
        menuId = id;
    }
    showDialog.value = true;
};

// Fonction pour annuler la confirmation
const cancelConfirmation = () => {
    showDialog.value = false;
};

// Fonction pour récupérer les catégories des repas de la base de donnée par menu
const getCategoriesWithMenuId = async (menuId) => {
    const response = await axios.get(
        "/api/categories/getCategoriesWithMenuId/" + menuId
    );
    categoriesOfMenu.value = response.data;
};

// Fonction pour confirmer l'action
const confirmAction = () => {
    showDialog.value = false;
    if (confirmationAction.value === "archiver") {
        archiveMenu(menuId);
    } else if (confirmationAction.value === "publier") {
        publishMenu(menuId);
    } else if (confirmationAction.value === "supprimer") {
        deleteMenu(menuId);
    }
};

// Fonctions pour publier un menu
const publishMenu = (id) => {
    axios
        .put("/api/menus/publishMenu/" + id)
        .then((response) => {
            statusButton.value = "published";
        })
        .catch((error) => {
            console.log(error);
        });
};

// Fonctions pour archiver un menu
const archiveMenu = (id) => {
    axios
        .put("/api/menus/archiveMenu/" + id)
        .then((response) => {
            statusButton.value = "archived";
        })
        .catch((error) => {
            console.log(error);
        });
};

// Fonction pour supprimer un menu
const deleteMenu = (id) => {
    axios
        .delete("/api/menus/deleteMenu/" + id)
        .then((response) => {
            router.go();
        })
        .catch((error) => {
            console.log(error);
        });
};

getCategoriesWithMenuId(props.id);
</script>

<style scoped>
.card {
    transition: transform 0.2s;
}
.card:hover {
    transform: scale(1.05);
}
</style>
