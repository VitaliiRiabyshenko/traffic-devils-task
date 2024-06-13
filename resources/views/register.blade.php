@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="row mb-3">
            <label for="name"
                class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text"
                    class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="email"
                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email"
                    class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password"
                class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password"
                    class="form-control @error('password') is-invalid @enderror" name="password"
                    required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="role_id"
                class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>

            <div class="col-md-6">
                <select name="role_id" class="form-select @error('role_id') is-invalid @enderror" aria-label="Default select example">
                    <option disabled value="">Select role</option>
                    @if ($roles)
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ (old("role_id") == $role->id ? "selected":"") }}>{{ $role->name }}</option>
                        @endforeach
                    @endif
                </select>
                @error('role_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>

        <div class="row mb-3">
            <label for="team_lead_id"
                class="col-md-4 col-form-label text-md-end">{{ __('Team Lead') }}</label>
            <div class="col-md-6">
                <select name="team_lead_id" class="form-select @error('team_lead_id') is-invalid @enderror" aria-label="Default select example">
                    <option value="">Select team lead</option>
                    @if ($teamLeads)
                        @foreach ($teamLeads as $teamLead)
                            <option value="{{ $teamLead->id }}" {{ (old("team_lead_id") == $teamLead->id ? "selected":"") }}>{{ $teamLead->name }}</option>
                        @endforeach
                    @endif
                </select>
                @error('team_lead_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
@endsection