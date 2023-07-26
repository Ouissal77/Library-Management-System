@extends('layout.main')
@section('content')
    <div class="book-page">


        <div>
            <img class="book-cover" src="{{ asset('images/Crime_And_Punishement.jpg') }}">
        </div>
        <div class="book-details">
            <div class="book-title">Crime and Punishment</div>
            <div class="book-author">Fyodor Dostoevsky</div>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur imperdiet felis eu eros porttitor
                placerat. Maecenas pulvinar vehicula vehicula. Aenean vulputate neque tellus, ac molestie enim
                condimentum vitae. Donec pretium mi eu velit tincidunt, eu pretium dui euismod. Etiam non convallis
                velit, eget interdum risus. Donec id lacus ornare, tempus est nec, fermentum magna. Morbi rutrum eget
                augue ac maximus. Duis nec nibh sed leo luctus consequat. Vivamus dignissim nibh enim, vel pharetra mi
                gravida in. Vestibulum et augue dapibus diam pharetra efficitur sed dignissim erat.
            </p>

            <ul class="book-categories">
                <label>Genre : </label>
                <li><a href="">Russia</a> </li>
                <li><a href="">Novel</a> </li>
                <li><a href="">Tragic</a> </li>
                <li><a href="">Philosophy</a> </li>

            </ul>

            <p> <span>455</span> Pages , Published at : <span>2023-06-5</span></p>

            <h5>reviews :</h5>
            <ul>
                <li>
                    <div>User-Name :</div>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur imperdiet felis eu eros porttitor
                        placerat. Maecenas pulvinar vehicula vehicula. Aenean vulputate neque tellus, ac molestie enim
                        condimentum vitae. Donec pretium mi eu velit tincidunt, eu pretium dui euismod. Etiam non convallis
                        velit, eget interdum risus
                    </p>
                </li>
                <li>
                    <div>User-Name :</div>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur imperdiet felis eu eros porttitor
                        placerat. Maecenas pulvinar vehicula vehicula. Aenean vulputate neque tellus, ac molestie enim
                        condimentum vitae. Donec pretium mi eu velit tincidunt, eu pretium dui euismod. Etiam non convallis
                        velit, eget interdum risus
                    </p>
                </li>
                <li>
                    <div>User-Name :</div>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur imperdiet felis eu eros porttitor
                        placerat. Maecenas pulvinar vehicula vehicula. Aenean vulputate neque tellus, ac molestie enim
                        condimentum vitae. Donec pretium mi eu velit tincidunt, eu pretium dui euismod. Etiam non convallis
                        velit, eget interdum risus
                    </p>
                </li>

            </ul>
        </div>
    </div>

@endsection
