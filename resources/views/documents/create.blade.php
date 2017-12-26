@extends('layouts.app')

@section('content')
    <form action="/documents" method="POST" id="document-create-form">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    New Doc
                </p>
            </header>
            <div class="card-content">
                {{ csrf_field() }}
                <div class="field">
                    <label class="label" for="title">Title</label>
                    <div class="control has-icons-left">
                        <input class="input"
                               type="text"
                               name="title"
                               placeholder="My New Document"
                               required>
                        <span class="icon is-small is-left"><i class="fa fa-file-text-o"></i></span>
                        @if ($errors->has('title'))
                            <span class="icon is-small is-right"><i class="fa fa-warning"></i></span>
                        @endif
                    </div>
                    @if ($errors->has('title'))
                        <p class="help is-danger">{{ $errors->first('filename') }}</p>
                    @endif
                </div>
                <div class="field">
                    <label class="label" for="body">Body</label>
                    <div class="control has-icons-left has-icons-right">
                        <textarea name="body"
                                  cols="30"
                                  rows="10"
                                  class="textarea is-full-height"
                                  required
                                  placeholder="const a = 10"></textarea>
                        <span class="icon is-small is-left"><i class="fa fa-code"></i></span>
                        @if ($errors->has('body'))
                            <span class="icon is-small is-right"><i class="fa fa-warning"></i></span>
                        @endif
                    </div>
                    @if ($errors->has('body'))
                        <p class="help is-danger">{{ $errors->first('body') }}</p>
                    @endif
                </div>
                <div class="field">
                    <div class="control">
                        <button class="button is-link">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
