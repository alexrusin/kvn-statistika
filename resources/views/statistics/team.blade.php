@extends('layouts.app')

@section('content')
<img class="team-image" style="background-image: url({{$team->image_url}});" />
<div class="block md:grid grid-cols-3 gap-4">
    <div class="col-span-1 mt-4">
        <div class="p-4 rounded-lg shadow-lg bg-white">
            <div class="teamNameSection">
                <h1 class="mt-1 text-lg font-semibold leading-tight truncate">
                    {{ $team->name }}
                </h1>
                <div class="flex items-baseline">
                    <div class="text-xs font-semibold tracking-wide text-gray-600 uppercase truncate">
                        г. {{ $team->city }}
                    </div>
                </div>
            </div>
            <team-score-section :id="{{$team->id}}" name="{{$team->name}}"></team-score-section>
        </div>
    </div>  
    <div class="col-span-2 mt-4">
        @if ($team->description)
        <div class="p-4 mb-4 rounded-lg shadow-lg bg-white">
            <h2 class="text-base sm:text-lg font-semibold">О команде</h2>
            <p class="text-sm sm:text-base">{{$team->description}}</p>
        </div>
        @endif
        <team-games-section :id="{{$team->id}}"></team-games-section>
    </div>
</div>

@endsection

@if (!Auth::check())
    @push('scripts')

    <script type="text/javascript">
        VK.init({
            apiId: parseInt("{!!config('services.vk.app_id')!!}")
        });
    </script>
    <script type="text/javascript">
        VK.Widgets.Auth("vk_auth", {
            "width": 300,
            "authUrl": "/vk/login"
        });
    </script>
    @endpush
@endif