<template>
    <div class="leftside-menu leftside-menu-detached">
        <div class="leftbar-user">
        </div>
        <ul class="side-nav">
            <li class="side-nav-item">
                <router-link :to="{name: 'dashboard.index'}" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Dashboard</span>
                </router-link>
            </li>
            <li class="side-nav-item">
                <router-link :to="{name: 'categories.index'}" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Categories</span>
                </router-link>
            </li>
            <li class="side-nav-item">
                <router-link :to="{name: 'blogs.index'}" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Blogs</span>
                </router-link>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
</template>

<script>
export default {
    name: "SidebarComponent"
}
</script>

<style scoped>

</style>
