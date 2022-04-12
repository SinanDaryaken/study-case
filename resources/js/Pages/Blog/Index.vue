<template>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <BreadcrumbComponent/>
                </div>
                <h4 class="page-title">Blog</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-end">
                        <router-link :to="{name: 'blogs.create'}" class="btn btn-outline-primary">
                            <i class="mdi mdi-plus"></i>
                            Add
                        </router-link>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row d-flex gap-3">
                        <div v-for="item in list.data">
                            <div class="col-lg-4 mx-auto">
                                <div class="card" style="width: 18rem;">
                                    <img :src="'image/'+ item.image" class="mh-100 mw-100" :alt="item.image">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ item.title }}</h5>
                                        <p class="card-text">{{ item.content.substring(0,15)+".." }}</p>
                                    </div>
                                    <div class="card-body">
                                        <router-link :to="{name: 'blogs.edit', params: {id: item.id}}" class="card-link">Update</router-link>
                                        <a href="javascript: void(0);" @click="destroy(item.id)" class="card-link">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer" v-if="list.length > 10">
                    <pagination :data="list" @pagination-change-page="getBlogs"></pagination>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Index",
    data() {
        return {
            list: {},
        }
    },
    methods: {
        getBlogs(page = 1) {
            axios.get('blogs/get-by-pagination').then((response) => {
                this.list = response.data.data;
            }).catch((error) => {
                this.$root.errorHandler(error);
            });
        },
        destroy(blogId) {
            this.$swal.fire({
                title: 'Are you sure?',
                text: 'You are going to Delete Record',
                icon: "warning",
                showCancelButton: true,
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Delete'
            }).then((value) => {
                if (value.isConfirmed) {
                    axios.delete('blogs/' + blogId).then((response) => {
                        this.$root.successHandler(response);
                        this.getBlogs();
                    }).catch(function (error) {
                        this.$root.errorHandler(error);
                        this.getBlogs();
                    });
                }
            })
        }
    },
    created() {
        this.getBlogs();
    }
}
</script>
