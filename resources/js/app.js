

require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('registrar-asignatura', require('./components/asignatura/CreateComponent.vue').default);


const app = new Vue({
    el: '#app',
});
