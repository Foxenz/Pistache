<template>
    <NavBar />

    <section class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Contact</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h3 class="text-lg font-semibold mb-2">Adresse</h3>
                <p class="mb-2">Pistache</p>
                <p class="mb-2">32 Rue du Perron</p>
                <p>Liège, 4000</p>
            </div>

            <div>
                <h3 class="text-lg font-semibold mb-2">Numéro de téléphone</h3>
                <p>+1 234 567 890</p>
            </div>
        </div>

        <h3 class="text-lg font-semibold mt-8">Localisation</h3>
        <div class="aspect-w-16 aspect-h-9 mt-4">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2531.6184107439185!2d5.551340977381901!3d50.61562777162427!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c0f9ecbc0e12d7%3A0x27ac5cd43321c12!2sRue%20du%20Perron%2032%2C%204000%20Li%C3%A8ge!5e0!3m2!1sfr!2sbe!4v1686680119813!5m2!1sfr!2sbe"
                class="w-full h-full"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
        </div>
    </section>
</template>

<script setup>
// Import des composants
import NavBar from "../NavBar.vue";
</script>
