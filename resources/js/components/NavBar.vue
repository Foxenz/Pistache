<template>
    <nav class="flex items-center justify-between p-4">
        <div class="flex items-center">
            <a href="/"
                ><img
                    src="../../../public/assets/images/logo_pistache.png"
                    alt="Logo"
                    class="h-12 mr-2"
            /></a>
        </div>
        <div class="flex items-center space-x-4">
            <router-link class="hover:text-gray-300" to="/menu"
                >Menu</router-link
            >
            <router-link class="hover:text-gray-300" to="/about"
                >A propos</router-link
            >
            <router-link class="hover:text-gray-300" to="/contact"
                >Contact</router-link
            >
        </div>
    </nav>
</template>
