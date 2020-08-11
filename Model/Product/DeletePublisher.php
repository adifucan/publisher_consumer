<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Magento\Queue\Model\Product;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\MessageQueue\PublisherInterface;

class DeletePublisher
{
    const TOPIC_NAME = 'demo.product.delete';

    /**
     * @var PublisherInterface
     */
    private $publisher;

    public function __construct(
        PublisherInterface $publisher
    ) {
        $this->publisher = $publisher;
    }

    /**
     * Declare method that will publish a message to the queue
     *
     * @param ProductInterface $product
     * @return void
     */
    public function execute(ProductInterface $product): void
    {
        $this->publisher->publish(self::TOPIC_NAME, $product);
    }
}
