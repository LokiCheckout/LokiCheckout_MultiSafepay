<?php declare(strict_types=1);

namespace LokiCheckout\MultiSafepay\Plugin;

use LokiCheckout\Core\Component\Checkout\Billing\PaymentMethods\PaymentMethodsRepository;
use MultiSafepay\ConnectCore\Config\Config;

class PaymentMethodsRepositoryPlugin
{
    /**
     * @param Config
     */
    public function __construct(
        private readonly Config $config
    ) {
    }

    public function afterGetDefaultPayment(PaymentMethodsRepository $subject, string $result): string
    {
        $defaultMethod = trim((string)$this->config->getValue(Config::PRESELECTED_METHOD));

        if ($defaultMethod === '') {
            return $result;
        }

        return $defaultMethod;
    }
}
