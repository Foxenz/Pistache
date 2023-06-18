<template>
    <NavBar />

    <section>
        <div class="container">
            <h1>Contact</h1>

            <div class="row">
                <div class="col-md-6">
                    <h3>Adresse</h3>
                    <p>Pistache</p>
                    <p>32 Rue du Perron</p>
                    <p>Liège, 4000</p>
                </div>

                <div class="col-md-6">
                    <h3>Numéro de téléphone</h3>
                    <p>+1 234 567 890</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h3>Localisation</h3>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2531.6184107439185!2d5.551340977381901!3d50.61562777162427!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c0f9ecbc0e12d7%3A0x27ac5cd43321c12!2sRue%20du%20Perron%2032%2C%204000%20Li%C3%A8ge!5e0!3m2!1sfr!2sbe!4v1686680119813!5m2!1sfr!2sbe"
                        width="100%"
                        height="450"
                        style="border: 0"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                    ></iframe>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
// Import des composants
import NavBar from "../NavBar.vue";
</script>

<style scoped></style>
