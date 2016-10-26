
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import VueRouter from 'vue-router'
import Main from './Main.vue'
Vue.use(VueRouter)

const router = new VueRouter({
    base: __dirname,
    routes: [
        {
            path: '/',
            component: require('./components/Home.vue'),
            name: 'home'
        },
        {
            path: '/calc',
            components: {
                calc: require('./components/apps/App.vue') // resolve => require(['./components/apps/App.vue'], resolve)
            },
            name: 'calcApp'
        },
        {
            path: '*',
            component: {
                template:
                '<div>' +
                '<h1>Not Found</h1>' +
                '</div>'
            }
        }
    ]
})

const app = new Vue({
    el: '#app',
    router,
    render: h => h(Main)
});
