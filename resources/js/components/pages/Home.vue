<template>
    <NavBar />
    <div class="hero">
        <h1>Pistache</h1>
        <a class="button" href="Menu">Voir notre menu</a>
    </div>

</template>

<script setup>
    // Import des composants
    import NavBar from "../NavBar.vue";
</script>

<style scoped>
    /* HERO */
    .hero{
        position: relative;
        background-image: url("https://picsum.photos/1200/300");
        background-position: center;
        background-size: cover;
        background-attachment: fixed;
        height: 500px;
    }

    .hero h1{
        font-size: 4rem;
        color: white;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .hero .button{
        position: absolute;
        top: 65%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: block;
        width: 200px;
        margin: 0 auto;
        padding: 1rem;
        background-color: #f5a623;
        color: white;
        text-decoration: none;
        text-align: center;
        border-radius: 5px;
    }
</style>