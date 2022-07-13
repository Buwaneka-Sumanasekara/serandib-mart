import React from 'react'
import Container from 'react-bootstrap/Container';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';
import Loader from '../components/Loader'

const ContentWrapper = ({
    isLoading = true,
    fillScreen = false,
    children,
}) => {
    return (
        <Container>

            {!isLoading && (
                <Row>
                    <Col>
                        {children}
                    </Col>
                </Row>
            )}
            {isLoading && (
                <Row className="d-flex justify-content-md-center align-items-center vh-100">
                    <Col md="auto">
                        <Loader />
                    </Col>
                </Row>
            )}

        </Container>
    )
}

export default ContentWrapper
