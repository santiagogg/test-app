<?php

use Illuminate\Database\Seeder;

class FakeMetadataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Location::class, 10)->create();
        factory(App\Keyword::class, 10)->create();
    }
}
