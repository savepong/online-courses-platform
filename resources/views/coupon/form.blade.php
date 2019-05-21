<div class="form-group row">
    <label for="code" class="col-sm-3 col-form-label">Code</label>
    <div class="col-sm-6">
        {!! Form::text('code', null, ['id' => 'code', 'class' => $errors->has('code') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'COUPONCODE']) !!}
        @if($errors->has('code'))
            <div class="invalid-feedback">{{ $errors->first('code') }}</div>
        @endif
    </div>
</div>


<div class="row">
    <div class="col-sm-3">
        <label for="discount" class="col-form-label">Discount</label>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::select('type', ['price' => 'Price', 'percent' => 'Percent'], $coupon->type ?: 'price', ['class' => 'form-control']); !!}
            @if($errors->has('type'))
                <div class="invalid-feedback">{{ $errors->first('type') }}</div>
            @endif
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::number('discount', null, ['class' => $errors->has('discount') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Amount']) !!}
            @if($errors->has('discount'))
                <div class="invalid-feedback">{{ $errors->first('discount') }}</div>
            @endif
        </div>
    </div>
</div>



<div class="form-group row">
    <label for="expire_date" class="col-sm-3 col-form-label">Expire Date</label>
    <div class="col-sm-6">
        {!! Form::date('expire_date', isset($coupon->expire_date) ? $coupon->expire_date : \Carbon\Carbon::now(), ['class' => $errors->has('expire_date') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Expire Date']) !!}
        @if($errors->has('expire_date'))
            <div class="invalid-feedback">{{ $errors->first('expire_date') }}</div>
        @endif
    </div>
</div>



<div class="form-group row">
    <div class="col-sm-8 offset-sm-3">
        <div class="media">
            <div class="media-left">
                <button type="submit" class="btn btn-success">{{ $coupon->exists ? 'Update' : 'Create' }}</button>
                <a href="{{ route('admin.coupons') }}" class="btn btn-default">Cancel</a>
                @if($coupon->exists)
                    <a href="#" class="btn btn-default text-danger" data-toggle="modal" data-target="#modalDeleteCoupon"><i class="fa fa-trash mr-1"></i> Delete</a>
                @endif
            </div>
        </div>
    </div>
</div>
