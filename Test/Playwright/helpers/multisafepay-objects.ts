const {expect} = require(process.cwd() + '/node_modules/@playwright/test');

export class MultiSafepayPaymentComponent {
    page;
    locator;

    constructor(page) {
        this.page = page;
    }

    field(iframeCount) {
        return this.page.locator(':nth-match(iframe, ' + iframeCount + ')').contentFrame().locator('input');
    }
}

export class MultiSafepayPortal {
    page;

    constructor(page) {
        this.page = page;
    }

    async expectTestPaymentPage() {
        await expect(this.page).toHaveURL(/testpayv2.multisafepay.com/, {timeout: 10000});

        const body = await this.page.locator('body');
        await expect(body).toHaveText(/Test shop/);
    }

    async expectTestIdealPage() {
        await expect(this.page).toHaveURL(/testpay.multisafepay.com\/sim\/ideal2/, {timeout: 10000});

        const body = await this.page.locator('body');
        await expect(body).toHaveText(/Test Scenario/);
    }
}
