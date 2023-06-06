import { createRouter, createWebHistory } from "vue-router";

import Home from "../components/pages/Home.vue";
import Menu from "../components/pages/Menu.vue";
import About from "../components/pages/About.vue";
import Contact from "../components/pages/Contact.vue";

const routes = [
    {
        path: "/",
        name: "Home",
        component: Home,
    },
    {
        path: "/menu",
        name: "Menu",
        component: Menu,
    },
    {
        path: "/about",
        name: "About",
        component: About,
    },
    {
        path: "/contact",
        name: "Contact",
        component: Contact,
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;