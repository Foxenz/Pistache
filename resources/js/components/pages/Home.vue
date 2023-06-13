<template>
    <NavBar />
    <!-- Hero Banner -->
    <section class="hero">
        <h1>Pistache</h1>
        <a class="button" href="Menu">Voir notre menu</a>
    </section>

    <!-- About -->
    <section class="about">
        <h2 class="subtitle">Qui somme nous ?</h2>
        <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate odit vel architecto dolor ratione, molestias et veritatis, neque expedita dicta soluta doloremque quaerat eius eaque sed aut, placeat atque? Aliquid!
            Nemo molestias voluptatibus quam deleniti dolores aperiam a veniam ex harum alias aliquam sed accusantium, doloremque totam. Ex repellendus eos dolores rem aspernatur autem quidem, ipsam nesciunt dolorum blanditiis explicabo!
            Possimus ab, dicta quam quis, debitis maiores numquam praesentium rerum fuga eaque quaerat excepturi in facere neque, nisi mollitia? Fuga pariatur obcaecati necessitatibus sint qui neque amet repellat sequi sit.
            Ipsam placeat voluptates obcaecati quibusdam facilis voluptatibus dolore earum odio repellendus veniam dolor quaerat deserunt sit illo molestiae architecto quas non quis esse delectus, a odit? Exercitationem veniam nisi quaerat!
            Magnam nobis optio architecto voluptas minima possimus ex aspernatur necessitatibus veritatis explicabo quo, suscipit iure sit! Aut accusamus incidunt rem. Debitis minus blanditiis, ab mollitia aspernatur sed neque amet laboriosam!
        </p>
    </section>

    <!-- Pictures of dish -->
    <sections class="pictures">
        <h2 class="subtitle">Nos plats</h2>
        <div class="gallery">
            <img src="https://picsum.photos/300/300" alt="Plat 1">
            <img src="https://picsum.photos/300/300" alt="Plat 1">
            <img src="https://picsum.photos/300/300" alt="Plat 1">
            <img src="https://picsum.photos/300/300" alt="Plat 1">
        </div>  
    </sections>

    <!-- Contact -->
    <section class="contact">
        <h2 class="subtitle">Contacez nous</h2>
        <form>
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" id="name" placeholder="Votre nom">
            </div>
            <div class="form-group">
                <label for="email">Adresse email</label>
                <input type="email" class="form-control" id="email" placeholder="Votre adresse email">
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </section>
</template>

<script setup>
    // Import des composants
    import NavBar from "../NavBar.vue";
</script>

<style scoped>
    /* General */
    .subtitle {
        font-size: 2rem;
        text-align: center;
    }

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

    /* About */
    .about{
        padding: 2rem;
    }

    .about p{
        font-size: 1.2rem;
        text-align: justify;
    }

    /* Pictures */
    .pictures {
        padding: 2rem;
    }

    .gallery {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .gallery img {
        width: 300px;
        height: 300px;
        margin-bottom: 2rem;
    }

    /* Contact */
    .contact {
        padding: 2rem;
    }

    .contact form {
        width: 50%;
        margin: 0 auto;
    }

    .contact form .form-group {
        margin-bottom: 1rem;
    }

    .contact form label {
        display: block;
        margin-bottom: 0.5rem;
    }

    .contact form input, .contact form textarea {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .contact form button {
        display: block;
        width: 100%;
        padding: 0.5rem;
        background-color: #f5a623;
        color: white;
        border: none;
        border-radius: 5px;
    }
</style>