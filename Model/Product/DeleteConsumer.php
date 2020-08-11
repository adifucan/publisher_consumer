<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Magento\Queue\Model\Product;

use Magento\Catalog\Api\Data\ProductInterface;

class DeleteConsumer
{
    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;

    /**
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->logger = $logger;
    }

    /**
     * @param ProductInterface $product
     */
    public function processMessage(\Magento\Catalog\Api\Data\ProductInterface $product): void
    {
        $this->logger->info($product->getId() . ' ' . $product->getSku());
    }
}
