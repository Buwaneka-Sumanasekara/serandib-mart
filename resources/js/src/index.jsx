import React, { useEffect, useState } from 'react'
import ReactDOM from 'react-dom';
import NavigationStack from './navigation'
import { UserContextProvider, useUserContext } from './context/UserContext'
import ContentWrapper from './layout/ContentWrapper'


export const App = () => {
    function Content() {
        const { setAuthenticated } = useUserContext()

        const [isLoading, setLoading] = useState(true)

        useEffect(() => {
            //TODO:authentication logic here
            setLoading(false)
        }, [])


        return (
            <ContentWrapper isLoading={isLoading} fillScreen={true}>
                <NavigationStack />
            </ContentWrapper>
        )
    }


    return (
        <UserContextProvider>
            <Content />
        </UserContextProvider>
    )
}

export default App;

if (document.getElementById('example')) {
    ReactDOM.render(<App />, document.getElementById('example'));
}
