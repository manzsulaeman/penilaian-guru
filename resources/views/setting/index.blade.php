@extends('layouts.app')

@section('content')
<div class="container">
    <h2>System Settings</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('settings.update') }}">
        @csrf
        <h4>Evaluation Period</h4>
        <div class="mb-3">
            <label for="period" class="form-label">Period</label>
            <input type="text" class="form-control" id="period" name="period" value="{{ optional($settings->where('parameter', 'period')->first())->value }}" required>
        </div>

        <h4>Evaluation Category</h4>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" class="form-control" id="category" name="category" value="{{ optional($settings->where('parameter', 'category')->first())->value }}" required>
        </div>

        <h4>Notification Settings</h4>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="notification_settings" name="notification_settings" value="1" {{ optional($settings->where('parameter', 'notification_settings')->first())->value ? 'checked' : '' }}>
            <label class="form-check-label" for="notification_settings">Enable Notifications</label>
        </div>

        <h4>Other Settings</h4>
        <div class="mb-3">
            <label for="other_settings" class="form-label">Other Settings</label>
            <textarea class="form-control" id="other_settings" name="other_settings">{{ optional($settings->where('parameter', 'other_settings')->first())->value }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save Settings</button>
    </form>
</div>
@endsection
