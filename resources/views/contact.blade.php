@extends('layouts.layout')

@section('title', 'Nous contacter')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-5">
                <h1 class="text-center mb-5 text-primary-custom" style="font-family: 'Cinzel', serif;">Nous contacter</h1>
                
                <div class="contact-info fs-5">
                    <p class="mb-4">Pour nous contacter :</p>
                    
                    <ul class="list-unstyled ps-4">
                        <li class="mb-3">
                            <i class="fas fa-phone me-3 text-primary-custom"></i>
                            <strong>Par Téléphone :</strong> 02 . 40 . 19 . 15 . 45
                        </li>
                        
                        <li class="mb-3">
                            <i class="fas fa-envelope me-3 text-primary-custom"></i>
                            <strong>Par e-mail :</strong> <a href="mailto:ce.pontchateau@wanadoo.fr" class="text-decoration-none text-dark">ce.pontchateau@wanadoo.fr</a>
                        </li>
                        
                        <li class="mb-3">
                            <div class="d-flex">
                                <i class="fas fa-map-marker-alt me-3 text-primary-custom mt-1"></i>
                                <div>
                                    <strong>Par courrier :</strong><br>
                                    Centre Equestre de Pont Château<br>
                                    Coët Roz<br>
                                    44 160 Pont Château
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
