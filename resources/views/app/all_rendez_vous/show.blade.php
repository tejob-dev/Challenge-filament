@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('all-rendez-vous.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.all_rendez_vous.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.all_rendez_vous.inputs.nompre')</h5>
                    <span>{{ $rendezVous->nompre ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_rendez_vous.inputs.telephone')</h5>
                    <span>{{ $rendezVous->telephone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_rendez_vous.inputs.votr_email')</h5>
                    <span>{{ $rendezVous->votr_email ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_rendez_vous.inputs.rdv-date')</h5>
                    <span>{{ $rendezVous->rdv-date ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_rendez_vous.inputs.rdv-hour')</h5>
                    <span>{{ $rendezVous->rdv-hour ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('all-rendez-vous.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\RendezVous::class)
                <a
                    href="{{ route('all-rendez-vous.create') }}"
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
