<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\School>
 */
class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //llenar cada uno de los campos de la tabla School con datos mediante el paquete Faker
        return [
            //
            'hs_id'                     => $this->get_create_id(66,8),
            'director_id'               => $this->faker->randomNumber(5,true),
            'mec_id'                    => $this->get_create_id(28,6),
            'country_id'                => $this->faker->randomNumber(5,true),
            'region_id'                 => $this->faker->randomNumber(5,true),
            'city_id'                   => $this->faker->randomNumber(5,true),
            'name'                      => $this->faker->name(),
            'postal'                    => $this->faker->postcode(),
            'phone'                     => $this->faker->unique()->tollFreeNumber(),
            'password'                  => $this->faker->password(),
            'email'                     => $this->faker->unique()->safeEmail(),
            'email2'                    => $this->faker->freeEmail(),
            'website'                   => 'https://www.'.$this->faker->word().'.com',
            'fax'                       => $this->faker->tollFreeNumber(),
            'address'                   => $this->faker->address(),
            'address_short'             => $this->faker->address(),
            'latitude'                  => $this->faker->latitude($min = -90, $max = 90) ,
            'longitude'                 => $this->faker->longitude($min = -180, $max = 180),
            'plan_preference'           => $this->get_plan_reference(),
            'leads'                     => $this->faker->randomNumber(5,true),
            'business_status'           => $this->get_business_status(),
            'google_user_ratings_total' => $this->faker->randomNumber(5,true),
            'google_rating'             => $this->faker->randomFloat(1),
            'revisor'                   => $this->faker->name(),
            'active'                    => $this->faker->boolean(),
        ];
    }

    //Creacion de funcion para la generacion de ID
    //Obtendra dos parametros
    //Parametro 1: los numeros que iniciara el ID
    //Parametro 2: cantidad de numeros restantes

    private function get_create_id($numeros_inicial,$total_numeros)
    {
        $id_tmp = $numeros_inicial.$this->faker->randomNumber($total_numeros,true);
        return $id_tmp;
    }

    //Funcion para obtener plan refernce
    private function get_plan_reference()
    {
        $array_opciones = ['anual','trimestral','mensual','semanal'];
        $total_opciones = count($array_opciones)-1;
        return $array_opciones[rand(0,$total_opciones)];
    }

    //Funcion para obtener business status
    private function get_business_status()
    {
        $array_opciones = ['OPERATIONAL','CLOSED_PERMANENTLY'];
        $total_opciones = count($array_opciones) -1;
        return $array_opciones[rand(0,$total_opciones)];
    }
}
