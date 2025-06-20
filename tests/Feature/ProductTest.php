<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_listar_todos_los_productos()
    {
        $categoria = Category::factory()->create();
        Product::factory()->count(3)->create(['category_id' => $categoria->id]);

        $respuesta = $this->get('/products'); // SIN /api

        $respuesta->assertStatus(200);
        // Si es vista, podrías verificar contenido HTML, no JSON
        // $respuesta->assertSee('Productos');
    }

    /** @test */
    public function puede_crear_un_producto()
    {
        $categoria = Category::factory()->create();

        $datos = [
            'name' => 'Teclado',
            'price' => 120.00,
            'stock' => 50,
            'category_id' => $categoria->id,
        ];

        $respuesta = $this->post('/products', $datos); // SIN /api

        // Si redirige, verifica con:
        $respuesta->assertRedirect();

        $this->assertDatabaseHas('products', ['name' => 'Teclado']);
    }

    /** @test */
    public function puede_eliminar_un_producto()
    {
        $producto = Product::factory()->create();

        $respuesta = $this->delete("/products/{$producto->id}");

        $respuesta->assertRedirect();

        $this->assertDatabaseMissing('products', ['id' => $producto->id]);
    }
}