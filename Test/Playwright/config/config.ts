import coreConfig from '@loki-checkout/config';

const additionalSettings = JSON.parse(process.env.ADDITIONAL_SETTINGS || '{}');

export const requiredEnv = ['ADDITIONAL_SETTINGS'];

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
        'multisafepay/general/test_api_key': additionalSettings.MULTISAFEPAY_TEST_API_KEY || '',
    },
    config: {
        ...coreConfig.config,
        'multisafepay/general/mode': 0,
        'multisafepay/general/preselected_method': '',
        'multisafepay/general/icon_type':'svg'
    }
};
