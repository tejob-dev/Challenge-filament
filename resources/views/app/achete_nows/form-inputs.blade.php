@php $editing = isset($acheteNow) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nom_prenom"
            label="Nom et penoms"
            :value="old('nom_prenom', ($editing ? $acheteNow->nom_prenom : ''))"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="telephone"
            label="Telephone"
            :value="old('telephone', ($editing ? $acheteNow->telephone : ''))"
            maxlength="255"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.email
            name="email"
            label="Email"
            :value="old('email', ($editing ? $acheteNow->email : ''))"
            maxlength="255"
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="ou_recherchez_vous"
            label="Ou recherchez vous"
            :value="old('ou_recherchez_vous', ($editing ? $acheteNow->ou_recherchez_vous : ''))"
            maxlength="255"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="typelogement"
            label="Type de logement"
            :value="old('typelogement', ($editing ? $acheteNow->typelogement : ''))"
            maxlength="255"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="surface-recherch"
            label="Surface recherchée"
            :value="old('surface-recherch', ($editing ? $acheteNow->surface-recherch : ''))"
            maxlength="255"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="criter_appart"
            label="Critere appartement"
            :value="old('criter_appart', ($editing ? $acheteNow->criter_appart : ''))"
            maxlength="255"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="filtrag_annonce"
            label="Filtrage annonce"
            :value="old('filtrag_annonce', ($editing ? $acheteNow->filtrag_annonce : ''))"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="min_budget"
            label="Min budget"
            :value="old('min_budget', ($editing ? $acheteNow->min_budget : ''))"
            max="255"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="typelogement" label="Type de logement">
            @php $selected = old('typelogement', ($editing ? $acheteNow->typelogement : '')) @endphp
            <option value="Appartement" {{ $selected == 'Appartement' ? 'selected' : '' }} >Appartement</option>
            <option value="Villa basse" {{ $selected == 'Villa basse' ? 'selected' : '' }} >Villa basse</option>
            <option value="Villa duplex" {{ $selected == 'Villa duplex' ? 'selected' : '' }} >Villa duplex</option>
            <option value="Villa triplex" {{ $selected == 'Villa triplex' ? 'selected' : '' }} >Villa triplex</option>
            <option value="Terrain" {{ $selected == 'Terrain' ? 'selected' : '' }} >Terrain</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="max_budget"
            label="Max budget"
            :value="old('max_budget', ($editing ? $acheteNow->max_budget : ''))"
            max="255"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="criter_appart" label="Critere de l appartement">
            @php $selected = old('criter_appart', ($editing ? $acheteNow->criter_appart : '')) @endphp
            <option value="Dernier etage" {{ $selected == 'Dernier etage' ? 'selected' : '' }} >Dernier etage</option>
            <option value="Rez-de-chaussee" {{ $selected == 'Rez-de-chaussee' ? 'selected' : '' }} >Rez-de-chaussee</option>
            <option value="Eviter le rez-de-chaussee" {{ $selected == 'Eviter le rez-de-chaussee' ? 'selected' : '' }} >Eviter le rez-de-chaussee</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="nbr_piece"
            label="Nbr de piece"
            :value="old('nbr_piece', ($editing ? $acheteNow->nbr_piece : ''))"
            max="255"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="filtrag_annonce" label="Filtrage annonce">
            @php $selected = old('filtrag_annonce', ($editing ? $acheteNow->filtrag_annonce : '')) @endphp
            <option value="Exclusivite" {{ $selected == 'Exclusivite' ? 'selected' : '' }} >Exclusivite</option>
            <option value="Avant-premiere" {{ $selected == 'Avant-premiere' ? 'selected' : '' }} >Avant-premiere</option>
            <option value="Avec photo" {{ $selected == 'Avec photo' ? 'selected' : '' }} >Avec photo</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="nbr_chambre"
            label="Nbr de chambre"
            :value="old('nbr_chambre', ($editing ? $acheteNow->nbr_chambre : ''))"
            max="255"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="surface"
            label="Surface"
            :value="old('surface', ($editing ? $acheteNow->surface : ''))"
            max="255"
        ></x-inputs.number>
    </x-inputs.group>

    @if($editing)
    <div class="form-group col-sm-12 mt-4">
        <h4>Assign @lang('crud.etat_achats.name')</h4>

        @foreach ($etatAchats as $etatAchat)
        <div>
            <x-inputs.checkbox
                id="etatAchat{{ $etatAchat->id }}"
                name="etatAchats[]"
                label="{{ ucfirst($etatAchat->libel) }}"
                value="{{ $etatAchat->id }}"
                :checked="isset($acheteNow) ? $acheteNow->etatAchats()->where('id', $etatAchat->id)->exists() : false"
                :add-hidden-value="false"
            ></x-inputs.checkbox>
        </div>
        @endforeach
    </div>
    @endif @if($editing)
    <div class="form-group col-sm-12 mt-4">
        <h4>Assign @lang('crud.surface_annexes.name')</h4>

        @foreach ($surfaceAnnexes as $surfaceAnnexe)
        <div>
            <x-inputs.checkbox
                id="surfaceAnnexe{{ $surfaceAnnexe->id }}"
                name="surfaceAnnexes[]"
                label="{{ ucfirst($surfaceAnnexe->libel) }}"
                value="{{ $surfaceAnnexe->id }}"
                :checked="isset($acheteNow) ? $acheteNow->surfaceAnnexes()->where('id', $surfaceAnnexe->id)->exists() : false"
                :add-hidden-value="false"
            ></x-inputs.checkbox>
        </div>
        @endforeach
    </div>
    @endif @if($editing)
    <div class="form-group col-sm-12 mt-4">
        <h4>Assign @lang('crud.exigence_particulieres.name')</h4>

        @foreach ($exigenceParticulieres as $exigenceParticuliere)
        <div>
            <x-inputs.checkbox
                id="exigenceParticuliere{{ $exigenceParticuliere->id }}"
                name="exigenceParticulieres[]"
                label="{{ ucfirst($exigenceParticuliere->libel) }}"
                value="{{ $exigenceParticuliere->id }}"
                :checked="isset($acheteNow) ? $acheteNow->exigenceParticulieres()->where('id', $exigenceParticuliere->id)->exists() : false"
                :add-hidden-value="false"
            ></x-inputs.checkbox>
        </div>
        @endforeach
    </div>
    @endif
</div>
