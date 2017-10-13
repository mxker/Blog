@extends('layout.base')

@section('content')
    <div class="col-md-12" style="padding-top: 20px;">
        <section class="panel">
            <header class="panel-heading "><div class="external-event label label-success ui-draggable" style="position: relative;">分类列表</div></header>
            <div class="panel-body no-padding">
                <div class="table-responsive">
                    <table class="table table-striped responsive" data-sortable="" data-sortable-initialized="true">
                        <thead>
                        <tr>
                            <th>Rendering engine</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
                            <th>Engine version</th>
                            <th>CSS grade</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Other browsers</td>
                            <td>All others</td>
                            <td>-</td>
                            <td>-</td>
                            <td>U</td>
                        </tr>
                        <tr>
                            <td>Trident</td>
                            <td>AOL browser (AOL desktop)</td>
                            <td>Win XP</td>
                            <td>6</td>
                            <td>A</td>
                        </tr>
                        <tr>
                            <td>Gecko</td>
                            <td>Camino 1.0</td>
                            <td>OSX.2+</td>
                            <td>1.8</td>
                            <td>A</td>
                        </tr>
                        <tr>
                            <td>Gecko</td>
                            <td>Camino 1.5</td>
                            <td>OSX.3+</td>
                            <td>1.8</td>
                            <td>A</td>
                        </tr>
                        <tr>
                            <td>Misc</td>
                            <td>Dillo 0.8</td>
                            <td>Embedded devices</td>
                            <td>-</td>
                            <td>X</td>
                        </tr>
                        <tr>
                            <td>Gecko</td>
                            <td>Epiphany 2.20</td>
                            <td>Gnome</td>
                            <td>1.8</td>
                            <td>A</td>
                        </tr>
                        <tr>
                            <td>Gecko</td>
                            <td>Firefox 1.0</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td>1.7</td>
                            <td>A</td>
                        </tr>
                        <tr>
                            <td>Gecko</td>
                            <td>Firefox 1.5</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td>1.8</td>
                            <td>A</td>
                        </tr>
                        <tr>
                            <td>Gecko</td>
                            <td>Firefox 2.0</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td>1.8</td>
                            <td>A</td>
                        </tr>
                        <tr>
                            <td>Gecko</td>
                            <td>Firefox 3.0</td>
                            <td>Win 2k+ / OSX.3+</td>
                            <td>1.9</td>
                            <td>A</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection