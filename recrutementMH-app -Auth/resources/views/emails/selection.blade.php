@component('mail::message')
# Candidature regetée

Bonjour Ayoub Lemsafi, Nous tenons à vous remercier de la confiance que vous nous témoignez, et de l’intérêt que vous portez aux activités de notre entreprise, en nous proposant votre collaboration pour le poste .Malheureusement, malgrès tout l’intérêt que présente votre dossier, nous ne pouvons pas y donner une suite favorable.Nous nous permettons cependant de conserver votre dossier et ne manquerons pas de vous contacter si une nouvelle opportunité venait à se présenter.En vous souhaitant de réussir dans votre recherche actuelle.Cordialement;Direction des Ressources Humaines Menara Holding

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Menara Prefa
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
