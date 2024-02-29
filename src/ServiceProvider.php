<?php

namespace PtBrValidator;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use PtBrValidator\Rules as Rules;
use PtBrValidator\Support\Macros;

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
        Macros::register();

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
     * Get the file path in the src directory.
     */
    private function srcDir(string $path): string
    {
        return __DIR__."/{$path}";
    }

    /**
     * Register the package translations.
     */
    private function registerTranslations(): void
    {
        $this->loadTranslationsFrom($this->srcDir('lang'), 'docs');

        $this->publishes([$this->srcDir('lang') => $this->app->langPath()], 'docs');
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
