<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
{{--    <link rel="stylesheet" href="/app.css">--}}
    <title>book ticket</title>
    <style>
        .ticket{
            
            font-family: Calibri;


        }
        .ticket-info p{
            margin: 8px ;
        }
        .ticket-book-cover{
            width: 150px;
            height: 220px;
            border-radius: 15px;
        }
        .agreeing{
            color: #ef7676;
            font-family: Copernicus;
        }

    </style>
</head>
<body>
<div class="ticket" style=" display: flex;
            font-family: Calibri;
            gap: 25px;
            margin: 25px;">
    <div class="ticket-img">
        <img class="ticket-book-cover" style=" width: 150px;
            height: 220px;
            border-radius: 15px;
            display: inline-block;"
             src="{{ public_path().'/images/bookCovers/'.$book->getFirstMedia()->file_name  }}">
    </div>
{{--    <div>{{ public_path().'/images/bookCovers/Chaos.jpg' }}</div>--}}
    <div class="ticket-info">

        <p> <strong>User:</strong> {{ $user->name }}</p>
        <p> <strong>Book: </strong>{{ $book->title }}</p>
        <p><strong>Borrowing Date:</strong>  {{ $expirationDate }}</p>
        <p><strong>Expiration Date:</strong>  {{ $expirationDate }}</p>
        <p class="agreeing"> This user agreed on the borrowing terms and takes responsability of his action</p>
    </div>

</div>


{{--<a href="{{ $pdf->path() }}" download >Download Ticket PDF</a>--}}

</body>
</html>
