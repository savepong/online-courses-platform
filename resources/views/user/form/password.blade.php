<div class="form-group row">
    <label for="password" class="col-sm-3 col-form-label">Password</label>
    <div class="col-sm-6 col-md-6">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">
                <i class="material-icons md-18 text-muted">lock</i>
            </span>
            {!! Form::password('password', ['class' => $errors->has('password') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Enter new password']) !!}
            @if($errors->has('password'))
                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
            @endif
        </div>
        
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-sm-3 col-form-label">Confirm Password</label>
    <div class="col-sm-6 col-md-6">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">
                <i class="material-icons md-18 text-muted">lock</i>
            </span>
            {!! Form::password('password_confirmation', ['class' => $errors->has('password_confirmation') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Enter new password again']) !!}
            @if($errors->has('password_confirmation'))
                <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
            @endif
        </div>
    </div>
</div>
