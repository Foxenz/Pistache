<template>
    <form
        @submit.prevent="login"
        class="max-w-md mx-auto mt-4 p-4 bg-white shadow-md rounded-lg"
    >
        <div>
            <label for="email" class="block text-gray-700 font-semibold"
                >Email</label
            >
            <input
                type="email"
                id="email"
                name="email"
                class="mt-1 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring focus:border-blue-300"
                v-model="username"
                required
            />
        </div>
        <div class="mt-4">
            <label for="password" class="block text-gray-700 font-semibold"
                >Mot de passe</label
            >
            <input
                type="password"
                id="password"
                name="password"
                class="mt-1 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring focus:border-blue-300"
                v-model="password"
                required
            />
        </div>
        <div class="mt-6">
            <button
                type="submit"
                class="bg-blue-500 text-white font-semibold px-4 py-2 rounded-md hover:bg-blue-600"
            >
                Se connecter
            </button>
        </div>

        <div class="mt-4" v-if="error">
            <p class="text-red-500">{{ error }}</p>
        </div>
    </form>
</template>

<script setup>
import { ref } from "vue";
import axios from "axios";
import router from "../../router";

const username = ref("");
const password = ref("");
let error = ref(null);

const login = async () => {
    await axios
        .post("/api/auth/login", {
            email: username.value,
            password: password.value,
        })
        .then((response) => {
            if (response.data.success) {
                sessionStorage.setItem("token", response.data.token);
                sessionStorage.setItem("id_user", response.data.user.id);
                router.push("/menu-admin");
            } else {
                error.value = response.data.message;
            }
        })
        .catch((error) => {
            console.log(error);
        });
};
</script>
