<template>
    <div class="content-page">
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                        </div>
                        <h4 class="page-title">Add</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-end">
                                    <router-link :to="{name: 'blogs.index'}" class="btn btn-outline-secondary">
                                        <i class="mdi mdi-arrow-left-thick"></i>
                                        Back
                                    </router-link>
                                    <button type="button" @click="store()" class="btn btn-outline-primary">Save
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="title" v-model="form.title"
                                                   placeholder="Title"/>
                                            <label for="title">Title</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="category" v-model="form.category_id">
                                                <option selected v-for="category in categories" :value="category.id">
                                                    {{ category.name }}
                                                </option>
                                            </select>
                                            <label for="category">Category</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="file" @change="onChange">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <textarea rows="10" cols="170" v-model="form.content" placeholder="Content"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-end">
                                    <button type="button" @click="store()" class="btn btn-outline-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Create",
    data() {
        return {
            form: {
                category_id: null,
                title: null,
                content: null,
            },
            tempImage:null,
            categories: {}
        }
    },
    methods: {
        onChange(e) {
            this.tempImage = e.target.files[0];
        },
        store() {
            let data = new FormData();
            data.append('image', this.tempImage);
            data.append("form", JSON.stringify(this.form));

            axios.post('blogs', data)
                .then((response) => {
                    this.$root.successHandler(response);
                    this.$router.push({name: 'blogs.index'});
                }).catch((error) => {
                this.$root.errorHandler(error);
            });
        },
        getCategories() {
            axios.get('categories/get-by-status-and-ordered/' + 1)
                .then((response) => {
                    this.categories = response.data.data
                }).catch((error) => {
                this.$root.errorHandler(error);
            });
        }
    },
    created() {
        this.getCategories();
    }
}
</script>

<style scoped>

</style>
