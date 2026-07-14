<?php declare(strict_types=1);

namespace LokiCheckout\MultiSafepay\Payment\Icon;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Module\Manager as ModuleManager;
use Magento\Store\Model\StoreManagerInterface;
use MultiSafepay\ConnectCore\Config\Config;
use MultiSafepay\ConnectCore\Model\Ui\ConfigProviderPool;
use LokiCheckout\Core\Payment\Icon\IconResolverContext;
use LokiCheckout\Core\Payment\Icon\IconResolverInterface;

class IconResolver implements IconResolverInterface
{
    public function __construct(
        private ModuleManager $moduleManager,
        private ConfigProviderPool $configProviderPool,
        private StoreManagerInterface $storeManager,
        private Config $config,
        private array $skipMethods = []
    ) {
    }

    public function resolve(IconResolverContext $iconResolverContext): false|string
    {
        $paymentMethodCode = $iconResolverContext->getPaymentMethodCode();

        if (false === $this->moduleManager->isEnabled('MultiSafepay_ConnectCore')) {
            return false;
        }

        if (!preg_match('/^multisafepay_(.*)$/', $paymentMethodCode)) {
            return false;
        }

        if (in_array($paymentMethodCode, $this->skipMethods)) {
            return false;
        }

        try {
            $storeId = $this->storeManager->getStore()->getId();
        } catch (NoSuchEntityException) {
            return false;
        }

        if (!$this->config->canShowPaymentIcons($storeId)) {
            return false;
        }

        $configProvider = $this->configProviderPool->getConfigProviderByCode($paymentMethodCode);

        if (!$configProvider) {
            return false;
        }

        try {
            $image = $configProvider->getImage();
        } catch (LocalizedException $localizedException) {
            return false;
        }

        return $iconResolverContext->getIconOutput($image, htmlAttributes: ['alt' => $paymentMethodCode]);
    }
}
