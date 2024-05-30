@extends('admin.layouts.app')

@section('content')
        <div class="flex-center position-ref full-height">
            

            <main>
                <div class="row">
                  <div class="offset-md-1 col-md-10 offset-md-1justify-content-center text-center py-5">
                    <div id="imageSlider" class="carousel slide" data-bs-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img src="{{ asset('images/Welcome.jpeg') }}" alt="Welcome Image" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                          <img src="images/download (1).jpeg" class="d-block w-100" alt="Image 2">
                        </div>
                        <div class="carousel-item">
                          <img src="images/Neon Bongo cat.jpeg" class="d-block w-100" alt="Image 3">
                        </div>
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#imageSlider" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#imageSlider" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                  </div>
                </div>
              </main>
        </div>
@endsection