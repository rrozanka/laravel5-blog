<?php namespace App\Http\Requests;

use Illuminate\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Request
 *
 * @package App\Http\Requests
 */
abstract class Request extends FormRequest {

    /**
     * Validate the input.
     *
     * @param $factory
     *
     * @return mixed
     */
    public function validator($factory)
    {
        return $factory->make(
            $this->sanitizeInput(), $this->container->call([$this, 'rules']), $this->messages()
        );
    }

    /**
     * Sanitize input.
     *
     * @return array|mixed
     */
    protected function sanitizeInput()
    {
        if (method_exists($this, 'sanitize'))
        {
            return $this->container->call([$this, 'sanitize']);
        }

        return $this->all();
    }

    /**
     * Custom failed validation callback.
     *
     * @param Validator $validator
     *
     * @return mixed
     */
    protected function failedValidation(Validator $validator)
    {
        session()->flash('flash_message', 'There were errors in the form!');
        session()->flash('flash_type', 'error');

        return parent::failedValidation($validator);
    }

}
