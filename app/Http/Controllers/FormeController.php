<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

class FormeController extends Controller
{

    public function index()
    {
        $form = Form::with('user')->get();

        return Inertia::render('Forms/Index', [
            'forms' => [
                'id' => $form->id,
                'identifier' => $form->identifier,
                'name' => $form->name,
                'theme' => $form->theme,
                'username' => $form->user?->name,
            ],
        ]);
        // 'pages' => $form->pages,
        // 'multi' => $form->multi_tab,
    }

    public function create()
    {
        return Inertia::render('Forms/Create', [
            'visibility_options' => Form::$visibility_options,
        ]);
    }

    public function store()
    {
        Auth::user()->account->organizations()->create(
            Request::validate([
                'name' => ['required', 'max:100'],
                'theme' => ['nullable', 'max:50', 'email'],
                'pages' => ['nullable', 'max:50'],
                'visibility' => ['nullable', 'max:150'],
                'multi_tab' => ['nullable', 'max:50'],
                'identifier' => ['nullable', 'max:50'],
                'form_builder_json' => ['required'],
            ])
        );
    }


    // 'address' => $organization->address,
                // // 'form_builder_json' => $form->form_builder_json,
                // 'region' => $organization->region,
                // 'country' => $organization->country,
                // 'postal_code' => $organization->postal_code,
                // 'deleted_at' => $organization->deleted_at,
                // 'contacts' => $organization->contacts()->orderByName()->get()->map->only('id', 'name', 'city', 'phone'),

}
