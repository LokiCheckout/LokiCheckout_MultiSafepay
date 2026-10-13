<?php declare(strict_types=1);

namespace LokiCheckout\MultiSafepay\Component\PaymentComponent;

use LokiCheckout\Core\Component\Base\Generic\CheckoutViewModel;

/**
 * @method PaymentComponentContext getContext()
 */
class PaymentComponentViewModel extends CheckoutViewModel
{
    public function getJsComponentName(): ?string
    {
        return 'LokiCheckoutMultiSafepayPaymentComponent';
    }

    public function isAllowRendering(): bool
    {
        $paymentMethod = (string)$this->getBlock()->getMethod();
        if (empty($paymentMethod)) {
            return parent::isAllowRendering();
        }

        $path = 'payment/'.$paymentMethod.'/payment_type';
        if ($this->getContext()->getConfigValue($path) !== 'payment_component') {
            return false;
        }

        return parent::isAllowRendering();
    }

    public function isValid(): bool
    {
        return false;
    }

    public function getJsData(): array
    {
        return [
            ...parent::getJsData(),
            'environment' => $this->getContext()->getEnvironment(),
            'apiToken' => $this->getContext()->getApiToken(),
            'currency' => $this->getContext()->getCurrency(),
            'amount' => $this->getContext()->getAmount(),
            'customer' => [
                'locale' => $this->getContext()->getCurrency(),
                'country' => $this->getContext()->getCountryId(),
            ],
        ];
    }

    public function getGatewayCode(): string
    {
        $paymentMethod = (string)$this->getBlock()->getMethod();
        return (string)$this->getContext()->getConfigValue('payment/'.$paymentMethod.'/gateway_code');
    }
}
