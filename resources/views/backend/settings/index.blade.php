@extends('backend.layouts.master')

@section('title')
    Settings
@endsection


@section('content')

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">{{ __('Site Settings') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('backend.settings.update') }}" enctype="multipart/form-data">
                        @csrf

                        @foreach ($setting_groups as $setting_group_id => $setting_group_title)

                        <h2 class="mt-5 mb-3">{{ Str::of($setting_group_title)->replace('-', ' ')->title() }}</h2>

                            @if ($setting_group_title === 'logos')
                                @foreach ($settings->where('setting_group_id', $setting_group_id) as $setting)
                                        <div class="form-group mb-3">
                                            <label for="{{ $setting->key }}"
                                                class="form-label">{{ ucwords(str_replace('_', ' ', $setting->key)) }}</label>

                                            <input type="file" name="settings[{{ $setting->key }}]"
                                                    class="form-control @error('settings.' . $setting->key) is-invalid @enderror"
                                                    accept="image/*">

                                            @if ($setting->value)
                                                <img src="{{ asset($setting->value) }}" alt="Header Logo"
                                                    style="max-width: 200px; margin-top: 10px;">
                                            @endif
                                            
                                            @error('settings.' . $setting->key)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                @endforeach
                            @elseif ($setting_group_title === 'site-colors')
                                <h4 class="mt-4">Colors</h4>
                                <div class="row">
                                    @foreach ($settings->where('setting_group_id', $setting_group_id) as $index => $setting)
                                        <div class="col-md-2 mb-3">
                                            <label for="{{ $setting->key }}" class="form-label">{{ ucwords(str_replace('_', ' ', $setting->key)) }}</label>

                                            <input type="color" name="settings[{{ $setting->key }}]"
                                                class="form-control rgb-input @error('settings.' . $setting->key) is-invalid @enderror"
                                                value="{{ $setting->value }}" required>

                                            <!-- Hidden input to store the RGB value -->
                                            <!-- <input type="hidden" id="{{ $setting->key }}_rgb" name="settings[{{ $setting->key }}_rgb]">     -->

                                            @error('settings.' . $setting->key)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                @foreach ($settings->where('setting_group_id', $setting_group_id) as $setting)
                                        <div class="form-group mb-3">
                                            @if (in_array($setting->key, ['activate_currencies_module', 'activate_multilangual_module']))
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="{{ $setting->key }}" name="settings[{{ $setting->key }}]" @if ($setting->value == '1') ? checked @endif>
                                                    <label for="{{ $setting->key }}"
                                                        class="form-label">{{ ucwords(str_replace('_', ' ', $setting->key)) }}</label>
                                                </div>
                                            @else
                                                <label for="{{ $setting->key }}"
                                                    class="form-label">{{ ucwords(str_replace('_', ' ', $setting->key)) }}</label>

                                                @if ($setting->key === 'site_currency')
                                                    <select name="settings[{{ $setting->key }}]"
                                                        class="form-select  @error('settings.' . $setting->key) is-invalid @enderror"
                                                        required>
                                                        @foreach ($currencies as $currency)
                                                            <option value="{{ $currency->code }}"
                                                                {{ $setting->value == $currency->code ? 'selected' : '' }}>
                                                                {{ $currency->name }} ({{ $currency->symbol }})
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @elseif ($setting->key === 'site_locale')
                                                    <select name="settings[{{ $setting->key }}]"
                                                        class="form-select  @error('settings.' . $setting->key) is-invalid @enderror"
                                                        required>
                                                        @foreach ($languages as $language)
                                                            <option value="{{ $language->code }}"
                                                                {{ $setting->value == $language->code ? 'selected' : '' }}>
                                                                {{ $language->name }} ({{ strtoupper($language->code) }})
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @elseif ($setting->key === 'site_theme')
                                                    <select name="settings[{{ $setting->key }}]"
                                                        class="form-select  @error('settings.' . $setting->key) is-invalid @enderror"
                                                        required>
                                                        @foreach ($site_themes as $site_theme)
                                                            <option value="{{ $site_theme->identifier }}"
                                                                {{ $setting->value == $site_theme->identifier ? 'selected' : '' }}>
                                                                {{ $site_theme->name }} {{ (!empty($site_theme->description)) ? ' [' . $site_theme->description . ']' : strtoupper($site_theme->identifier) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <input type="text" name="settings[{{ $setting->key }}]"
                                                        class="form-control @error('settings.' . $setting->key) is-invalid @enderror"
                                                        value="{{ $setting->value }}" required>
                                                @endif

                                            @endif

                                            @error('settings.' . $setting->key)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                @endforeach
                            @endif

                        @endforeach

                        <div class="form-group text-end">
                            <button type="submit" class="btn btn-primary btn-rounded">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
