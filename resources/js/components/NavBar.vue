<template>
    <nav class="flex items-center justify-between p-4">
        <div class="flex items-center">
            <a href="/"
                ><img
                    src="../../../public/assets/images/logo_pistache.png"
                    alt="Logo"
                    class="h-8 mr-2"
            /></a>
        </div>
        <div class="flex items-center space-x-4">
            <router-link class="hover:text-gray-300" to="Menu"
                >Menu</router-link
            >
            <router-link class="hover:text-gray-300" to="About"
                >A propos</router-link
            >
            <router-link class="hover:text-gray-300" to="Contact"
                >Contact</router-link
            >
        </div>
    </nav>
</template>
