@extends('layouts.app')
@section('content')
<section class="banner-area" id="home"> 
  <div class="container">
    <div class="row fullscreen d-flex align-items-center justify-content-center text-center">
      <div class="banner-content col-lg-7">
        <h1>
          Free Online Invoice Generator
        </h1>
        <p class="pt-20 pb-20">
           Invoice Generator lets you quickly make invoices with our attractive invoice template straight from your web browser
        </p>
      </div>    
      <div class="banner-content-2 col-lg-7">
        <img src="{{ asset('images/mac.png') }}" class="img-fluid">
      </div>                
    </div>
  </div>
</section>

<section class="section-second" id="second">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="menu-content pb-8 col-lg-10">
        <div class="title text-center">
          <h1 class="mb-10">Features</h1>
          {{-- <p>Who are in extremely love with eco friendly system.</p> --}}
        </div>
      </div>
    </div>            
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="second-inner d-flex flex-row pb-30">
          <div class="icon">
            <i class="fe fe-user-check"></i>
          </div>
          <div class="desc">
            <a href="#"><h4>Manage customers</h4></a>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error iusto veniam, tenetur. Autem neque repellat minima suscipit.
            </p>
          </div>
        </div>
        <div class="second-inner d-flex flex-row pb-30">
          <div class="icon">
            <i class="fe fe-file-text"></i>
          </div>
          <div class="desc">
            <a href="#"><h4>Manage invoices</h4></a>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error iusto veniam, tenetur. Autem neque repellat minima suscipit.
            </p>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="second-inner d-flex flex-row pb-30">
          <div class="icon">
            <i class="fe fe-message-circle"></i>
          </div>
          <div class="desc">
            <a href="#"><h4>Send Via Email.</h4></a>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error iusto veniam, tenetur. Autem neque repellat minima suscipit.
            </p>
          </div>
        </div>
        <div class="second-inner d-flex flex-row pb-30">
          <div class="icon">
            <i class="fe fe-settings"></i>
          </div>
          <div class="desc">
            <a href="#"><h4>Preferences</h4></a>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error iusto veniam, tenetur. Autem neque repellat minima suscipit.
            </p>
          </div>
        </div>
      </div>                        
    </div>
  </div>  
</section>
@endsection
