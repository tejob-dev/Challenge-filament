@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('certifications.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.certifications.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.certifications.inputs.nom_prenom')</h5>
                    <span>{{ $certification->nom_prenom ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.certifications.inputs.adresse')</h5>
                    <span>{{ $certification->adresse ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.certifications.inputs.email')</h5>
                    <span>{{ $certification->email ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.certifications.inputs.contact')</h5>
                    <span>{{ $certification->contact ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.certifications.inputs.typebien')</h5>
                    <span>{{ $certification->typebien ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('certifications.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Certification::class)
                <a
                    href="{{ route('certifications.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
