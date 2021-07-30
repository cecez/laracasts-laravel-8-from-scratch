<?php

namespace App\Http\Controllers;

use App\Contracts\Newsletter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  Newsletter  $newsletter
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function __invoke(Newsletter $newsletter): RedirectResponse
    {
        request()->validate(['email' => ['required', 'email']]);

        try {
            $newsletter->subscribe(request('email'));
        } catch (\Exception) {
            throw ValidationException::withMessages([
                'email' => 'Não foi possível realizar a inscrição com este e-mail.'
            ]);
        }

        return redirect('/')
            ->with('success', 'Acesse seu e-mail para confirmar a inscrição, obrigado!');
    }
}
