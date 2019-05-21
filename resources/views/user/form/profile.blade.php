<div class="form-group row">
    <label for="name" class="col-sm-3 col-form-label">Full Name</label>
    <div class="col-sm-6">
        {!! Form::text('name', null, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Full Name']) !!}
        @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
        @endif
    </div>
</div>


<div class="form-group row">
    <label for="username" class="col-sm-3 col-form-label">Username</label>
    <div class="col-sm-6">
        {!! Form::text('username', null, ['class' => $errors->has('username') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Username']) !!}
        @if($errors->has('username'))
            <div class="invalid-feedback">{{ $errors->first('username') }}</div>
        @endif
    </div>
</div>


<div class="form-group row">
    <label for="avatar" class="col-sm-3 col-form-label">Avatar</label>
    <div class="col-sm-9">
        <img class="rounded " src="{{ $user->avatar_url }}" alt="" height="100">
        {!! Form::file('image', null, ['class' => 'form-control-file']) !!}
    </div>
</div>


<div class="form-group row">
    <label for="email" class="col-sm-3 col-form-label">Email</label>
    <div class="col-sm-6 col-md-6">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">
                <i class="material-icons md-18 text-muted">mail</i>
            </span>
            {!! Form::text('email', null, ['class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Email Address']) !!}
            @if($errors->has('email'))
                <br><div class="invalid-feedback">{{ $errors->first('email') }}</div>
            @endif
        </div>
    </div>
</div>


<div class="form-group row">
    <label for="phone_number" class="col-sm-3 col-form-label">Phone number</label>
    <div class="col-sm-6 col-md-6">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">
                <i class="material-icons md-18 text-muted">phone_iphone</i>
            </span>
            {!! Form::text('phone_number', null, ['class' => $errors->has('phone_number') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Phone number']) !!}
            @if($errors->has('phone_number'))
                <br><div class="invalid-feedback">{{ $errors->first('phone_number') }}</div>
            @endif
        </div>
    </div>
</div>


<div class="form-group row">
    <label for="facebook" class="col-sm-3 col-form-label">Facebook</label>
    <div class="col-sm-6 col-md-6">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">
                <div class="fa fa-facebook"></div> 
            </span>
            {!! Form::text('facebook', null, ['class' => $errors->has('facebook') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Facebook']) !!}
            @if($errors->has('facebook'))
                <br><div class="invalid-feedback">{{ $errors->first('facebook') }}</div>
            @endif
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="line_id" class="col-sm-3 col-form-label">Line ID</label>
    <div class="col-sm-6 col-md-6">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">
                <div class="fa fa-comment"></div>
            </span>
            {!! Form::text('line_id', null, ['class' => $errors->has('line_id') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Line ID']) !!}
            @if($errors->has('line_id'))
                <br><div class="invalid-feedback">{{ $errors->first('line_id') }}</div>
            @endif
        </div>
    </div>
</div>


<div class="form-group row">
    <label for="bio" class="col-sm-3 col-form-label">Bio</label>
    <div class="col-sm-6 col-md-6">
        {!! Form::textarea('bio', null, ['class' => $errors->has('bio') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Bio','rows' => '4']) !!}
        @if($errors->has('bio'))
            <br><div class="invalid-feedback">{{ $errors->first('bio') }}</div>
        @endif
    </div>
</div>


@empty($hideRoleDropdown)
<div class="form-group row">
    <label for="role" class="col-sm-3 col-form-label">Role</label>
    <div class="col-sm-6">
        @if($user->exists && $user->id == config('cms.default_user_id') )
            <p class="form-control-paintext">{{ $user->roles->first()->display_name }}</p>
        @else
            {!! Form::select('role', App\Role::pluck('name', 'id'), $user->exists ? $user->roles->first()->id : null, ['class' => $errors->has('role') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Choose a role']) !!}
        @endif    
        
        @if($errors->has('role'))
            <div class="invalid-feedback">{{ $errors->first('role') }}</div>
        @endif
    </div>
</div>
@endempty

