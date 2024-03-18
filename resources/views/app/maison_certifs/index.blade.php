@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.maison_certifi.index_title')
                </h4>
            </div>

            <div class="searchbar mt-4 mb-5">
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="input-group">
                                <input
                                    id="indexSearch"
                                    type="text"
                                    name="search"
                                    placeholder="{{ __('crud.common.search') }}"
                                    value="{{ $search ?? '' }}"
                                    class="form-control"
                                    autocomplete="off"
                                />
                                <div class="input-group-append">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        <i class="icon ion-md-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 text-right">
                        @can('create', App\Models\MaisonCertif::class)
                        <a
                            href="{{ route('maison-certifs.create') }}"
                            class="btn btn-primary"
                        >
                            <i class="icon ion-md-add"></i>
                            @lang('crud.common.create')
                        </a>
                        @endcan
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.maison_certifi.inputs.nom_prenom')
                            </th>
                            <th class="text-left">
                                @lang('crud.maison_certifi.inputs.telephone')
                            </th>
                            <th class="text-left">
                                @lang('crud.maison_certifi.inputs.email')
                            </th>
                            <th class="text-left">
                                @lang('crud.maison_certifi.inputs.surface_habitable')
                            </th>
                            <th class="text-left">
                                @lang('crud.maison_certifi.inputs.commune')
                            </th>
                            <th class="text-left">
                                @lang('crud.maison_certifi.inputs.typelogement')
                            </th>
                            <th class="text-right">
                                @lang('crud.maison_certifi.inputs.nbr_chambre')
                            </th>
                            <th class="text-right">
                                @lang('crud.maison_certifi.inputs.nbr_salle')
                            </th>
                            <th class="text-left">
                                @lang('crud.maison_certifi.inputs.moment_acquis')
                            </th>
                            <th class="text-right">
                                @lang('crud.maison_certifi.inputs.budget')
                            </th>
                            <th class="text-left">
                                @lang('crud.maison_certifi.inputs.ma_preference')
                            </th>
                            <th class="text-right">
                                @lang('crud.maison_certifi.inputs.autre_budget')
                            </th>
                            <th class="text-left">
                                @lang('crud.maison_certifi.inputs.type_construction')
                            </th>
                            <th class="text-left">
                                @lang('crud.maison_certifi.inputs.type_emploi')
                            </th>
                            <th class="text-left">
                                @lang('crud.maison_certifi.inputs.proprietaire')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($maisonCertifs as $maisonCertif)
                        <tr>
                            <td>{{ $maisonCertif->nom_prenom ?? '-' }}</td>
                            <td>{{ $maisonCertif->telephone ?? '-' }}</td>
                            <td>{{ $maisonCertif->email ?? '-' }}</td>
                            <td>
                                {{ $maisonCertif->surface_habitable ?? '-' }}
                            </td>
                            <td>{{ $maisonCertif->commune ?? '-' }}</td>
                            <td>{{ $maisonCertif->typelogement ?? '-' }}</td>
                            <td>{{ $maisonCertif->nbr_chambre ?? '-' }}</td>
                            <td>{{ $maisonCertif->nbr_salle ?? '-' }}</td>
                            <td>{{ $maisonCertif->moment_acquis ?? '-' }}</td>
                            <td>{{ $maisonCertif->budget ?? '-' }}</td>
                            <td>{{ $maisonCertif->ma_preference ?? '-' }}</td>
                            <td>{{ $maisonCertif->autre_budget ?? '-' }}</td>
                            <td>
                                {{ $maisonCertif->type_construction ?? '-' }}
                            </td>
                            <td>{{ $maisonCertif->type_emploi ?? '-' }}</td>
                            <td>{{ $maisonCertif->proprietaire ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $maisonCertif)
                                    <a
                                        href="{{ route('maison-certifs.edit', $maisonCertif) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $maisonCertif)
                                    <a
                                        href="{{ route('maison-certifs.show', $maisonCertif) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $maisonCertif)
                                    <form
                                        action="{{ route('maison-certifs.destroy', $maisonCertif) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="16">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="16">
                                {!! $maisonCertifs->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
