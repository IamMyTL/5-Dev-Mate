@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Accueil') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::check() == true)
                    <p><b>Ravi de te revoir, {{Auth::user()->surname}}!</b></p>
                    <p>
                        Nous nous connaissons déjà, mais petite piqûre de rappel: Dev Mate est une plateforme en ligne permettant de mettre
                        en relation des développeurs et des employeurs dans le secteurs de l'informatique.
                    </p>
                    <p>
                        Tu es un employeur? Effectue tes recherches de candidats en publiant une annonce depuis la page "Mes Annonces", dans la
                        rubrique <b>Navigation</b>.
                    </p>
                    <p>
                        Tu es candidat? Complètete ton profil dès maintenant via la page "Mon Profil" accessible depuis le volet de navigation
                        <b>{{Auth::user()->name}}</b>. Tu pourras y indiquer les compétences que tu maîtrises, ainsi que mettre ton CV directement sur
                        la plateforme.
                    </p>
                    <p>
                        Une fois que c'est fait, accède à la Place de marché via la rubrique <b>Navigation</b> et découvre les annonces ou les
                        profils suscpetibles de t'intéresser. Tu n'as rien à faire, on s'occupe de tout!
                    </p>
                    <p>
                        L'équipe de Dev Mate te souhaite une agréable navigation sur notre plateforme!
                    </p>
                    @else
                    <p><b>Bienvenue sur Dev Mate!</b></p>
                    <p>
                        Dev Mate est une plateforme permettant de mettre en relation des développeurs et employeurs dans le secteur de l'informatique.
                    </p>
                    <p>
                        Si tu nous connais déjà, nous t'invitons à te connecter à ton compte via la page <b>Connexion</b> afin d'accéder à nos services.
                    </p>
                    <p>
                        Si ce n'est pas le cas, nous t'invitons alors à t'inscrire dès à présent via la page <b>Inscription</b> en haut à droite de cette page.
                    </p>
                    <p>
                        Une fois que tu feras partie de la famille Dev Mate, tu seras amené à publier des annonces si tu es un Recruteur, ou à compléter ton profil
                        avec les compétences dont tu disposes ainsi que ton CV si tu es Candidat. Cela te permettra d'accéder à notre place de marché afin de découvrir les profils ou
                        les annonces susceptibles de t'intéresser.
                    </p>
                    <p>
                        En espérant que tu fasses bientôt partie des nôtres, l'équipe de Dev Mate te souhaite dores et déjà une agréable navigation sur notre plateforme!
                    </p>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
