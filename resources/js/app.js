

require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('asignatura', require('./components/asignatura/AsignaturaComponent.vue').default);


const app = new Vue({
    el: '#app',
});
