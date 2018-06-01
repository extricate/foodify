@extends('layouts.app')

@section('title', 'Settings')

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('settings.index') }}
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="nav flex-column nav-pills border rounded border-default p-2 mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-general-tab" data-toggle="pill" href="#v-pills-general" role="tab" aria-controls="v-pills-general" aria-selected="true">
                                    General
                                </a>
                                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                    Your account
                                </a>
                                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                    Messages
                                </a>
                                <a class="nav-link" id="v-pills-plan-tab" data-toggle="pill" href="#v-pills-plan" role="tab" aria-controls="v-pills-plan" aria-selected="false">
                                    Plan display
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="tab-content" id="v-pills-tab">
                                <div class="tab-pane fade show active" id="v-pills-general" role="tabpanel"
                                     aria-labelledby="v-pills-general-tab">
                                    @include('modules.user.settings.partials.settings-general')
                                </div>
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                     aria-labelledby="v-pills-profile-tab">
                                    @include('modules.user.settings.partials.settings-account')
                                </div>
                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                     aria-labelledby="v-pills-messages-tab">

                                </div>
                                <div class="tab-pane fade" id="v-pills-plan" role="tabpanel" aria-labelledby="v-pills-plan-tab">
                                    @include('modules.user.settings.partials.settings-plan')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection