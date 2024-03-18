@php $editing = isset($terrainCertif) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nom_prenom"
            label="Nom et prenoms"
            :value="old('nom_prenom', ($editing ? $terrainCertif->nom_prenom : ''))"
            maxlength="255"
            :required="!$editing"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="telephone"
            label="Telephone"
            :value="old('telephone', ($editing ? $terrainCertif->telephone : ''))"
            maxlength="255"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.email
            name="email"
            label="Email"
            :value="old('email', ($editing ? $terrainCertif->email : ''))"
            maxlength="255"
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="commune"
            label="Commune"
            :value="old('commune', ($editing ? $terrainCertif->commune : ''))"
            maxlength="255"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="info_spplement"
            label="Info supplementaire"
            :value="old('info_spplement', ($editing ? $terrainCertif->info_spplement : ''))"
            maxlength="255"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="surface"
            label="Surface"
            :value="old('surface', ($editing ? $terrainCertif->surface : ''))"
            max="255"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="obj_achat" label="Objet d achat">
            @php $selected = old('obj_achat', ($editing ? $terrainCertif->obj_achat : '')) @endphp
            <option value="Résidentiel" {{ $selected == 'Résidentiel' ? 'selected' : '' }} >Résidentiel</option>
            <option value="Commercial" {{ $selected == 'Commercial' ? 'selected' : '' }} >Commercial</option>
            <option value="Agricole" {{ $selected == 'Agricole' ? 'selected' : '' }} >Agricole</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="min_budget"
            label="Min du budget"
            :value="old('min_budget', ($editing ? $terrainCertif->min_budget : ''))"
            max="255"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="moment_acquis" label="Moment d acquisition">
            @php $selected = old('moment_acquis', ($editing ? $terrainCertif->moment_acquis : '')) @endphp
            <option value="Dans l immédiat" {{ $selected == 'Dans l immédiat' ? 'selected' : '' }} >Dans l immédiat</option>
            <option value="Dans 6 mois" {{ $selected == 'Dans 6 mois' ? 'selected' : '' }} >Dans 6 mois</option>
            <option value="Dans 1 an" {{ $selected == 'Dans 1 an' ? 'selected' : '' }} >Dans 1 an</option>
            <option value="Dans 2 ans" {{ $selected == 'Dans 2 ans' ? 'selected' : '' }} >Dans 2 ans</option>
            <option value="Dans 3 ans" {{ $selected == 'Dans 3 ans' ? 'selected' : '' }} >Dans 3 ans</option>
            <option value="Dans 4 ans" {{ $selected == 'Dans 4 ans' ? 'selected' : '' }} >Dans 4 ans</option>
            <option value="Dans 5 ans" {{ $selected == 'Dans 5 ans' ? 'selected' : '' }} >Dans 5 ans</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="max_budget"
            label="Max du budget"
            :value="old('max_budget', ($editing ? $terrainCertif->max_budget : ''))"
            max="255"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="config_terrain" label="Configuration du terrain">
            @php $selected = old('config_terrain', ($editing ? $terrainCertif->config_terrain : '')) @endphp
            <option value="Plat" {{ $selected == 'Plat' ? 'selected' : '' }} >Plat</option>
            <option value="En pente" {{ $selected == 'En pente' ? 'selected' : '' }} >En pente</option>
            <option value="Autre" {{ $selected == 'Autre' ? 'selected' : '' }} >Autre</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="prec_config_terrain"
            label="Autre configuration terrain"
            :value="old('prec_config_terrain', ($editing ? $terrainCertif->prec_config_terrain : ''))"
            maxlength="255"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="financement" label="Financement">
            @php $selected = old('financement', ($editing ? $terrainCertif->financement : '')) @endphp
            <option value="Cash" {{ $selected == 'Cash' ? 'selected' : '' }} >Cash</option>
            <option value="Echelonné jusqu à 12 mois" {{ $selected == 'Echelonné jusqu à 12 mois' ? 'selected' : '' }} >Echelonné jusqu à 12 mois</option>
            <option value="Crédit bancaire" {{ $selected == 'Crédit bancaire' ? 'selected' : '' }} >Crédit bancaire</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="votre_poste" label="Votre poste">
            @php $selected = old('votre_poste', ($editing ? $terrainCertif->votre_poste : '')) @endphp
            <option value="Fonctionnaire" {{ $selected == 'Fonctionnaire' ? 'selected' : '' }} >Fonctionnaire</option>
            <option value="Salarié du privé" {{ $selected == 'Salarié du privé' ? 'selected' : '' }} >Salarié du privé</option>
            <option value="Travailleur indépendant" {{ $selected == 'Travailleur indépendant' ? 'selected' : '' }} >Travailleur indépendant</option>
            <option value="Organisation Internationale" {{ $selected == 'Organisation Internationale' ? 'selected' : '' }} >Organisation Internationale</option>
            <option value="Chef d entreprise" {{ $selected == 'Chef d entreprise' ? 'selected' : '' }} >Chef d entreprise</option>
            <option value="Autre" {{ $selected == 'Autre' ? 'selected' : '' }} >Autre</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="partic_group" label="Vous êtes">
            @php $selected = old('partic_group', ($editing ? $terrainCertif->partic_group : '')) @endphp
            <option value="Particulier" {{ $selected == 'Particulier' ? 'selected' : '' }} >Particulier</option>
            <option value="Groupement" {{ $selected == 'Groupement' ? 'selected' : '' }} >Groupement</option>
        </x-inputs.select>
    </x-inputs.group>
</div>
