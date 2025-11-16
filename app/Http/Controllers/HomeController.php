<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Log::info('Accediendo a home index', ['user_id' => auth()->id()]);

        try {
            $user = auth()->user();
            Log::info('Usuario: ' . $user->name);

            // Test counts
            $empresaCount = \App\Models\empresa::count();
            Log::info('Empresa count: ' . $empresaCount);

            $periodoCount = \App\Models\Periodo::count();
            Log::info('Periodo count: ' . $periodoCount);

            $userCount = \App\Models\User::count();
            Log::info('User count: ' . $userCount);

            $balanceCount = \App\Models\BalanceGeneral::count();
            Log::info('Balance count: ' . $balanceCount);

            $estadoCount = \App\Models\estado_resultado::count();
            Log::info('Estado count: ' . $estadoCount);

            // Test roles
            $hasContador = $user->hasRole('Contador');
            Log::info('Has role Contador: ' . ($hasContador ? 'yes' : 'no'));

            $roles = $user->roles;
            Log::info('Roles count: ' . $roles->count());

            return view('home');
        } catch (\Exception $e) {
            Log::error('Error en home index: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            throw $e;
        }
    }
}
