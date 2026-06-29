<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PitchTemplate;

class TemplateController extends Controller
{
    public function index()
    {
        $templates = PitchTemplate::all();
        return view('admin.templates.index', compact('templates'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'templates' => 'required|array',
            'templates.*.id' => 'required|exists:pitch_templates,id',
            'templates.*.subject' => 'required|string',
            'templates.*.body' => 'required|string',
        ]);

        foreach ($data['templates'] as $templateData) {
            PitchTemplate::where('id', $templateData['id'])->update([
                'subject' => $templateData['subject'],
                'body' => $templateData['body'],
            ]);
        }

        return redirect()->route('admin.templates.index')->with('success', 'Templates updated successfully!');
    }
}
