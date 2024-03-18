@php $editing = isset($contact) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nom_prenom"
            label="Nom Prenom"
            :value="old('nom_prenom', ($editing ? $contact->nom_prenom : ''))"
            maxlength="255"
            placeholder="Nom Prenom"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.email
            name="email"
            label="Email"
            :value="old('email', ($editing ? $contact->email : ''))"
            maxlength="255"
            placeholder="Email"
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="objet"
            label="Objet"
            :value="old('objet', ($editing ? $contact->objet : ''))"
            maxlength="255"
            placeholder="Objet"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="telephone"
            label="Telephone"
            :value="old('telephone', ($editing ? $contact->telephone : ''))"
            maxlength="255"
            placeholder="Telephone"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="message" label="Message" maxlength="255"
            >{{ old('message', ($editing ? $contact->message : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="your-consent"
            label="Your Consent"
            :value="old('your-consent', ($editing ? $contact->your-consent : ''))"
            maxlength="255"
            placeholder="Your Consent"
        ></x-inputs.text>
    </x-inputs.group>
</div>
