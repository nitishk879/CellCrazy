@extends('adminlte::page')

@section('title', $title ?? 'Item')

@section('content_header')
    <h1>{{ $title ?? 'Item' }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Details of the {{ $item->name }}
                            </button>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="media">
                                <img src="{{ asset("storage/products/{$item->image}") }}" width="200px" class="align-self-center mr-3" alt="{{ $item->name }}">
                                <div class="media-body">
                                    <h5 class="mt-0">{{ $item->name }}</h5>
                                    <h6>Short Description:</h6>
                                    <p>{!! $item->short_desc !!}</p>
                                    <h6>Long Description:</h6>
                                    {!! $item->long_desc !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Attributes (Sell)
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body text-center">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <h5>Memories</h5>
                                    @foreach($item->memories as $memory)
                                        <span class="badge badge-info">{{ $memory->name ?? '' }}</span>
                                    @endforeach
                                </div>
                                <div class="col-md-4">
                                    <h5>Networks</h5>
                                    @foreach($item->networks as $network)
                                        <span class="badge badge-info">{{ $network->name ?? '' }}</span>
                                    @endforeach
                                </div>
                                <div class="col-md-4">
                                    <h5>Conditions</h5>
                                    @foreach($item->conditions as $condition)
                                        <span class="badge badge-info">{{ $condition->name ?? '' }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Variations (Sell)
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            @if($sellersAttrib->count()>0)
                                <table id="sellerTable" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>Memory</th>
                                        <th>Condition</th>
                                        <th>Network</th>
                                        <th>Regular Price</th>
                                        <th>Sales Price</th>
                                        <th>Discount Rate</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sellersAttrib as $sell)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $sell->memory->name ?? '' }}</td>
                                            <td>{{ $sell->condition->name ?? '' }}</td>
                                            <td>{{ $sell->network->name ?? '' }}</td>
                                            <td><i class="fas fa-pound-sign"></i> {{ $sell->price['regular'] ?? '' }}</td>
                                            <td><i class="fas fa-pound-sign"></i> {{ $sell->price['sales'] ?? '' }}</td>
                                            <td>@if($sell->price['discount']!=0){{ $buy->price['discount'] }}% @else - @endif</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>Sorry! There are no price list for {{ $item->name }}. Would you like add a new one?</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingBP">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseBP" aria-expanded="false" aria-controls="collapseBP">
                                Variations (Buy)
                            </button>
                        </h2>
                    </div>
                    <div id="collapseBP" class="collapse" aria-labelledby="headingBP" data-parent="#accordionExample">
                        <div class="card-body">
                            @if($buyersAttrib->count()>0)
                                <table id="buyerTable" class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>Memory</th>
                                        <th>Condition</th>
                                        <th>Regular Price</th>
                                        <th>Sales Price</th>
                                        <th>Discount Rate</th>
                                    </tr>
                                    @foreach($buyersAttrib as $buy)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $buy->memory->name ?? '' }}</td>
                                            <td>{{ $buy->condition->name ?? '' }}</td>
                                            <td><i class="fas fa-pound-sign"></i> {{ $buy->price['regular'] ?? '' }}</td>
                                            <td><i class="fas fa-pound-sign"></i> {{ $buy->price['sales'] ?? '' }}</td>
                                            <td>@if($buy->price['discount']!=0){{ $buy->price['discount'] ?? '' }}% @else - @endif</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>Sorry! There are no price list for {{ $item->name }}. Would you like add a new one?</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('right-sidebar')@stop
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
@stop
@section('js')

    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#sellerTable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            } );
            $(function () {
                $('#buyerTable').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        } );
    </script>
@stop
@section('plugins.Sweetalert2', true)
@section('plugins.DataTables', true)
