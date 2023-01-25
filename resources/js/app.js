/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//Chiamo Vue
window.Vue = require('vue');

//Importa ciò che trova con il nome App in views
import App from './views/App';

//Inizializziamo istanza Vue
const app = new Vue({
    el: '#root',
    render: h => h(App),

});
