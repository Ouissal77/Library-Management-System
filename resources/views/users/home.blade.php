@extends('layouts.app')


@section('content')
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
            <br>
            <a href="{{ asset(session('pdf_path')) }}" download="ticket.pdf">Click here to download your ticket</a>
        </div>
    @endif

{{--    @if(session('success'))--}}
{{--        <div class="alert alert-info " role="alert">--}}
{{--            {{ session('success') }}--}}
{{--            --}}
{{--        </div>--}}
{{--    @endif--}}

    @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="quote">
        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur imperdiet felis eu eros porttitor
            placerat.</p>
    </div>
    @foreach($books as $book)
        <div class="book-section">
            <div class="book-borrow">
                <div class="cover">
                    <img class="img"  src="{{ asset('images/bookCovers/'. $book->getFirstMedia()->file_name) }}">

                </div>
                @if($book->status==1)
                    <form action="{{ route('users.borrow', ['book' => $book->id, 'user' => Auth::user()->id])}}" method="post">
                        @csrf
                        <button type="button" class="" data-toggle="modal" data-target="#exampleModalCenter">
                           Borrow
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Confirm Borrowing</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                            <input type="checkbox" name="terms" value="1">
                                            <label for="terms">  Do you agree on the borrowing terms ?</label><br>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Confirm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                @endif
            </div>


            <div class="detail">
                <h3 class="small-book-title"><a href="{{route('users.bookInfo',$book->id)}}">{{$book->title}}</a></h3>
                <p class="small-book-author"><a href="">{{$book->author->name}}</a></p>
                <p class="short-desctiption">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur imperdiet felis eu eros porttitor
                    placerat. Maecenas pulvinar vehicula vehicula. Aenean vulputate neque tellus, ac molestie enim
                    condimentum vitae. Donec pretium mi eu velit tincidunt, eu pretium dui euismod. Etiam non convallis
                    velit, eget interdu</p>
                @if($book->status==1)
                         <div class="status available">Available</div>
                @else
                         <div class="status borrowed">Borrowed</div>

                @endif
            </div>
        </div>
    @endforeach



@endsection
