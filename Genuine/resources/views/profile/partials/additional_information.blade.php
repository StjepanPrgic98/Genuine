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

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="image" :value="__('Image')" />
            <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" :value="old('image', $user->image)" required autofocus autocomplete="image" />
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>
        <div>
            <x-input-label for="sex" :value="__('Sex')" />
            <select name="sex" id="sex">
                @if (Auth::user()->sex == "Male")
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
                @endif
                @if (Auth::user()->sex == "Female")
                <option value="Female">Female</option>
                <option value="Male">Male</option>
                <option value="Other">Other</option>
                @endif
                @if (Auth::user()->sex == "Other")
                <option value="Other">Other</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                @endif
                @if (Auth::user()->sex == null)
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
                @endif
                
              </select>
            <x-input-error class="mt-2" :messages="$errors->get('sex')" />
        </div>
        <div>
            <x-input-label for="age" :value="__('Age')" />
            <select name="age" id="age">
                @if (Auth::user()->age != null)
                <option value="{{Auth::user()->age}}">{{Auth::user()->age}}</option>
                @endif             
                @for ($i = 18; $i < 51; $i++)
                @if (Auth::user()->age == $i)
                    {{$i++}}
                @endif
                <option value="{{$i}}">{{$i}}</option>
                @endfor
                
              </select>
            <x-input-error class="mt-2" :messages="$errors->get('age')" />
        </div>
        <div>
            <x-input-label for="description" :value="__('Description')" />
            <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', $user->description)" required autofocus autocomplete="description" />
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>
        <div>
            <x-input-label for="relationship_status" :value="__('Relationship status')" />
            <select name="relationship_status" id="relationship_status">
                @if (Auth::user()->relationship_status == "Single")
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="In relationship">In relationship</option>
                <option value="Complicated">Complicated</option>
                @endif
                @if (Auth::user()->relationship_status == "Married")
                <option value="Married">Married</option>
                <option value="Single">Single</option>
                <option value="In relationship">In relationship</option>
                <option value="Complicated">Complicated</option>
                @endif
                @if (Auth::user()->relationship_status == "Complicated")
                <option value="Complicated">Complicated</option>
                <option value="Single">Single</option>
                <option value="In relationship">In relationship</option>
                <option value="Married">Married</option>
                @endif
                @if (Auth::user()->relationship_status == "In relationship")
                <option value="In relationship">In relationship</option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Complicated">Complicated</option>
                @endif
                @if (Auth::user()->relationship_status == null)
                <option value="Single">Single</option>
                <option value="In relationship">In relationship</option>
                <option value="Married">Married</option>
                <option value="Complicated">Complicated</option>
                @endif
                
                
              </select>
            <x-input-error class="mt-2" :messages="$errors->get('relationship_status')" />
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
            <x-input-label for="twitter" :value="__('Twitter')" />
            <x-text-input id="twitter" name="twitter" type="url" class="mt-1 block w-full" :value="old('twitter', $user->twitter)" required autofocus autocomplete="twitter" />
            <x-input-error class="mt-2" :messages="$errors->get('twitter')" />
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
            <select name="interested_in" id="interested_in">
                @if (Auth::user()->interested_in == "Men")
                <option value="Men">Men</option>
                <option value="Women">Women</option>
                <option value="Other">Other</option>
                @endif   
                @if (Auth::user()->interested_in == "Women")
                <option value="Women">Women</option>
                <option value="Men">Men</option>
                <option value="Other">Other</option>
                @endif  
                @if (Auth::user()->interested_in == "Other")
                <option value="Other">Other</option>
                <option value="Women">Women</option>
                <option value="Men">Men</option>
                @endif  
                @if (Auth::user()->interested_in == null)
                <option value="Men">Men</option>
                <option value="Women">Women</option>
                <option value="Other">Other</option>
                @endif    
              </select>
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
