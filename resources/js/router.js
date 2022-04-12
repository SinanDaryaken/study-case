import Dashboard from "./Pages/Dashboard/Index";

import CategoryIndex from "./Pages/Category/Index";
import CategoryCreate from "./Pages/Category/Create";
import CategoryEdit from "./Pages/Category/Edit";

import BlogIndex from "./Pages/Blog/Index";
import BlogCreate from "./Pages/Blog/Create";
import BlogEdit from "./Pages/Blog/Edit";


const General = {
    template: '<router-view></router-view>',
}

export const routes = [

    {path: '/', name: "dashboard.index", component: Dashboard},

    {
        path: '/categories', name: 'categories', component: General,
        children: [
            {path: '', name: 'categories.index', component: CategoryIndex},
            {path: 'create', name: 'categories.create', component: CategoryCreate},
            {path: ':id/edit', name: 'categories.edit', component: CategoryEdit},
        ],
    },

    {
        path: '/blogs', name: 'blogs', component: General,
        children: [
            {path: '', name: 'blogs.index', component: BlogIndex},
            {path: 'create', name: 'blogs.create', component: BlogCreate},
            {path: ':id/edit', name: 'blogs.edit', component: BlogEdit},
        ],
    },
];


