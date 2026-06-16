import coreConfig from '@loki/config';

export default {
    ...coreConfig,
    modules: [
        'LokiCheckout_MultiSafepay',
        'LokiCheckout_MultiSafepayDevTools',
        'MultiSafepay_ConnectCore',
        'MultiSafepay_ConnectFrontend',
        'MultiSafepay_ConnectAdminhtml',
    ],
    secure_config: {
        'multisafepay/general/test_api_key': process.env.MULTISAFEPAY_TEST_API_KEY || '',
    },
    config: {
        ...coreConfig.config,
        'multisafepay/general/mode': 0,
        'multisafepay/general/preselected_method': '',
        'multisafepay/general/icon_type':'svg'
    }
};
