@php $editing = isset($rendezVous) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nompre"
            label="Nom et prenoms"
            :value="old('nompre', ($editing ? $rendezVous->nompre : ''))"
            maxlength="255"
            :required="!$editing"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="telephone"
            label="Telephone"
            :value="old('telephone', ($editing ? $rendezVous->telephone : ''))"
            maxlength="255"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="votr_email"
            label="Votre email"
            :value="old('votr_email', ($editing ? $rendezVous->votr_email : ''))"
            maxlength="255"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="rdv-date"
            label="Date rendez vous"
            value="{{ old('rdv-date', ($editing ? optional($rendezVous->rdv-date)->format('Y-m-d') : '')) }}"
            max="255"
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="rdv-hour"
            label="Heur du rendez vous"
            :value="old('rdv-hour', ($editing ? $rendezVous->rdv-hour : ''))"
            maxlength="255"
        ></x-inputs.text>
    </x-inputs.group>
</div>
