Vue.component("postslist", require('./components/admin-blog/PostsList.vue').default);
Vue.component("editpostmain", require('./components/admin-blog/EditPostMain.vue').default);
Vue.component("editpostgeneral", require('./components/admin-blog/EditPostGeneral.vue').default);
Vue.component("editpostlang", require('./components/admin-blog/EditPostLang').default);
Vue.component("editpostdashboard", require('./components/admin-blog/EditPostDashboard').default);

// alert("Hey!!!");
const app = new Vue({
    el: "#admin_blog"
});

