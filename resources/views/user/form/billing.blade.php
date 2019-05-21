<div class="form-group row">
    <label for="billing_to" class="col-sm-3 col-form-label">Billing To</label>
    <div class="col-sm-6">
        {!! Form::text('billing_to', null, ['class' => $errors->has('billing_to') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Name on Invoice']) !!}
        @if($errors->has('billing_to'))
            <div class="invalid-feedback">{{ $errors->first('billing_to') }}</div>
        @endif
    </div>
</div>


<div class="form-group row">
    <label for="billing_address" class="col-sm-3 col-form-label">Address</label>
    <div class="col-sm-6">
        {!! Form::textarea('billing_address', null, ['class' => $errors->has('billing_address') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Address', 'rows' => '3']) !!}
        @if($errors->has('billing_address'))
            <div class="invalid-feedback">{{ $errors->first('billing_address') }}</div>
        @endif
    </div>
</div>


<div class="form-group row">
    <label for="billing_country" class="col-sm-3 col-form-label">Country</label>
    <div class="col-sm-6">
        {!! Form::select('billing_country', ['Thailand' => 'Thailand'], 'Thailand', ['class' => 'form-control']); !!}
        @if($errors->has('billing_country'))
            <div class="invalid-feedback">{{ $errors->first('billing_country') }}</div>
        @endif
    </div>
</div>

