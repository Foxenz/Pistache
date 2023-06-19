<template>
    <form class="max-w-md mx-auto mt-4 p-4 bg-white shadow-md rounded-lg">
        <div>
            <label for="email" class="block text-gray-700 font-semibold"
                >Email</label
            >
            <input
                type="email"
                id="email"
                name="email"
                class="mt-1 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring focus:border-blue-300"
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
    </form>
</template>
