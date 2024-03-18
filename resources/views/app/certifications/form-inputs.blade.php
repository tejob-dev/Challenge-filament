@php $editing = isset($certification) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nom_prenom"
            label="Nom et prenoms"
            :value="old('nom_prenom', ($editing ? $certification->nom_prenom : ''))"
            maxlength="255"
            :required="!$editing"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="adresse"
            label="Adresse"
            :value="old('adresse', ($editing ? $certification->adresse : ''))"
            maxlength="255"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.email
            name="email"
            label="Email"
            :value="old('email', ($editing ? $certification->email : ''))"
            maxlength="255"
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="contact"
            label="Contact"
            :value="old('contact', ($editing ? $certification->contact : ''))"
            maxlength="255"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="typebien" label="Type de bien">
            @php $selected = old('typebien', ($editing ? $certification->typebien : '')) @endphp
            <option value="Maison" {{ $selected == 'Maison' ? 'selected' : '' }} >Maison</option>
            <option value="Terrain" {{ $selected == 'Terrain' ? 'selected' : '' }} >Terrain</option>
        </x-inputs.select>
    </x-inputs.group>

    @if($editing)
    <div class="form-group col-sm-12 mt-4">
        <h4>Assign @lang('crud.type_certifications.name')</h4>

        @foreach ($typeCertifications as $typeCertification)
        <div>
            <x-inputs.checkbox
                id="typeCertification{{ $typeCertification->id }}"
                name="typeCertifications[]"
                label="{{ ucfirst($typeCertification->libel) }}"
                value="{{ $typeCertification->id }}"
                :checked="isset($certification) ? $certification->typeCertifications()->where('id', $typeCertification->id)->exists() : false"
                :add-hidden-value="false"
            ></x-inputs.checkbox>
        </div>
        @endforeach
    </div>
    @endif
</div>
