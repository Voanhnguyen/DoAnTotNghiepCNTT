@extends('a_client.layout._layout')

@section('title', 'Giống heo')


@section('content')

<div class="recent_news_area">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-10">
        <div class="section_title text-center mb-70">
          <h3 class="mb-45">Giống heo</h3>
        </div>
      </div>
    </div>
    <div class="row">
      @foreach($query as $item)
          <div class="col-md-4">
            <div class="single__news">
              <div class="thumb">
                <a href="#"  title="#">
                  <img src="{{ asset('client/img/' .$item->Anh) }}" alt="" style="height:300px">
                </a>
                <span class="badge">{{ $item->Ten }}</span>
              </div>
              <div class="news_info">
                <a href="#" title="">
                  <h4>{{ $item->Ten}}</h4>
                </a>
                <p class="d-flex align-items-center">
                  <span>
                    <i class="flaticon-calendar-1"></i> 
                    Giá / giống : {{ number_format($item->Gia) }}
                  </span> 

                </p>
              </div>
            </div>
          </div>

      @endforeach      
      

    </div>
  </div>
</div>


@endsection


