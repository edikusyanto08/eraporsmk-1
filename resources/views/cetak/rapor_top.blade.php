@extends('layouts.cetak')
@section('content')
<div class="text-center" id="cover_utama">
<br>
<br>
<br>
	<img src="{{($get_siswa->sekolah) && ($get_siswa->sekolah->logo_sekolah) ? url('storage/images/'.$get_siswa->sekolah->logo_sekolah) : url('vendor/img/logo.png')}}" border="0" width="200" />
<br>
<br>
<br>
<br>
<br>
<br>
<h3>RAPOR PESERTA DIDIK</h3>
<h3>SEKOLAH MENENGAH KEJURUAN</h3>
<h3>(SMK)</h3><br>
<br>
<br>
<br>
<br>
<br>
{{--dd($get_siswa)--}}
<div style="width:25%; float:left;">&nbsp;</div>
<div style="width:47%; float:left; padding:7px;">Nama Peserta Didik:</div>
<div style="width:25%; float:left;">&nbsp;</div>
<div style="width:25%; float:left;">&nbsp;</div>
<div style="border:#000000 1px solid; width:47%; float:left; padding:7px;">{{strtoupper($get_siswa->siswa->nama)}}</div>
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
<div style="border:#000000 1px solid; width:47%; float:left; padding:7px;">{{$get_siswa->siswa->nisn}}</div>
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