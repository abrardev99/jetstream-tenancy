<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tenant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::statement('drop database if exists tenantfoo');
        DB::statement('drop database if exists tenantbar');

        $tenant1 = Tenant::create(['id' => 'foo']);
        $tenant2 = Tenant::create(['id' => 'bar']);

        $tenant1->domains()->create(['domain' => 'foo']);
        $tenant2->domains()->create(['domain' => 'bar']);
    }
}
