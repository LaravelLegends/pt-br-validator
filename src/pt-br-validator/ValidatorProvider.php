<?php 

namespace PHPLegends\PtBrValidator;

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

        $this->package('phplegends/pt-br-validator', 'validator');

        $me = $this;

        $this->app['validator']->resolver(function ($translator, $data, $rules, $messages) use($me)
        {
            $messages += $me->getMessages();
            
            return new Validator($translator, $data, $rules, $messages);
        });
    }


    protected function getMessages()
    {
        return [

            'data'             => 'O campo :attribute não é uma data com formato válido',
            
            'telefone-com-ddd' => 'O campo :attribute não contém um formato válido de telefone',
            
            'celular-com-ddd'  => 'O campo :attribute não contém um formato válido de ddd e celular',
            
            'celular'          => 'O campo :attribute não contém um formato válido de celular',
            
            'format-cpf '      => 'O campo :attribute tem formato de CPF inválido',
            
            'cpf '             => 'O campo :attribute contém um CPF inválido',
            
            'cnpj'             => 'O campo :attribute contém um CNPJ inválido',
            

        ];
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(){}

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

}
