<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class FormeController extends Controller
{
    public function index()
    {
        $form = Form::with('user')
        ->select('id', 'identifier', 'name', 'theme', 'user_id')
        ->get();

        $data = ($form->count()) ? $form : null;

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

    public function createMulti()
    {
        return Inertia::render('Forms/CreateMulti', [
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
                'multi_tab' => ['boolean'],
                'form_builder_json' => ['required'],
            ])
        );
        return Redirect::route('forms')->with('success', 'Form created.');
    }

    public function storeMulti()
    {
        Form::create(
            Request::validate([
                'name' => ['required', 'max:100'],
                'theme' => ['nullable'],
                'pages' => ['nullable', 'max:50'],
                'visibility' => ['nullable', 'max:150'],
                'multi_tab' => ['boolean'],
                'form_builder_json' => ['required'],
            ])
        );
        return Redirect::route('forms')->with('success', 'Form created.');
    }

    public function edit(Form $form)
    {
        return Inertia::render('Forms/Edit', [
            'questions' => [
                'id' => $form->id,
                'name' => $form->name,
                'theme' => $form->theme,
                'pages' => $form->pages,
                'visibility' => $form->visibility,
                'multi_tab' => $form->multi_tab,
                'form_builder_json' => $form->form_builder_json,
            ],
            'visibility_options' => Form::$visibility_options,
        ]);
    }

    public function update(Form $form)
    {
        $form->update(
            Request::validate([
                'name' => ['required', 'max:100'],
                'theme' => ['nullable'],
                'pages' => ['nullable', 'max:50'],
                'visibility' => ['nullable', 'max:150'],
                'multi_tab' => ['boolean'],
                'form_builder_json' => ['required'],
            ])
        );

        return Redirect::route('forms')->with('success', 'Form updated.');
    }

    public function destroy(Form $form)
    {
        $form->delete();

        return Redirect::route('forms')->with('success', 'Form deleted.');
    }

}
