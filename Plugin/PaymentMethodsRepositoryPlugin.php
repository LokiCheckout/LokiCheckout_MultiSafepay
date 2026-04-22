<?php declare(strict_types=1);

namespace LokiCheckout\MultiSafepay\Plugin;

use LokiCheckout\Core\Component\Checkout\Billing\PaymentMethods\PaymentMethodsRepository;

class PaymentMethodsRepositoryPlugin
{
    /**
     * @param PaymentMethodsRepository $subject
     * @param array $result
     * @return array
     */
    public function afterGetPaymentMethods(
        PaymentMethodsRepository $subject,
        array $result
    ): array {
        return array_values(array_filter(
            $result,
            static function ($method): bool {
                $code = strtolower((string)$method->getCode());

                $hasMultiSafepay = str_contains($code, 'multisafepay');
                $hasRecurring = str_contains($code, 'recurring');

                return !($hasMultiSafepay && $hasRecurring);
            }
        ));
    }
}
