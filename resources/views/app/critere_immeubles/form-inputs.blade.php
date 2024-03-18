@php $editing = isset($critereImmeuble) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="libel"
            label="Nom"
            :value="old('libel', ($editing ? $critereImmeuble->libel : ''))"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
