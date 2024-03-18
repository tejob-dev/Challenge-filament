@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.achete_nows.index_title')
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
                        @can('create', App\Models\AcheteNow::class)
                        <a
                            href="{{ route('achete-nows.create') }}"
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
                                @lang('crud.achete_nows.inputs.nom_prenom')
                            </th>
                            <th class="text-left">
                                @lang('crud.achete_nows.inputs.telephone')
                            </th>
                            <th class="text-left">
                                @lang('crud.achete_nows.inputs.email')
                            </th>
                            <th class="text-left">
                                @lang('crud.achete_nows.inputs.ou_recherchez_vous')
                            </th>
                            <th class="text-left">
                                @lang('crud.achete_nows.inputs.typelogement')
                            </th>
                            <th class="text-left">
                                @lang('crud.achete_nows.inputs.surface-recherch')
                            </th>
                            <th class="text-left">
                                @lang('crud.achete_nows.inputs.criter_appart')
                            </th>
                            <th class="text-left">
                                @lang('crud.achete_nows.inputs.filtrag_annonce')
                            </th>
                            <th class="text-right">
                                @lang('crud.achete_nows.inputs.min_budget')
                            </th>
                            <th class="text-left">
                                @lang('crud.achete_nows.inputs.typelogement')
                            </th>
                            <th class="text-right">
                                @lang('crud.achete_nows.inputs.max_budget')
                            </th>
                            <th class="text-left">
                                @lang('crud.achete_nows.inputs.criter_appart')
                            </th>
                            <th class="text-right">
                                @lang('crud.achete_nows.inputs.nbr_piece')
                            </th>
                            <th class="text-left">
                                @lang('crud.achete_nows.inputs.filtrag_annonce')
                            </th>
                            <th class="text-right">
                                @lang('crud.achete_nows.inputs.nbr_chambre')
                            </th>
                            <th class="text-right">
                                @lang('crud.achete_nows.inputs.surface')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($acheteNows as $acheteNow)
                        <tr>
                            <td>{{ $acheteNow->nom_prenom ?? '-' }}</td>
                            <td>{{ $acheteNow->telephone ?? '-' }}</td>
                            <td>{{ $acheteNow->email ?? '-' }}</td>
                            <td>{{ $acheteNow->ou_recherchez_vous ?? '-' }}</td>
                            <td>{{ $acheteNow->typelogement ?? '-' }}</td>
                            <td>{{ $acheteNow->surface-recherch ?? '-' }}</td>
                            <td>{{ $acheteNow->criter_appart ?? '-' }}</td>
                            <td>{{ $acheteNow->filtrag_annonce ?? '-' }}</td>
                            <td>{{ $acheteNow->min_budget ?? '-' }}</td>
                            <td>{{ $acheteNow->typelogement ?? '-' }}</td>
                            <td>{{ $acheteNow->max_budget ?? '-' }}</td>
                            <td>{{ $acheteNow->criter_appart ?? '-' }}</td>
                            <td>{{ $acheteNow->nbr_piece ?? '-' }}</td>
                            <td>{{ $acheteNow->filtrag_annonce ?? '-' }}</td>
                            <td>{{ $acheteNow->nbr_chambre ?? '-' }}</td>
                            <td>{{ $acheteNow->surface ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $acheteNow)
                                    <a
                                        href="{{ route('achete-nows.edit', $acheteNow) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $acheteNow)
                                    <a
                                        href="{{ route('achete-nows.show', $acheteNow) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $acheteNow)
                                    <form
                                        action="{{ route('achete-nows.destroy', $acheteNow) }}"
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
                            <td colspan="17">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="17">{!! $acheteNows->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
