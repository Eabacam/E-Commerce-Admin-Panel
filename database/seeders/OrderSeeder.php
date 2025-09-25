<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = ['pending', 'processing', 'shipped', 'delivered', 'cancelled'];
        $customers = [
            ['name' => 'John Doe', 'email' => 'john@example.com', 'phone' => '555-0101'],
            ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'phone' => '555-0102'],
            ['name' => 'Mike Johnson', 'email' => 'mike@example.com', 'phone' => '555-0103'],
            ['name' => 'Sarah Williams', 'email' => 'sarah@example.com', 'phone' => '555-0104'],
            ['name' => 'David Brown', 'email' => 'david@example.com', 'phone' => '555-0105'],
        ];

        $internalNotes = [
            'Cliente solicitó envío urgente',
            'Verificar disponibilidad antes de procesar',
            'Cliente VIP - prioridad alta',
            'Pedido para regalo - incluir nota de felicitación',
            'Solicitó factura con RFC',
            'Entrega en horario de oficina (9am - 6pm)',
            'Cliente preguntó por descuento en próxima compra',
            'Revisar dirección de envío - puede estar incompleta',
            'Pedido recurrente - cliente habitual',
            'Solicitó empaque especial para regalo',
            'Cliente pidió llamar antes de entregar',
            'Verificar stock antes de confirmar',
            'Entrega programada para fin de semana',
            'Cliente solicitó cambio de dirección después de ordenar',
            'Pedido corporativo - incluir factura',
        ];

        for ($i = 1; $i <= 25; $i++) {
            $customer = $customers[array_rand($customers)];
            $subtotal = 0;

            $order = Order::create([
                'order_number' => 'ORD-' . strtoupper(uniqid()),
                'customer_name' => $customer['name'],
                'customer_email' => $customer['email'],
                'customer_phone' => $customer['phone'],
                'shipping_address' => fake()->address(),
                'subtotal' => 0,
                'tax' => 0,
                'shipping' => 10.00,
                'total' => 0,
                'status' => $statuses[array_rand($statuses)],
                'notes' => rand(0, 1) ? $internalNotes[array_rand($internalNotes)] : null,
            ]);

            $itemCount = rand(1, 5);
            $products = Product::inRandomOrder()->limit($itemCount)->get();

            foreach ($products as $product) {
                $quantity = rand(1, 3);
                $price = $product->price;
                $itemSubtotal = $quantity * $price;
                $subtotal += $itemSubtotal;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $price,
                    'subtotal' => $itemSubtotal,
                ]);
            }

            $tax = $subtotal * 0.10;
            $total = $subtotal + $tax + 10.00;

            $order->update([
                'subtotal' => $subtotal,
                'tax' => $tax,
                'total' => $total,
            ]);
        }
    }
}
