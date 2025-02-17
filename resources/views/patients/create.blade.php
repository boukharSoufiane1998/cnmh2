@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="p-2">
                <h3 class="h3">Ajouter un bénéficiaires</h3>

            </div>

            <div class="col-sm-12">
                @include('dossier_patients.stepper')
            </div>
        </div>
    </div>
</section>
@include('adminlte-templates::common.errors')
<div class="container-fluid ">
    <div class="d-flex justify-content-center">
        <div class="col-md-10  ">
            <div class="col-md-12  ">
                <div class="card card-primary card-create ">
                    <div class="card-header">
                        <h3 class="card-title"> @lang('crud.create')
                            @lang('models/patients.singular')
                        </h3>
                    </div>

                    <div class="card-body">

                        {!! Form::open(['route' => 'patients.store', 'enctype' => 'multipart/form-data']) !!}
                        <p class="required-field">@lang('crud.requiredFields')</p>
                        <div class="row">
                            @include('patients.fields')
                        </div>

                    </div>

                    <div class="card-footer">
                        <div class="d-flex bd-highlight mb-3">
                            <div class="p-2 bd-highlight">
                                {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
                            </div>

                            @if (request()->getRequestUri() == '/patients/create')
                            <div class="ml-auto p-2 bd-highlight">
                                <a href="{{ route('patients.index') }}" class="btn btn-secondary"> @lang('crud.cancel')
                                </a>
                            </div>
                            @else
                            <div class="ml-auto p-2 bd-highlight">
                                <a href="{{ url()->previous() }}" class="btn btn-secondary"> @lang('crud.cancel')
                                </a>
                            </div>
                            @endif


                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
@endsection

@push('page_scripts')
<script>
$(document).ready(function() {
    $('#remarques').summernote({
        height: 100,
    });
    $('.dropdown-toggle').dropdown();
});
</script>
@endpush