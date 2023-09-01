@extends('layouts.master')
@section('title', 'MyLab - Add Book')
@section('content')
   <section class="pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">Add Book</div>
                        <div class="float-right">
                            <a class="btn btn-sm btn-primary" href="/"><i class="fa-solid fa-list"></i>  All Books</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(Session::has('messages'))
                        <div class="alert alert-info" role="alert">
                            {{Session::get('messages')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                        @endif
                        <form action="{{route('book.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Author</label>
                              <input type="text" name="author" class="form-control" id="exampleFormControlInput1" autocomplete="off">
                            </div>

                            <div class="form-group">
                              <label for="exampleFormControlInput2">Title</label>
                              <input type="text" name="title" class="form-control" id="exampleFormControlInput2" autocomplete="off">
                            </div>
                          
                            <div class="form-group">
                              <label for="exampleFormControlTextarea1">Description</label>
                              <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Book</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   </section>
@endsection