Vue.component("postslist", require('./components/admin-blog/PostsList.vue'));
Vue.component("editpostmain", require('./components/admin-blog/EditPostMain.vue'));
Vue.component("editpostgeneral", require('./components/admin-blog/EditPostGeneral.vue'));
Vue.component("editpostlang", require('./components/admin-blog/EditPostLang'));

// alert("Hey!!!");
const app = new Vue({
    el: "#admin_blog"
});

