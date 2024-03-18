@php $editing = isset($etatAchat) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="libel"
            label="Nom"
            :value="old('libel', ($editing ? $etatAchat->libel : ''))"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
