import React, { useEffect, useState } from 'react'
import { BrowserRouter, Routes, Route, Navigate } from 'react-router-dom'
import Loader from '../components/Loader'
import Nav from './navigationKeys'
import { useUserContext } from '../context/UserContext'

//lazy load the different routes
const Login = React.lazy(() => import('../pages/Login'))
const Home = React.lazy(() => import('../pages/Home'))


//Only add to this list when needed to add a new page
const myRoutes = [
    { authenticated: false, path: Nav.HOME, component: <Home /> },
    { authenticated: false, path: Nav.LOGIN, component: <Login /> },
]

const NavigationStack = () => {
    const { isAuthenticated } = useUserContext()

    const [routes, setRoutes] = useState([])

    useEffect(() => {
        const routesList = myRoutes.map((item) => renderRoute(item))
        setRoutes(routesList)
    }, [isAuthenticated])

    const renderRoute = (item) => {
        if (!item.authenticated) {
            return <Route key={`${item.path}`} path={item.path} element={item.component} />
        }
        else if (isAuthenticated) {
            if (item.sub) {
                return item.sub
            } else {
                return <Route key={`${item.path}`} path={item.path} element={item.component} />
            }
        } else {
            return <Route key={`${item.path}`} path={item.path} element={<Navigate to={Nav.LOGIN} />} />
        }
    }

    console.log(routes)
    return (
        <React.Suspense fallback={<Loader />}>
            <BrowserRouter>
                <Routes>{routes}</Routes>
            </BrowserRouter>
        </React.Suspense>
    )
}

export default NavigationStack
