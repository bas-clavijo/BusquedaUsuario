<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'nombre'=>$this->faker->name(),
           'correo'=>$this->faker->email(),
           'contraseña' => bcrypt('password'),
           'foto'=>$this->faker->name(),
           'estado' => $this->faker->boolean(),

           // Se agregan los campos faltantes
           'cargo' => $this->faker->jobTitle(),
           'correoconfirmar' => $this->faker->unique()->safeEmail(),
           'confContraseña' => bcrypt('password'),
        ];
    }
}
