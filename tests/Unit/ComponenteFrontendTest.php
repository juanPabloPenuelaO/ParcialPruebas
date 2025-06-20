<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\View;

class ComponenteFrontendTest extends TestCase
{
    /** @test */
    public function la_vista_muestra_productos_correctamente()
    {
        $products = collect([
            (object)['name' => 'Laptop', 'stock' => 5],
            (object)['name' => 'Mouse', 'stock' => 2],
        ]);

        $html = View::make('products.lowstock', ['products' => $products])->render();

        $this->assertStringContainsString('Laptop', $html);
        $this->assertStringContainsString('Mouse', $html);
        $this->assertStringContainsString('Stock', $html);
    }
}
