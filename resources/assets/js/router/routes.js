const Login = () => import('~/pages/auth/login').then(m => m.default || m)
const Register = () => import('~/pages/auth/register').then(m => m.default || m)
const PasswordEmail = () => import('~/pages/auth/password/email').then(m => m.default || m)
const PasswordReset = () => import('~/pages/auth/password/reset').then(m => m.default || m)
const NotFound = () => import('~/pages/errors/404').then(m => m.default || m)

const Settings = () => import('~/pages/settings/index').then(m => m.default || m)
const SettingsProfile = () => import('~/pages/settings/profile').then(m => m.default || m)
const SettingsPassword = () => import('~/pages/settings/password').then(m => m.default || m)

const AdminLot = () => import('~/pages/lot').then(m => m.default || m)
const AdminLotCreate = () => import('~/pages/lot/create').then(m => m.default || m)

const Home = () => import('~/pages/home/index').then(m => m.default || m)
const Lot = () => import('~/pages/home/lot').then(m => m.default || m)

export default [
  { path: '/', name: 'home', component: Home },
  { path: '/lot/:id', name: 'lot.view', component: Lot },

  { path: '/login', name: 'login', component: Login },
  { path: '/register', name: 'register', component: Register },
  { path: '/password/reset', name: 'password.request', component: PasswordEmail },
  { path: '/password/reset/:token', name: 'password.reset', component: PasswordReset },

  { path: '/settings',
    component: Settings,
    children: [
      { path: '', redirect: { name: 'settings.profile' } },
      { path: 'profile', name: 'settings.profile', component: SettingsProfile },
      { path: 'password', name: 'settings.password', component: SettingsPassword }
    ] },

  { path: '/admin/lot', component: AdminLot, name: 'admin.lot' },
  { path: '/admin/lot/create', component: AdminLotCreate, name: 'admin.lot.create' },

  { path: '*', component: NotFound }
]
