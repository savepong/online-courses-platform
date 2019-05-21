<label>Payment method</label>
<ul class="list-group">
    <li class="list-group-item">
        <div class="media">
            <div class="d-flex mr-3 align-self-center">
                {!! Form::radio('method', 'ธนาคารกสิกรไทย (730-2-06980-4)', true) !!}
            </div>
            <img class="d-flex mr-3 align-self-center" height="34" src="https://ranleklek.seeddemos.com/wp-content/plugins/seed-confirm-pro/img/kbank.png" alt="KBank">
            <div class="media-body">
                <strong class="mt-0">ธนาคารกสิกรไทย สาขาเซ็นทรัลลาดพร้าว</strong>
                <p>730-2-06980-4 (บริษัท วีคอมเมิร์ซคลิก จำกัด)</p>
            </div>
        </div>
    </li>
</ul>
@if($errors->has('method'))
    <div class="small form-text text-danger">{{ $errors->first('amount') }}</div>
@endif



<br>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="paymentAmount" class="form-control-label">Amount</label>
            @if(isset($order))
                {!! Form::text('amount', $order->net_price, ['id' => 'paymentAmount', 'class' => $errors->has('amount') ? 'form-control is-invalid' : 'form-control', 'data-toggle' => 'touch-spin', 'data-min' => '0', 'data-max' => '999999999', 'data-step' => '100', 'placeholder' => $order->net_price]) !!}
            @else
                {!! Form::text('amount', $net_price, ['id' => 'paymentAmount', 'class' => $errors->has('amount') ? 'form-control is-invalid' : 'form-control', 'data-toggle' => 'touch-spin', 'data-min' => '0', 'data-max' => '999999999', 'data-step' => '100', 'placeholder' => $net_price]) !!}
            @endif
            @if($errors->has('amount'))
                <div class="small form-text text-danger">{{ $errors->first('amount') }}</div>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="paymentDate" class="form-control-label">Date</label>
            {!! Form::text('date', date('Y-m-d'), ['id' => 'paymentDate', 'class' => $errors->has('date') ? 'datepicker form-control is-invalid' : 'datepicker form-control', 'placeholder' => date('Y-m-d')]) !!}
            @if($errors->has('date'))
                <div class="invalid-feedback">{{ $errors->first('date') }}</div>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="paymentTime" class="form-control-label">Time</label>
            {!! Form::time('time', date('H:i'), ['id' => 'paymentTime', 'class' => $errors->has('time') ? 'form-control is-invalid' : 'form-control']) !!}
            @if($errors->has('time'))
                <div class="invalid-feedback">{{ $errors->first('time') }}</div>
            @endif
        </div>
    </div>
</div>


<br>
<label for="" class="form-control-label">Upload Receipt</label>
<br>
<div class="card ">
    <div class="card-body">
        <div class="fileinput fileinput-new text-center d-block" data-provides="fileinput">
            <div class="fileinput-preview fileinput-exists thumbnail " style="width: 100%;max-height: 340px;"></div>

            <span class="btn btn-default btn-file">
                <span class="fileinput-new">Select image</span>
                <span class="fileinput-exists">Change</span>
                {!! Form::file('receipt') !!}
            </span>
            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
            
            @if($errors->has('receipt'))
                <div class="small form-text text-danger">{{ $errors->first('receipt') }}</div>
            @endif
        </div>
    </div>
</div>