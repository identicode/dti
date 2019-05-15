@extends('user.layout.app')

{{-- HTML Title --}}
@section('html-title')

@endsection

{{-- CSS VENDOR --}}
@section('css-top')

@endsection

{{-- Custom CSS Styling--}}
@section('css-bot')

@endsection

{{-- Page Title --}}
@section('page-title')
Profile
@endsection

{{-- Main Content --}}
@section('main-content')


<div class="row">
    <div class="col-lg-4">
	    <div class="ibox float-e-margins">
	        <div class="ibox-title">
	            <h5>Information</h5>
	        </div>
	        <div class="ibox-content">
                <form method="POST" action="/profile/info">
                    @csrf
                    <div class="form-group">
                        <label>Full Name</label>
                        <input required type="text" name="name" placeholder="Full Name" value="{{ Auth::user()->name }}" class="form-control">
                    </div>
                    
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary m-t-n-xs" type="submit"><strong>Save Changes</strong></button>
                    </div>
                </form>
	        </div>
	    </div>
	</div>

    <div class="col-lg-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Update Username</h5>
            </div>
            <div class="ibox-content">
                <form method="POST" action="/profile/username">
                    @csrf
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" placeholder="Username" value="{{ Auth::user()->username }}" class="form-control">
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary m-t-n-xs" type="submit"><strong>Save Changes</strong></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Update Password</h5>
            </div>
            <div class="ibox-content">
                <form method="POST" action="/profile/password">
                    @csrf
                    <div class="form-group">
                        <label>Old Password</label>
                        <input type="password" name="old" required placeholder="Old Password" value="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="pass" required placeholder="New Password" value="{{ old('pass') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="cpass" required placeholder="Confirm Password" value="{{ old('cpass') }}" class="form-control">
                    </div>

                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary m-t-n-xs" type="submit"><strong>Save Changes</strong></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
@endsection

{{-- JS VENDOR --}}
@section('js-top')
@endsection

{{-- Custom JS Script --}}
@section('js-bot')

@endsection
