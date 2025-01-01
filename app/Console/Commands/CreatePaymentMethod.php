<?php

namespace App\Console\Commands;

use App\Models\PaymentMethod;
use Exception;
use Illuminate\Support\Facades\File;

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
            $this->showConsoleHeadingError('The --name option is required while creating a payment method');
            return 1;
        }

        if (PaymentMethod::where('name', $this->toSnakeCase($name))->exists()) {
            $this->showConsoleHeadingError('['. $name . '] already exists in payment methods.');
            return 1;
        }

        $payment_service_file_base_name = ucfirst($this->toCamelCase($name));

        $payment_service_file_relative_path = 'App/Services/PaymentGateway/' . $payment_service_file_base_name . '.php';
        $payment_service_file_absolute_path = app_path('Services/PaymentGateway/' . $payment_service_file_base_name . '.php');

        if (File::exists($payment_service_file_absolute_path)) {
            $this->showConsoleHeadingError('[' . $payment_service_file_relative_path . '] file already exists.');
            return 1;
        }
        
        // Load the service template content
        $service_template_path = app_path('Services/Templates/PaymentGateway.wsp');

        if (!file_exists($service_template_path)) {
            $this->showConsoleHeadingError("The template file ['{$service_template_path}'] does not exist.");
            return 1;
        }
        
        $service_template_content = file_get_contents($service_template_path);

        $service_file_content = '<?php' . PHP_EOL . PHP_EOL;

        $service_file_content .= str_replace(
            ['{{PAYMENT_SERVICE_NAME}}', '{{payment_gateway_name}}'],
            [$payment_service_file_base_name, $this->toSnakeCase($name)],
            $service_template_content
        );

        // Create the new payment gateway service file and update the content
        try {
            file_put_contents($payment_service_file_relative_path, $service_file_content);
            $this->showConsoleHeadingInfo("The file [{$payment_service_file_relative_path}] has been created successfully.");
        } catch (Exception $e) {
            $this->showConsoleHeadingError("An error occurred while creating the payment gateway service file: {$e->getMessage()}");
            return 1;
        }

        PaymentMethod::insert([
            'name' => $this->toSnakeCase($name),
            'description' => $this->option('description') ?? null,
            'logo_url' => null,
            'is_default' => ($this->option('is_default') && $this->option('is_default') == 'true') ? 1 : 0
        ]);

        // Display message after completion
        $this->messageAlignedBig('[' . $name . '] is added as payment method.');
    }
}
