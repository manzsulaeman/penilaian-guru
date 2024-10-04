<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SystemSetting;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = SystemSetting::all();
        return view('settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'period' => 'required|string',
            'category' => 'required|string',
            'notification_settings' => 'required|boolean',
            'other_settings' => 'nullable|string',
        ]);

        foreach ($request->all() as $key => $value) {
            SystemSetting::updateOrCreate(
                ['parameter' => $key],
                ['value' => $value]
            );
        }

        return redirect()->route('settings.index')->with('success', 'Settings updated successfully.');
    }
}
