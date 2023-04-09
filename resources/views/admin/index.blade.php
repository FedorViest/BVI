<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin screen</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <link rel="stylesheet" href="{{asset('css/header.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/button_1.css')}}" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<!-- Header-->
@include('includes.header')
<!-- end Header -->

<main class="main row m-0 d-flex justify-content-center align-items-center">

    <div class="d-flex p-0 my-2 justify-content-center align-items-center">
        <a href="#add_item" class="scroll_to_bottom">Scroll to bottom</a>
    </div>
    <div class="container-fluid w-100 p-0 m-0">
        @foreach($products as $product)
        <div class="row justify-content-between m-0 align-items-center d-flex">
            <div class="col-5 col-lg-5 col-md-6 col-sm-5 d-inline-block m-0 p-0">
                <div class="flex-row d-flex align-items-center">
                    @if(empty($product->photos))
                        <span class="material-symbols-outlined img-thumbnail">image_not_supported</span>
                    @else
                        <img class="img-thumbnail" src="{{asset('photos/' . $product->photos[0])}}" alt="{{$product->name}}">

                    @endif
                    <!-- https://pixabay.com/photos/a-tree-nature-heart-cherry-flowers-5255288/ -->
                    <div class="col m-2">
                        <h3>{{$product->name}}</h3>
                        <p>{{$product->short_description}}</p>
                    </div>
                </div>
            </div>

            <div class="col-4 col-lg-3 col-md-3 col-sm-3 align-items-center gap-4 justify-content-end m-0 p-0">
                <div class="d-flex justify-content-between flex-row align-items-center m-0 p-0">
                    <div class="price-div align-items-center d-flex  m-0 p-0">{{$product->price}}</div>
                    <div class="edit-div align-items-center d-flex m-0 p-0">
                        <a href="edit_product.html">
                            <span class="material-symbols-outlined">edit_square</span>
                        </a>
                    </div>
                    <div class="delete-div align-items-center d-flex  m-0 p-0"><a href="">
                            <span class="material-symbols-outlined">delete</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        @endforeach
    </div>

    <div class="col-3 d-flex justify-content-center text-center m-0 mb-2">
        <button type="button" id="add_item" class="btn_custom">
            <a href="{{ url('admin/add_product') }}">
            Add product
            </a>
        </button>
    </div>
</main>


<!-- Footer -->
@include('includes.footer')
<!-- end Footer -->

</body>
</html>
