<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Hello, world!</title>
</head>
<body>

<ul>
    @foreach($customers as $customer)
   
        <li>{{ $customer->name }}</li>

    @endforeach
</ul>

<div class="container">
    <form action="{{ route('customer.store') }}" method="post">
        @csrf

        @foreach($errors->all() as $error )
            <div class="text-danger"> {{ $error }}</div>
        @endforeach
        <div class="row">
            <div class="col-md-6 form-group">
                <lable>Full Name</lable>
                <input type="text" value="" class="form-control" name="name" placeholder="Enter your full name">
            </div>
            <div class="col-md-6 form-group">
                <label for="">Last Name</label>
                <input type="text" value="" class="form-control" name="last_name" placeholder="Enter your last name">
            </div>
            <div class="col-md-12 form-group">
                <input type="submit" class="btn btn-success">
            </div>
        </div>
    </form>
</div>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
