@php $editing = isset($typeDeSurface) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="libel"
            label="Nom"
            :value="old('libel', ($editing ? $typeDeSurface->libel : ''))"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
