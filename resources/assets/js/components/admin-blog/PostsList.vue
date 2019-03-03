<template>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Posts</h3>
        <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
        <div class="extra-controls">
            <div class="row">
                <div class="col-lg-2 col-lg-offset-10 col-xs-5 col-xs-offset-7">
                    <div class="lang-selector">
                        <div class="btn-group btn-group-sm">
                            <div class="btn" :class="l == locale ? 'bg-olive' : 'bg-purple'" v-for="l in locales" @click="locale = l">{{l}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <ul class="products-list product-list-in-box">
            <li class="item" v-for="post in posts">
                <div class="row">
                    <div class="col-lg-5 col-xs-10">
                        <a :href="'/admin/blog/edit-post/' + post.id" class="product-title">
                            <transition name="fade" mode="out-in">
                            <div class="post-title" v-for="l in locales" v-if="l == locale" :key="l">
                                <span >
                                    {{ post[l].title }}
                                    <i v-if="!post[l].title">No Title</i>
                                </span>
                            </div>
                            </transition>
                        </a>
                        <span class="product-description">
                            #{{post.id}} &nbsp;&nbsp; /{{ post.slug }}/
                        </span>

                    </div>

                    <div class="col-xs-2 col-lg-1 col-lg-push-6 text-right">
                        <a class='edit-post' :href="'/admin/blog/edit-post/' + post.id">
                            <i class="fa fa-edit"></i>
                        </a>
                    </div>

                    <div class="col-lg-4 col-lg-pull-1 col-xs-7">
                        <transition name="fade" mode="out-in">
                        <div class="post-categories" v-for="l in locales" v-if="l == locale" :key="l">
                            <span class="cat-wrapper" v-for="c in post[l].categories">
                                <span class='badge bg-blue' >{{c}}</span>
                            </span>
                        </div>
                        </transition>

                    </div>

                    <div class="col-lg-2 col-lg-pull-1 col-xs-5">
                        <div class="post-status">
                            <span v-if="post.status == 'public'" class="label label-success">Public</span>
                            <span v-else-if="post.status == 'private'" class="label label-warning">Private</span>
                            <span v-else-if="post.status == 'deleted'" class="label label-danger">Deleted</span>
                            <span  class="label label-danger" v-else>{{ post.status }} [UNKNOWN]</span>
                        </div>
                        <div class="post-langs">
                            <span v-for="l in locales" class="lang-wrapper">
                                <span  class="badge" :class="'bg-' + post[l].color">{{ l }}</span>
                            </span>
                        </div>
                    </div>
                </div>
                <!--<div class="product-info">-->
                <!--</div>-->
            </li>
            <!-- /.item -->
        </ul>

    </div>
    <div class="overlay" v-if="loading">
        <i class="fa fa-refresh fa-spin"></i>
    </div>
</div>
</template>

<script>
import axios from "axios";
export default {
    // name: "postslist",
    data() {
        return {
            loading: false,
            posts: [],
            locales: ['en', 'es', 'ru'],
            locale: 'en'
        }
    },

    mounted() {
        this.loading = true;
        axios.post("/admin/blog/posts", {
            _token: _csrf_token
        }).then(response => {
            this.posts = response.data;
            this.loading = false;
            // console.log(response.data);
        }).catch(e => {
            console.log(e);
            alert("Error Loading");
            this.loading = false;
        })
    }
}
</script>

<style scoped lang="scss">
.post-categories {
    padding: 5px;
    margin: 2px;
    background-color: #ebf1c3;
    min-height: 42px;

    .cat-wrapper:before {
        content: ', ';
    }
    .cat-wrapper:first-of-type:before {
        content: '';
    }
}

.post-langs {
    text-align: center;
    .lang-wrapper:before {
        content: ' ';
    }
    .lang-wrapper:first-of-type:before {
        content: '';
    }
}

.post-status {
    border-bottom: dotted 1px #999;
    padding: 0 10px 5px;
    text-align:center;
}

a.edit-post {
    font-size: 1.5em;
}

.extra-controls {
    margin-top: 16px;
    padding: 8px 0;
    border-top: solid 1px #ddd;
    border-bottom: solid 1px #ddd;

    .lang-selector {
        text-align: right;
    }
}

.products-list {
    /*padding-left: 15px;*/
    .item:hover {
        background-color: #f9f9ff;

    }
}
</style>