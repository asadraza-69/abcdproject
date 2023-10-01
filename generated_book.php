<?php
// process_form.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dressTextarea = $_POST["dress-textarea"];
    $layout = $_POST["layout"];
    $sorting = $_POST["sorting"];
    $numbering = $_POST["numbering"];
    $pic_width = $_POST["pic-width"];
    $pic_height = $_POST["pic-height"];
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
    <link rel="stylesheet" href="assets/css/loader.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/generated_book.css" />
    <title>Generate Book</title>
    <link rel="icon" href="assets/img/abcd_logo2.png" type="image/x-icon">

    <style>
        <?php if ($layout == 'a' || $layout == 'b'): ?>
            @media print {
                @page {
                    size: A4 landscape !important;
                    margin-top: 0;
                    margin-bottom: 0;
                }
            }
        <?php else: ?>
            @media print {
                @page {
                    size: A4 portrait !important;
                    margin-top: 0;
                    margin-bottom: 0;
                }
            }
        <?php endif; ?>
    </style>

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


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script src="assets/js/index.js"></script>
    <script src="assets/js/generated_book.js"></script>
    
    <script>

        const document_config = {};

        function updateFieldsConfig () 
        {
            $(".text").css({
                "fontSize": document_config.textSize + 'px',
                "fontFamily": document_config.textFont
            });
            $(".title").css({
                "fontSize": document_config.titleSize + 'px',
                "fontFamily": document_config.titleFont 
            });
            $(".sub-title").css({
                "fontSize": document_config.subtitleSize + 'px',
                "fontFamily": document_config.subtitleFont 
            });
        }

        $(document).ready(function() {
            
            $.get("preferences.txt", function(pdata) {
                const data = parseFileContent(pdata);
                document_config.textSize = data.TEXT_SIZE;
                document_config.textFont = data.TEXT_FONT;
                document_config.titleSize = data.TITLE_SIZE;
                document_config.titleFont = data.TITLE_FONT;
                document_config.subtitleSize = data.SUBTITLE_SIZE;
                document_config.subtitleFont = data.SUBTILE_FONT;
                document_config.picWidth = data.PIC_WIDTH !== undefined && data.PIC_WIDTH !== null ? data.PIC_WIDTH : null;
                document_config.picHeight = data.PIC_HEIGHT !== undefined && data.PIC_HEIGHT !== null ? data.PIC_HEIGHT : null;
            });
    
    
            function LayoutC(data) {
                for (var i = 0; i < data.length; i++) {
                    var idx = i + 1
                    var item = data[i];
                    var l_html = `
                    <div class="portrait-mode stndrd-dimensions">
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
                                    <button class="dress-id btn btn-info mx-2" disabled>${item.data.id}</button>
                                    <button class="page-id btn btn-info" disabled>${idx}</button>
                                </div>
                            </div>
                        </div>
                    </div>`
                    $('.container').append(l_html);
                }
    
                $(".portrait-mode").each(function() {
                    $(this).addClass('add-page-break');
                    $(this).find(".page-one").addClass('add-page-break');
                    $(this).find(".page-two").addClass('add-page-break');
                });

                updateFieldsConfig();

                return data;
            }
    
            function LayoutA(data) {
                for (var i = 0; i < data.length; i++) {
                    var idx = i + 1
                    var item = data[i];
                    var l_html = `
                    <div class="printing-section-mode-1 stndrd-dimensions">
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
                                    <button class="dress-id btn btn-info mx-2" disabled>${item.data.id}</button>
                                    <button class="page-id btn btn-info" disabled>${idx}</button>
                                </div>
                            </div>
                        </div>
                    </div>`;
                    $('.container').append(l_html);
                }
                updateFieldsConfig();
                
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
                                    <button class="dress-id btn btn-info mx-2" disabled>Dress Id# ${item.data.id}</button>
                                    <button class="page-id btn btn-info" disabled>Page# ${idx}</button>
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
    
                updateFieldsConfig();
                return data;
            }
    
            var dressTextarea = <?php echo json_encode($dressTextarea); ?>;
            var layout = <?php echo json_encode($layout); ?>;
            var sorting = <?php echo json_encode($sorting); ?>;
            var numbering = <?php echo json_encode($numbering); ?>;
    
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

</body>
</html>