<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'Laptop Pro 15"', 'category' => 'Electronics', 'price' => 1299.99, 'stock' => 25, 'description' => 'High-performance laptop with 16GB RAM'],
            ['name' => 'Wireless Mouse', 'category' => 'Electronics', 'price' => 29.99, 'stock' => 150, 'description' => 'Ergonomic wireless mouse with USB receiver'],
            ['name' => 'USB-C Hub', 'category' => 'Electronics', 'price' => 49.99, 'stock' => 80, 'description' => '7-in-1 USB-C hub with HDMI and SD card reader'],
            ['name' => 'Bluetooth Headphones', 'category' => 'Electronics', 'price' => 199.99, 'stock' => 45, 'description' => 'Noise-cancelling Bluetooth headphones'],
            
            ['name' => 'Cotton T-Shirt', 'category' => 'Clothing', 'price' => 19.99, 'stock' => 200, 'description' => '100% cotton comfortable t-shirt'],
            ['name' => 'Denim Jeans', 'category' => 'Clothing', 'price' => 59.99, 'stock' => 120, 'description' => 'Classic fit denim jeans'],
            ['name' => 'Running Shoes', 'category' => 'Clothing', 'price' => 89.99, 'stock' => 75, 'description' => 'Comfortable running shoes with cushioning'],
            ['name' => 'Winter Jacket', 'category' => 'Clothing', 'price' => 149.99, 'stock' => 40, 'description' => 'Warm winter jacket with hood'],
            
            ['name' => 'LED Desk Lamp', 'category' => 'Home & Garden', 'price' => 39.99, 'stock' => 90, 'description' => 'Adjustable LED desk lamp'],
            ['name' => 'Garden Tool Set', 'category' => 'Home & Garden', 'price' => 79.99, 'stock' => 55, 'description' => 'Complete garden tool set with carrying case'],
            ['name' => 'Indoor Plant Pot', 'category' => 'Home & Garden', 'price' => 24.99, 'stock' => 130, 'description' => 'Ceramic plant pot with drainage'],
            
            ['name' => 'Yoga Mat', 'category' => 'Sports & Outdoors', 'price' => 34.99, 'stock' => 100, 'description' => 'Non-slip yoga mat with carrying strap'],
            ['name' => 'Camping Tent', 'category' => 'Sports & Outdoors', 'price' => 199.99, 'stock' => 30, 'description' => '4-person camping tent'],
            ['name' => 'Water Bottle', 'category' => 'Sports & Outdoors', 'price' => 14.99, 'stock' => 250, 'description' => 'Insulated stainless steel water bottle'],
            
            ['name' => 'Programming Guide', 'category' => 'Books', 'price' => 44.99, 'stock' => 65, 'description' => 'Comprehensive programming guide'],
            ['name' => 'Fiction Novel', 'category' => 'Books', 'price' => 16.99, 'stock' => 110, 'description' => 'Bestselling fiction novel'],
            
            ['name' => 'Building Blocks Set', 'category' => 'Toys & Games', 'price' => 49.99, 'stock' => 85, 'description' => '500-piece building blocks set'],
            ['name' => 'Board Game', 'category' => 'Toys & Games', 'price' => 34.99, 'stock' => 70, 'description' => 'Family board game for 2-6 players'],
        ];

        foreach ($products as $product) {
            $category = Category::where('name', $product['category'])->first();
            
            if ($category) {
                Product::create([
                    'category_id' => $category->id,
                    'name' => $product['name'],
                    'slug' => Str::slug($product['name']),
                    'sku' => 'SKU-' . strtoupper(Str::random(8)),
                    'description' => $product['description'],
                    'price' => $product['price'],
                    'stock' => $product['stock'],
                    'is_active' => true,
                    'is_featured' => rand(0, 1) === 1,
                ]);
            }
        }
    }
}
