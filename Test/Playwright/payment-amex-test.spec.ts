import {PaymentMethod, PlaceOrderButton, SuccessPage} from '@loki/checkout-objects';
import {setupCheckout} from '@loki/setup-checkout';
import {test} from '@loki/test';

import {MultiSafepayPortal, MultiSafepayPaymentComponent} from './helpers/multisafepay-objects';
import multiSafepayConfig from './config/config';

test.describe('American Express', () => {
    test('should redirect to payment portal', async ({page, context}) => {
        await setupCheckout(page, context, {
            ...multiSafepayConfig,
            config: {
                ...multiSafepayConfig.config,
                'payment/multisafepay_amex/active': 1,
                'payment/multisafepay_amex/payment_type': 'redirect',
            }
        });

        const paymentMethod = new PaymentMethod(page, 'multisafepay_amex');
        await paymentMethod.select();

        const placeOrderButton = new PlaceOrderButton(page);
        await placeOrderButton.click();

        const multiSafepayPortal = new MultiSafepayPortal(page);
        await multiSafepayPortal.expectTestPaymentPage();
    });

    test('should redirect to success page', async ({page, context}) => {
        await setupCheckout(page, context, {
            ...multiSafepayConfig,
            config: {
                ...multiSafepayConfig.config,
                'payment/multisafepay_amex/active': 1,
                'payment/multisafepay_amex/payment_type': 'payment_component',
            }
        });

        const paymentMethod = new PaymentMethod(page, 'multisafepay_amex');
        await paymentMethod.select();

        const multiSafepayPaymentComponent = new MultiSafepayPaymentComponent(page);
        await multiSafepayPaymentComponent.field(1).fill('374500000000015');
        await multiSafepayPaymentComponent.field(2).fill('Jane Doe');
        await multiSafepayPaymentComponent.field(3).fill('01/35');
        await multiSafepayPaymentComponent.field(4).fill('1111');
        await multiSafepayPaymentComponent.field(4).blur();

        const placeOrderButton = new PlaceOrderButton(page);
        await placeOrderButton.click();

        await new SuccessPage(page).expectToBeLoaded();
    });
});
