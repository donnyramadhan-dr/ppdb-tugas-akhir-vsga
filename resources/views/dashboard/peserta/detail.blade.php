@extends('dashboard.layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    <a href="{{ asset($dt->biodata_r->ijazah) }}" class="btn btn-success btn-sm btn-flat" download="">Download Ijazah</a>

                                        <a href="{{ asset($dt->biodata_r->ktp) }}" class="btn btn-primary btn-sm btn-flat" download="">Download KTP</a>

                    <a href="{{ url('peserta') }}" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-backward"></i> Kembali</a>
                </p>
            </div>
            <div class="box-body">
               <div class="table-responsive">
                   <table class="table table-stripped">
                       <tbody>
                           <tr>
                               <th>Nama</th>
                               <td>:</td>
                               <td>{{ $dt->name }}</td>

                               <th>NISN</th>
                               <td>:</td>
                               <td>{{ $dt->nisn }}</td>

                               <th>Email</th>
                               <td>:</td>
                               <td>{{ $dt->email }}</td>
                           </tr>
                           <tr>
                               
                               <th>ID Registrasi</th>
                               <td>:</td>
                               <td>{{ $dt->id_registrasi }}</td>

                               <th>No HP</th>
                               <td>:</td>
                               <td>{{ $dt->biodata_r->no_hp }}</td>

                               <th>Alamat</th>
                               <td>:</td>
                               <td>{{ $dt->biodata_r->alamat }}</td>
                           </tr>
                       </tbody>
                   </table>
               </div>
            </div>
        </div>
    </div>
</div>
 
@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){
 
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>
 
@endsection