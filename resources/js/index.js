import { createRouter, createWebHistory } from 'vue-router'
import MitraView from '@/Pages/MitraView.vue'
import SupplierView from '@/Pages/SupplierView.vue'
import KriteriaView from '@/Pages/KriteriaView.vue'
import HargaView from '@/Pages/HargaView.vue'
import JenisKainView from '@/Pages/JenisKainView.vue'
import KetersediaanView from '@/Pages/KetersediaanView.vue'
import DashboardView from '@/Pages/DashboardView.vue'
import Login from '@/Pages/Auth/Login.vue'
import Landing from '@/Pages/FrontEnd/Landing.vue'
import GradePage from '@/Pages/FrontEnd/GradePage.vue'
import Register from '@/Pages/Auth/Register.vue'

const routes = [
  {
    path: '/login',
    name: 'Login',
    component: Login,
    meta: {
      title: 'Login'
    }
  },
  {
    path: '/',
    name: 'Home',
    component: Landing,
    meta: {
      title: 'Home'
    }
  },
  {
    path: '/register',
    name: 'Registrasi',
    component: Register,
    meta: {
      title: 'Registrasi'
    }
  },
  {
    path: '/grade',
    name: 'Grade Page',
    component: GradePage,
    meta: {
      title: 'Grade Page'
    }
  },
  {
    path: '/dashboard',
    name: 'Dashboard',
    component: DashboardView,
    meta: {
      title: 'Dashboard'
    }
  },
  {
    path: '/mitra',
    name: 'mitra',
    component: MitraView,
    meta: {
      title: 'Mitra'
    }
  },
  {
    path: '/supplier',
    name: 'supplier',
    component: SupplierView,
    meta: {
      title: 'Supplier'
    }
  },
  {
    path: '/kriteria',
    name: 'kriteria',
    component: KriteriaView,
    meta: {
      title: 'Kriteria'
    }
  },
  {
    path: '/harga',
    name: 'harga',
    component: HargaView,
    meta: {
      title: 'Harga'
    }
  },
  {
    path: '/jenis',
    name: 'jenis',
    component: JenisKainView,
    meta: {
      title: 'JenisKain'
    }
  },
  {
    path: '/ketersediaan',
    name: 'ketersediaan',
    component: KetersediaanView,
    meta: {
      title: 'Ketersediaan'
    }
  },
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
  scrollBehavior(to, from, savedPosition) {
    return savedPosition || { left: 0, top: 0 }
  }
})

router.beforeEach((to, from, next) => {
  document.title = `Vue.js ${to.meta.title} | TailAdmin - Vue.js Tailwind CSS Dashboard Template`
  next()
})

export default router
