@extends('template.app')

@section('titlePage')
<title>EDICApp - Forum </title>
@stop

@section('css')
    <link href="{{ asset('/css/forum.css') }}" rel="stylesheet">
@stop

@section('content')
    <div class="container sin-m-t myform main-body p-0 px-3">
    <div class="row card-header p-0"> <h2>Edic Forum</h2></div>
        <div class="row">
            <div class="col-12 col-md-3 mt-2">
                <div class="row justify-content-center">
                    <div class="col-10">
                        <button class="btn sin-bg-3 has-icon btn-block font-weight-bold text-white" type="button" data-toggle="modal"
                            data-target="#threadModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-plus mr-2">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            Nouvelle Discussion
                        </button>
                    </div>
                    <div class="col-10">
                        <div class="inner-sidebar-body p-0">
                            <div class="pt-3 h-100" data-simplebar="init">
                                <div class="simplebar-wrapper" style="margin: -16px;">
                                    <div class="simplebar-height-auto-observer-wrapper">
                                        <div class="simplebar-height-auto-observer"></div>
                                    </div>
                                    <!-- A revoir plutard-->
                                    <!--div class="simplebar-mask">
                                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                            <div class="simplebar-content-wrapper"
                                                style="height: 100%; overflow: hidden scroll;">
                                                <div class="simplebar-content" style="padding: 16px;">
                                                    <nav class="nav nav-pills nav-gap-y-1 flex-column">
                                                        <a href="javascript:void(0)"
                                                            class="nav-link nav-link-faded has-icon active">All Threads</a>
                                                        <a href="javascript:void(0)"
                                                            class="nav-link nav-link-faded has-icon">Popular this week</a>
                                                        <a href="javascript:void(0)"
                                                            class="nav-link nav-link-faded has-icon">Popular all time</a>
                                                        <a href="javascript:void(0)"
                                                            class="nav-link nav-link-faded has-icon">Solved</a>
                                                        <a href="javascript:void(0)"
                                                            class="nav-link nav-link-faded has-icon">Unsolved</a>
                                                        <a href="javascript:void(0)"
                                                            class="nav-link nav-link-faded has-icon">No replies yet</a>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                    </div-->
                                    <!-- div class="simplebar-placeholder" style="width: 234px; height: 292px;"></div -->
                                </div>
                                <!-- div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div>
                                                <div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 151px; display: block; transform: translate3d(0px, 0px, 0px);"></div></div -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-8">

                <div class="row">
                    <div class="col-12">
                        <div class="inner-main-header">
                            <!--a class="nav-link nav-icon rounded-circle nav-link-faded mr-3 d-md-none" href="#"
                                data-toggle="inner-sidebar"><i class="material-icons">arrow_forward_ios</i></a-->
                            <select class="custom-select custom-select-sm w-auto mr-1">
                                <option selected="">Dernier</option>
                                <option value="1">Populaire</option>
                                <!--option value="3">Résolu</option>
                                <option value="3">Non résolu</option>
                                <option value="3">No Replies Yet</option-->
                            </select>
                            <!--span class="input-icon input-icon-sm ml-auto w-auto">
                                <input type="text"
                                    class="form-control form-control-sm bg-gray-200 border-gray-200 shadow-none mb-4 mt-4"
                                    placeholder="Search forum" />
                            </span-->
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="inner-main-body p-2 p-sm-3 collapse forum-content show">
                            <div class="card mb-2">
                                <div class="card-body p-2 p-sm-3">
                                    <div class="media forum-item">
                                        <a href="#" data-toggle="collapse" data-target=".forum-content"><img
                                                src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                class="mr-3 rounded-circle" width="50" alt="User" /></a>
                                        <div class="media-body">
                                            <h6><a href="#" data-toggle="collapse" data-target=".forum-content"
                                                    class="text-body">Realtime fetching data</a></h6>
                                            <p class="text-secondary">
                                                lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit
                                                amet
                                            </p>
                                            <p class="text-muted"><a href="javascript:void(0)">drewdan</a> replied <span
                                                    class="text-secondary font-weight-bold">13 minutes ago</span></p>
                                        </div>
                                        <div class="text-muted small text-center align-self-center">
                                            <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> 19</span>
                                            <span><i class="far fa-comment ml-2"></i> 3</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-body p-2 p-sm-3">
                                    <div class="media forum-item">
                                        <a href="#" data-toggle="collapse" data-target=".forum-content"><img
                                                src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                class="mr-3 rounded-circle" width="50" alt="User" /></a>
                                        <div class="media-body">
                                            <h6><a href="#" data-toggle="collapse" data-target=".forum-content"
                                                    class="text-body">Laravel 7 database backup</a></h6>
                                            <p class="text-secondary">
                                                lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit
                                                amet
                                            </p>
                                            <p class="text-muted"><a href="javascript:void(0)">jlrdw</a> replied <span
                                                    class="text-secondary font-weight-bold">3 hours ago</span></p>
                                        </div>
                                        <div class="text-muted small text-center align-self-center">
                                            <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> 18</span>
                                            <span><i class="far fa-comment ml-2"></i> 1</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-body p-2 p-sm-3">
                                    <div class="media forum-item">
                                        <a href="#" data-toggle="collapse" data-target=".forum-content"><img
                                                src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                                class="mr-3 rounded-circle" width="50" alt="User" /></a>
                                        <div class="media-body">
                                            <h6><a href="#" data-toggle="collapse" data-target=".forum-content"
                                                    class="text-body">Http client post raw content</a></h6>
                                            <p class="text-secondary">
                                                lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit
                                                amet
                                            </p>
                                            <p class="text-muted"><a href="javascript:void(0)">ciungulete</a> replied <span
                                                    class="text-secondary font-weight-bold">7 hours ago</span></p>
                                        </div>
                                        <div class="text-muted small text-center align-self-center">
                                            <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> 32</span>
                                            <span><i class="far fa-comment ml-2"></i> 2</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-body p-2 p-sm-3">
                                    <div class="media forum-item">
                                        <a href="#" data-toggle="collapse" data-target=".forum-content"><img
                                                src="https://bootdey.com/img/Content/avatar/avatar4.png"
                                                class="mr-3 rounded-circle" width="50" alt="User" /></a>
                                        <div class="media-body">
                                            <h6><a href="#" data-toggle="collapse" data-target=".forum-content"
                                                    class="text-body">Top rated filter not working</a></h6>
                                            <p class="text-secondary">
                                                lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit
                                                amet
                                            </p>
                                            <p class="text-muted"><a href="javascript:void(0)">bugsysha</a> replied <span
                                                    class="text-secondary font-weight-bold">11 hours ago</span></p>
                                        </div>
                                        <div class="text-muted small text-center align-self-center">
                                            <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> 49</span>
                                            <span><i class="far fa-comment ml-2"></i> 9</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-body p-2 p-sm-3">
                                    <div class="media forum-item">
                                        <a href="#" data-toggle="collapse" data-target=".forum-content"><img
                                                src="https://bootdey.com/img/Content/avatar/avatar5.png"
                                                class="mr-3 rounded-circle" width="50" alt="User" /></a>
                                        <div class="media-body">
                                            <h6><a href="#" data-toggle="collapse" data-target=".forum-content"
                                                    class="text-body">Create a delimiter field</a></h6>
                                            <p class="text-secondary">
                                                lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit
                                                amet
                                            </p>
                                            <p class="text-muted"><a href="javascript:void(0)">jackalds</a> replied <span
                                                    class="text-secondary font-weight-bold">12 hours ago</span></p>
                                        </div>
                                        <div class="text-muted small text-center align-self-center">
                                            <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> 65</span>
                                            <span><i class="far fa-comment ml-2"></i> 10</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-body p-2 p-sm-3">
                                    <div class="media forum-item">
                                        <a href="#" data-toggle="collapse" data-target=".forum-content"><img
                                                src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                class="mr-3 rounded-circle" width="50" alt="User" /></a>
                                        <div class="media-body">
                                            <h6><a href="#" data-toggle="collapse" data-target=".forum-content"
                                                    class="text-body">One model 4 tables</a></h6>
                                            <p class="text-secondary">
                                                lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit
                                                amet
                                            </p>
                                            <p class="text-muted"><a href="javascript:void(0)">bugsysha</a> replied <span
                                                    class="text-secondary font-weight-bold">14 hours ago</span></p>
                                        </div>
                                        <div class="text-muted small text-center align-self-center">
                                            <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> 45</span>
                                            <span><i class="far fa-comment ml-2"></i> 4</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-body p-2 p-sm-3">
                                    <div class="media forum-item">
                                        <a href="#" data-toggle="collapse" data-target=".forum-content"><img
                                                src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                class="mr-3 rounded-circle" width="50" alt="User" /></a>
                                        <div class="media-body">
                                            <h6><a href="#" data-toggle="collapse" data-target=".forum-content"
                                                    class="text-body">Auth attempt returns false</a></h6>
                                            <p class="text-secondary">
                                                lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit
                                                amet
                                            </p>
                                            <p class="text-muted"><a href="javascript:void(0)">michaeloravec</a> replied
                                                <span class="text-secondary font-weight-bold">18 hours ago</span>
                                            </p>
                                        </div>
                                        <div class="text-muted small text-center align-self-center">
                                            <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> 70</span>
                                            <span><i class="far fa-comment ml-2"></i> 3</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="pagination pagination-sm pagination-circle justify-content-center mb-0">
                                <li class="page-item disabled">
                                    <span class="page-link has-icon"><i class="material-icons">chevron_left</i></span>
                                </li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">1</a></li>
                                <li class="page-item active"><span class="page-link">2</span></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                                <li class="page-item">
                                    <a class="page-link has-icon" href="javascript:void(0)"><i
                                            class="material-icons">chevron_right</i></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="inner-main-body p-2 p-sm-3 collapse forum-content">
                        <a href="#" class="btn btn-light1 sin-bg-3 btn-sm mb-3 has-icon" data-toggle="collapse"
                            data-target=".forum-content"><i class="fa fa-arrow-left mr-2"></i>Back</a>
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="media forum-item">
                                    <a href="javascript:void(0)" class="card-link">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle"
                                            width="50" alt="User" />
                                        <small class="d-block text-center text-muted">Newbie</small>
                                    </a>
                                    <div class="media-body ml-3">
                                        <a href="javascript:void(0)" class="text-secondary">Mokrani</a>
                                        <small class="text-muted ml-2">1 hour ago</small>
                                        <h5 class="mt-1">Realtime fetching data</h5>
                                        <div class="mt-3 font-size-sm">
                                            <p>Hellooo :)</p>
                                            <p>
                                                I'm newbie with laravel and i want to fetch data from database in realtime
                                                for my dashboard anaytics and i found a solution with ajax but it dosen't
                                                work if any one have a simple solution it will be
                                                helpful
                                            </p>
                                            <p>Thank</p>
                                        </div>
                                    </div>
                                    <div class="text-muted small text-center">
                                        <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> 19</span>
                                        <span><i class="far fa-comment ml-2"></i> 3</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="media forum-item">
                                    <a href="javascript:void(0)" class="card-link">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded-circle"
                                            width="50" alt="User" />
                                        <small class="d-block text-center text-muted">Pro</small>
                                    </a>
                                    <div class="media-body ml-3">
                                        <a href="javascript:void(0)" class="text-secondary">drewdan</a>
                                        <small class="text-muted ml-2">1 hour ago</small>
                                        <div class="mt-3 font-size-sm">
                                            <p>What exactly doesn't work with your ajax calls?</p>
                                            <p>Also, WebSockets are a great solution for realtime data on a dashboard.
                                                Laravel offers this out of the box using broadcasting</p>
                                        </div>
                                        <button class="btn btn-xs text-muted has-icon"><i class="fa fa-heart"
                                                aria-hidden="true"></i>1</button>
                                        <a href="javascript:void(0)" class="text-muted small">Reply</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="threadModal" tabindex="-1" role="dialog" aria-labelledby="threadModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <form>
                                    <div class="modal-header d-flex align-items-center sin-bg-3">
                                        <h6 class="modal-title mb-0" id="threadModalLabel">Nouvelle Discussion</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="threadTitle">Titre</label>
                                            <input type="text" class="form-control" id="threadTitle"
                                                placeholder="Entrer le titre" autofocus="" />
                                        </div>
                                        <textarea class="form-control summernote" style="display: none;"></textarea>

                                        <div class="custom-file form-control-sm mt-3" style="max-width: 300px;">
                                            <input type="file" class="custom-file-input" id="customFile" multiple="" />
                                            <label class="custom-file-label" for="customFile">Fichier Joint</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Annulé</button>
                                        <button type="button" class="btn sin-bg-3">Posté</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop
