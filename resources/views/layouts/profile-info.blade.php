<div class="row ml-3">
    <img src="/storage/images/profile/{{ $profile->image_path }}" alt="" style="width: 70px">

    <div class="col">
        <div>
            <a href="{{ route('profile', $profile->id) }}" class="text" style="font-size: larger">
                {{ $profile->user->name }}
            </a>
        </div>

        <div>
            {{ count($profile->products) }} объявлений
        </div>
    </div>
</div>
