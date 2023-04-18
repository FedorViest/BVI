<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit product</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <link rel="stylesheet" href="{{asset('css/header.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/edit_product.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/button_1.css')}}" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
<body>

<!-- Header-->
@include('includes.header')
<!-- end Header -->

<main class="main row m-0 d-flex align-items-center my-4">
    <div class="images_div mt-4 col-10 col-lg-3 col-md-10 col-sm-10 d-flex flex-column gap-3 justify-content-start">
        <div class="col-12 d-flex justify-content-center text-center m-0">
            <form method="POST" action="/upload" enctype="multipart/form-data">
                <label for="imageUpload" class="btn_custom">
                    <input type="file" id="imageUpload" name="images[]" multiple accept=".png">
                    Upload files
                </label>
                <!-- your form fields here -->
            </form>
        </div>
    </div>
    <script>
        // get the file input element
        const fileInput = document.getElementById('imageUpload');

        // get the container element for the image previews
        const previewContainer = document.querySelector('.images_div');

        var counter = 0;

        // add an event listener to the file input element
        fileInput.addEventListener('change', function() {
            // remove any existing image previews
            /*previewContainer.querySelectorAll('.preview-image').forEach(function(img) {
                img.remove();
            });*/

            // get the selected files
            var files = this.files;

            // loop through the selected files
            Array.from(files).forEach(function(file) {
                counter++;
                // create a new img element for each file
                const imgWrapper = document.createElement('div');
                imgWrapper.classList.add('image_wrapper', 'd-flex', 'flex-row', 'col-12');
                const img = document.createElement('img');
                img.classList.add('img-thumbnail', 'p-0', 'preview-image');
                img.id = 'upload-image-' + counter.toString();
                img.src = URL.createObjectURL(file);
                img.alt = file.name;
                imgWrapper.appendChild(img);

                // create a new delete button for each image
                const deleteBtn = document.createElement('a');
                deleteBtn.href = "#";
                deleteBtn.classList.add('delete_image');
                deleteBtn.innerHTML = '<span class="material-symbols-outlined">delete</span>';
                deleteBtn.addEventListener('click', function() {
                    imgWrapper.remove();
                });

                // create a new div to contain the delete button
                const deleteDiv = document.createElement('div');
                deleteDiv.classList.add('delete-div', 'align-items-center', 'd-flex');
                deleteDiv.appendChild(deleteBtn);
                imgWrapper.appendChild(deleteDiv);

                // append the img element to the preview container
                previewContainer.insertBefore(imgWrapper, previewContainer.firstChild);
            }

            );
        });
    </script>
    <div class="forms_div col-10 col-lg-7 col-md-10 col-sm-10 my-4 d-flex flex-column gap-2">
        <section class="category_section form-group col-lg-8 d-flex flex-column">
            <label for="category">Category</label>
            <select class="form-control dropdown_list w-75" id="category" name="category">
                <option value="" selected disabled hidden>Select category...</option>
                <option value="trees">Trees</option>
                <option value="flowers">Flowers</option>
                <option value="fruits">Fruits</option>
            </select>
        </section>
        <section class="category_section form-group col-lg-8 d-flex flex-column">
            <label for="product_size">Product Size</label>
            <select class="form-control dropdown_list w-75" id="product_size" name="product_size">
                <option value="" selected disabled hidden>Select product size...</option>
                <option value="small">Small</option>
                <option value="medium">Medium</option>
                <option value="large">Large</option>
            </select>
        </section>
        <section class="input_section col-lg-8 d-flex flex-column">
            <label for="product_name">Product name<br></label>
            <label class="input_label">
                <input class="d-flex w-75" type="text" placeholder="Product name..." id="product_name">
            </label>
        </section>
        <section class="input_section d-flex flex-column">
            <label for="price">Price<br></label>
            <div class="price_wrapper d-flex flex-row align-items-center">
                <label class="input_label">
                    <input class="d-flex" type="text" placeholder="Price..." id="Price">
                </label>
                <p class="euro text-center">€</p>
            </div>
        </section>
        <section class="input_section col-lg-8 d-flex flex-column">
            <label for="short_description">Short description<br></label>
            <label class="input_label">
                <textarea class="form-control flex-grow-1 d-flex w-100" rows="3" type="text"
                          placeholder="Product name..." id="short_description"></textarea>
            </label>
        </section>
        <section class="input_section col-lg-8 d-flex flex-column">
            <label for="long_description">Long description<br></label>
            <label class="input_label">
                <textarea class="form-control flex-grow-1 d-flex w-100" rows="6" type="text"
                          placeholder="Product description..." id="long_description"></textarea>
            </label>
        </section>
    </div>
    <div class="col-12 d-flex justify-content-center text-center m-0">
        <button type="button" class="btn_custom" id="save_changes">
            Save changes
        </button>
    </div>
    <script>
        var button = document.getElementById('save_changes');
        button.addEventListener("click", save_changes_func);

        async function save_changes_func(){
            var product_name = document.getElementById('product_name').value;
            var price = document.getElementById('Price').value;
            var short_desc = document.getElementById('short_description').value;
            var desc = document.getElementById('long_description').value;
            var category = document.getElementById('category').value;
            var product_size = document.getElementById('product_size').value;


            var formData = new FormData();
            formData.append('product_name', product_name);
            formData.append('price', price);
            formData.append('short_description', short_desc);
            formData.append('description', desc);
            formData.append('category', category);
            formData.append('product_size', product_size);



            /*for (var i = 1; i <= counter; i++) {
                formData.append('photos[]', document.getElementById('upload-image-' + i.toString()).src);
            }*/

            var photoPromises = [];
            for (var i = 1; i <= counter; i++) {
                var imgElement = document.getElementById("upload-image-" + i.toString());
                if (imgElement == null){
                    continue;
                }
                var imgUrl = imgElement.src;
                var imgPromise = fetch(imgUrl)
                    .then(function (response) {
                        return response.blob();
                    })
                    .then(function (blob) {
                        var fileName = "photo_" + i.toString() + ".png";
                        var file = new File([blob], fileName, { type: "image/png" });
                        formData.append("photos[]", file);
                    });
                photoPromises.push(imgPromise);
            }

            await Promise.all(photoPromises);


            await $.ajax({
                url: '{{route('admin.store')}}',
                method: 'POST',
                data: formData,
                contentType : false,
                processData : false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response){
                    console.log("success");
                    window.location.href='/admin';
                },
                error: function (response){
                    console.log("error");
                }
            }
            );

        }
    </script>
</main>


<!-- Footer -->
@include('includes.footer')
<!-- end Footer -->

</body>
</html>
