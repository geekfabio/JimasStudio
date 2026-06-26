<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('contact', [
            'metaTitle' => 'Contactos — JIMAS Marketing e Comunicação',
            'metaDescription' => 'Entre em contacto com a JIMAS. Estamos em Kilamba, Luanda, Angola.',
            'canonical' => route('contact'),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        Contact::create($data);

        return redirect()->route('contact')->with('success', 'A sua mensagem foi enviada com sucesso. Entraremos em contacto brevemente.');
    }
}
