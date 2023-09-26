<?php
// process_form.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dressTextarea = $_POST["dress-textarea"];
    $layout = $_POST["layout"];
    $sorting = $_POST["sorting"];
    $numbering = $_POST["numbering"];
    $pic_width = $_POST["pic-width"];
    $pic_height = $_POST["pic-height"];
    // echo ("dressTextarea:" . $dressTextarea);
    // echo ("layout:" . $layout);
    // echo ("sorting:" . $sorting);
    // echo ("numbering:" . $numbering);
} else {
    header("Location: index.php"); // Replace "index.php" with the actual filename
    exit; //
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/generated_book.css" />
    <link rel="stylesheet" href="assets/css/loader.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Generate Book</title>
    <link rel="icon" href="assets/img/abcd_logo2.png" type="image/x-icon">

</head>

<body>
    <div class="spinner">
        <div class="rect1"></div>
        <div class="rect2"></div>
        <div class="rect3"></div>
        <div class="rect4"></div>
        <div class="rect5"></div>
    </div>
    <div class="container">

    </div>
</body>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="assets/js/index.js"></script>
<script src="assets/js/generated_book.js"></script>

<script>
    $(document).ready(function() {
        $.get("preferences.txt", function(pdata) {
            const data = parseFileContent(pdata);
            // console.log("data",data)
            const textSize = data.TEXT_SIZE;
            const textFont = data.TEXT_FONT;
            const titleSize = data.TITLE_SIZE;
            const titleFont = data.TITLE_FONT;
            const subtitleSize = data.SUBTITLE_SIZE;
            const subtitleFont = data.SUBTILE_FONT;
            const picWidth = data.PIC_WIDTH !== undefined && data.PIC_WIDTH !== null ? data.PIC_WIDTH : null;
            const picHeight = data.PIC_HEIGHT !== undefined && data.PIC_HEIGHT !== null ? data.PIC_HEIGHT : null;
            console.log("textSize", textSize)
            console.log("textFont", textFont)
            console.log("titleSize", titleSize)
            console.log("titleFont", titleFont)
            console.log("subtitleSize", subtitleSize)
            console.log("subtitleFont", subtitleFont)
            console.log("picWidth", picWidth)
            console.log("picHeight", picHeight)
            $(".text").css({
                "font-size": textSize,
                "font-family": textFont // Set your desired font family
            });
            $(".title").css({
                "font-size": titleSize,
                "font-family": titleFont // Set your desired font family
            });
            $(".sub-title").css({
                "font-size": subtitleSize,
                "font-family": subtitleFont // Set your desired font family
            });


        });


        function LayoutC(data) {
            for (var i = 0; i < data.length; i++) {
                var idx = i + 1
                var item = data[i];
                var l_html = `
                <div class="portrait-mode stndrd-dimensions" id="portrait-mode">
                    <h1 class="title d-print-none">${item.data.name}</h1>
                    <div class="row">
                        <div class="col-6 page-one">
                            <img
                            class="img-fluid img-fluid-portrait"
                            src="https://abcd2.projectabcd.com/images/dress_images/${item.data.image_url}"
                            alt="${item.data.name}"
                            />
                            
                        </div>
                        <div class="col-6 page-two d-flex flex-column justify-content-around">
                            <div>
                            <h1 class="title d-none d-print-block">${item.data.name}</h1>
                            <h2 class="sub-title potrait-sub-title">Description</h2>
                            <p class="text potrait-sub-title">
                                ${item.data.description}
                            </p>
                            </div>
                            <div>
                            <h2 class="sub-title potrait-sub-title">Did you know?</h2>
                            <p class="text potrait-sub-title">
                                ${item.data.did_you_know}
                            </p>
                            </div>
                            <div class="d-flex flex-row justify-content-end mb-3">
                            <button id= "dress-id" class="dress-id btn btn-info mx-2" disabled>Dress Id# ${item.data.id}</button>
                            <button id= "page-id" class="page-id btn btn-info" disabled>Page# ${idx}</button>
                            </div>
                        </div>
                    </div>
                </div>`
                // console.log("l_html :",l_html)
                $('.container').append(l_html);
                // console.log('Response Item:', item);
                // console.log('Name:', item.data);
            }

            $(".portrait-mode").each(function() {
                $(this).css({
                    "page-break-before": "always", // Optional: Force a page break before this element
                });
                $(this).find(".page-one").css({
                    "page-break-before": "always", // Optional: Force a page break before this element
                });
                $(this).find(".page-two").css({
                    "page-break-before": "always", // Optional: Force a page break before this element
                });

                $(this).find("@page").css({
                    size: "portrait",
                });
            });
            return data;
        }

        function LayoutA(data) {
            for (var i = 0; i < data.length; i++) {
                var idx = i + 1
                var item = data[i];
                var l_html = `
                <div class="printing-section-mode-1 stndrd-dimensions" id="printing-section-mode-1">
        <h1 class="title">${item.data.name}</h1>
        <div class="row">
          <div class="col-6">
            <img
              class="img-fluid"
              src="https://abcd2.projectabcd.com/images/dress_images/${item.data.image_url}"
              alt="${item.data.name}"
            />
          </div>
          <div class="col-6 d-flex flex-column justify-content-around">
            <div>
              <h2 class="sub-title">Description</h2>
              <p class="text">
                ${item.data.description}
              </p>
            </div>
            <div>
              <h2 class="sub-title">Did you know?</h2>
              <p class="text">
              ${item.data.did_you_know}
              </p>
            </div>
            <div class="d-flex flex-row justify-content-end mb-3">
                <button id= "dress-id" class="dress-id btn btn-info mx-2" disabled>Dress Id# ${item.data.id}</button>
                <button id= "page-id" class="page-id btn btn-info" disabled>Page# ${idx}</button>
            </div>
          </div>
        </div>
      </div>`;
                $('.container').append(l_html);
            }

            return data;
        }

        function LayoutB(data) {
            for (var i = 0; i < data.length; i++) {
                var idx = i + 1
                var item = data[i];
                l_html = `<div
        class="printing-section-mode-2 stndrd-dimensions"
        id="printing-section-mode-2"
      >
        <h1 class="title">${item.data.name}</h1>
        <div class="row">
          <div class="col-6 d-flex flex-column justify-content-around">
            <div>
              <h2 class="sub-title">Description</h2>
              <p class="text">
              ${item.data.description}
              </p>
            </div>
            <div>
              <h2 class="sub-title">Did you know?</h2>
              <p class="text">
              ${item.data.did_you_know}
              </p>
            </div>
            <div class="d-flex flex-row justify-content-start mb-3">
                <button id= "dress-id" class="dress-id btn btn-info mx-2" disabled>Dress Id# ${item.data.id}</button>
                <button id= "page-id" class="page-id btn btn-info" disabled>Page# ${idx}</button>
            </div>
          </div>
          <div class="col-6">
            <img
              class="img-fluid"
              src="https://abcd2.projectabcd.com/images/dress_images/${item.data.image_url}"
              alt="${item.data.name}"
            />
          </div>
        </div>
      </div>`;
                $('.container').append(l_html);
            }

            return data;
        }
        spic_width = <?php echo $pic_width != -1 ? json_encode($pic_width) : 0 ?>;
        spic_height = <?php echo $pic_height != -1 ? json_encode($pic_height) : 0 ?>;

        if (spic_width != 0 && spic_height != 0) {
            console.log("Image-Width-Heigth Update");
            $("#dress-img").css({
                "width": <?php echo json_encode($pic_width); ?>, // Set your desired width
                "height": <?php echo json_encode($pic_height); ?> // Set your desired height
            });
        } else {
            console.log("Image-Width-Heigth Not Update");
        }

        var dressTextarea = <?php echo json_encode($dressTextarea); ?>;
        var layout = <?php echo json_encode($layout); ?>;
        var sorting = <?php echo json_encode($sorting); ?>;
        var numbering = <?php echo json_encode($numbering); ?>;
        var pic_width = <?php echo json_encode($pic_width); ?>;
        var pic_height = <?php echo json_encode($pic_height); ?>;

        var dataToSend = {
            dress_list: dressTextarea,
            layout: layout,
            sorting: sorting,
            numbering: numbering
        };
        // console.log("payload",dataToSend)
        $.ajax({
            url: "/abcdproject/backend.php",
            type: 'POST',
            data: JSON.stringify(dataToSend),
            success: function(response) {
                var dataFromBackend = response.data;
                $('.spinner').hide();
                if (layout == 'a') {
                    console.log('layout-A:', layout)
                    LayoutA(dataFromBackend)
                }
                if (layout == 'b') {
                    console.log('layout-B:', layout)
                    LayoutB(dataFromBackend)
                }
                if (layout == 'c') {
                    console.log('layout-C:', layout)
                    LayoutC(dataFromBackend)
                }


                if (numbering == 'b') {
                    $(".dress-id").hide()
                    console.log('numbering-B:', numbering)

                }
                if (numbering == 'c') {
                    $(".page-id").hide()
                    console.log('numbering-C:', numbering)

                }

            },
            error: function() {
                alert('Error');
            }
        });

    });
</script>

</html>