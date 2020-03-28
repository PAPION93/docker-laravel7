@extends('layouts.master')

@section('content')
    <div class="page-header">
        ...
    </div>

    <div class="row container__forum">
        <div class="col-md-3 sidebar__forum">
            <aside>
                @include('layouts.partial.search')
                @include('tags.partial.index')
            </aside>
        </div>

        <div class="col-md-9">
            <article>
                @include('articles.partial.article', ['article' => $article])

                <p>
                    {!! markdown($article->content) !!}
                </p>
            </article>
            ...
            <article>
                Comment here
            </article>
        </div>
    </div>
@stop
