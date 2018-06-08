<?php

use Illuminate\Database\Seeder;
use Holdingglobe\Models\Property;

class PropertySeeder extends Seeder
{
    public function run()
    {
        factory(Property::class,100)->create();
    }
}
