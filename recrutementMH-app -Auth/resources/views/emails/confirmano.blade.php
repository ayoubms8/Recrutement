@component('mail::message')
# Introduction

Bonjour Tst test1, Votre candidature à l'offre  a bien été transmise à l'entreprise qui recrute.L'entreprise prendra contact avec vous dans le cas ou votre candidature correspond au profil recherché. Dans le cas contraire, Emploitic en tant que média n'intervient pas dans le processus de recrutement de l'entreprise.Cordialement,L’équipe Menara Holding.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
