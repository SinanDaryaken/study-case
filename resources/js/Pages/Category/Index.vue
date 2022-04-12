<template>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <BreadcrumbComponent/>
                </div>
                <h4 class="page-title">Category</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-end">
                        <router-link :to="{name: 'categories.create'}" class="btn btn-outline-primary">
                            <i class="mdi mdi-plus"></i>
                            Add
                        </router-link>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-centered mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Status</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-if="!list.data">
                            <td class="text-center" colspan="6">No Record</td>
                        </tr>
                        <tr v-else v-for="item in list.data">
                            <td>{{ item.id }}</td>
                            <td>
                                <div>
                                    <input type="checkbox" :id="'status'+item.id" @change="updateStatus(item.id, item.status)" :checked="item.status" :value="item.status" data-switch="bool"/>
                                    <label :for="'status'+item.id" data-on-label="Active" data-off-label="Passive" class="mb-0 d-block"></label>
                                </div>
                            </td>
                            <td>{{ item.name }}</td>
                            <td class="table-action">
                                <router-link :to="{name: 'categories.edit', params: {id: item.id}}" class="action-icon"><i class="mdi mdi-pencil"></i></router-link>
                                <a href="javascript: void(0);" @click="destroy(item.id)" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer" v-if="list.length > 10">
                    <pagination :data="list" @pagination-change-page="getCategories"></pagination>
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
        getCategories(page = 1) {
            axios.get('categories/get-by-pagination').then((response) => {
                this.list = response.data.data;
            }).catch((error) => {
                this.$root.errorHandler(error);
            });
        },
        updateStatus(id, status) {
            this.$root.updateStatus(id, status, 'categories', this.getCategories);
        },
        destroy(categoryId) {
            this.$swal.fire({
                title: 'Are you sure?',
                text: 'You are going to Delete Record',
                icon: "warning",
                showCancelButton: true,
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Delete'
            }).then((value) => {
                if (value.isConfirmed) {
                    axios.delete('categories/' + categoryId).then((response) => {
                        this.$root.successHandler(response);
                        this.getCategories();
                    }).catch(function (error) {
                        this.$root.errorHandler(error);
                        this.getCategories();
                    });
                }
            })
        }
    },
    created() {
        this.getCategories();
    }
}
</script>
