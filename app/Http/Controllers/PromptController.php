<?php

namespace App\Http\Controllers;
use App\Http\Requests\PromptRequest;
use Illuminate\Http\Request;
use App\Models\Prompt;

class PromptController extends Controller
{
    public function index()
    {
        return Prompt::all();
    }

    public function store(PromptRequest $request)
    {
        $validated = $request->validated();
        $prompt = Prompt::create($validated);
        return  $prompt;   
    }
    public function show(string $id)
    {
        return Prompt::findOrFail($id);
    }
    public function destroy(string $id)
    {
        $prompt = Prompt::findOrFail($id);
        $prompt->delete();
        return  $prompt; 
    }

}
