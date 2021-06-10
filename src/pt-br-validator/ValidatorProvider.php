<?php

namespace LaravelLegends\PtBrValidator;

use Illuminate\Support\ServiceProvider;

class ValidatorProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    /**
     * Bootstrap the application events.
     *
     * @return void
     */

    public function boot()
    {
        $rules = [
            'celular'                  => \LaravelLegends\PtBrValidator\Rules\Celular::class,
            'celular_com_ddd'          => \LaravelLegends\PtBrValidator\Rules\CelularComDdd::class,
            'celular_com_codigo'       => \LaravelLegends\PtBrValidator\Rules\CelularComCodigo::class,
            'cnh'                      => \LaravelLegends\PtBrValidator\Rules\Cnh::class,
            'cnpj'                     => \LaravelLegends\PtBrValidator\Rules\Cnpj::class,
            'cpf'                      => \LaravelLegends\PtBrValidator\Rules\Cpf::class,
            'formato_cnpj'             => \LaravelLegends\PtBrValidator\Rules\FormatoCnpj::class,
            'formato_cpf'              => \LaravelLegends\PtBrValidator\Rules\FormatoCpf::class,
            'telefone'                 => \LaravelLegends\PtBrValidator\Rules\Telefone::class,
            'telefone_com_ddd'         => \LaravelLegends\PtBrValidator\Rules\TelefoneComDdd::class,
            'telefone_com_codigo'      => \LaravelLegends\PtBrValidator\Rules\TelefoneComCodigo::class,
            'formato_cep'              => \LaravelLegends\PtBrValidator\Rules\FormatoCep::class,
            'formato_placa_de_veiculo' => \LaravelLegends\PtBrValidator\Rules\FormatoPlacaDeVeiculo::class,
            'formato_pis'              => \LaravelLegends\PtBrValidator\Rules\FormatoPis::class,
            'pis'                      => \LaravelLegends\PtBrValidator\Rules\Pis::class,
            'cpf_ou_cnpj'              => \LaravelLegends\PtBrValidator\Rules\CpfOuCnpj::class,
            'formato_cpf_ou_cnpj'      => \LaravelLegends\PtBrValidator\Rules\FormatoCpfOuCnpj::class,
            'uf'                       => \LaravelLegends\PtBrValidator\Rules\Uf::class,
        ];

        foreach ($rules as $name => $class) {
            $rule = new $class;

            $extension = static function ($attribute, $value) use ($rule) {
                return $rule->passes($attribute, $value);
            };

            $this->app['validator']->extend($name, $extension, $rule->message());
        }
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
