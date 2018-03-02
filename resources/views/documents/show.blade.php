@extends('layouts.app')

@section('title', $document->title)

@section('content')
    <div class="columns is-centered">
        <div class="column is-6">
            <document :attributes="{{ $document }}" inline-template v-cloak>
                <div class="box">
                    {{-- Title bar --}}
                    <nav class="level">
                        {{-- Left Side  --}}
                        <div class="level-left">
                            <div class="level-item">
                                <p class="title is-3">{{ $document->title }}</p>
                            </div>
                        </div>
                        {{-- Right Side --}}
                        <div class="level-right">
                            <p class="level-item">
                            <p class="subtitle is-6 has-text-grey">
                                <icon name="clock-o"></icon>
                                <span v-text="ago"></span>
                            </p>
                            </p>
                        </div>
                    </nav>

                    {{-- Code Editor --}}
                    <div v-show="editing">
                        {{-- Editor Input --}}
                        <code-mirror v-model="body" v-show="editing"></code-mirror>
                        {{-- Editor Buttons --}}
                        <div class="buttons is-right">
                            <button class="button is-white tooltip"
                                    data-tooltip="Cancel"
                                    @click.prevent="stopEditing">
                                <icon name="close"></icon>
                            </button>
                            <button class="button is-white tooltip"
                                    data-tooltip="Update"
                                    @click.prevent="update">
                                <icon name="check"></icon>
                            </button>
                        </div>
                    </div>

                    {{-- Code Preview --}}
                    <preview v-if="!editing" :code="body"></preview>

                    {{-- Document Owner Buttons --}}
                    @can('update', $document)
                        <div class="buttons is-right" v-if="!editing">
                            <button class="button is-white tooltip"
                                    data-tooltip="Delete"
                                    @click.prevent="destroy">
                                <icon name="trash"></icon>
                            </button>
                            <button class="button is-white tooltip"
                                    data-tooltip="Edit"
                                    @click.prevent="startEditing">
                                <icon name="edit"></icon>
                            </button>
                        </div>
                    @endcan
                </div>
            </document>
        </div>
    </div>
@endsection
