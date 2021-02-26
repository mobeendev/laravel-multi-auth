@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="role_id" class="col-md-4 col-form-label text-md-right">Select Role</label>

                            <div class="col-md-6">
                                 <select name="role_id" id="role_id" class="form-control" >
                                    <option value="-1"selected="selected">--Select Your Role--</option>
                                    <option value="2">User</option>
                                    <option value="3">Manager</option>
                                </select> 
                                @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $role_id }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row" id="job_field">
                            <label for="job-title" class="col-md-4 col-form-label text-md-right">Job Title</label>

                            <div class="col-md-6">
                                <input id="job_title" type="text" class="form-control" name="job_title">
                            </div>

                        </div>

                        <div class="form-group row" id="contact_field">
                            <label for="" class="col-md-4 col-form-label text-md-right">Contact</label>

                            <div class="col-md-6">
                                <input id="contact" type="text" class="form-control" name="contact">
                            </div>
                        </div>


                         <div class="form-group row" id="address_field">
                            <label for="" class="col-md-4 col-form-label text-md-right">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address">
                            </div>
                        </div>

                      

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
$('#job_field').hide();
$('#contact_field').hide();
$('#address_field').hide();          

        $("#role_id").change(function() {
          if ($(this).val() == "-1") {
            $('#job_field').hide();
            $('#contact_field').hide();
            $('#address_field').hide();          
          }else if ($(this).val() == "2") {
            $('#job_field').show();
            $('#contact_field').hide();
            $('#address_field').hide();
          }else if($(this).val() == "3") {
            $('#contact_field').show();
            $('#address_field').show();
            $('#job_field').hide();
          }
    });

});

</script>

@endsection
