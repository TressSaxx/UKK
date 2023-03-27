@extends('layouts.admin')

@section('title', 'Halaman Pengaduan')

{{-- css --}}
@section('css')
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
@endsection

@section('header', 'Data Pengaduan')
    
@section('content')
   <table id="tablePengaduan" class="table">
   <a href="{{ route('rieut.cetak') }}" class="btn btn-danger">EXPORT PDF</a>
   <br/>
   <br/>
      <thead>
         <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Isi Laporan</th>
            <th>Status</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($status as $k => $v)
            <tr>
               <td>{{ $k += 1 }}</td>
               <td>{{ $v->tgl_pengaduan->format('d-M-Y') }}</td>
               <td>{{ $v->user->nama }}</td>
               <td>{{ $v->isi_laporan }}</td>
               <td>
                  @if($v->status === 'selesai')
                     <a href="#" class="badge badge-success">Selesai</a>
                  @endif
               </td>
            </tr>
         @endforeach
      </tbody>
   </table>
@endsection

{{-- Javascript --}}
@section('js')
   <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
   <script>
      $(document).ready(function () {
         $('#tablePengaduan').DataTable();
      });
   </script>
@endsection