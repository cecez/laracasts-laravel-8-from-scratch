<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Newsletter  $newsletter
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws ValidationException
     */
    public function __invoke(Request $request, Newsletter $newsletter)
    {
        $request->validate(['email' => ['required', 'email']]);

        try {
            $newsletter->subscribe($request->email);
        } catch (\Exception) {
            throw ValidationException::withMessages([
                'email' => 'Não foi possível realizar a inscrição com este e-mail.'
            ]);
        }

        return redirect('/')
            ->with('success', 'Acesse seu e-mail para confirmar a inscrição, obrigado!');
    }
}
