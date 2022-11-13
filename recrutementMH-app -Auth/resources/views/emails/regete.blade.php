@component('mail::message')
# Félicitations !

Bonjour Ayoub Lemsafi, Nous avons le plaisir de vous annoncer que votre candidature à l'offre  a été sélectionnée. Nous vous invitons à passer un entretien au niveau de notre siège à l'adresse ................., le JJ/MM/AAAA à hh:mm. Merci de venir muni(e) de votre ................. (ex: CV mis à jour / pièce d'identité / Mail imprimé).Cordialement; Direction des Ressources Humaines Menara Holding

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Voir autres annonces
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
