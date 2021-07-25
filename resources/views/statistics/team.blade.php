@extends('layouts.app')

@section('content')
<img class="team-image" style="background-image: url({{$team->image_url}});" />
<div class="flex flex-wrap">
    <div class="w-full mt-4 mr-4 p-4 md:w-1/2 lg:w-1/3 rounded-lg shadow-lg bg-white">
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
        @if ($team->description)
        <div class="mt-4">
            {{$team->description}}
        </div>
        @endif
        <team-score-section :id="{{$team->id}}" name="{{$team->name}}"></team-score-section>
    </div>
    <div class="grid grid-cols-3 gap-4 mt-4">
        <div>Hello</div>
        <div>Hello</div>
        <div>Hello</div>
        <div>Hello</div>
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