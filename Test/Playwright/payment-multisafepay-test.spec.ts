import {PaymentMethod, PlaceOrderButton} from '@loki-checkout/checkout-objects';
import {setupCheckout} from '@loki/setup-checkout';
import {test} from '@loki/test';

import {MultiSafepayPortal} from './helpers/multisafepay-objects';
import multiSafepayConfig from './config/config';

test.describe('MultiSafepay payment test', () => {
    test('should allow me to go to the checkout', async ({page, context}) => {
        await setupCheckout(page, context, {
            ...multiSafepayConfig,
            config: {
                ...multiSafepayConfig.config,
                'payment/multisafepay/active': 1,
            }
        });

        const paymentMethod = new PaymentMethod(page, 'multisafepay');
        await paymentMethod.select();

        const placeOrderButton = new PlaceOrderButton(page);
        await placeOrderButton.click();

        const multiSafepayPortal = new MultiSafepayPortal(page);
        await multiSafepayPortal.expectTestPaymentPage();
    });
});
