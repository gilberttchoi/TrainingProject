<?php

use Illuminate\Database\Seeder;
use App\Label;

class LabelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Label::class, 10)->create();
    }
}
