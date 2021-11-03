<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DefaultSize;

class DefaultSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Default size for large screens
        DefaultSize::create([
            'name' => 'Extra small',
            'type' => 'md',
            'size' => 1]);
        DefaultSize::create([
            'name' => 'Small',
            'type' => 'md',
            'size' => 2]);
        DefaultSize::create([
            'name' => 'Large',
            'type' => 'md',
            'size' => 3]);
        DefaultSize::create([
            'name' => 'Extra Large',
            'type' => 'md',
            'size' => 4]);
        DefaultSize::create([
            'name' => '2 In 1',
            'type' => 'md',
            'size' => 6]);
        //Default size for small screens
        DefaultSize::create([
            'name' => 'Extra small',
            'type' => 'sm',
            'size' => 2]);
        DefaultSize::create([
            'name' => 'Small',
            'type' => 'sm',
            'size' => 3]);
        DefaultSize::create([
            'name' => 'Normal',
            'type' => 'sm',
            'size' => 4]);
        DefaultSize::create([
            'name' => '2 In 1',
            'type' => 'sm',
            'size' => 6]);
        DefaultSize::create([
            'name' => 'Extra Large',
            'type' => 'sm',
            'size' => 12]);
    }
}
