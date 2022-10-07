<x-jet-action-section>
  <x-slot name="title">
    {{ __('Padam Akaun') }}
  </x-slot>

  <x-slot name="description">
    {{ __('Padamkan akaun anda secara kekal.') }}
  </x-slot>

  <x-slot name="content">
    <div>
      {{ __('Setelah akaun anda dipadamkan, semua sumber dan datanya akan dipadamkan secara kekal. Sebelum memadamkan akaun anda, sila muat turun sebarang data atau maklumat yang ingin anda simpan.') }}
    </div>

    <div class="mt-1">
      <x-jet-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
        {{ __('Padam Akaun') }}
      </x-jet-danger-button>
    </div>

    <!-- Delete User Confirmation Modal -->
    <x-jet-dialog-modal wire:model="confirmingUserDeletion">
      <x-slot name="title">
        {{ __('Padam Akaun') }}
      </x-slot>

      <x-slot name="content">
        {{ __('Adakah anda pasti mahu memadamkan akaun anda? Setelah akaun anda dipadamkan, semua sumber dan datanya akan dipadamkan secara kekal. Sila masukkan kata laluan anda untuk mengesahkan anda ingin memadamkan akaun anda secara kekal.') }}

        <div class="mt-2" x-data="{}"
          x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
          <x-jet-input type="password" class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
            placeholder="{{ __('Kata Laluan') }}" x-ref="password" wire:model.defer="password"
            wire:keydown.enter="deleteUser" />

          <x-jet-input-error for="password" />
        </div>
      </x-slot>

      <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
          {{ __('Batal') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ms-1" wire:click="deleteUser" wire:loading.attr="disabled">
          {{ __('Padam Akaun') }}
        </x-jet-danger-button>
      </x-slot>
    </x-jet-dialog-modal>
  </x-slot>

</x-jet-action-section>
