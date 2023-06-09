/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
var moment = require("moment"); // require

import Vue from "vue";
import InfiniteLoading from 'vue-infinite-loading';
import store from './store'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';


Vue.use(InfiniteLoading, { /* options */ });
Vue.use(VueSweetalert2);


// filtro moment
Vue.filter("moment", function (date) {
    return moment(date)
        .locale("es")
        .fromNow();
});
Vue.filter("format_moment", function (date) {
    return moment(date).format("L");
});
Vue.filter("capitalize", function (value) {
    if (!value) return "";
    value = value.toString();
    return value.charAt(0).toUpperCase() + value.slice(1);
});
Vue.filter("formatDate", function (value) {
    if (value) {
        return moment(String(value)).format('DD/MM/YYYY')
    }
});

Vue.filter("formatCuil", function (value) {
    value = value.toString();

    if (value.length === 10) {
        value = '0' + value;
    }

    return value.charAt(0) + value.charAt(1) + '-' + value.slice(2, -1) + '-' + value.slice(-1);
});




/**-----------------------------Panel Guest-------------------------------- */
Vue.component('panel-guest', require('./components/guest/PanelGuest.vue').default);


/**-----------------------------Panel Admin-------------------------------- */
Vue.component('table-codigos', require('./components/admin/tipocodigo/TableCodigo.vue').default);
Vue.component('table-files', require('./components/admin/file/TableFile.vue').default);
Vue.component('table-ddjj', require('./components/admin/declaracionjurada/TableDeclaracionjurada.vue').default);
Vue.component('table-organismos', require('./components/admin/organismo/TableOrganismo.vue').default);
Vue.component('table-jurisdicciones', require('./components/admin/jurisdiccion/TableJurisdiccion.vue').default);
Vue.component('table-liquidaciones', require('./components/admin/liquidacion/TableLiquidacion.vue').default);
Vue.component('table-origenes', require('./components/admin/origen/TableOrigen.vue').default);
Vue.component('table-users', require('./components/admin/user/TableUser.vue').default);
Vue.component('table-periodos', require('./components/admin/periodo/TablePeriodo.vue').default);
Vue.component('table-computos', require('./components/admin/computo/TableComputo.vue').default);
Vue.component('table-categorias', require('./components/admin/categoria/TableCategoria.vue').default);
Vue.component('table-config', require('./components/admin/configuracion/TableConfig.vue').default);

Vue.component('audit-config', require('./components/admin/configuracion/AuditConfig.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
    store,
    el: '#app',
});
