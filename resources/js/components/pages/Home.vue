<template>
    <NavBar />

    <!-- Section Banner / Hero -->
    <section
        class="hero bg-center bg-cover h-screen flex items-center justify-center"
        style="background-image: url('assets/images/banner.jpeg')"
    >
        <div
            class="hero-content text-white text-center flex flex-col items-center"
        >
            <h1 class="text-5xl mb-8">Pistache</h1>
            <router-link to="/menu">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                >
                    Voir le menu
                </button>
            </router-link>
        </div>
    </section>

    <!-- About -->
    <section class="about bg-gray-100 py-8">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold mb-4">Qui sommes-nous ?</h2>
            <p class="text-gray-700">
                Bienvenue chez Pistache, un lieu enchanté où la gastronomie
                rencontre l'élégance. Niché au cœur de la ville, notre
                restaurant vous invite à un voyage culinaire inoubliable, où les
                saveurs exquises et les présentations artistiques se marient
                harmonieusement. Chez Pistache, chaque plat est un chef-d'œuvre
                créé avec passion par notre talentueuse équipe de chefs.
                Inspirés par les ingrédients frais et de saison, ils repoussent
                les limites de la créativité culinaire pour vous offrir des
                combinaisons audacieuses et des textures étonnantes. Que vous
                soyez un amateur de viande tendre, un adepte des fruits de mer
                délicats ou un passionné de plats végétariens inventifs, notre
                menu varié saura satisfaire tous les palais. Lorsque vous
                franchirez les portes de Pistache, vous serez accueilli par une
                atmosphère chaleureuse et sophistiquée. Notre décor élégant et
                contemporain crée un cadre idéal pour vos dîners intimes, vos
                soirées entre amis ou vos repas d'affaires. Notre équipe
                attentionnée veillera à ce que chaque détail soit pris en
                compte, vous offrant un service impeccable et personnalisé.
            </p>
        </div>
    </section>

    <!-- Pictures of dishes -->
    <section class="pictures bg-white py-8">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold mb-4">Nos plats</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <img
                    src="assets/images/repas/repas1.avif"
                    alt="Plat 1"
                    class="w-full h-auto"
                />
                <img
                    src="assets/images/repas/repas2.avif"
                    alt="Plat 2"
                    class="w-full h-auto"
                />
                <img
                    src="assets/images/repas/repas3.avif"
                    alt="Plat 3"
                    class="w-full h-auto"
                />
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section class="contact bg-gray-100 py-8">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold mb-4">Contactez-nous</h2>
            <router-link to="/contact">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                >
                    Contact
                </button>
            </router-link>
        </div>
    </section>

    <Footer />
</template>

<script setup>
import NavBar from "../NavBar.vue";
import Footer from "../Footer.vue";
</script>

<style scoped></style>
