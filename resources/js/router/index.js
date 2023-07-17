import { createRouter, createWebHistory } from 'vue-router'
import blogIndex from '../components/blogs/index.vue'
import notFound from '../components/blogs/notFound.vue'

const routes = [
    {
        path: '/blogs',
        component: blogIndex
    },
    {
        path: '/:pathMatch(.*)*',
        component: notFound
    }
    
]
const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router