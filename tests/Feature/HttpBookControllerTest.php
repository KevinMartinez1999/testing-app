<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Book;

class HttpBookControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_can_create_a_book(): void
    {
        // Preparación
        $data = [
            'title' => 'El Quijote',
            'slug' => 'el-quijote',
            'description' => 'La historia de un hidalgo que se volvió loco por leer muchos libros de caballería.',
            'author' => 'Miguel de Cervantes',
            'price' => 10.99,
        ];

        // Ejecución
        $response = $this->post('/api/books', $data);

        // Comprobación
        $response->assertStatus(201);

        $this->assertDatabaseHas('books', [
            'title' => 'El Quijote',
            'slug' => 'el-quijote',
            'description' => 'La historia de un hidalgo que se volvió loco por leer muchos libros de caballería.',
            'author' => 'Miguel de Cervantes',
            'price' => 10.99,
        ]);
        $libro = Book::findBySlug('el-quijote');
        $this->assertEquals('El Quijote', $libro->title);
    }
}
