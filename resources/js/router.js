import Vue from "vue";
import VueRouter from "vue-router";
import DialogMainComponent from "./components/dialog/DialogMainComponent"
import AboutMe from "./components/me/AboutMe.vue"


Vue.use(VueRouter);

export default new VueRouter({
    mode: "history", 
    routes: [
        {
            path: "/me",
            component: AboutMe
            
        },
        {
            path: "/dialog",
            component: DialogMainComponent
        }
    ]
});
