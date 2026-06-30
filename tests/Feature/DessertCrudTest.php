<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Dessert;

class DessertCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_desserts_list()
    {
        $response = $this->get('/desserts');
        $response->assertStatus(200);
    }

    public function test_validation_error_when_creating_dessert_with_empty_fields()
    {
        $response = $this->post('/desserts', []);
        $response->assertSessionHasErrors(['nama_dessert', 'komposisi', 'harga', 'kategori', 'gambar']);
    }

    public function test_can_create_a_dessert()
    {
        $data = [
            'gambar' => 'https://example.com/image.jpg',
            'nama_dessert' => 'Puding Coklat',
            'komposisi' => 'Coklat, Susu, Gula',
            'harga' => 15000,
            'kategori' => 'Puding'
        ];

        $response = $this->post('/desserts', $data);
        
        $response->assertRedirect('/desserts');
        $this->assertDatabaseHas('desserts', ['nama_dessert' => 'Puding Coklat']);
    }

    public function test_can_update_a_dessert()
    {
        $dessert = Dessert::create([
            'gambar' => 'https://example.com/image.jpg',
            'nama_dessert' => 'Puding Coklat',
            'komposisi' => 'Coklat',
            'harga' => 10000,
            'kategori' => 'Puding'
        ]);

        $data = [
            'gambar' => 'https://example.com/image.jpg',
            'nama_dessert' => 'Puding Vanilla',
            'komposisi' => 'Vanilla, Susu',
            'harga' => 12000,
            'kategori' => 'Puding'
        ];

        $response = $this->put('/desserts/' . $dessert->id_dessert, $data);
        
        $response->assertRedirect('/desserts');
        $this->assertDatabaseHas('desserts', ['nama_dessert' => 'Puding Vanilla']);
    }

    public function test_can_delete_a_dessert()
    {
        $dessert = Dessert::create([
            'gambar' => 'https://example.com/image.jpg',
            'nama_dessert' => 'Puding Coklat',
            'komposisi' => 'Coklat',
            'harga' => 10000,
            'kategori' => 'Puding'
        ]);

        $response = $this->delete('/desserts/' . $dessert->id_dessert);
        
        $response->assertRedirect('/desserts');
        $this->assertDatabaseMissing('desserts', ['id_dessert' => $dessert->id_dessert]);
    }
}
