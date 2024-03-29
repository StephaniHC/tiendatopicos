@extends('layouts.cliente')

{{-- @section('template_title')
    Create Ubicacion
@endsection --}}

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">

                <div class="card-header ">
                    <h4 class="font-weight-bold">Seleccione la Ubicacion</h4>
                </div>

                <div id="contenidoSuperior" class="card-body">
                    {{-- izquierda --}}
                    <section id="izquierda" class="caja">

                        <img class="izquierdaClass"
                            src="https://w7.pngwing.com/pngs/981/736/png-transparent-logo-clinic-family-medicine-physician-family-walk-text-trademark-logo.png">


                        <div id="map" class="izquierdaClass"></div>
                    </section>


                    <aside id="derecha" class="caja">
                        <div id="derecha1" class="derechaClass">
                            {{-- <h1>hola</h1> --}}
                        </div>
                        {{-- <div class="clearfix"></div> --}}

                        <div id="derecha2" class="derechaClass">
                            <form method="POST" action="{{ route('tickets.addEvento') }}" role="form"
                                enctype="multipart/form-data">
                                @csrf
                                {{-- <div class="row row justify-content-center"> --}}
                                {{-- SELECT UBICACION --}}
                                <div class="derechaCompra">
                                    <select name="ubicacion_id" id="select-ubicaciones" class="form-control" autofocus
                                        required>
                                        <option value="">Seleccionar Ubicacion</option>
                                        @foreach ($ubicaciones as $ubicacion)
                                            <option value="{{ $ubicacion['id'] }}">{{ $ubicacion['nombre'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- SELECT FECHA --}}
                                <div class="derechaCompra">
                                    <select name="fecha_id" id="select-fechas" class="form-control" required>
                                        <option value="">Seleccionar Fecha</option>
                                    </select>
                                </div>
                                {{-- INPUT CANTIDAD --}}
                                @if (isset($ubicaciones) && $ubicaciones[0]['precio'] > 0)
                                    <div class="derechaCompra">
                                        <div class="form-group input-group">
                                            <span class="input-group-text">
                                                <i class="fa fa-arrow-up"> cantidad</i>
                                            </span>
                                            <input type="number" value="1" name="cantidad" class="  form-control" min="1"
                                                max="50">
                                        </div>
                                    </div>
                                    {{-- @error('cantidad')<p>DEBE INGRESAR LA CANTIDAD</p>@enderror --}}
                                    {{-- BUTTON AÑADIR --}}
                                    <div class="derechaCompra">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-shopping-cart"
                                                aria-hidden="true"></i>Añadir</button>
                                    </div>
                                @else
                                    <div class="derechaCompra">
                                        <a href="#" class="btn btn-dark" type="submit">
                                            <i class="fa fa-hand-o-right" aria-hidden="true"></i>Comprar Ticket</a>
                                    </div>
                                @endif
                                {{-- oculto --}}
                                <input type="hidden" name="tickets" value="{{ json_encode($tickets) }}">
                                <input id="ubicacion" type="hidden" name="ubicacion_id" value="">
                            </form>
                        </div>
                    </aside>
                    <div class="clearfix"></div>
                </div>
                {{-- <div class="row justify-content-center m-2"> --}}
                <br>
                <br>

                @if (isset($ubicaciones) && $ubicaciones[0]['precio'] > 0)

                    <div class="row">
                        <div class="col-9">
                            <h2 class="font-weight-bold" style="margin-left: 45%">Detalles de la compra</h2>
                        </div>
                        {{-- Button Pagar ahora --}}
                        <div class="col-3">
                            @if (isset($tickets) && count($tickets) > 0)
                                <form method="POST" action="{{ route('nota-ventas.crear') }}" role="form"
                                    enctype="multipart/form-data" style="">
                                    @csrf
                                    <button class="btn  btn-dark " type="submit"><i class="fa fa-credit-card"
                                            aria-hidden="true"></i>
                                        Pagar ahora</button>
                                    {{-- oculto --}}
                                    <input type="hidden" name="tickets" value="{{ json_encode($tickets) }}">
                                    <input type="hidden" name="ubicacion_id" value="1">
                                </form>
                            @endif
                        </div>
                    </div>



                    {{-- tabla --}}
                    <div style="margin-top: 2%">
                        <table class="table table-striped" style="margin: 10px auto; width: 80%; border: 1px solid black;">
                            <thead>
                                <tr>
                                    <th scope="col">Codigo</th>
                                    <th scope="col">Ubicacion</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">cantidad</th>
                                    <th scope="col">precio</th>
                                    <th scope="col">importe</th>
                                    <th scope="col" width='3%'></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($tickets as $ticket)
                                    <tr>
                                        <td>{{ $ticket['id'] }}</td>
                                        <td>{{ $ticket['ubicacion'] }}</td>
                                        <td>{{ $ticket['fecha'] }}</td>
                                        <td>{{ $ticket['cantidad'] }}</td>
                                        <td>{{ $ticket['precio'] }}</td>
                                        <td>{{ $ticket['precio'] * $ticket['cantidad'] }}</td>
                                        <td>
                                            <form method="POST"
                                                action="{{ route('tickets.destroyEvento', $ticket['id']) }}" role="form"
                                                enctype="multipart/form-data">
                                                @csrf
                                                {{-- oculto --}}
                                                <input type="hidden" name="tickets" value="{{ json_encode($tickets) }}">
                                                {{-- button --}}
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" value="Borrar"
                                                    title="Borrar">
                                                    {{-- <i class="fas fa-times"></i> --}}
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection


@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ticket/ubicacion/createLista.css') }}">
@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/map/mapa2.js') }}"></script>
    <script async src="https://maps.googleapis.com/maps/api/js?key=&callback=setMap"></script>
    <script type="text/javascript" src="{{ asset('js/path.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/ticket/combo.js') }}"></script>

@endsection
