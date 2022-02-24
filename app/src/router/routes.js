import { LogIn, SignUp } from '../views'

const routes = [
	{
		path: '/',
		name: 'LogIn',
		component: LogIn
	},
	{
		path: '/sign-up',
		name: 'SignUp',
		component: SignUp
	},
]

export default routes