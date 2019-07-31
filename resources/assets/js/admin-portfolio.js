Vue.component("itemslist", require('./components/admin-portfolio/ItemsList.vue'));
Vue.component("edititemmain", require('./components/admin-portfolio/EditItemMain'));
Vue.component("edititemgeneral", require('./components/admin-portfolio/EditItemGeneral.vue'));
Vue.component("edititemlang", require('./components/admin-portfolio/EditItemLang'));
Vue.component("edititemdashboard", require('./components/admin-portfolio/EditItemDashboard'));

// alert("Hey!!!");
const app = new Vue({
    el: "#admin_portfolio"
});

