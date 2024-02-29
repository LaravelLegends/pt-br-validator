<?php

namespace ValidatorDocs;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use ValidatorDocs\Rules as Rules;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->registerTranslations();
    }

    /**
     * Bootstrap the application events.
     */
    public function boot(): void
    {
        $rules = $this->getRules();

        $rules->each(function ($class, $name) {
            $rule = new $class;

            $extension = static function ($attribute, $value) use ($rule) {
                return $rule->passes($attribute, $value);
            };

            $this->app['validator']->extend($name, $extension, $rule->message());
        });
    }

    /**
     * Register the package translations.
     */
    private function registerTranslations(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/lang', 'validator-docs');

        $this->publishes([__DIR__.'/lang' => $this->app->langPath('vendor/validator-docs')], 'validator-docs.lang');
    }

    /**
     * Get the Rules.
     */
    private function getRules(): Collection
    {
        return collect([
            'uf' => Rules\UF::class,
            'cnh' => Rules\CNH::class,
            'cns' => Rules\CNS::class,
            'cpf' => Rules\CPF::class,
            'pis' => Rules\PIS::class,
            'cnpj' => Rules\CNPJ::class,
            'cellphone' => Rules\CellPhone::class,
            'telephone' => Rules\TelePhone::class,
            'format_cep' => Rules\FormatCEP::class,
            'format_cpf' => Rules\FormatCPF::class,
            'format_pis' => Rules\FormatPIS::class,
            'cpf_ou_cnpj' => Rules\CPForCNPJ::class,
            'format_cnpj' => Rules\FormatCNPJ::class,
            'format_cpf_ou_cnpj' => Rules\FormatCPForCNPJ::class,
            'cellphone_with_ddd' => Rules\CellPhoneWithDDD::class,
            'telephone_with_ddd' => Rules\TelePhoneWithDDD::class,
            'cellphone_with_code' => Rules\CellPhoneWithCode::class,
            'telephone_with_code' => Rules\TelePhoneWithCode::class,
            'format_vehicle_plate' => Rules\FormatVehiclePlate::class,
            'cellphone_with_code_no_mask' => Rules\CellPhoneWithCodeNoMask::class,
        ]);
    }
}
