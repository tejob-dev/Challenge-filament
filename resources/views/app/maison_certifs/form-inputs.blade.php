@php $editing = isset($maisonCertif) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nom_prenom"
            label="Nom et Prenoms"
            :value="old('nom_prenom', ($editing ? $maisonCertif->nom_prenom : ''))"
            maxlength="255"
            :required="!$editing"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="telephone"
            label="Telephone"
            :value="old('telephone', ($editing ? $maisonCertif->telephone : ''))"
            maxlength="255"
            :required="!$editing"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.email
            name="email"
            label="Email"
            :value="old('email', ($editing ? $maisonCertif->email : ''))"
            maxlength="255"
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="surface_habitable"
            label="Surface habitable"
            :value="old('surface_habitable', ($editing ? $maisonCertif->surface_habitable : ''))"
            maxlength="255"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="commune"
            label="Votre commune"
            :value="old('commune', ($editing ? $maisonCertif->commune : ''))"
            maxlength="255"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="typelogement" label="Type de logement">
            @php $selected = old('typelogement', ($editing ? $maisonCertif->typelogement : '')) @endphp
            <option value="Un appartement" {{ $selected == 'Un appartement' ? 'selected' : '' }} >Un appartement</option>
            <option value="Villa basse" {{ $selected == 'Villa basse' ? 'selected' : '' }} >Villa basse</option>
            <option value="Villa duplex" {{ $selected == 'Villa duplex' ? 'selected' : '' }} >Villa duplex</option>
            <option value="Villa triplex" {{ $selected == 'Villa triplex' ? 'selected' : '' }} >Villa triplex</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="nbr_chambre"
            label="Nbr de chambre"
            :value="old('nbr_chambre', ($editing ? $maisonCertif->nbr_chambre : ''))"
            max="255"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="nbr_salle"
            label="Nbr de salle de bain"
            :value="old('nbr_salle', ($editing ? $maisonCertif->nbr_salle : ''))"
            max="255"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="moment_acquis" label="Moment d acquisition">
            @php $selected = old('moment_acquis', ($editing ? $maisonCertif->moment_acquis : '')) @endphp
            <option value="Maintenant" {{ $selected == 'Maintenant' ? 'selected' : '' }} >Maintenant</option>
            <option value="Challenge Express (1an)" {{ $selected == 'Challenge Express (1an)' ? 'selected' : '' }} >Challenge Express (1an)</option>
            <option value="Challenge Progressif (2ans)" {{ $selected == 'Challenge Progressif (2ans)' ? 'selected' : '' }} >Challenge Progressif (2ans)</option>
            <option value="Challenge Stabilité (3ans)" {{ $selected == 'Challenge Stabilité (3ans)' ? 'selected' : '' }} >Challenge Stabilité (3ans)</option>
            <option value="Challenge Planifié (4ans)" {{ $selected == 'Challenge Planifié (4ans)' ? 'selected' : '' }} >Challenge Planifié (4ans)</option>
            <option value="Challenge Visionnaire (5ans)" {{ $selected == 'Challenge Visionnaire (5ans)' ? 'selected' : '' }} >Challenge Visionnaire (5ans)</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="budget"
            label="Votre budget"
            :value="old('budget', ($editing ? $maisonCertif->budget : ''))"
            max="255"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="ma_preference" label="Ma preference">
            @php $selected = old('ma_preference', ($editing ? $maisonCertif->ma_preference : '')) @endphp
            <option value="Un logement hors promotion immobilière" {{ $selected == 'Un logement hors promotion immobilière' ? 'selected' : '' }} >Un logement hors promotion immobilière</option>
            <option value="Un logement dans une promotion immobilière" {{ $selected == 'Un logement dans une promotion immobilière' ? 'selected' : '' }} >Un logement dans une promotion immobilière</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="autre_budget"
            label="Autre budget"
            :value="old('autre_budget', ($editing ? $maisonCertif->autre_budget : ''))"
            max="255"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="type_construction" label="Type de construction">
            @php $selected = old('type_construction', ($editing ? $maisonCertif->type_construction : '')) @endphp
            <option value="logement à construire" {{ $selected == 'logement à construire' ? 'selected' : '' }} >logement à construire</option>
            <option value="logement prête à habiter" {{ $selected == 'logement prête à habiter' ? 'selected' : '' }} >logement prête à habiter</option>
            <option value="logement à renover" {{ $selected == 'logement à renover' ? 'selected' : '' }} >logement à renover</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="type_emploi" label="Type d emploi">
            @php $selected = old('type_emploi', ($editing ? $maisonCertif->type_emploi : '')) @endphp
            <option value="Fonctionnaire" {{ $selected == 'Fonctionnaire' ? 'selected' : '' }} >Fonctionnaire</option>
            <option value="Salarié du privé" {{ $selected == 'Salarié du privé' ? 'selected' : '' }} >Salarié du privé</option>
            <option value="Chef d entreprise" {{ $selected == 'Chef d entreprise' ? 'selected' : '' }} >Chef d entreprise</option>
            <option value="Travailleur indépendant" {{ $selected == 'Travailleur indépendant' ? 'selected' : '' }} >Travailleur indépendant</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="proprietaire" label="Vous etes proprietaire">
            @php $selected = old('proprietaire', ($editing ? $maisonCertif->proprietaire : '')) @endphp
            <option value="Non" {{ $selected == 'Non' ? 'selected' : '' }} >Non</option>
            <option value="Oui" {{ $selected == 'Oui' ? 'selected' : '' }} >Oui</option>
        </x-inputs.select>
    </x-inputs.group>

    @if($editing)
    <div class="form-group col-sm-12 mt-4">
        <h4>Assign @lang('crud.type_de_surfaces.name')</h4>

        @foreach ($typeDeSurfaces as $typeDeSurface)
        <div>
            <x-inputs.checkbox
                id="typeDeSurface{{ $typeDeSurface->id }}"
                name="typeDeSurfaces[]"
                label="{{ ucfirst($typeDeSurface->libel) }}"
                value="{{ $typeDeSurface->id }}"
                :checked="isset($maisonCertif) ? $maisonCertif->typeDeSurfaces()->where('id', $typeDeSurface->id)->exists() : false"
                :add-hidden-value="false"
            ></x-inputs.checkbox>
        </div>
        @endforeach
    </div>
    @endif @if($editing)
    <div class="form-group col-sm-12 mt-4">
        <h4>Assign @lang('crud.critere_immeubles.name')</h4>

        @foreach ($critereImmeubles as $critereImmeuble)
        <div>
            <x-inputs.checkbox
                id="critereImmeuble{{ $critereImmeuble->id }}"
                name="critereImmeubles[]"
                label="{{ ucfirst($critereImmeuble->libel) }}"
                value="{{ $critereImmeuble->id }}"
                :checked="isset($maisonCertif) ? $maisonCertif->critereImmeubles()->where('id', $critereImmeuble->id)->exists() : false"
                :add-hidden-value="false"
            ></x-inputs.checkbox>
        </div>
        @endforeach
    </div>
    @endif @if($editing)
    <div class="form-group col-sm-12 mt-4">
        <h4>Assign @lang('crud.exigence_immeubles.name')</h4>

        @foreach ($exigenceImmeubles as $exigenceImmeuble)
        <div>
            <x-inputs.checkbox
                id="exigenceImmeuble{{ $exigenceImmeuble->id }}"
                name="exigenceImmeubles[]"
                label="{{ ucfirst($exigenceImmeuble->libel) }}"
                value="{{ $exigenceImmeuble->id }}"
                :checked="isset($maisonCertif) ? $maisonCertif->exigenceImmeubles()->where('id', $exigenceImmeuble->id)->exists() : false"
                :add-hidden-value="false"
            ></x-inputs.checkbox>
        </div>
        @endforeach
    </div>
    @endif
</div>
