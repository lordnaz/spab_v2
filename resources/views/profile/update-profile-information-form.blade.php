<x-jet-form-section submit="updateProfileInformation">
  <x-slot name="title">
    {{ __('Profile Information') }}
  </x-slot>

  <x-slot name="description">
    {{ __('Update your account\'s profile information and email address.') }}
  </x-slot>

  <x-slot name="form">

    <x-jet-action-message on="saved">
      {{ __('Saved.') }}
    </x-jet-action-message>

    <!-- Profile Photo -->
    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
      <div class="mb-1" x-data="{photoName: null, photoPreview: null}">
        <!-- Profile Photo File Input -->
        <input type="file" hidden wire:model="photo" x-ref="photo"
          x-on:change=" photoName = $refs.photo.files[0].name; const reader = new FileReader(); reader.onload = (e) => { photoPreview = e.target.result;}; reader.readAsDataURL($refs.photo.files[0]);" />

        <!-- Current Profile Photo -->
        <div class="mt-2" x-show="! photoPreview">
          <img src="{{ $this->user->profile_photo_url }}" class="rounded-circle" height="80px" width="80px">
        </div>

        <!-- New Profile Photo Preview -->
        <div class="mt-2" x-show="photoPreview">
          <img x-bind:src="photoPreview" class="rounded-circle" width="80px" height="80px">
        </div>

        <x-jet-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
          {{ __('Select A New Photo') }}
        </x-jet-secondary-button>

        @if ($this->user->profile_photo_path)
          <button type="button" class="btn btn-danger text-uppercase mt-2" wire:click="deleteProfilePhoto">
            {{ __('Remove Photo') }}
          </button>
        @endif

        <x-jet-input-error for="photo" class="mt-2" />
      </div>
    @endif

    <!-- Name -->
    <div class="mb-1">
      <x-jet-label class="form-label" for="name" value="{{ __('Name') }}" />
      <x-jet-input id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
      wire:model.defer="state.name" autocomplete="name" />
      <x-jet-input-error for="name" />
    </div>

    <!-- Email -->
    <div class="mb-1">
      <x-jet-label class="form-label" for="email" value="{{ __('Email') }}" />
      <x-jet-input id="email" type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
        wire:model.defer="state.email" />
      <x-jet-input-error for="email" />
    </div>
    <div class="mb-1">
   
    <x-jet-label class="form-label" for="email" value="{{ __('Race') }}" />
              <select class="form-select w-100 race" id="race" wire:model.defer="state.race">
                <option label="" selected disabled>{!! __('locale.Please Choose') !!}</option>
                <option value="Melayu" @if($state['race'] == "Melayu") selected @else  @endif>Melayu</option>
                <option value="Cina" @if($state['race'] == "Cina") selected @else  @endif>Cina</option>
                <option value="India" @if($state['race'] == "India") selected @else  @endif>India</option>
                <option value="Lain-lain" @if($state['race'] == "Lain-lain") selected @else  @endif>Lain-lain</option>
              </select>
    </div>

    <div class="mb-1">
              
              <x-jet-label class="form-label" for="email" value="{{ __('Gender') }}" />
              <select class="form-select w-100 gender" id="gender" wire:model.defer="state.gender">
                <option label="">{!! __('locale.Please Choose') !!}</option>
                <option value="Male" @if($state['gender'] == "Male") selected @else  @endif>Male</option>
                <option value="Female" @if($state['gender'] == "Female") selected @else  @endif>Female</option>
              </select>
            </div>
  </x-slot>

  <x-slot name="actions">
    <div class="d-flex align-items-baseline">
      <x-jet-button>
        {{ __('Save') }}
      </x-jet-button>
    </div>
  </x-slot>
</x-jet-form-section>
