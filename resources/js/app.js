import("./bootstrap");

import { createApp } from "vue";
import App from "./components/App.vue";
import router from "./router";

// 3. On monte l'application Vue sur l'élément #app
createApp(App).use(router).mount("#app");
