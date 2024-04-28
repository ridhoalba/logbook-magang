<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        Validator::extend('nim_xor_nip', function ($attribute, $value, $parameters, $validator) {
            // Jika NIM atau NIP tidak null, kembalikan true
            return !(isset($value['nim']) && isset($value['nip'])) || (empty($value['nim']) && empty($value['nip']));
        });

        // Kemudian tambahkan validasi di sini setelah menyimpan
        User::creating(function ($user) {
            $validator = Validator::make(['nim' => $user->nim, 'nip' => $user->nip], [
                'nim' => 'nim_xor_nip',
            ]);
        
            if ($validator->fails()) {
                throw new \Exception('Harus ada NIM atau NIP, tidak keduanya.');
            }
        });
    }
}
