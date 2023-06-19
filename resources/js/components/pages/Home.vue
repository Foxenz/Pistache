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
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Voluptate odit vel architecto dolor ratione, molestias et
                veritatis, neque expedita dicta soluta doloremque quaerat eius
                eaque sed aut, placeat atque? Aliquid! Nemo molestias
                voluptatibus quam deleniti dolores aperiam a veniam ex harum
                alias aliquam sed accusantium, doloremque totam. Ex repellendus
                eos dolores rem aspernatur autem quidem, ipsam nesciunt dolorum
                blanditiis explicabo! Possimus ab, dicta quam quis, debitis
                maiores numquam praesentium rerum fuga eaque quaerat excepturi
                in facere neque, nisi mollitia? Fuga pariatur obcaecati
                necessitatibus sint qui neque amet repellat sequi sit. Ipsam
                placeat voluptates obcaecati quibusdam facilis voluptatibus
                dolore earum odio repellendus veniam dolor quaerat deserunt sit
                illo molestiae architecto quas non quis esse delectus, a odit?
                Exercitationem veniam nisi quaerat! Magnam nobis optio
                architecto voluptas minima possimus ex aspernatur necessitatibus
                veritatis explicabo quo, suscipit iure sit! Aut accusamus
                incidunt rem. Debitis minus blanditiis, ab mollitia aspernatur
                sed neque amet laboriosam!
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
