<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testcomputeTVAFoodProduct()
    {
        $product = new Product('Un produit', Product::FOOD_PRODUCT, 20);
        $this->assertSame(1.1, $product->computeTVA());
    }
}