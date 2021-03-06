@extends('layouts.cetak')
@section('content')
<table border="0" width="100%">
	<tr>
    	<td style="width: 25%;padding-top:5px; padding-bottom:5px; padding-left:0px;">Nama Peserta Didik</td>
		<td style="width: 1%;" class="text-center">:</td>
		<td style="width: 74%">{{strtoupper($get_siswa->siswa->nama)}}</td>
	</tr>
	<tr>
		<td style="padding-top:5px; padding-bottom:5px; padding-left:0px;">Nomor Induk/NISN</td>
		<td class="text-center">:</td>
		<td>{{$get_siswa->siswa->no_induk.' / '.$get_siswa->siswa->nisn}}</td>
	</tr>
	<tr>
		<td style="padding-top:5px; padding-bottom:5px; padding-left:0px;">Kelas</td>
		<td class="text-center">:</td>
		<td>{{$get_siswa->rombongan_belajar->nama}}</td>
	</tr>
	<tr>
		<td style="padding-top:5px; padding-bottom:5px; padding-left:0px;">Tahun Pelajaran</td>
		<td class="text-center">:</td>
		<td>{{str_replace('/','-',substr($get_siswa->rombongan_belajar->semester->nama,0,9))}}</td>
	</tr>
	<tr>
		<td style="padding-top:5px; padding-bottom:5px; padding-left:0px;">Semester</td>
		<td class="text-center">:</td>
		<td>{{substr($get_siswa->rombongan_belajar->semester->nama,10)}}</td>
	</tr>
</table>
<br />
<?php
if($get_siswa->rombongan_belajar->tingkat == 10){
	$huruf_ekskul = 'C';
	$huruf_absen = 'D';
	$huruf_kenaikan = 'E';
} else {
	$huruf_ekskul = 'D';
	$huruf_absen = 'E';
	$huruf_kenaikan = 'F';
}
?>
@if($get_siswa->rombongan_belajar->tingkat != 10)
<div class="strong">C.&nbsp;&nbsp;Praktik Kerja Lapangan</div>
<table border="1" class="table">
	<thead>
		<tr>
			<th style="width: 2px;" align="center">No</th>
			<th style="width: 300px;" align="center">Mitra DU/DI</th>
			<th style="width: 200px;" align="center">Lokasi</th>
			<th style="width: 100px;" align="center">Lamanya<br>(bulan)</th>
			<th style="width: 100px;" align="center">Keterangan</th>
		</tr>
	</thead>
	<tbody>
	@if($get_siswa->all_prakerin->count())
	@foreach($get_siswa->all_prakerin as $prakerin){
		<tr>
			<td align="center">{{$loop->iteration}}</td>
			<td>{{$prakerin->mitra_prakerin}}</td>
			<td align="center">{{$prakerin->lokasi_prakerin}}</td>
			<td align="center">{{$prakerin->lama_prakerin}}</td>
			<td>{{$prakerin->keterangan_prakerin}}</td>
		</tr>
	@endforeach
	@else
		<tr>
			<td class="text-center" colspan="5">&nbsp;</td>
		</tr>
	@endif
	</tbody>
</table>
<br />
@endif
<div class="strong">{{$huruf_ekskul}}.&nbsp;&nbsp;Ekstrakurikuler</div>
<table border="1" class="table">
	<thead>
		<tr>
			<th style="width: 5%;" align="center">No</th>
			<th style="width: 35%;" align="center">Kegiatan Ekstrakurikuler</th>
			<th style="width: 60%;" align="center">Keterangan</th>
		</tr>
	</thead>
	<tbody>
	@if($get_siswa->all_nilai_ekskul->count())
	@foreach($get_siswa->all_nilai_ekskul as $nilai_ekskul){
		<tr>
			<td align="center">{{$loop->iteration}}</td>
			<td>{{strtoupper($nilai_ekskul->ekstrakurikuler->nama_ekskul)}}</td>
			<td>{{$nilai_ekskul->deskripsi_ekskul}}</td>
		</tr>
	@endforeach
	@else
		<tr>
			<td class="text-center" colspan="3">&nbsp;</td>
		</tr>
	@endif
	</tbody>
</table>
<br />
<div class="strong">{{$huruf_absen}}.&nbsp;&nbsp;Ketidakhadiran</div>
<table border="1" width="500">
	<tr>
		<tr>
			<td width="200">Sakit</td>
			<td> : {{($get_siswa->kehadiran) ? $get_siswa->kehadiran->sakit.' hari' : '.... hari'}}</td>
		</tr>
		<tr>
			<td>Izin</td>
			<td width="300"> : {{($get_siswa->kehadiran) ? $get_siswa->kehadiran->izin.' hari' : '.... hari'}}</td>
		</tr>
		<tr>
			<td>Tanpa Keterangan</td>
			<td> : {{($get_siswa->kehadiran) ? $get_siswa->kehadiran->alpa.' hari' : '.... hari'}}</td>
		</tr>
	</tr>
</table>
<br />
@if($cari_tingkat_akhir)
<div class="strong">{{$huruf_kenaikan}}.&nbsp;&nbsp;Status Kelulusan</div>
@else
	@if($get_siswa->rombongan_belajar->semester->semester == 2)
		@if($get_siswa->rombongan_belajar->tingkat == 12)
		<div class="strong">F.&nbsp;&nbsp;Status Kelulusan</div>
		@else
		<div class="strong">E.&nbsp;&nbsp;Kenaikan Kelas</div>
		@endif
	@endif
@endif
@if($get_siswa->rombongan_belajar->semester->semester == 2)
<table width="100%" border="1">
  <tr>
    <td style="padding:10px;">
	@if($get_siswa->kenaikan)
		{{CustomHelper::status_kenaikan($get_siswa->kenaikan->status)}} {{$get_siswa->kenaikan->rombongan_belajar}}
	@else
		@if($get_siswa->rombongan_belajar->tingkat == 12)
			Belum dilakukan kelulusan
		@else
			Belum dilakukan kenaikan kelas
		@endif
	@endif
	</td>
  </tr>
</table>
<br>
@endif
<br>
<table width="100%">
  <tr>
    <td style="width:40%">
		<p>Orang Tua/Wali</p><br>
<br>
<br>
<br>
<br>
<br>
		<p>...................................................................</p>
	</td>
	<td style="width:20%"></td>
    <td style="width:40%"><p>{{$get_siswa->sekolah->kabupaten}}, {{CustomHelper::TanggalIndo($tanggal_rapor)}}<br>Wali Kelas</p><br>
<br>
<br>
<br>
<br>
<br>
<p>
<u>{{ CustomHelper::nama_guru($get_siswa->rombongan_belajar->wali->gelar_depan, $get_siswa->rombongan_belajar->wali->nama, $get_siswa->rombongan_belajar->wali->gelar_belakang) }}</u><br />
NIP. {{$get_siswa->rombongan_belajar->wali->nip}}
</td>
  </tr>
</table>
<table width="100%" style="margin-top:10px;">
  <tr>
    <td style="width:100%;text-align:center;">
		<p>Mengetahui,<br>Kepala Sekolah</p>
	<br>
<br>
<br>
<br>
<br>
<p><u>{{ CustomHelper::nama_guru($get_siswa->sekolah->guru->gelar_depan, $get_siswa->sekolah->guru->nama, $get_siswa->sekolah->guru->gelar_belakang) }}</u><br />
NIP. {{$get_siswa->sekolah->guru->nip}}
</p>
	</td>
  </tr>
</table>
@endsection