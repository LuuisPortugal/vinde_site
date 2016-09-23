<?php

namespace App\Providers;

use App\Permissao;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $permissoes = Permissao::all();
        if (isset($permissoes)) {
            foreach ($permissoes as $permissao) {
                $gate->define($permissao->rota->nome, function ($usuario) use ($permissao) {
                    return in_array($permissao->rota->nome, session('permissao'));
                });
            }
        }
    }
}
