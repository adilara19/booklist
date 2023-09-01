@extends('layouts.master')
@section('title', 'MyLab - Book Detail')
@section('content')
   <section class="pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">Book Details</div>
                        <div class="float-right">
                            <a class="btn btn-sm btn-primary" href="/"><i class="fa-solid fa-list" style="color: #ffffff;"></i> All Books</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->author }}</h5>
                        <p class="card-text">{{ $book->title }}</p>
                        <p class="card-text">{{ $book->body }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

   </section>
@endsection