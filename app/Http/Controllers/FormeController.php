<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;

class FormeController extends Controller
{

    public function index()
    {
        $form = Form::with('user')
        ->get('id', 'identifier', 'name', 'theme');

        $data = ($form->count()) ? null : $form;

        return Inertia::render('Forms/Index', [
            'forms' => $data,
        ]);
    }

    public function create()
    {
        return Inertia::render('Forms/Create', [
            'visibility_options' => Form::$visibility_options,
        ]);
    }

    public function store()
    {
        Form::create(
            Request::validate([
                'name' => ['required', 'max:100'],
                'theme' => ['nullable'],
                'pages' => ['nullable', 'max:50'],
                'visibility' => ['nullable', 'max:150'],
                'multi_tab' => ['nullable', 'max:50'],
                'form_builder_json' => ['required'],
            ])
        );
        return Redirect::route('forms')->with('success', 'Form created.');
    }
}
