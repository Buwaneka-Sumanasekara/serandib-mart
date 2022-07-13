import React from 'react'
import Loader from '../components/Loader'

const ContentWrapper = ({
    isLoading = true,
    fillScreen = false,
    children,
}) => {
    return (
        <div>
            {!isLoading && (
                <div style={{ height: fillScreen ? '100vh' : '100%' }}>
                    {children}
                </div>
            )}
            {isLoading && (
                <Loader />
            )}
        </div>
    )
}

export default ContentWrapper
