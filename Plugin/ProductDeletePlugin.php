<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Magento\Queue\Plugin;

use Magento\Queue\Model\Product\DeletePublisher;
use Magento\Catalog\Model\ResourceModel\Product as ProductResource;

class ProductDeletePlugin
{
    /**
     * @var \Magento\Quote\Model\Product\QuoteItemsCleanerInterface
     */
    private $productDeletePublisher;

    /**
     * @param DeletePublisher $productDeletePublisher
     */
    public function __construct(DeletePublisher $productDeletePublisher)
    {
        $this->productDeletePublisher = $productDeletePublisher;
    }

    /**
     * @param ProductResource $subject
     * @param ProductResource $result
     * @param \Magento\Catalog\Api\Data\ProductInterface $product
     * @return ProductResource
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function afterDelete(
        ProductResource $subject,
        ProductResource $result,
        \Magento\Catalog\Api\Data\ProductInterface $product
    ) {
        $this->productDeletePublisher->execute($product);
        return $result;
    }
}
