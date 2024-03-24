<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <link rel="stylesheet" href="{{asset('css/contact.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/header.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<!-- Header-->
@include('includes.header')
<!-- end Header -->


<section class="outer_contact">
    <section class="inner_contact">
        <!-- section for contact map-->
        <section class="content">
            <iframe class="picture_map"
                    src="https://www.openstreetmap.org/export/embed.html?bbox=9.853121638298036%2C10.324028499909323%2C9.860202670097353%2C10.32863050546274&amp;layer=mapnik" ">
            </iframe>
        </section>
        <!-- section for contact information including address, phone, email-->
        <section class="content">
            <section class="contact_information">
                <section class="inner_contact_information">
                    <section class="contact_information_block">
                        <span class="material-symbols-outlined">location_on</span>
                        <article>
                            <p class="paragraph_title">PlantHub</p>
                            <p>Address <br>Postcode Citypart, <br>City</p>
                        </article>
                    </section>
                    <section class="contact_information_block">
                        <span class="material-symbols-outlined">call</span>
                        <article>
                            <p>+421 111 111 111,<br> 02/ 1111 1111</p>
                        </article>
                    </section>
                    <section class="contact_information_block">
                        <span class="material-symbols-outlined">alternate_email</span>
                        <article>
                            <p>email@email.com</p>
                        </article>
                    </section>
                </section>
            </section>
        </section>
        <!-- section for contact information including opening hours-->
        <section class="content">
            <section class="contact_information">
                <article class="opening_hours">
                    <h2>Opening hours</h2>
                    <section class="ul_section_opening_hours">
                        <ul class="ul_days">
                            <li>Mon</li>
                            <li>Tue</li>
                            <li>Wed</li>
                            <li>Thu</li>
                            <li>Fri</li>
                            <li>Sat</li>
                            <li>Sun</li>
                        </ul>
                        <ul class="ul_hours">
                            <li>8-15</li>
                            <li>10-16</li>
                            <li>8-12</li>
                            <li>9-15</li>
                            <li>10-16</li>
                            <li>10-15</li>
                            <li>10-12</li>
                        </ul>
                    </section>
                </article>
            </section>
        </section>
    </section>
</section>

<!-- Footer -->
@include('includes.footer')
<!-- end Footer -->

</body>
</html>
