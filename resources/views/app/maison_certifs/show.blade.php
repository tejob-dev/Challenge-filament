@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('maison-certifs.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.maison_certifi.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.maison_certifi.inputs.nom_prenom')</h5>
                    <span>{{ $maisonCertif->nom_prenom ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.maison_certifi.inputs.telephone')</h5>
                    <span>{{ $maisonCertif->telephone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.maison_certifi.inputs.email')</h5>
                    <span>{{ $maisonCertif->email ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.maison_certifi.inputs.surface_habitable')
                    </h5>
                    <span>{{ $maisonCertif->surface_habitable ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.maison_certifi.inputs.commune')</h5>
                    <span>{{ $maisonCertif->commune ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.maison_certifi.inputs.typelogement')</h5>
                    <span>{{ $maisonCertif->typelogement ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.maison_certifi.inputs.nbr_chambre')</h5>
                    <span>{{ $maisonCertif->nbr_chambre ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.maison_certifi.inputs.nbr_salle')</h5>
                    <span>{{ $maisonCertif->nbr_salle ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.maison_certifi.inputs.moment_acquis')</h5>
                    <span>{{ $maisonCertif->moment_acquis ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.maison_certifi.inputs.budget')</h5>
                    <span>{{ $maisonCertif->budget ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.maison_certifi.inputs.ma_preference')</h5>
                    <span>{{ $maisonCertif->ma_preference ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.maison_certifi.inputs.autre_budget')</h5>
                    <span>{{ $maisonCertif->autre_budget ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.maison_certifi.inputs.type_construction')
                    </h5>
                    <span>{{ $maisonCertif->type_construction ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.maison_certifi.inputs.type_emploi')</h5>
                    <span>{{ $maisonCertif->type_emploi ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.maison_certifi.inputs.proprietaire')</h5>
                    <span>{{ $maisonCertif->proprietaire ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('maison-certifs.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\MaisonCertif::class)
                <a
                    href="{{ route('maison-certifs.create') }}"
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
