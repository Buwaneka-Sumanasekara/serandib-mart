
import React from 'react';
import { ShopOutlined, LoadingOutlined } from '@ant-design/icons';
import { Spin } from 'antd';

const antIcon = <LoadingOutlined style={{ fontSize: 40 }} spin />;


const Loader = () => {

    return (
        <div className='text-center'>
            <div className='pb-4'><Spin indicator={antIcon} /></div>
            <div className='pb-4'><ShopOutlined style={{ fontSize: 40 }} /></div>
            <div>{process.env.MIX_APP_NAME}</div>
        </div>
    )
}

export default Loader;
