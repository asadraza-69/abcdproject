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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title></title>
    
</head>

<body>
    <div class="page">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6 d-flex justify-content-center">
                    <h1 class="title">Mother teresa</h1>
                </div>
                <div class="col-md-3">
                </div>
            </div>
            <div class="row">
                <div class="dress-img-container col-md-6 d-flex justify-content-center">
                    <img class="dress-img" src="assets/img/Slide50.png" alt="">
                </div>
                <div class="dress-desc-container col-md-6 d-flex  flex-column justify-content-around align-items-start">
                    <div class="d-flex flex-column justify-content-start align-items-start ">
                        <h2 class="sub-title-1">Description</h2>
                        <p class="sub-text-1">Agnes Gonxhe Bojaxhiu, known to the world as 'Mother Teresa' was a famous Albanian-Indian nun, who founded the Missionaries of Charity. She lived in India most of her life helping the poor and weak. She became a nun at a very young age. She was admired all over the world for her charitable work, including feeding the hungry, and looking after the sick.</p>
                    </div>
                    <div class="d-flex flex-column justify-content-start align-items-start">
                        <h2 class="sub-title-1">Did you know?</h2>
                        <p class="sub-text-1">Mother Teresa won the Nobel Peace Prize for her charitable contributions to society.</p>
                    </div>
                    <div class="d-flex flex-column justify-content-start align-items-start">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class=" col-md-12 d-flex flex-row justify-content-end align-items-end">
                    <button type="button" class="btn btn-info m-2 text-dark">Dress ID#</button>
                    <button type="button" class="btn btn-info m-2 text-dark">Page Number#</button>
                </div>
            </div>
        </div>
    </div>
    <div class="page">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6 d-flex justify-content-center">
                    <h1 class="title">Mother teresa</h1>
                </div>
                <div class="col-md-3">
                </div>
            </div>
            <div class="row">
                <div class="dress-desc-container col-md-6 d-flex  flex-column justify-content-around align-items-start">
                    <div class="d-flex flex-column justify-content-start align-items-start ">
                        <h2 class="sub-title-1">Description</h2>
                        <p class="sub-text-1">Agnes Gonxhe Bojaxhiu, known to the world as 'Mother Teresa' was a famous Albanian-Indian nun, who founded the Missionaries of Charity. She lived in India most of her life helping the poor and weak. She became a nun at a very young age. She was admired all over the world for her charitable work, including feeding the hungry, and looking after the sick.</p>
                    </div>
                    <div class="d-flex flex-column justify-content-start align-items-start">
                        <h2 class="sub-title-1">Did you know?</h2>
                        <p class="sub-text-1">Mother Teresa won the Nobel Peace Prize for her charitable contributions to society.</p>
                    </div>
                    <div class="d-flex flex-column justify-content-start align-items-start">

                    </div>
                </div>
                <div class="dress-img-container col-md-6 d-flex justify-content-center">
                    <img class="dress-img" src="assets/img/Slide50.png" alt="">
                </div>
            </div>
            <div class="row">
                <div class=" col-md-12 d-flex flex-row justify-content-end align-items-end">
                    <button type="button" class="btn btn-info m-2 text-dark">Dress ID#</button>
                    <button type="button" class="btn btn-info m-2 text-dark">Page Number#</button>
                </div>
            </div>
        </div>
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

        $("#dress-img").css({
            "width": <?php echo json_encode($pic_width); ?>, // Set your desired width
            "height": <?php echo json_encode($pic_height); ?> // Set your desired height
        });
        console.log($("#dress-img"));
        const layoutA = '<div class="page"><div class="container"><div class="row"><div class="col-md-3"></div><div class="col-md-6 d-flex justify-content-center"><h1 class="title">Mother teresa</h1></div><div class="col-md-3"></div></div><div class="row">    <div class="col-md-6 d-flex justify-content-center">        <img src="assets/img/abcd_logo2.png" alt="">    </div>    <div class="col-md-6">        <div class="d-flex flex-column justify-content-start align-items-start">            <h2 class="sub-title-1">sub title</h2>            <p class="sub-text-1">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Assumenda, hic.</p>        </div>        <div class="d-flex flex-column justify-content-start align-items-start">            <h2 class="sub-title-1">sub title 2</h2>            <p class="sub-text-1">Lorem ipsum dolor sit amet.</p>        </div>        <div class="d-flex flex-row justify-content-end align-items-end">            <button type="button" class="btn btn-primary m-2">Dress ID#</button>            <button type="button" class="btn btn-primary m-2">Page Number#</button>        </div>    </div></div></div></div>'


        // dressTextarea = dressTextarea.split(', ');
        // console.log('dressTextarea:',typeof dressTextarea);
        // console.log('dressTextarea:', dressTextarea);

        // console.log('layout:', layout);

        // if (layout == 'a') {
        //     $('body').html(layoutA);
        // }
        // if (layout == 'b') {
        //     $('body').html(layoutB);
        // }
        // if (layout == 'c') {
        //     $('body').html(layoutC);
        // }
        // console.log('sorting:', sorting);
        // console.log('numbering:', numbering);
    });
</script>

</html>