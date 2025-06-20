<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ValidacionProductoTest extends TestCase
{
    /** @test */
    public function valida_que_el_precio_y_stock_sean_correctos()
    {
        $datos = [
            'name' => 'Monitor',
            'price' => -50, // ese valor no es valido
            'stock' => 'mucho', // ese valor no es valido
        ];

        $reglas = [
            'name' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ];

        $validador = Validator::make($datos, $reglas);

        $this->assertTrue($validador->fails());
        $this->assertArrayHasKey('price', $validador->errors()->toArray());
        $this->assertArrayHasKey('stock', $validador->errors()->toArray());
    }
}
