@extends('layouts.app')

@section('content')
    <div class="min-h-full mt-4 bg-white border-t border-b shadow sm:rounded sm:border" title="{{$post->title}}">
        <div class="border-b">
            <div class="px-6 -mb-px">
                <h2 class="my-3 text-xl font-semibold">{!!$post->title!!}</h2>
            </div>
        </div>
        <div class="px-8 pt-6 pb-8">
            <p>{!!$post->body!!}</p>
        </div>
        <div class="border-t">
            <div class="px-6 my-3">
                <div class="flex justify-between">
                    <div>
                        @if($post->attribution)
                        <small class="text-light">
                            <span>По материалам <a href="{{$post->attribution->sourceUrl}}" class="font-bold text-blue-600" target="_blank">{{$post->attribution->sourceName}}</a></span>
                        </small>
                        @endif
                    </div>
                    <div>
                        <small class="text-light">
                            @if($post->published)
                                <span>Опубликовано {{$post->publish_date_human_readable}}</span>
                            @endif
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('blog_meta_tags')
    <meta property="og:locale" content="ru_RU"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="{{$post->meta['opengraph_title'] ?: 'КВН Статистика'}}" />
    <meta property="og:description" content="{{$post->meta['opengraph_description'] ?: 'Статистические данные о КВН'}}" />
    <meta property="og:url" content="{{request()->url()}}"/>
    <meta property="og:site_name" content="КВН Статистика"/>
    @if($post->meta['opengraph_image']) 
    <meta property="og:image" content="{{$post->meta['opengraph_image']}}" />
    @endif
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{$post->meta['twitter_title'] ?: 'КВН Статистика'}}">
    <meta name="twitter:description" content="{{$post->meta['twitter_description'] ?: 'КВН Статистика'}}">
    @if($post->meta['twitter_image']) 
    <meta property="twitter:image" content="{{$post->meta['twitter_image']}}" />
    @endif
@endsection

@push('styles')

<style>
a {
    color: blue;
    text-decoration: underline;
}
</style>

@endpush
