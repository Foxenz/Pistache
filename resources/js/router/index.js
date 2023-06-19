import { createRouter, createWebHistory } from "vue-router";

import Home from "../components/pages/Home.vue";
import Menu from "../components/pages/Menu.vue";
import About from "../components/pages/About.vue";
import Contact from "../components/pages/Contact.vue";
import Login from "../components/pages/Login.vue";
import Dashboard from "../components/pages/Dashboard.vue";

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
    },
    {
        path: "/login",
        name: "Login",
        component: Login,
    },
    {
        path: "/dashboard",
        name: "Dashboard",
        component: Dashboard,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
