<template>
    <footer class="bg-gray-900 text-white">
        <div class="container mx-auto py-4 px-8">
            <div class="flex flex-wrap justify-between items-center">
                <!-- Icone réseaux sociaux -->
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-gray-300 hover:text-white">
                        <i style="color: #E0B548;" class="bx bxl-facebook-circle text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white text-xl">
                        <i  
                        style="color: #E0B548;" class="bx bxl-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white text-xl">
                        <i style="color: #E0B548;" class="bx bxl-instagram"></i>
                    </a>
                </div>

                <!-- Copyright -->
                <p style="color: #E0B548;" class="text-sm">
                    &copy; 2023 Alexandre Roosens. All rights reserved.
                </p>

                <!-- Administration -->
                <router-link
                    to="/menu-admin"
                    class="colorButton btn-admin text-gray-900 font-semibold py-2 px-4 rounded-md"
                >
                    Administration
                </router-link>
            </div>
        </div>
    </footer>
</template>

<script setup></script>
