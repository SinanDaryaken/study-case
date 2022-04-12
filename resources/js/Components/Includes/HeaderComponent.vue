<template>
    <div class="navbar-custom topnav-navbar topnav-navbar-dark">
        <div class="container-fluid">
            <!-- LOGO -->
            <a href="/" class="topnav-logo">
            <span class="topnav-logo-lg">
                <img src="assets/images/logo-light.png" alt="" height="16">
            </span>
                <span class="topnav-logo-sm">
                <img src="assets/images/logo_sm.png" alt="" height="16">
            </span>
            </a>
            <ul class="list-unstyled topbar-menu float-end mb-0">
                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown"
                       id="topbar-userdrop" href="pages-starter.html#" role="button" aria-haspopup="true"
                       aria-expanded="false">
                            <span class="account-user-avatar bg-secondary p-1 fw-bold rounded-circle text-white">
                                <span>{{ user.name ? user.name.substring(0, 2) : '' }}</span>
                            </span>
                        <span class="account-user-name mt-1">{{ user.name }}</span>
                    </a>
                    <div
                        class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown"
                        aria-labelledby="topbar-userdrop">
                        <a href="javascript:void(0);" @click="logout" class="dropdown-item notify-item">
                            <i class="mdi mdi-logout me-1"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>

            </ul>
            <a class="button-menu-mobile disable-btn">
                <div class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </a>
        </div>
    </div>
</template>

<script>
export default {
    name: "HeaderComponent",
    data() {
        return {
            user: {}
        }
    },
    methods: {
        logout() {
            axios.post('/logout',).then((response) => {
                this.$root.successHandler(response);
                this.$root.isLoginPage = false;
                this.$router.push('/login');
            }).catch((error) => {
                this.$root.errorHandler(error)
            });
        },
        getUser() {
            axios.get('/auth-user').then((response) => {
                this.user = response.data
            }).catch((error) => {
                this.$root.errorHandler(error)
            });
        }
    },
    created() {
        axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
        this.getUser();
    }
}
</script>
