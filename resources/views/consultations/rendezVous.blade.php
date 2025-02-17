@extends('layouts.app')

@section('content')
<section class="content-header">


    <div class="container-fluid">

    </div>
</section>


<section class="content">
    <div class="container-fluid ">
        @include('flash::message')

        <div class="clearfix"></div>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Consultation médecin générale</h1>
                    </div>

                </div>
            </div>
        </section>


        <div class="row">

            <div class="col-md-12">
                <div class="card card-default">

                    <div class="steps">
                        <div class="md-stepper-horizontal orange">
                            <div class="md-step active done">
                                <div class="md-step-circle"><span>1</span></div>
                                <div class="md-step-title">Rendez-Vous</div>
                                <div class="md-step-bar-left"></div>
                                <div class="md-step-bar-right"></div>
                            </div>
                            <div class="md-step  done">
                                <div class="md-step-circle"><span>2</span></div>
                                <div class="md-step-title">Patient</div>
                                <div class="md-step-bar-left"></div>
                                <div class="md-step-bar-right"></div>
                            </div>
                            <div class="md-step ">
                                <div class="md-step-circle"><span>3</span></div>
                                <div class="md-step-title">Consultation</div>
                                <div class="md-step-bar-left"></div>
                                <div class="md-step-bar-right"></div>
                            </div>

                        </div>
                    </div>


                    <br>

                    <div class="card-body p-0">
                        <div class="table-responsive">

                            <form action="{{ route('consultations.patient', request()->model) }}" method="GET">

                                <table class="table table-striped" id="tuteurs-table">
                                    <thead>
                                        <tr>

                                            <th></th>
                                            <th>N°d'Ordre</th>
                                            <th>N°Dossier</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Téléphone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($dossier_patients as $dossier_patient)
                                        <tr>
                                            <td>

                                                <input required type="radio"
                                                    value="{{ $dossier_patient->dossier_patient_id }}"
                                                    name="dossier_patients"
                                                    aria-label="Radio button for following text input">
                                            </td>
                                            <input type="hidden" name="consultation_id"
                                                value="{{$dossier_patient->consultation_id}} ">
                                            <td>{{ $dossier_patient->id }}</td>
                                            <td>{{ $dossier_patient->numero_dossier }}</td>
                                            <td>{{ $dossier_patient->nom }}</td>
                                            <td>{{ $dossier_patient->prenom }}</td>
                                            <td>{{ $dossier_patient->telephone }}</td>
                                            <td>
                                                <div class='btn-group'>
                                                    @can('destroy-RendezVous')
                                                    {!! Form::button('Reporter', ['type' =>
                                                    'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return
                                                    confirm('Are you sure?')"]) !!}
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>


                        </div>
                        <div class="ml-4 mb-3">
                            <a href="{{ route('consultations.index', request()->model) }} "
                                class="btn btn-primary">@lang('crud.previous')</a>
                            {{-- <div name="rendezVous" value="false" class="btn btn-primary">Ajouter sans RendezVous</div> --}}
                            <button class="btn btn-primary">@lang('crud.next')</button>
                        </div>
                        </form>
                        <div class="card-footer clearfix">
                            <div class="float-left">
                                @include('adminlte-templates::common.paginate', [
                                'records' => $dossier_patients,
                                ])
                            </div>

                        </div>
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->

            </div>
        </div>
        <!-- /.card -->



    </div>
</section>
@endsection