<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class InstallController extends Controller
{
    public function showInstallForm()
    {
        return view('install');
    }

    public function install(Request $request)
    {
        // Validate the request
        $request->validate([
            'APP_NAME' => 'required|string|max:255',
            'DB_HOST' => 'required',
            'DB_PORT' => 'required',
            'DB_DATABASE' => 'required',
            'DB_USERNAME' => 'required',
            'DB_PASSWORD' => 'nullable|string',
        ]);

         // Update the .env file with database configurations
         $this->updateEnv([
            'APP_NAME' => str_replace(' ', '_', $request->APP_NAME),
            'DB_HOST' => $request->DB_HOST,
            'DB_PORT' => $request->DB_PORT,
            'DB_DATABASE' => $request->DB_DATABASE,
            'DB_USERNAME' => $request->DB_USERNAME,
            'DB_PASSWORD' => $request->DB_PASSWORD ?? '',
        ]);


        try {

            $pdo = DB::connection()->getPdo();
            DB::connection()->select('SELECT 1');
           
        } catch (\PDOException $e) {

            $this->updateEnv([
                'APP_NAME' => 'Shop',
                'DB_HOST' => 'localhost',
                'DB_PORT' => '3306',
                'DB_DATABASE' => '',
                'DB_USERNAME' => '',
                'DB_PASSWORD' => '',
            ]);

            return back()->withErrors(['error' => 'Database connection failed. Please check your database credentials.']);
        
        } catch (\Exception $e) {

            $this->updateEnv([
                'APP_NAME' => 'Shop',
                'DB_HOST' => 'localhost',
                'DB_PORT' => '3306',
                'DB_DATABASE' => '',
                'DB_USERNAME' => '',
                'DB_PASSWORD' => '',
            ]);

            return back()->withErrors(['error' => 'An unexpected error occurred. Please try again later.']);
        }

        try {

            Artisan::call('migrate:fresh', ['--seed' => true]);
            Artisan::call('db:seed', ['--class' => 'FakeAppSeeder']);

        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        Storage::disk('local')->put('.installed', 'Installed on ' . now());

        return redirect('frontend.home')->with('success', 'Installation completed successfully!');
    }

    protected function updateEnv($data = [])
    {
        $envPath = base_path('.env');
        $envContent = file_get_contents($envPath);

        foreach ($data as $key => $value) {
            $pattern = "/^{$key}=.*/m";
            if (preg_match($pattern, $envContent)) {
                $envContent = preg_replace($pattern, "{$key}={$value}", $envContent);
            } else {
                $envContent .= "\n{$key}={$value}";
            }
        }

        file_put_contents($envPath, $envContent);

        Artisan::call('config:clear');
    }
}

