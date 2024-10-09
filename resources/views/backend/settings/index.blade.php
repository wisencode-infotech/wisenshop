@extends('backend.layouts.master')

@section('title')
    Settings
@endsection

@section('content')
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
                                @foreach ($settings->where('setting_group_id', $setting_group_id) as $setting)
                                        <div class="form-group mb-3">
                                            <label for="{{ $setting->key }}"
                                                class="form-label">{{ ucwords(str_replace('_', ' ', $setting->key)) }}</label>

                                            <input type="color" name="settings[{{ $setting->key }}]"
                                                class="form-control rgb-input @error('settings.' . $setting->key) is-invalid @enderror"
                                                value="{{ $setting->value }}" placeholder="RGB (e.g., 70, 35, 35)" required>

                                            @error('settings.' . $setting->key)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                @endforeach
                            @else
                                @foreach ($settings->where('setting_group_id', $setting_group_id) as $setting)
                                        <div class="form-group mb-3">
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
                                            @else
                                                <input type="text" name="settings[{{ $setting->key }}]"
                                                    class="form-control @error('settings.' . $setting->key) is-invalid @enderror"
                                                    value="{{ $setting->value }}" required>
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
    <script type="text/javascript">
        $(document).ready(function() {
            // Attach event listener for input change
            $('.rgb-input').on('input', function() {
                let color = $(this).val();
        
                // If the value starts with a '#', convert hex to RGB
                if (color.startsWith('#')) {
                    let rgb = hexToRgb(color);
        
                    if (rgb) {
                        // Set the value to RGB format
                        $(this).val(`${rgb.r}, ${rgb.g}, ${rgb.b}`);
                    }
                }
            });
        
            // Function to convert hex to RGB
            function hexToRgb(hex) {
                // Expand shorthand form (e.g. "03F") to full form (e.g. "0033FF")
                let shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
                hex = hex.replace(shorthandRegex, function(m, r, g, b) {
                    return r + r + g + g + b + b;
                });
        
                // Convert hex to RGB
                let result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
                return result ? {
                    r: parseInt(result[1], 16),
                    g: parseInt(result[2], 16),
                    b: parseInt(result[3], 16)
                } : null;
            }
        });
    </script>
@endsection
