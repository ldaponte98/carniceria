@extends('layout.main')
@section('menu')
    <div class="fab-container">
        <div class="fab fab-icon-holder">
            <i class="fa fa-bars"></i>
        </div>
        <ul class="fab-options">
            <li onclick="location.href = '/tercero/crear'">
                <span class="fab-label">Nuevo tercero</span>
                <div class="fab-icon-holder">
                    <i class="ti-user"></i>
                </div>
            </li>
        </ul>
    </div>
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Administrar terceros</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        {{ Form::open(array('method' => 'post')) }}
                        <div class="row">
                            
                            <div class="col-sm-4">
                                
                            </div>
                            <div class="col-sm-5">
                            </div>
                            <div class="col-sm-3" style="text-align: right !important;">
                                <input id="filtro" type="text" class="form-control" placeholder="Consulte aqui..." autocomplete="on">
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div><br><br>
                    <div class="col-lg-12">
                            <div class="card">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial"><center><i class="fa fa-user"></i></center></th>
                                                <th><center><b>Tercero</b></center></th>
                                                <th><center><b>Identificaci??n</b></center></th>
                                                <th><center><b>Email</b></center></th>
                                                <th><center><b>Sexo</b></center></th>
                                                <th><center><b>Telefono</b></center></th>
                                                <th><center><b>Direccion</b></center></th>
                                                <th><center><b>Estado</b></center></th>
                                                <th><center><b></b></center></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="bodytable">
                                            @php $cont = 1; @endphp
                                            @foreach($terceros as $tercero)
                                            <tr>
                                                <td><center><img class="rounded-circle" src="{{ $tercero->get_imagen() }}" width="45" height="45" alt="tercero"></center></td>
                                                <td>{{ $tercero->nombre_completo() }}</td>
                                                <td>{{ $tercero->identificacion }}</td>
                                                <td>{{ $tercero->email }}</td>
                                                <td>{{ $tercero->sexo->nombre }}</td>
                                                <td>{{ $tercero->telefono }}</td>
                                                <td>{{ $tercero->direccion }}</td>
                                                <td>{{ $tercero->get_estado() }}</td>
                                                <td><a href="{{ route('tercero/view', $tercero->id_tercero) }}">Ver</a></td>
                                                <td><a href="{{ route('tercero/editar', $tercero->id_tercero) }}">Editar</a></td>
                                                
                                            </tr>
                                            @php $cont++; @endphp
                                            @endforeach
                                          
                                        </tbody>
                                    </table>
                                </div> 
                            </div>
                    </div>

                </div>
            </div>
        </div> <!-- .card -->
    </div>
</div>


<script type="text/javascript">
        function exportar_excel() {
            tableToExcel('tabla_excel', 'Reporte_de_facturas')
       }
     $(document).ready(function() {
              $('#fechas').daterangepicker({
                  timePicker: true,
                  timePicker24Hour : true,
                  autoApply: true,
                  autoUpdateInput: true,
                  locale: {
                    format: 'YYYY/MM/DD HH:mm',
                    cancelLabel: 'Limpiar',
                    applyLabel: 'Establecer'
                  }
              });
              

              $('#fechas').on('apply.daterangepicker', function(ev, picker) {
                  $(this).val(picker.startDate.format('YYYY/MM/DD HH:mm') + ' - ' + picker.endDate.format('YYYY/MM/DD HH:mm'));
              });

              $('#fechas').on('cancel.daterangepicker', function(ev, picker) {
                  $(this).val('');
              });
            
        })
</script>
@endsection