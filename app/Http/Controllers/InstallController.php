<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class InstallController extends Controller
{
    public function start()
    {
        Artisan::call('config:clear');
        Artisan::call('cache:clear');

        return view('installer/start');
    }

    public function proceedStep1(Request $request)
    {
        $request->validate([
            'APP_NAME' => 'required|string|max:255',
            'DB_HOST' => 'required',
            'DB_PORT' => 'required',
            'DB_DATABASE' => 'required',
            'DB_USERNAME' => 'required',
            'DB_PASSWORD' => 'nullable|string',
        ]);

        // Attempt to establish a connection using the provided details
        try {
            // Set the database connection temporarily for testing
            config([
                'database.connections.test' => [
                    'driver' => 'mysql', // Adjust if using a different DB type
                    'host' => $request->input('DB_HOST'),
                    'port' => $request->input('DB_PORT'),
                    'database' => $request->input('DB_DATABASE'),
                    'username' => $request->input('DB_USERNAME'),
                    'password' => $request->input('DB_PASSWORD', ''),
                ]
            ]);

            // Test the connection
            DB::connection('test')->getPdo();

            $this->updateEnv([
                'APP_NAME' => str_replace(' ', '_', $request->APP_NAME),
                'DB_HOST' => $request->DB_HOST,
                'DB_PORT' => $request->DB_PORT,
                'DB_DATABASE' => $request->DB_DATABASE,
                'DB_USERNAME' => $request->DB_USERNAME,
                'DB_PASSWORD' => $request->DB_PASSWORD ?? '',
            ]);

            return redirect()->route('install.complete');

        } catch (\Exception $e) {
            // If the connection fails, log the error and redirect back
            Log::error('Database connection failed: ', ['exception' => $e]);
            return back()->withErrors(['error' => $e->getMessage()])
                        ->withInput();
        }
    }

    public function complete()
    {
        return view('installer/complete');
    }

    public function onComplete(Request $request)
    {
        $request->validate([
            'APP_ADMIN_EMAIL' => 'required|string|max:70',
            'APP_ADMIN_PASSWORD' => 'required|min:8|max:15'
        ]);

        Artisan::call('config:clear');
        Artisan::call('cache:clear');

        try {
            Artisan::call('wisenshop:fresh-install', ['--force' => true]);

            $admin_user = User::find(1);

            $admin_user->email = $request->APP_ADMIN_EMAIL;
            $admin_user->password = Hash::make($request->APP_ADMIN_PASSWORD);

            $admin_user->save();

            Storage::disk('local')->put('.installed', 'Installed on ' . now());

            return redirect()->route('frontend.home')->with('success', 'Installation completed successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    protected function updateEnv($data = [])
    {
        $env_path = base_path('.env');
        $env_content = file_get_contents($env_path);

        foreach ($data as $key => $value) {
            $pattern = "/^{$key}=.*/m";
            if (preg_match($pattern, $env_content)) {
                $env_content = preg_replace($pattern, "{$key}={$value}", $env_content);
            } else {
                $env_content .= "\n{$key}={$value}";
            }
        }

        file_put_contents($env_path, $env_content);
    }
}
