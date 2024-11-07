@component('mail::message')
# {{ $maildata['title'] }} <br>

Bonjour {{ $maildata['etudiant']->nom }} {{ $maildata['etudiant']->prenoms  }} ! <br> <br>

Le bureau du C2E tient à vous remercier pour l'achat de votre ticket de participation à l'IT PAIYA 2024. <br>
Vous trouverez votre ticket de participation en pièce jointe.

Rendez-vous le <b>Vendredi 12 Décembre 2024</b> ! <br> <br>

Cordialement,<br>

Le Bureau du C2E

@endcomponent