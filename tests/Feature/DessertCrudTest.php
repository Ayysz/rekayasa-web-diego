<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Dessert;
use App\Models\User;

class DessertCrudTest extends TestCase
{
    use RefreshDatabase; // Memastikan database di-reset setelah setiap tes

    protected function setUp(): void
    {
        parent::setUp();
        // Buat user simulasi untuk melewati middleware auth
        $this->user = User::factory()->create();
    }

    public function test_can_view_desserts_list()
    {
        $response = $this->actingAs($this->user)->get('/admin/desserts');
        $response->assertStatus(200);
    }

    public function test_validation_error_when_creating_dessert_with_empty_fields()
    {
        $response = $this->actingAs($this->user)->post('/admin/desserts', []);
        $response->assertSessionHasErrors(['nama_dessert', 'komposisi', 'harga', 'kategori', 'gambar']);
    }

    public function test_can_create_a_dessert()
    {
        // Mock Storage
        \Illuminate\Support\Facades\Storage::fake('cloudinary');

        $data = [
            'gambar' => \Illuminate\Http\UploadedFile::fake()->image('dessert.jpg'),
            'nama_dessert' => 'Puding Coklat',
            'komposisi' => 'Coklat, Susu, Gula',
            'harga' => 15000,
            'kategori' => 'Puding'
        ];

        $response = $this->actingAs($this->user)->post('/admin/desserts', $data);
        
        $response->assertRedirect('/admin/desserts');
        $this->assertDatabaseHas('desserts', ['nama_dessert' => 'Puding Coklat']);
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

        $response = $this->actingAs($this->user)->delete('/admin/desserts/' . $dessert->id_dessert);
        
        $response->assertRedirect('/admin/desserts');
        $this->assertDatabaseMissing('desserts', ['id_dessert' => $dessert->id_dessert]);
    }
}
