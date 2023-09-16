@extends('layouts.app')
@section('content')
    <div class="book-page">


        <div class="img-holder">
            <img class="book-cover" src="{{ asset('images/bookCovers/' . $book->getFirstMedia()->file_name)  }}">
            @if($user->borrowedBooks->contains($book->id))
                <div class="user-status borrowed">Borrowed</div>
            @else
                @if($book->status==1)
                    <div class="user-status available">Available</div>

                @else
                    <div class="user-status borrowed">Unavailable</div>

                @endif

            @endif
            @if($book->status==1)
                <form class=" user-form" action="{{ route('users.borrow', ['book' => $book->id, 'user' => Auth::user()->id])}}" method="post">
                    @csrf
                    <button type="button" class="user-borrow user-status" data-toggle="modal" data-target="#exampleModalCenter">
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

        <div class="book-details">
            <div class="book-title">{{$book->title}}</div>
            <div class="book-author">{{$book->author->name}}</div>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur imperdiet felis eu eros porttitor
                placerat. Maecenas pulvinar vehicula vehicula. Aenean vulputate neque tellus, ac molestie enim
                condimentum vitae. Donec pretium mi eu velit tincidunt, eu pretium dui euismod. Etiam non convallis
                velit, eget interdum risus. Donec id lacus ornare, tempus est nec, fermentum magna. Morbi rutrum eget
                augue ac maximus. Duis nec nibh sed leo luctus consequat. Vivamus dignissim nibh enim, vel pharetra mi
                gravida in. Vestibulum et augue dapibus diam pharetra efficitur sed dignissim erat.
            </p>
    <br>
            <ul class="book-categories">
                <label> <strong>Genre : </strong></label>
                @foreach($book->categories as $bookCat)
                    <li><a href="">{{$bookCat->name}}</a> </li>
                @endforeach



            </ul>

            <p> <span>{{$book->pages}}</span> Pages, Published at : <span>{{ date('F j, Y', strtotime($book->published_at)) }}</span></p>

            <h5>reviews :</h5>
            <div>User-Name :</div>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur imperdiet felis eu eros porttitor
                placerat. Maecenas pulvinar vehicula vehicula. Aenean vulputate neque tellus, ac molestie enim
                condimentum vitae. Donec pretium mi eu velit tincidunt, eu pretium dui euismod. Etiam non convallis
                velit, eget interdum risus
            </p>
        </div>
    </div>

@endsection
