<template>
    <div>
        <HeaderComponent/>
        <div class="container-fluid">
            <div class="wrapper">
                <SidebarComponent/>
                <div class="content-page">
                    <div class="content">
                        <router-view></router-view>
                    </div>
                    <FooterComponent/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import HeaderComponent from '../Components/Includes/HeaderComponent';
import SidebarComponent from '../Components/Includes/SidebarComponent';
import FooterComponent from '../Components/Includes/FooterComponent';

export default {
    name: "Main",
    components: {
        HeaderComponent,
        SidebarComponent,
        FooterComponent,
    },
    methods: {
        clearValidate() {
            let inputList = document.querySelectorAll("input, select");
            inputList.forEach(input => {
                input.classList.remove('is-invalid');
            });
        },
        validate(data) {
            let keys = Object.keys(data);
            this.clearValidate();
            keys.forEach((value, index) => {
                let id = value.replaceAll('.', '_');
                let element = document.querySelector("#" + id);

                element.classList.remove("is-invalid")
                element.classList.add("is-invalid")

                let hasAlert = document.querySelector(".invalid-feedback." + id);

                if (hasAlert == null) {
                    let alert = document.createElement("div");
                    alert.classList.add("invalid-feedback");
                    alert.classList.add(id);
                    alert.textContent = data[value];
                    element.after(alert);
                }

            })
        },
        updateStatus(id, status, table, callback) {
            axios.post('update-status', {id, status, table})
                .then((response) => {
                    this.successHandler(response)
                }).catch((error) => {
                this.errorHandler(error)
            }).then((response) => {
                callback();
            })
        },
        successHandler(response) {
            this.$toast.open({
                position: "bottom-right",
                message: response.data.message,
                type: "success"
            });
        },
        errorHandler(error) {
            if (error.response.status === 422) {
                let errors = error.response.data.errors;
                this.validate(errors);
            } else if (error.response.status === 401) {
                location.reload();
            } else if ([404, 500, 503].includes(error.response.status)) {
                this.$toast.open({
                    position: "bottom-right",
                    message: error.response.data.message,
                    type: "error"
                });
            }
        }
    }
}
</script>
