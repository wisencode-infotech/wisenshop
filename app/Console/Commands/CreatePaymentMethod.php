<?php

namespace App\Console\Commands;

use App\Models\PaymentMethod;

class CreatePaymentMethod extends WisenShopCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wisenshop:create-payment-method {--name= : The name of the payment method} {--description= : The description of the payment method} {--is_default= : Whether this payment method is default (true/false)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create payment method';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->option('name');

        if (!$name) {
            $this->showConsoleHeadingError('The --name option is required > while creating payment method');
            return 1;
        }

        PaymentMethod::insert([
            'name' => 'Cash on Delivery',
            'description' => $this->option('description') ?? null,
            'logo_url' => null,
            'is_default' => ($this->option('is_default') && $this->option('is_default') == 'true') ? 1 : 0
        ]);

        // Display message after completion
        $this->messageAlignedBig($name . ' is added as payment method.');
    }
}
