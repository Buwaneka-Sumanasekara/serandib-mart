import React, { useState } from 'react'


const UserContext = React.createContext(undefined)

const UserContextProvider = ({ children }) => {
    const [authenticated, changeAuthenticated] = useState(false)


    return (
        <UserContext.Provider
            value={{
                isAuthenticated: authenticated,
                setAuthenticated: async (state) => {
                    changeAuthenticated(state)
                    if (!state) {
                        //logout call
                    }
                }
            }}
        >
            {children}
        </UserContext.Provider>
    )
}

const useUserContext = () => {
    const context = React.useContext(UserContext)
    if (context === undefined) {
        throw new Error('useUserContext must be used within a UserProvider')
    }
    return context
}



export { UserContextProvider, useUserContext }
