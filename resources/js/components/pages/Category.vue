<template>
    <NabBarAdmin />

    <!-- Section pour créer une catégorie, il suffit juste d'insérer un nom et cliquer sur le bouton d'ajout -->
    <section class="flex flex-col justify-center items-center">
        <div class="flex flex-col justify-center items-center">
            <h1 class="text-3xl font-bold mb-4">Créer une catégorie</h1>
            <div class="flex flex-col justify-center items-center">
                <input
                    type="text"
                    class="border border-gray-400 rounded-md p-2 w-80"
                    placeholder="Nom de la catégorie"
                    v-model="categoryName"
                />
                <button
                    @click="showConfirmation('create', categoryName)"
                    :disabled="categoryName === ''"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4"
                >
                    Ajouter
                </button>
            </div>
        </div>
    </section>

    <!-- Pour chaque catégorie, afficher un cadre avec le nom de la categorie, avec un bouton d'edit et de suppression -->
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <div
            v-for="category in categories"
            :key="category.id"
            class="flex flex-col justify-between p-4 bg-white rounded-lg shadow-lg"
        >
            <div>
                <p class="text-2xl font-bold">{{ category.name }}</p>
            </div>
            <div class="flex justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                >
                    Modifier
                </button>

                <button
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                    @click="showConfirmation('delete', category.id)"
                >
                    Supprimer
                </button>
            </div>
        </div>
    </section>

    <!-- Dialogue de confirmation -->
    <div
        v-if="showDialog"
        class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-75"
    >
        <div class="bg-white p-6 rounded shadow-lg">
            <h2 class="text-lg font-semibold mb-4">Confirmation</h2>
            <p>
                Êtes-vous sûr de vouloir {{ confirmationAction }} la catégorie ?
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
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

import NabBarAdmin from "../NavBarAdmin.vue";

const categories = ref([]);
const showDialog = ref(false);
const confirmationAction = ref("");
const categoryName = ref("");
let categoryId = null;

// Fonction pour récupérer les catégories la base de donnée
const fetchCategories = async () => {
    const response = await axios.get("/api/categories/getAllCategories");
    categories.value = response.data;
};

// Fonction pour afficher la fenêtre de confirmation
const showConfirmation = (action, id) => {
    if (action === "delete") {
        confirmationAction.value = "supprimer";
        categoryId = id;
    } else if (action === "create") {
        confirmationAction.value = "ajouter";
    }
    showDialog.value = true;
};

// Fonction pour annuler la confirmation
const cancelConfirmation = () => {
    showDialog.value = false;
};

// Fonction pour confirmer l'action
const confirmAction = () => {
    showDialog.value = false;
    if (confirmationAction.value === "supprimer") {
        deleteCategory(categoryId);
    } else if (confirmationAction.value === "ajouter") {
        createCategory(categoryName);
    }
};

// Fonction pour supprimer une catégorie
const deleteCategory = async (id) => {
    await axios.delete("/api/categories/deleteCategory/" + id);
    fetchCategories();
};

// Fonction pour créer une catégorie
const createCategory = async (categoryName) => {
    await axios
        .post("/api/categories/createCategory/" + categoryName.value)
        .then((response) => {
            categoryName.value = "";
            fetchCategories();
        });
};

// Appel de la fonction fetchCategories lors du montage du composant
onMounted(fetchCategories);
</script>
