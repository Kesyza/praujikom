@extends('backend.print')
@section('title',$data->invoice_no)
@section('content')
<div class="header">
    <table class="table table-borderless">
        <tbody>
            <tr>
                <td>
                    Nama Toko &nbsp;: {{App\Setting::where('slug','nama-toko')->get()->first()->description}}
                    <br>
                    Alamat &nbsp;: {{App\Setting::where('slug','alamat')->get()->first()->description}}
                    <br>
                    Nomor Telepon &nbsp;: {{App\Setting::where('slug','nomor-telepon')->get()->first()->description}}
                    <br>
                    Email &nbsp;: {{App\Setting::where('slug','email')->get()->first()->description}}
                </td>
                <td style="text-align:left;">
                    Nota &nbsp;: {{$data->invoice_no}}
                    <br>
                    Tanggal : {{Carbon\Carbon::parse($data->return_date)->format('d-m-Y')}}
                    <br>
                    Kepada &nbsp;: {{title_case($data->customer->name)}}
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="main">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mobil</th>
                <th>Tanggal Sewa</th>
                <th>Tanggal Dikembali</th>
                <th>Tanggal Kembali</th>
                <th>Harga Sewa</th>
                <th>Denda</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>{{$data->car->name}}</td>
                <td>{{Carbon\Carbon::parse($data->rent_date)->format('d-m-Y')}}</td>
                <td>{{Carbon\Carbon::parse($data->back_date)->format('d-m-Y')}}</td>
                <td>{{Carbon\Carbon::parse($data->return_date)->format('d-m-Y')}}</td>
                <td>Rp.{{number_format($data->price,0,',','.')}}</td>
                <td>Rp.{{number_format($data->penalty,0,',','.')}}</td>
                <td>Rp.{{number_format($data->amount,0,',','.')}}</td>
            </tr>
            <tr>
                <td colspan="7">
                    <strong>
                        Total Bayar
                    </strong>
                </td>
                <td>
                    <strong>
                        Rp. {{number_format($data->amount,0,',','.')}}
                    </strong>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="footer">
    <em>
        Terimakasi Atas Kunjungan Anda
    </em>
</div>
@endsection



