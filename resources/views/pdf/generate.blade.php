<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>{{ $title }}</title>
  </head>
  <body>
            <div class="d-flex justify-content-between">
                <h1>{{ $title }}</h1>
                <h4>{{ $date }}</h4>
            </div>
            <div class="row">
                <table class="table table-bordered border-2" style="display: block">
                    <tbody>
                        <tr>
                            <th>SN</th>
                            <th>Product</th>
                            <th>Buyer</th>
                            <th>Quantity</th>
                        </tr>
                        @forelse ($sales as $sale)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $sale->product->name ?? '' }}</td>
                                <td>{{ $sale->user->name ?? '' }}</td>
                                <td>{{ $sale->quantity }}</td>
                            </tr>
                        @empty
                            <td colspan="4" class="text-center">There is No Data Found!!</td>
                        @endforelse
                    </tbody>
                </table>
            </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
