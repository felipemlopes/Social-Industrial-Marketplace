@extends('admin.app')

@section('content')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{url()}}/sa">Home</a>
            <i class="fa fa-circle"></i>  
        </li>
        <li>
            <a href="#">Settings</a>
            <i class="fa fa-circle"></i>  
        </li>
        <li>
            <span>Shipping Preferences</span>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>  Edit Shipping Preference </div>
            </div>

            <div class="portlet-body form">
                @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                </div>
                @endif
                <!-- BEGIN FORM-->
                {!! Form::model($shippingPreference, [
                'method' => 'PATCH',
                'route' => ['shipping-preferences.update', $shippingPreference->id],
                'class' => 'horizontal-form'
                ]) !!}
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('name', 'Name ', ['class' => 'control-label']) !!}
                                    <span class="required" aria-required="true"> * </span>
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Active</label><br/>
                                    @if($shippingPreference->is_active == 1)
                                        <input name="is_active" value="1" type="checkbox" checked class="make-switch form-control" data-size="small">
                                    @else
                                        <input name="is_active" value="1" type="checkbox" class="make-switch form-control" data-size="small">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions right">
                        <a href="{{ URL::to('shipping-preferences') }}" class="btn btn-circle btn-sm">
                            Cancel </a>
                        <button type="submit" class="btn btn-circle blue">
                            <i class="fa fa-check"></i>  Save</button>
                    </div>
                {!! Form::close() !!}
                <!-- END FORM-->
            </div>
        </div>
    </div>
</div>
<script>
</script>
@endsection
