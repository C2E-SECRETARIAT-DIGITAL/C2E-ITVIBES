@component('mail::message')
# {{ $maildata['title'] }}

Bonjour {{ $maildata['etudiant']->nom }} {{ $maildata['etudiant']->prenoms  }} !

Le bureau du C2E tient à vous remercier pour l'achat de votre ticket de participation à l'IT VIBES 2021.
Vous trouverez votre ticket de participation en pièce jointe.

Rendez-vous le samedi 18 décembre !

Cordialement,<br>

Le Bureau du C2E

@endcomponent