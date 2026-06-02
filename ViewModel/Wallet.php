<?php declare(strict_types=1);

namespace LokiCheckout\MultiSafepay\ViewModel;

use LokiCheckout\Core\ViewModel\CheckoutState;
use Magento\Framework\Message\Manager;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Wallet implements ArgumentInterface
{
    public function __construct(
        private CheckoutState $checkoutState,
        private \MultiSafepay\ConnectCore\Config\Config $config,
        private Manager $messageManager
    ) {
    }

    public function getJsUrl(string $config): string
    {
        return '';
        $apiKey = $this->config->getApiKey($this->checkoutState->getQuote()->getStoreId());
        $currency = $this->checkoutState->getQuote()->getQuoteCurrencyCode();

        $url = 'https://api.multisafepay.com/v1/json/wallets/configs/'.$config.'?api_key='.$apiKey.'&currency='.$currency;

        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $apiKey,
            ],
        ]);

        $response = curl_exec($ch);
        if (empty($response)) {
            return '';
        }

        $data = json_decode($response, true);
        if (isset($data['message'])) {
            $message = __('Failed to initialize MultiSafepay wallet') . ': '. $data['message'];
            $this->messageManager->addErrorMessage($message);
        }

        if (isset($data['data']['js_sdk_url'])) {
            return $data['data']['js_sdk_url'];
        }

        return '';
    }
}
