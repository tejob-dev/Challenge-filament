@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.terrain_certifi.index_title')
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
                        @can('create', App\Models\TerrainCertif::class)
                        <a
                            href="{{ route('terrain-certifs.create') }}"
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
                                @lang('crud.terrain_certifi.inputs.nom_prenom')
                            </th>
                            <th class="text-left">
                                @lang('crud.terrain_certifi.inputs.telephone')
                            </th>
                            <th class="text-left">
                                @lang('crud.terrain_certifi.inputs.email')
                            </th>
                            <th class="text-left">
                                @lang('crud.terrain_certifi.inputs.commune')
                            </th>
                            <th class="text-left">
                                @lang('crud.terrain_certifi.inputs.info_spplement')
                            </th>
                            <th class="text-right">
                                @lang('crud.terrain_certifi.inputs.surface')
                            </th>
                            <th class="text-left">
                                @lang('crud.terrain_certifi.inputs.obj_achat')
                            </th>
                            <th class="text-right">
                                @lang('crud.terrain_certifi.inputs.min_budget')
                            </th>
                            <th class="text-left">
                                @lang('crud.terrain_certifi.inputs.moment_acquis')
                            </th>
                            <th class="text-right">
                                @lang('crud.terrain_certifi.inputs.max_budget')
                            </th>
                            <th class="text-left">
                                @lang('crud.terrain_certifi.inputs.config_terrain')
                            </th>
                            <th class="text-left">
                                @lang('crud.terrain_certifi.inputs.prec_config_terrain')
                            </th>
                            <th class="text-left">
                                @lang('crud.terrain_certifi.inputs.financement')
                            </th>
                            <th class="text-left">
                                @lang('crud.terrain_certifi.inputs.votre_poste')
                            </th>
                            <th class="text-left">
                                @lang('crud.terrain_certifi.inputs.partic_group')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($terrainCertifs as $terrainCertif)
                        <tr>
                            <td>{{ $terrainCertif->nom_prenom ?? '-' }}</td>
                            <td>{{ $terrainCertif->telephone ?? '-' }}</td>
                            <td>{{ $terrainCertif->email ?? '-' }}</td>
                            <td>{{ $terrainCertif->commune ?? '-' }}</td>
                            <td>{{ $terrainCertif->info_spplement ?? '-' }}</td>
                            <td>{{ $terrainCertif->surface ?? '-' }}</td>
                            <td>{{ $terrainCertif->obj_achat ?? '-' }}</td>
                            <td>{{ $terrainCertif->min_budget ?? '-' }}</td>
                            <td>{{ $terrainCertif->moment_acquis ?? '-' }}</td>
                            <td>{{ $terrainCertif->max_budget ?? '-' }}</td>
                            <td>{{ $terrainCertif->config_terrain ?? '-' }}</td>
                            <td>
                                {{ $terrainCertif->prec_config_terrain ?? '-' }}
                            </td>
                            <td>{{ $terrainCertif->financement ?? '-' }}</td>
                            <td>{{ $terrainCertif->votre_poste ?? '-' }}</td>
                            <td>{{ $terrainCertif->partic_group ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $terrainCertif)
                                    <a
                                        href="{{ route('terrain-certifs.edit', $terrainCertif) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $terrainCertif)
                                    <a
                                        href="{{ route('terrain-certifs.show', $terrainCertif) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $terrainCertif)
                                    <form
                                        action="{{ route('terrain-certifs.destroy', $terrainCertif) }}"
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
                                {!! $terrainCertifs->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
