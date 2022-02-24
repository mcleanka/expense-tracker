import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from "./routes";
import store from '../store'

Vue.use(VueRouter)

const router = VueRouter.createRouter({
  // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
  history: VueRouter.createWebHashHistory(),
  routes, // short for `routes: routes`
})

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requireLogin) && !store.state.isAuthenticated) {
    next({ name: 'Login', query: { to: to.path } })
  } else {
    next()
  }
})



export default router
