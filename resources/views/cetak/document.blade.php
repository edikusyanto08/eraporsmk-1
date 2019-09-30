@extends('layouts.cetak')
@section('content')
<div class="text-center" id="cover_utama">
<br>
<br>
<br>
	<img src="{{($sekolah) && ($sekolah->logo_sekolah) ? url('storage/images/'.$sekolah->logo_sekolah) : url('vendor/img/logo.png')}}" border="0" width="200" />
<br>
<br>
<br>
<br>
<br>
<br>
<h3>RAPOR PENILAIAN TENGAH {{strtoupper(substr($semester->nama,10))}}</h3>
<h3>{{($sekolah) ? strtoupper($sekolah->nama) : '-'}}</h3>
<h3>TAHUN PELAJARAN {{str_replace('/','-',substr($semester->nama,0,9))}}</h3><br>
<br>
<br>
<br>
<br>
<br>
<div style="width:25%; float:left;">&nbsp;</div>
<div style="width:47%; float:left; padding:7px;">Nama Peserta Didik:</div>
<div style="width:25%; float:left;">&nbsp;</div>
<div style="width:25%; float:left;">&nbsp;</div>
<div style="border:#000000 1px solid; width:47%; float:left; padding:7px;">{{strtoupper($siswa->siswa->nama)}}</div>
<div style="width:25%; float:left;">&nbsp;</div>
<br>
<br>
<br>
<br>
<br>
<div style="width:25%; float:left;">&nbsp;</div>
<div style="width:47%; float:left; padding:7px;">NISN:</div>
<div style="width:25%; float:left;">&nbsp;</div>
<div style="width:25%; float:left;">&nbsp;</div>
<div style="border:#000000 1px solid; width:47%; float:left; padding:7px;">{{$siswa->siswa->nisn}}</div>
<div style="width:25%; float:left;">&nbsp;</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<h3>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN<br>REPUBLIK INDONESIA</h3>
</div>
</div>
@endsection