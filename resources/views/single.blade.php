@extends('layouts.front')

@section('css')

@endsection

@section('content')
    <section class="cu-single">
        <div class="cu-container cu-container--single">
            <figure class="cu-single__feature">
                @if(isMobile())
                    <!-- Version cuadrada de foto featured -->
                    <img class="lazy" src="img/loading_p.gif" data-src="uploads/carros/{{ $carro->miniatura }}" data-srcwebp="uploads/carros/{{ nombre_wepb($carro->miniatura) }}" alt="{{ $carro->marca->marca . ' ' . $carro->modelo->modelo . ' ' . $carro->ano . ' ' . $carro->placa }}" />
                @else
                    <!-- Version apaisada de foto featured -->
                    <img class="lazy" src="img/loading_g.gif" data-src="uploads/carros/{{ $carro->img }}" data-srcwebp="uploads/carros/{{ nombre_wepb($carro->img) }}" alt="{{ $carro->marca->marca . ' ' . $carro->modelo->modelo . ' ' . $carro->ano . ' ' . $carro->placa }}" />
                @endif
            </figure>
            <div class="cu-single__content">
                <div id="cu-single-info" class="cu-single__info" aria-hidden="false">
                    <button class="cu-single__info__button" aria-controls="cu-single-info" aria-expanded="true">
                        <span class="close">Cerrar</span>
                        <span class="open">Abrir</span>
                    </button>
                    <h2 class="cu-single__info__model">{{ $carro->modelo->modelo }}</h2>
                    <div class="cu-single__info__meta">
                        <p><span class="cu-single__info__meta__brand">{{ ucfirst(strtolower($carro->marca->marca)) }}</span>
                        <span class="cu-single__info__meta__year">&nbsp;{{ $carro->ano }}</span></p>
                        <p>{{ number_format($carro->kilometraje,0,'.','.') }} km</p>
                    </div>
                    <div class="cu-single__info__footer">
                        <span class="cu-single__info__footer__price">{{ number_format($carro->precio,0,'.','.') }}</span>
                        <a href="" class="cu-button cu-button--filled reserve-btn">Me interesa</a>
                    </div>
                    <ul class="cu-single__info__extras">
                        {!! nl2li($carro->descripcion) !!}
                    </ul>
                    <ul class="cu-single__info__specs">
                        <li>
                            <h5>Color</h5>
                            <span>{{ ucfirst(strtolower($carro->color)) }}</span>
                        </li>
                        <li>
                            <h5>Transmisión</h5>
                            <span>{{ $carro->transmision }}</span>
                        </li>
                        <li>
                            <h5>Tracción</h5>
                            <span>{{ $carro->traccion }}</span>
                        </li>
                        <li>
                            <h5>Combustible</h5>
                            <span>{{ $carro->combustible }}</span>
                        </li>
                        <li>
                            <h5>Tanque de combustible</h5>
                            <span>{{ $carro->tanque_de_combustible }} lts</span>
                        </li>
                        <li>
                            <h5>Puertas</h5>
                            <span>{{ $carro->puertas }}</span>
                        </li>
                        <li>
                            <h5>Asientos</h5>
                            <span>{{ $carro->asientos }}</span>
                        </li>
                        <li>
                            <h5>Aire acondicionado</h5>
                            <span>{{ ($carro->aire_acondicionado) ? 'Si' : 'No' }}</span>
                        </li>
                        <li>
                            <h5>Juegos de llaves</h5>
                            <span>{{ $carro->juegos_de_llaves }}</span>
                        </li>
                        <li>
                            <h5>Sistema de seguroda</h5>
                            <span>{{ ($carro->sistema_de_seguroda) ? 'Si' : 'No' }}</span>
                        </li>
                    </ul>
                    <div class="cu-single__info__actions">
                        <div class="cu-single__info__actions__item contact-btn">
                            <h3>Agenda<br />una cita</h3>
                            <p>Déjanos tus datos y nosotros te contactaremos.</p>
                        </div>
                        <div class="cu-single__info__actions__item">
                            <h3>Documentación<br>asegurada</h3>
                            <p>Nos encargamos de toda la documentación y trámites requeridos.</p>
                        </div>
                        <div class="cu-single__info__actions__item">
                            <h3>Revisión de 150 puntos</h3>
                            <p>Conoce el resultado de la revisión técnica de este vehículo.</p>
                            <button class="see-points">Haz clic aquí</button>
                        </div>
                    </div>
                    <div class="cu-single__info__times">
                        <h3>Horario de antención</h3>
                        <p>Citas presenciales de:</p>
                        <h5>Lunes a Sábado de 9:00 a.m. a 5:00 p.m.</h5>
                    </div>
                </div>
                <div class="cu-single__gallery">
                    <div class="cu-single__gallery__wrapper">
                        <div class="cu-single__gallery__main loading">
                            @foreach($carro->fotos as $foto)
                                <figure class="cu-single__gallery__main__item gallery-item">
                                    <a href="uploads/carros/galeria/{{ $foto->img }}" data-fancybox="gallery">
                                        <img class="lazy" src="img/loading_g.gif" data-src="uploads/carros/galeria/{{ $foto->img }}" data-srcwebp="uploads/carros/galeria/{{ nombre_wepb($foto->img) }}" alt="{{ $carro->marca->marca . ' ' . $carro->modelo->modelo . ' ' . $carro->ano . ' ' . $carro->placa }}" />
                                    </a>
                                </figure>
                            @endforeach
                        </div>
                        <div class="cu-single__gallery__thumbs loading">
                            @foreach($carro->fotos as $foto)
                                <div class="cu-single__gallery__thumbs__thumb gallery-thumb">
                                    <figure>
                                        <img class="lazy" src="img/loading_p.gif" data-src="uploads/carros/galeria/{{ $foto->miniatura }}" data-srcwebp="uploads/carros/galeria/{{ nombre_wepb($foto->miniatura) }}" alt="{{ $carro->marca->marca . ' ' . $carro->modelo->modelo . ' ' . $carro->ano . ' ' . $carro->placa }}" />
                                    </figure>
                                </div>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @include('partials._related')
        </div>
    </section>
    @include('partials._modal_puntos')
    @include('partials._modal_contact')
@endsection
@section('scripts')
<script src="js/single.js" type="text/javascript"></script>
@endsection