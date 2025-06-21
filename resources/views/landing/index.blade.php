@extends('layouts.app')

@section('content')
<div class="hero">
    <div class="jumbotron d-flex align-items-center min-vh-100">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6 col-lg-5">
                    <h1 class="display-6 e-bold fs-9">WEBSITE SORA <br> SAMPAH BANDUNG</h1>
                    <p>Sora Sampah Bandung merupakan solusi digital teriintegrasi yang menghubungkan tiga pilar utama dalam pengelolaan sampah yang melibatkan warga, petugas kebersihan, dan pemerintah kota Bandung.</p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                    </p>
                </div>  
                <div class="col-md-6 col-lg-5 text-end">
                    <div class="jumbtron_img">
                      <img src="{{ asset('images/jumbotron.png') }}" alt="jumbotron" width="400">
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, perspiciatis. Voluptates modi quod similique laborum! Expedita dolores, ex, explicabo pariatur architecto dignissimos numquam quo, accusamus illo possimus sequi. Temporibus, recusandae!</p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <h1></h1>
</div>



@endsection
