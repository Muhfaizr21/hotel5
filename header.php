<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Hotel Hebat</title>
    <style>

        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        #jumbotron {
            margin-top: 5rem;
        }

        .text-title {
            font-size: 45px;
        }

        .jumbotron {
            width: 100%;
            height: 80vh;
            background: url(assets/img/jumbotron.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border-radius: 1rem;
        }

        .text-jumbotron {
            text-shadow: 2px 2px rgba(50, 50, 50, 0.5);
            margin-top: 50px;
        }

        .p-jumbotron {
            margin-top: 50px;
            text-shadow: 2px 2px rgba(50, 50, 50, 0.5);
        }

        .card-available {
            margin: 0 60px;
            margin-top: 150px;
            padding-left: 1rem;
            padding-bottom: 1rem;
            padding-top: 1rem;
            padding-right: 1rem;
        }

        .row-av {
            margin: auto;
        }

        .row-av .col {
            margin-right: 20px;
            margin-left: 20px;
        }

        .form-av {
            display: flex;
        }

        .input-av {
            border: none;
        }

        #about {
            margin-top: 150px;
            width: 100%;
            height: 100vh;
            padding-top: 100px;
        }

        /* .about {
            /* margin-top: 250px; 
        } */

        /* .about .row .col {
            te
        } */

        .card-about {
            overflow: hidden;
        }

        .card-about img{
            transition: all 1s ease;
        }

        .card-about img:hover  {
            transform: scale(1.2);
        }

        .card-image {
            overflow: hidden;
        }

        .fitur {
            display: flex;
            flex-direction: row;
        }

        #fasilitas-hotel {
            padding-left: 50%;
        } 

        .kolom-about .gambar {
            position: absolute;
            margin-left: 40px;
            cursor: pointer;
            padding-left: 20px;
        }

        .kolom-about .gambar img {
            border-radius: 10px;
        }

        .kolom-about .gambar1 {
            margin-left: -30px;
            transform: rotateZ(-27deg);
            opacity: 0.7;
            transition: all 0.7s ease;
        }

        .kolom-about .gambar1:hover {
            transform: scale(1.04);
            transform: rotateZ(0);
            z-index: 4;
            opacity: 1;
        }

        .kolom-about .gambar3 {
            margin-left: 100px;
            transform: rotateZ(27deg);
            z-index: 0;
            opacity: 0.7;
            transition: all 0.7s ease;
        }

        .kolom-about .gambar2 {
            z-index: 2;
        }

        .kolom-about .gambar3:hover {
            transform: scale(1.04);
            transform: rotateZ(0);
            z-index: 4;
            opacity: 1;
        }
    </style>
</head>