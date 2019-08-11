import Vue from 'vue';
import VueRouter from 'vue-router';
import ExampleComponent from './components/ExampleComponent';

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/', component: ExampleComponent }
    ],
    // turns off the weird # that it adds, to be compatible with old browsers
    mode: 'history',
});