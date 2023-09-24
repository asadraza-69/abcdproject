<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .dress-img-container {
            text-align: center;
            max-width: 50%;
        }

        .dress-img {
            max-width: 80%;
            /* Set maximum width to 100% of the parent div */
            max-height: 80%;
            /* Set maximum height to 100% of the parent div */
        }

        @media print {
            @page {
                size: portrait;

            }

            @page rotated {
                page-orientation: rotate-left;
            }

            div {
                overflow: hidden;
            }

            body {
                margin: 0;
                font-size: 2em;
            }

            .landscape {
                page: rotated;
                transform-origin: top left;
                transform: translateX(100vw) rotate(90deg);
                width: 100vh;
                height: 100vw;
            }
        }
    </style>
</head>

<body>
    <div>
        <h1>Portrait page.</h1>
        <p>Tenderloin ham boudin tongue sausage venison short ribs sirloin,
            kielbasa beef ribs. Strip steak shank bresaola salami spare ribs
            kielbasa fatback, cow t-bone flank leberkas sirloin. Jowl pork
            belly ribeye, corned beef sirloin chicken salami tail. Rump swine
            ham shank corned beef short loin, speck turkey pancetta shankle
            frankfurter. Pancetta tail fatback, ground round brisket biltong
            frankfurter turkey. Ham hock chicken strip steak, salami short
            ribs beef ribs pork sirloin pastrami pork loin turducken rump
            brisket andouille.</p>
    </div>
    <div class="landscape">
        <h1>Landscape page.</h1>
        <p>Tenderloin ham boudin tongue sausage venison short ribs sirloin,
            kielbasa beef ribs. Strip steak shank bresaola salami spare ribs
            kielbasa fatback, cow t-bone flank leberkas sirloin. Jowl pork
            belly ribeye, corned beef sirloin chicken salami tail. Rump swine
            ham shank corned beef short loin, speck turkey pancetta shankle
            frankfurter. Pancetta tail fatback, ground round brisket biltong
            frankfurter turkey. Ham hock chicken strip steak, salami short
            ribs beef ribs pork sirloin pastrami pork loin turducken rump
            brisket andouille.</p>
    </div>
    <div class="landscape">
        
        <div class="row">
            <div class=" col-md-12 d-flex flex-row justify-content-end align-items-end">
                <button type="button" class="btn btn-info m-2 text-dark">Dress ID#</button>
                <button type="button" class="btn btn-info m-2 text-dark">Page Number#</button>
            </div>
        </div>
    </div>
    <div>
        <h1>Portrait page again.</h1>
        <p>Tenderloin ham boudin tongue sausage venison short ribs sirloin,
            kielbasa beef ribs. Strip steak shank bresaola salami spare ribs
            kielbasa fatback, cow t-bone flank leberkas sirloin. Jowl pork
            belly ribeye, corned beef sirloin chicken salami tail. Rump swine
            ham shank corned beef short loin, speck turkey pancetta shankle
            frankfurter. Pancetta tail fatback, ground round brisket biltong
            frankfurter turkey. Ham hock chicken strip steak, salami short
            ribs beef ribs pork sirloin pastrami pork loin turducken rump
            brisket andouille.</p>
    </div>
</body>

</html>