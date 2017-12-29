@extends('layouts.app')

@section('title', $document->title)

@section('content')
    <div class="columns is-centered">
        <div class="column is-6">
            <document :attributes="{{ $document }}" inline-template v-cloak>
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">{{ $document->title }}</p>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            <div v-if="editing">
                                <div class="field">
                                    <div class="control">
                                        <textarea class="textarea" title="input" autofocus v-model="body"></textarea>
                                    </div>
                                </div>
                                <div class="buttons is-right">
                                    <button class="button is-white tooltip" data-tooltip="Cancel" @click.prevent="stopEditing">
                                        <icon name="close"></icon>
                                    </button>
                                    <button class="button is-white tooltip" data-tooltip="Update" @click.prevent="update">
                                        <icon name="check"></icon>
                                    </button>
                                </div>
                            </div>

                            <vue-markdown :source="body" v-if="!editing"></vue-markdown>

                            @can('update', $document)
                                <div class="buttons is-right" v-if="!editing">
                                    <button class="button is-white tooltip" data-tooltip="Delete" @click.prevent="destroy">
                                        <icon name="trash"></icon>
                                    </button>
                                    <button class="button is-white tooltip" data-tooltip="Edit" @click.prevent="startEditing">
                                        <icon name="edit"></icon>
                                    </button>
                            </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </document>

        </div>
    </div>
@endsection
