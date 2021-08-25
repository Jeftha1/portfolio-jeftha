<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact</title>
	<link rel="stylesheet" type="text/css" href="{{url('css/main.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="icon" href="{{url('images/portfolio.ico')}}" type="image/icon type">
</head>
<body>

<div class="header">
	<h1>Contact</h1>
</div>

@include('header')

<!-- Contact form -->
<!-- Nog doen: vul form action in op line 31 -->
<div class="row" style="max-width: 90%; margin: auto; ">
	<div class="column">
<section class="mb-4" >
    <h2 class="h1-responsive font-weight-bold text-center my-4">Contactformulier</h2>
    <p class="text-center w-responsive mx-auto mb-5">Heb je vragen of opmerkingen? Aarzel dan niet, en neem contact met mij op.</p>

    <div class="row" style="margin: auto; ">
        <div class="col-md-12">
            <form id="contact-form" name="contact-form" action="https://formsubmit.co/024888275f34bd072406b18c421ae3aa" method="POST">

                <input type="hidden" name="_next" value="{{url('contact')}}">

                <div class="row">
                    <div class="col-md-6">
                            <input type="text" id="name" name="name" class="form-control" placeholder="Je naam" required>
                    </div>

                    <div class="col-md-6">
                            <input type="text" id="email" name="email" class="form-control" placeholder="Je email" required>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-md-12">
                            <input type="text" id="subject" name="subject" class="form-control" placeholder="Onderwerp" required>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-md-12">
                            <textarea type="text" id="message" name="message" rows="4" class="form-control md-textarea" placeholder="Typ hier je bericht" required></textarea>
                    </div>
                </div>
                <br>
                <div class="text-center text-md-right">
                    <button type="submit" class="btn btn-primary">Verzend</button>
                </div>
            </form>
        </div>
    </div>
</section>
</div>

<!-- iframe met Google Maps -->
<div class="column" style="text-align: center;">
	<div class="iframe">
  		<iframe class="responsive-iframe" src="https://maps.google.com/maps?width=700&amp;height=440&amp;hl=en&amp;q=Wortmanlaan%205+(Titel)&amp;ie=UTF8&amp;t=&amp;z=15&amp;iwloc=B&amp;output=embed"></iframe>
	</div>
</div>
</div>
<br>

<div style="position: absolute; bottom: 0; width: 100%;">
@include('footer')
</div>

</body>
</html>