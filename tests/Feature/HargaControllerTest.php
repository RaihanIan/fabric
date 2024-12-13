<?php
namespace Tests\Feature;

use App\Models\Harga;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HargaControllerTest extends TestCase
{
    use RefreshDatabase;  // Ensures the database is refreshed before each test

    // Test for the index page that retrieves all 'harga' data
    public function test_index()
    {
        // Create test data
        Harga::create(['harga' => '10000', 'bobot' => 3]);
        Harga::create(['harga' => '870', 'bobot' => 4]);

        // Make a request to the index route
        $response = $this->get(route('harga.index'));

        // Assert that the response status is 200 OK
        $response->assertStatus(200);

        // Assert that the Inertia response contains 'harga' data with correct values
        $response->assertInertia(fn ($page) => $page->has('harga')
            ->where('harga.0.harga', '10000')  // Ensure the first record's harga is 10000
            ->where('harga.1.harga', '870')   // Ensure the second record's harga is 870
        );
    }

    // Test for storing a new harga record
    public function test_store()
    {
        $data = [
            'harga' => '3000',
            'bobot' => 5
        ];

        // Make a POST request to store the new record
        $response = $this->post(route('harga.store'), $data);

        // Assert that it redirects to the index page
        $response->assertRedirect(route('harga.index'));

        // Assert that the new record was created in the database
        $this->assertDatabaseHas('harga', $data);
    }

    // Test for updating an existing harga record
    public function test_update()
    {
        $harga = Harga::create(['harga' => '10000', 'bobot' => 3]);

        $updatedData = [
            'harga' => '1500',
            'bobot' => 4
        ];

        // Make a PUT request to update the record
        $response = $this->put(route('harga.update', $harga), $updatedData);

        // Assert that it redirects to the index page
        $response->assertRedirect(route('harga.index'));

        // Assert that the record was updated in the database
        $this->assertDatabaseHas('harga', $updatedData);
    }

    // Test for deleting a harga record
public function test_destroy()
{
    // Create a harga record
    $harga = Harga::create(['harga' => '10000', 'bobot' => 3]);

    // Make a DELETE request to delete the record
    $response = $this->delete(route('harga.destroy', $harga));

    // Assert that it redirects to the index page
    $response->assertRedirect(route('harga.index'));

    // Assert that the record is deleted from the database
    $this->assertDatabaseMissing('harga', ['id' => $harga->id]);
}

}
