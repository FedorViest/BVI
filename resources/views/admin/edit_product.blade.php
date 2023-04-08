<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
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
                    <input type="file" id="imageUpload" name="images[]" multiple accept=".jpg, .jpeg, .png">
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

        // add an event listener to the file input element
        fileInput.addEventListener('change', function() {
            // remove any existing image previews
            previewContainer.querySelectorAll('.preview-image').forEach(function(img) {
                img.remove();
            });

            // get the selected files
            const files = this.files;

            // loop through the selected files
            Array.from(files).forEach(function(file) {
                // create a new img element for each file
                const imgWrapper = document.createElement('div');
                imgWrapper.classList.add('image_wrapper', 'd-flex', 'flex-row', 'col-12');
                const img = document.createElement('img');
                img.classList.add('img-thumbnail', 'p-0', 'preview-image');
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
            });
        });
    </script>
    <div class="forms_div col-10 col-lg-7 col-md-10 col-sm-10 my-4 d-flex flex-column gap-2">
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
                          placeholder="Product description..." id="long_description">
                </textarea>
            </label>
        </section>
    </div>
    <div class="col-12 d-flex justify-content-center text-center m-0">
        <button type="button" class="btn_custom" onclick="window.location.href='admin.html'">
    Save changes
</button>
    </div>
</main>


<!-- Footer -->
@include('includes.footer')
<!-- end Footer -->

<script>
    // Get the textarea element by its ID
    var textarea = document.getElementById('long_description');

    // Clear the textarea content on page load
    textarea.value = '';
</script>

</body>
</html>
