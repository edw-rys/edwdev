<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Http;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => ['required','string'],
            'email'     => ['required','string', 'email'],
            'subject'   => ['required','string'],
            'message'   => ['required','string'],
            'g-recaptcha-response' => ['required', function ($attribute, $value, $fail) {
                $this->validateRecaptcha($value, $fail);
            }],
        ];
    }

    /**
     * Validate Google reCAPTCHA v3 token
     *
     * @param string $token
     * @param callable $fail
     * @return void
     */
    private function validateRecaptcha($token, $fail)
    {
        $secretKey = config('services.recaptcha.secret_key');
        
        if (empty($secretKey)) {
            $fail('reCAPTCHA secret key is not configured.');
            return;
        }

        try {
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => $secretKey,
                'response' => $token,
                'remoteip' => request()->ip()
            ]);

            $result = $response->json();

            if (!$result['success']) {
                $fail('reCAPTCHA verification failed.');
                return;
            }

            // Verificar el score para reCAPTCHA v3 (opcional)
            $minScore = config('services.recaptcha.min_score', 0.5);
            if (isset($result['score']) && $result['score'] < $minScore) {
                $fail('reCAPTCHA score is too low.');
                return;
            }

        } catch (\Exception $e) {
             $fail('reCAPTCHA verification error: ' . $e->getMessage());
         }
     }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'g-recaptcha-response.required' => 'Por favor, complete la verificación reCAPTCHA.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'nombre',
            'email' => 'correo electrónico',
            'subject' => 'asunto',
            'message' => 'mensaje',
            'g-recaptcha-response' => 'verificación reCAPTCHA',
        ];
    }
}
