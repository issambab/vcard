<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Passeport Lefri9i</title>

</head>
<body>
<div >

 <p >Bonjour {{$name}} </p>
 <p >Nous accusons réception de votre inscription et paiement pour l’achat du Passeport Lefri9i N° (@php echo str_pad($nsponso,5,0,STR_PAD_LEFT)  @endphp) du ({{ \Carbon\Carbon::parse($create)->format('d-m-y') }}) courant et vous confirmons que vous serez informé par mail pour revenir le récupérer dans les plus brefs délais.
 </p>
 
<p>#Club_Africain</p>

</div>
</body>
</html>