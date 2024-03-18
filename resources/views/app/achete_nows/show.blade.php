@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('achete-nows.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.achete_nows.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.achete_nows.inputs.nom_prenom')</h5>
                    <span>{{ $acheteNow->nom_prenom ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.achete_nows.inputs.telephone')</h5>
                    <span>{{ $acheteNow->telephone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.achete_nows.inputs.email')</h5>
                    <span>{{ $acheteNow->email ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.achete_nows.inputs.ou_recherchez_vous')</h5>
                    <span>{{ $acheteNow->ou_recherchez_vous ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.achete_nows.inputs.typelogement')</h5>
                    <span>{{ $acheteNow->typelogement ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.achete_nows.inputs.surface-recherch')</h5>
                    <span>{{ $acheteNow->surface-recherch ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.achete_nows.inputs.criter_appart')</h5>
                    <span>{{ $acheteNow->criter_appart ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.achete_nows.inputs.filtrag_annonce')</h5>
                    <span>{{ $acheteNow->filtrag_annonce ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.achete_nows.inputs.min_budget')</h5>
                    <span>{{ $acheteNow->min_budget ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.achete_nows.inputs.typelogement')</h5>
                    <span>{{ $acheteNow->typelogement ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.achete_nows.inputs.max_budget')</h5>
                    <span>{{ $acheteNow->max_budget ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.achete_nows.inputs.criter_appart')</h5>
                    <span>{{ $acheteNow->criter_appart ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.achete_nows.inputs.nbr_piece')</h5>
                    <span>{{ $acheteNow->nbr_piece ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.achete_nows.inputs.filtrag_annonce')</h5>
                    <span>{{ $acheteNow->filtrag_annonce ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.achete_nows.inputs.nbr_chambre')</h5>
                    <span>{{ $acheteNow->nbr_chambre ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.achete_nows.inputs.surface')</h5>
                    <span>{{ $acheteNow->surface ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('achete-nows.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\AcheteNow::class)
                <a
                    href="{{ route('achete-nows.create') }}"
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
