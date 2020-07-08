<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Sucursale;

class SucursalControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function test_sucursales_displays_the_sucursales_list()
    {
        $response = $this->get('gestor/sucursales');

        $response->assertStatus(200);
        
        $response->assertViewIs('pages.sucursales');
    }

    /** @test */
    public function test_list_sucursales()
    {
        $this->withoutExceptionHandling();

        factory(Sucursale::class, 3)->create(); // Datos de prueba

        $response = $this->get('/api/sucursales/list');

        $response->assertOk();

    }

    /** @test */
    public function test_create_sucursal()
    {
        $this->withoutExceptionHandling();

        // Datos de prueba
        $nombre = $this->faker->name;
        $direccion = $this->faker->name;
        $telefono = $this->faker->phoneNumber;

        $response = $this->post('/api/sucursal/create', [
            'nombre' => $nombre,
            'direccion' => $direccion,
            'telefono' => $telefono
        ]);

        $response->assertOk();

        $this->assertCount(1, Sucursale::all());

        $sucursal = Sucursale::first();

        $this->assertEquals($sucursal->Nombre, $nombre);
        $this->assertEquals($sucursal->Direccion, $direccion);
        $this->assertEquals($sucursal->Telefono, $telefono);
    }

    /** @test */
    public function test_update_sucursal()
    {
        $this->withoutExceptionHandling();

        // Datos de prueba
        $sucursal = factory(Sucursale::class)->create(); 

        $nombre = $this->faker->name;
        $direccion = $this->faker->name;
        $telefono = $this->faker->phoneNumber;

        $response = $this->patch('/api/sucursal/update/' . $sucursal->Cv_Sucursal, [
            'nombre' => $nombre,
            'direccion' => $direccion,
            'telefono' => $telefono
        ]);

        $this->assertCount(1, Sucursale::all());

        $sucursal = $sucursal->fresh();

        $this->assertEquals($sucursal->Nombre, $nombre);
        $this->assertEquals($sucursal->Direccion, $direccion);
        $this->assertEquals($sucursal->Telefono, $telefono);
    }

    /** @test */
    public function test_delete_sucursal()
    {
        $this->withoutExceptionHandling();

        $sucursal = factory(Sucursale::class)->create(); // Datos de prueba

        $response = $this->delete('/api/sucursal/delete/' . $sucursal->Cv_Sucursal);

        $this->assertCount(0, Sucursale::all());
    }    
    
}
