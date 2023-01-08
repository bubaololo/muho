@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <section>
                            <div class="container py-5">
                                <div class="row">
                                    <div class="col">
                                        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                                            <ol class="breadcrumb mb-0">
                                                <li class="breadcrumb-item"><a href="#">Кабинет</a></li>
                                                {{--<li class="breadcrumb-item active" aria-current="page"><a href="#">Профиль</a></li>--}}
                                                {{--<li class="breadcrumb-item active" aria-current="page">User Profile</li>--}}
                                            </ol>
                                        </nav>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card mb-4">
                                            <div class="card-body text-center">
                                                {{--<img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"--}}
                                                {{--        class="rounded-circle img-fluid" style="width: 150px;">--}}
                                                <h5 class="my-3">{{ Auth::user()->name }}</h5>
                                                <p class="text-muted mb-1">{{ Auth::user()->email }}</p>
                                                <p class="text-muted mb-4">Зарегистрирован: {{ Auth::user()->created_at }}</p>
                                                <div class="d-flex justify-content-center mb-2">
                                                    <button type="button" class="btn btn-primary">Follow</button>
                                                    <button type="button" class="btn btn-outline-primary ms-1">Message</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mb-4 mb-lg-0">
                                            <div class="card-body p-0">
                                                <ul class="list-group list-group-flush rounded-3">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                        <i class="fas fa-globe fa-lg text-warning"></i>
                                                        <p class="mb-0">https://mdbootstrap.com</p>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                        <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                                        <p class="mb-0">mdbootstrap</p>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                        <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                                        <p class="mb-0">@mdbootstrap</p>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                        <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                                        <p class="mb-0">mdbootstrap</p>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                        <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                                        <p class="mb-0">mdbootstrap</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @if(empty($credentials))
                                        <div class="container rounded bg-white mt-5 mb-5">
                                            <div class="row">

                                                <div class="col-md-5 border-right">
                                                    <div class="p-3 py-5">
                                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                                            <h4 class="text-right">Данные для доставки</h4>
                                                        </div>
                                                        <form enctype="multipart/form-data" method="post" id="quest_form"
                                                                class="quest__slides swiper-wrapper" action="/credentials">
                                                            @csrf
                                                        <div class="row mt-2">
                                                            <div class="col-md-6">
                                                                <label class="labels">Имя</label><input type="text"  name="name" class="form-control" placeholder="Иван" value="">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="labels">Фамилия</label><input type="text" name="surname" class="form-control" value="" placeholder="Иванов">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="labels">Отчество</label><input type="text" name="second_name" class="form-control" value="" placeholder="Иванович">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="labels">Телефон</label><input type="text" name="tel" class="form-control" value="" placeholder="890000000">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="labels">Whatsapp</label><input type="text" name="whatsapp"  class="form-control" value="" placeholder="890000000">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="labels">Telegram</label><input type="text" name="telegram" class="form-control" value="" placeholder="@username">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-md-12">
                                                                <label class="labels">Город, улица, дом</label><input type="text" class="form-control" placeholder="Москва, ул. Пушкина, д. Колотушкина" value="">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="labels">Квартира</label><input type="text" class="form-control" placeholder="22" value="">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="labels">Комментарий к адресу</label><input type="text" class="form-control" placeholder="любые уточнения" value="">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="labels">Индекс</label><input type="text" class="form-control" placeholder="000000" value="">
                                                            </div>
                                                            {{--<div class="col-md-12">--}}
                                                            {{--    <label class="labels">State</label><input type="text" class="form-control" placeholder="enter address line 2" value="">--}}
                                                            {{--</div>--}}
                                                            {{--<div class="col-md-12">--}}
                                                            {{--    <label class="labels">Area</label><input type="text" class="form-control" placeholder="enter address line 2" value="">--}}
                                                            {{--</div>--}}
                                                            {{--<div class="col-md-12">--}}
                                                            {{--    <label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value="">--}}
                                                            {{--</div>--}}
                                                            {{--<div class="col-md-12">--}}
                                                            {{--    <label class="labels">Education</label><input type="text" class="form-control" placeholder="education" value="">--}}
                                                            {{--</div>--}}
                                                        </div>
                                                        {{--<div class="row mt-3">--}}
                                                        {{--    <div class="col-md-6">--}}
                                                        {{--        <label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value="">--}}
                                                        {{--    </div>--}}
                                                        {{--    <div class="col-md-6">--}}
                                                        {{--        <label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state">--}}
                                                        {{--    </div>--}}
                                                        {{--</div>--}}
                                                        <div class="mt-5 text-center">
                                                            <input class="btn btn-primary profile-button" type="submit">
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="p-3 py-5">
                                                        <div class="d-flex justify-content-between align-items-center experience">
                                                            <span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-12">
                                                            <label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value="">
                                                        </div>
                                                        <br>
                                                        <div class="col-md-12">
                                                            <label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <style>
                                body {
                                    background: rgb(99, 39, 120)
                                }

                                .form-control:focus {
                                    box-shadow: none;
                                    border-color: #BA68C8
                                }

                                .profile-button {
                                    background: rgb(99, 39, 120);
                                    box-shadow: none;
                                    border: none
                                }

                                .profile-button:hover {
                                    background: #682773
                                }

                                .profile-button:focus {
                                    background: #682773;
                                    box-shadow: none
                                }

                                .profile-button:active {
                                    background: #682773;
                                    box-shadow: none
                                }

                                .back:hover {
                                    color: #682773;
                                    cursor: pointer
                                }

                                .labels {
                                    font-size: 11px
                                }

                                .add-experience:hover {
                                    background: #BA68C8;
                                    color: #fff;
                                    cursor: pointer;
                                    border: solid 1px #BA68C8
                                }
                            </style>
                            @else
                                <div class="col-lg-8">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">ФИО</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0">{{ $credentials->surname }} {{ $credentials->name }} {{ $credentials->middle_name }}</p>
                                                </div>
                                            </div>
                                            <hr>

                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Телефон</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0">{{ $credentials->tel }}</p>
                                                </div>
                                            </div>
                                            <hr>
                                            {{--<div class="row">--}}
                                            {{--    <div class="col-sm-3">--}}
                                            {{--        <p class="mb-0">Mobile</p>--}}
                                            {{--    </div>--}}
                                            {{--    <div class="col-sm-9">--}}
                                            {{--        <p class="text-muted mb-0">(098) 765-4321</p>--}}
                                            {{--    </div>--}}
                                            {{--</div>--}}
                                            {{--<hr>--}}
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Address</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0">{{ $credentials->address }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card mb-4 mb-md-0">
                                                <div class="card-body">
                                                    <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                                                    </p>
                                                    <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                                    <div class="progress rounded" style="height: 5px;">
                                                        <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                                    <div class="progress rounded" style="height: 5px;">
                                                        <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                                    <div class="progress rounded" style="height: 5px;">
                                                        <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                                    <div class="progress rounded" style="height: 5px;">
                                                        <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                                    <div class="progress rounded mb-2" style="height: 5px;">
                                                        <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card mb-4 mb-md-0">
                                                <div class="card-body">
                                                    <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                                                    </p>
                                                    <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                                    <div class="progress rounded" style="height: 5px;">
                                                        <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                                    <div class="progress rounded" style="height: 5px;">
                                                        <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                                    <div class="progress rounded" style="height: 5px;">
                                                        <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                                    <div class="progress rounded" style="height: 5px;">
                                                        <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                                    <div class="progress rounded mb-2" style="height: 5px;">
                                                        <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
                </section>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script>
       let inputs =  document.querySelectorAll('input');
        inputs.forEach( (input)=> {
          console.log(input.name);

          if(input.name) {
            input.value = localStorage.getItem(input.name);
          }


          // if (null ?? localStorage.getItem(input.name)) {
          //   input.target.value = localStorage.getItem(input.name);
          // }

          input.addEventListener('blur', (input) => {
            console.log(input.target.value);
            localStorage.setItem(input.target.name, input.target.value);
          })
       })
    </script>
@endsection
