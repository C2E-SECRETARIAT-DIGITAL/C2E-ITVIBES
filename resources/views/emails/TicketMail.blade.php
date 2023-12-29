@component('mail::message')
# {{ $maildata['title'] }} <br>

Bonjour {{ $maildata['etudiant']->nom }} {{ $maildata['etudiant']->prenoms  }} ! <br> <br>

Le bureau du C2E tient à vous remercier pour l'achat de votre ticket de participation à l'IT VIBES 2024. <br>
Vous trouverez votre ticket de participation en pièce jointe.

Rendez-vous le <b>Vendredi 12 Janvier 2024</b> ! <br> <br>
>>>>>>> a58d6b5be4d118972b673ccfccdec1f9a70088df

Cordialement,<br>

Le Bureau du C2E

@endcomponent