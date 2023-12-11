<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it</title>
    <link rel="shortcut icon" href="\media\LOGO_PRESTO_FRANCESCO_tondo.png" />
    {{-- jquery --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
   
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <div class="d-none d-md-flex justify-content-end"><x-cartMini/></div>
    
    <x-navbar/>

    <div class="d-block d-md-none mb-5 marginee">
        <h1>
            <a href="{{ route('welcome') }}"><img class="P-cell"
                    src="/media/LOGO_PRESTO_FRANCESCO_FAI_SUBITO.png" alt="Presto logo"></a>
        </h1>
    </div>
    
    
    {{$slot}}

    
    <x-footer/>
    
{{-- google font --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500;600;700&family=Paytone+One&display=swap"
rel="stylesheet">

</body>
</html>