@component('mail::message')
# Introduction

Bonjour Ayoub Lemsafi ,Nous tenons à vous informer que nous avons bien reçu votre candidature à l'offre .Nous procéderons à l'étude de votre dossier et vous contacterons dans le cas ou votre candidature est retenue, dans le cas contraire à défaut de recevoir un mail de réponse négative de notre part dans un délai dépassant les 8 semaines, merci de comprendre que nous ne sommes pas en mesure d'y donner une suite favorable pour le moment.Cordialement,Direction des Ressources Humaines Menara Holding.

@component('mail::button', ['url' => 'http://127.0.0.1:8000'])
Home
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
