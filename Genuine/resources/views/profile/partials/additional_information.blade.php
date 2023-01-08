<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('User Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Add additional information to your user account!") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="sex" :value="__('Sex')" />
            <x-text-input id="sex" name="sex" type="text" class="mt-1 block w-full" :value="old('sex', $user->sex)" required autofocus autocomplete="sex" />
            <x-input-error class="mt-2" :messages="$errors->get('sex')" />
        </div>
        <div>
            <x-input-label for="description" :value="__('Description')" />
            <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', $user->description)" required autofocus autocomplete="description" />
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>
        <div>
            <x-input-label for="relationship_status" :value="__('Relationship status')" />
            <x-text-input id="relationship_status" name="relationship_status" type="text" class="mt-1 block w-full" :value="old('relationship_status', $user->relationship_status)" required autofocus autocomplete="relationship_status" />
            <x-input-error class="mt-2" :messages="$errors->get('relationship_status')" />
        </div>
        <div>
            <x-input-label for="family" :value="__('Family')" />
            <x-text-input id="family" name="family" type="text" class="mt-1 block w-full" :value="old('family', $user->family)" required autofocus autocomplete="family" />
            <x-input-error class="mt-2" :messages="$errors->get('family')" />
        </div>
        <div>
            <x-input-label for="facebook" :value="__('Facebook')" />
            <x-text-input id="facebook" name="facebook" type="url" class="mt-1 block w-full" :value="old('facebook', $user->facebook)" required autofocus autocomplete="facebook" />
            <x-input-error class="mt-2" :messages="$errors->get('facebook')" />
        </div>
        <div>
            <x-input-label for="instagram" :value="__('Instagram')" />
            <x-text-input id="instagram" name="instagram" type="url" class="mt-1 block w-full" :value="old('instagram', $user->instagram)" required autofocus autocomplete="instagram" />
            <x-input-error class="mt-2" :messages="$errors->get('instagram')" />
        </div>
        <div>
            <x-input-label for="current_city" :value="__('Current city')" />
            <x-text-input id="current_city" name="current_city" type="text" class="mt-1 block w-full" :value="old('current_city', $user->current_city)" required autofocus autocomplete="current_city" />
            <x-input-error class="mt-2" :messages="$errors->get('current_city')" />
        </div>
        <div>
            <x-input-label for="hometown" :value="__('Hometown')" />
            <x-text-input id="hometown" name="hometown" type="text" class="mt-1 block w-full" :value="old('hometown', $user->hometown)" required autofocus autocomplete="hometown" />
            <x-input-error class="mt-2" :messages="$errors->get('hometown')" />
        </div>
        <div>
            <x-input-label for="interested_in" :value="__('Interested in')" />
            <x-text-input id="interested_in" name="interested_in" type="text" class="mt-1 block w-full" :value="old('interested_in', $user->interested_in)" required autofocus autocomplete="interested_in" />
            <x-input-error class="mt-2" :messages="$errors->get('interested_in')" />
        </div>
        <div>
            <x-input-label for="favorite_question" :value="__('Favorite question')" />
            <x-text-input id="favorite_question" name="favorite_question" type="text" class="mt-1 block w-full" :value="old('favorite_question', $user->favorite_question)" required autofocus autocomplete="favorite_question" />
            <x-input-error class="mt-2" :messages="$errors->get('favorite_question')" />
        </div>
        <div>
            <x-input-label for="job" :value="__('Job')" />
            <x-text-input id="job" name="job" type="text" class="mt-1 block w-full" :value="old('job', $user->job)" required autofocus autocomplete="job" />
            <x-input-error class="mt-2" :messages="$errors->get('job')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
