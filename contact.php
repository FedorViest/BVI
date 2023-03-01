<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <link rel="stylesheet" href="css/contact.css" type="text/css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    </head>
    <body>
        <?php include("header.php"); ?>
        <section class="outer_contact">
            <section class="inner_contact">
                <!-- section for contact map-->
                <section class="content">
                    <iframe width="100%" height="100%" src="https://www.openstreetmap.org/export/embed.html?bbox=17.06408500671387%2C48.150841192448034%2C17.078247070312504%2C48.15715413998257&amp;layer=mapnik" style="border: 1px solid black"></iframe><br/><small></small>
                </section>
                <!-- section for contact information including address, phone, email-->
                <section class="content">
                    <section class="contact_information">
                        <section class="contact_information_block">
                            <span class="material-symbols-outlined">location_on</span>
                            <article>
                                <p class="paragraph_title">FIIT STU</p>
                                <p>Ilkovicova 2, <br>842 16 Karlova Ves, <br>Bratislava</p>
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
                <!-- section for contact information including opening hours-->
                <section class="content">
                    <section class="contact_information">
                        <article>
                            <h3>Opening hours</h3>
                            <ul class="opening_hours">
                                <li>Mon       8-15</li>
                                <li>Tue       10-16</li>
                                <li>Wed       8-12</li>
                                <li>Thu       9-15</li>
                                <li>Fri       10-16</li>
                                <li>Sat, Sun  10-15</li>
                            </ul>
                        </article>
                    </section>
                </section>
            </section>
        </section>
        <?php include("footer.php"); ?>
    </body>
</html>