<!DOCTYPE html>
<html>

<head>
  <title>Book Compiler</title>
  <link rel="icon" href="assets/img/abcd_logo2.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/index.css" />

  <style>

  </style>
</head>

<body>
  <div class="container">
    <div class="testbox">
      <form action="generated_book.php" method="POST">
        <div class="banner">
          <h1>Compile Book Form</h1>
        </div>
        <div class="item">
          <p>Dress Numbers</p>
          <textarea name="dress-textarea" class="dress-textarea" rows="3"></textarea>
        </div>
        <div class="question">
          <p style="margin: 0px;">Layout</p>
          <div class="question-answer">
            <input type="radio" value="a" id="radio_1" name="layout" checked />
            <label for="radio_1" class="radio"><span>Picture on Left – Text on Right – Single Page – Landscape Mode</span></label>
            <input type="radio" value="b" id="radio_2" name="layout" />
            <label for="radio_2" class="radio"><span>Picture on Right – Text on Left – Single Page – Landscape Mode</span></label>
            <input type="radio" value="c" id="radio_3" name="layout" />
            <label for="radio_3" class="radio"><span>Picture on Left Page – Text on Right Page – Two Page Mode – Portrait Mode</span></label>
          </div>
        </div>
        <div class="item">
          <p>Preferences</p>
          <div class="city-item" style="margin-left: 5px;">
            <label class="pref-txt"><span>Text Size</span></label>
            <input type="text" name="name" placeholder="Text Size" id="text-size" class="txt-pref-x" disabled />

            <label class="pref-txt"><span>Text Font</span></label>
            <input type="text" name="name" placeholder="Text Font" id="text-font" class="txt-pref" disabled />


          </div>
          <div class="city-item" style="margin-left: 5px;">
            <label class="pref-txt"><span>Title size</span></label>
            <input type="text" name="name" placeholder="Title size" id="title-size" class="txt-pref-x" disabled />

            <label class="pref-txt"><span>Title Font</span></label>
            <input type="text" name="name" placeholder="Title Font" id="title-font" class="txt-pref" disabled />
          </div>
          <div class="city-item">
            <label class="pref-txt"><span>Subtitle Size</span></label>
            <input type="text" name="name" placeholder="Subtitle Size" id="subtitle-size" class="txt-pref-x" disabled />

            <label class="pref-txt"><span>Subtitle Font</span></label>
            <input type="text" name="name" placeholder="Subtitle Font" id="subtitle-font" class="txt-pref" disabled />

          </div>
        </div>
        <div class="question">
          <p>Sorting Order</p>
          <div class="question-answer">
            <input type="radio" value="a" id="radio_4" name="sorting" checked />
            <label for="radio_4" class="horizontal-radio"><span>By Name</span></label>
            <input type="radio" value="b" id="radio_5" name="sorting" />
            <label for="radio_5" class="horizontal-radio"><span>By ID</span></label>
            <input type="radio" value="c" id="radio_6" name="sorting" />
            <label for="radio_6" class="horizontal-radio"><span>By Input Order</span></label>
          </div>
        </div>

        <div class="question">
          <p>Numbering</p>
          <div class="question-answer">
            <input type="radio" value="a" id="radio_7" name="numbering" checked />
            <label for="radio_7" class="horizontal-radio"><span>Show both Page No and Dress ID</span></label>
            <input type="radio" value="b" id="radio_8" name="numbering" />
            <label for="radio_8" class="horizontal-radio"><span>Show Page number</span></label>
            <input type="radio" value="c" id="radio_9" name="numbering" />
            <label for="radio_9" class="horizontal-radio"><span>Show Dress ID</span></label>
          </div>
        </div>

        <input type="text" hidden value="" id="pic-width" name="pic-width">
        <input type="text" hidden value="" id="pic-height" name="pic-height">

        <div class="btn-block">
          <button type="submit" id="generate-button">Generate</button>
          <button type="button" id="help-button">Help</button>
        </div>
      </form>
    </div>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="assets/js/index.js"></script>

</html>