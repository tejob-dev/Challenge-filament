@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('terrain-certifs.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.terrain_certifi.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.terrain_certifi.inputs.nom_prenom')</h5>
                    <span>{{ $terrainCertif->nom_prenom ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.terrain_certifi.inputs.telephone')</h5>
                    <span>{{ $terrainCertif->telephone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.terrain_certifi.inputs.email')</h5>
                    <span>{{ $terrainCertif->email ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.terrain_certifi.inputs.commune')</h5>
                    <span>{{ $terrainCertif->commune ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.terrain_certifi.inputs.info_spplement')</h5>
                    <span>{{ $terrainCertif->info_spplement ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.terrain_certifi.inputs.surface')</h5>
                    <span>{{ $terrainCertif->surface ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.terrain_certifi.inputs.obj_achat')</h5>
                    <span>{{ $terrainCertif->obj_achat ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.terrain_certifi.inputs.min_budget')</h5>
                    <span>{{ $terrainCertif->min_budget ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.terrain_certifi.inputs.moment_acquis')</h5>
                    <span>{{ $terrainCertif->moment_acquis ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.terrain_certifi.inputs.max_budget')</h5>
                    <span>{{ $terrainCertif->max_budget ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.terrain_certifi.inputs.config_terrain')</h5>
                    <span>{{ $terrainCertif->config_terrain ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.terrain_certifi.inputs.prec_config_terrain')
                    </h5>
                    <span
                        >{{ $terrainCertif->prec_config_terrain ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.terrain_certifi.inputs.financement')</h5>
                    <span>{{ $terrainCertif->financement ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.terrain_certifi.inputs.votre_poste')</h5>
                    <span>{{ $terrainCertif->votre_poste ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.terrain_certifi.inputs.partic_group')</h5>
                    <span>{{ $terrainCertif->partic_group ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('terrain-certifs.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\TerrainCertif::class)
                <a
                    href="{{ route('terrain-certifs.create') }}"
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
