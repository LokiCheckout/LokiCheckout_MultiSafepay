<?php declare(strict_types=1);

namespace LokiCheckout\MultiSafepay\Component\PaymentComponent;

use Loki\Components\Component\ComponentRepository;

/**
 * @method PaymentComponentContext getContext()
 */
class PaymentComponentRepository extends ComponentRepository
{
    public function getValue(): mixed
    {
        return null;
    }

    public function saveValue(mixed $value): void
    {
        if (!is_array($value)) {
            return;
        }

        $additionalInformation = [];
        if (!empty($value['tokenize'])) {
            $additionalInformation['tokenize'] = $value['tokenize'];
        }

        $additionalInformation['payload'] = $value['payload'] ?? '';
        $additionalInformation['transaction_type'] = 'direct';

        $quote = $this->getContext()->getCheckoutState()->getQuote();
        $quote->getPayment()->setAdditionalInformation($additionalInformation);
    }
}
