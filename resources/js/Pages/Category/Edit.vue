<template>
    <div class="content-page">
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                        </div>
                        <h4 class="page-title">Edit</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <span class="fw-bold me-2">Status</span>
                                        <div>
                                            <input type="checkbox" id="status" :checked="form.status" v-model="form.status" data-switch="bool"/>
                                            <label for="status" data-on-label="Active" data-off-label="Passive" class="mb-0 d-block"></label>
                                        </div>
                                    </div>
                                    <div>
                                        <router-link :to="{name: 'categories.index'}" class="btn btn-outline-secondary">
                                            <i class="mdi mdi-arrow-left-thick"></i>
                                            Back
                                        </router-link>
                                        <button type="button" @click="update()" class="btn btn-outline-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="name" v-model="form.name"
                                                   placeholder="Name"/>
                                            <label for="name">Name</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-end">
                                    <button type="button" @click="update()" class="btn btn-outline-primary">Update</button>
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
    name: "Edit",
    data() {
        return {
            form: {},
        }
    },
    methods: {
        getById(id) {
            axios.get('categories/get-by-id/' + id)
                .then((response) => {
                    this.form = response.data.data;
                }).catch((error) => {
                this.$root.errorHandler(error);
            });
        },
        update() {
            axios.put('categories/' + this.form.id, this.form)
                .then((response) => {
                    this.$root.successHandler(response);
                    this.$router.push({name: 'categories.index'});
                }).catch((error) => {
                this.$root.errorHandler(error);
            });
        }
    },
    created() {
        this.getById(this.$route.params.id);
    }
}
</script>

<style scoped>

</style>
