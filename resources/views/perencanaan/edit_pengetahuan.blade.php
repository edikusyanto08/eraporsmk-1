@extends('adminlte::page')
@section('title_postfix', 'Ubah Perencanaan Pengetahuan |')
@section('content_header')
    <h1>Ubah Perencanaan Pengetahuan</h1>
@stop

@section('content')
<?php
foreach($all_kd as $kompetensi_dasar){
	$data_kd[str_replace('.','',$kompetensi_dasar->id_kompetensi)] = $kompetensi_dasar;
}
ksort($data_kd);
?>
    <form action="{{ route('simpan_perencanaan') }}" method="post" class="form-horizontal" id="form">
		{{ csrf_field() }}
		<div class="col">
			<div class="col-sm-6">
				<div class="form-group">
					<label for="ajaran_id" class="col-sm-5 control-label">Tahun Ajaran</label>
					<div class="col-sm-7">
						<input type="hidden" name="guru_id" id="guru_id" value="{{$user->guru_id}}" />
						<input type="hidden" name="pembelajaran_id" id="pembelajaran_id" value="{{$rencana->pembelajaran_id}}" />
						<input type="hidden" name="rencana_penilaian_id" id="rencana_penilaian_id" value="{{$rencana->rencana_penilaian_id}}" />
						<input type="hidden" name="query" id="query" value="rencana_penilaian" />
						<input type="hidden" name="kompetensi_id" id="kompetensi_id" value="1" />
						<input type="hidden" name="semester_id" id="semester_id" value="{{$semester->semester_id}}" />
						<input type="text" class="form-control" value="{{$semester->nama}} (SMT {{$semester->semester}})" readonly />
					</div>
				</div>
				<div class="form-group">
					<label for="kelas" class="col-sm-5 control-label">Tingkat Kelas</label>
					<div class="col-sm-7">
						<select name="kelas" class="select2 form-control" id="kelas" disabled="disabled">
							<option value="10"{{($rencana->rombongan_belajar) ? ($rencana->rombongan_belajar->tingkat == 10) ? 'selected="selected"' : '' : ''}}>Kelas 10</option>
							<option value="11"{{($rencana->rombongan_belajar) ? ($rencana->rombongan_belajar->tingkat == 11) ? 'selected="selected"' : '' : ''}}>Kelas 11</option>
							<option value="12"{{($rencana->rombongan_belajar) ? ($rencana->rombongan_belajar->tingkat == 12) ? 'selected="selected"' : '' : ''}}>Kelas 12</option>
							<option value="13"{{($rencana->rombongan_belajar) ? ($rencana->rombongan_belajar->tingkat == 13) ? 'selected="selected"' : '' : ''}}>Kelas 13</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="rombel" class="col-sm-5 control-label">Rombongan Belajar</label>
					<div class="col-sm-7">
						<select name="rombel_id" class="select2 form-control" id="rombel" disabled="disabled">
							<option value="">{{($rencana->rombongan_belajar) ? $rencana->rombongan_belajar->nama : '-'}}</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="mapel" class="col-sm-5 control-label">Mata Pelajaran</label>
					<div class="col-sm-7">
						<select name="id_mapel" class="select2 form-control" id="mapel" disabled="disabled">
							<option value="">{{$rencana->pembelajaran->nama_mata_pelajaran}} ({{$rencana->pembelajaran->mata_pelajaran_id}})</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div style="clear:both;"></div>
		<div class="table-responsive">
			<table class="table table-striped table-bordered" id="clone">
			<thead>
				<tr>
					<th class="text-center" style="min-width:110px">Aktifitas Penilaian</th>
					<th class="text-center" style="min-width:110px;">Teknik</th>
					<th class="text-center" width="10">Bobot</th>
					<?php
					//$all_kd = array();
					foreach($data_kd as $kd){
						$kompetensi_dasar = ($kd->kompetensi_dasar_alias) ? $kd->kompetensi_dasar_alias : $kd->kompetensi_dasar;
					?>
					<th class="text-center"><a href="javascript:void(0)" class="tooltip-top" title="<?php echo strip_tags($kompetensi_dasar); ?>"><?php echo $kd->id_kompetensi; ?></a></th>
					<?php
					} 
					?>
					<th class="text-center">Keterangan</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<input class="form-control input-sm" type="text" name="nama_penilaian" value="{{$rencana->nama_penilaian}}">
					</td>
					<td>
						<select id="pilih_bobot" class="form-control input-sm" name="bentuk_penilaian" disabled="disabled">
							<option value="{{$rencana->metode->teknik_penilaian_id}}">{{$rencana->metode->nama}}</option>
						</select>
					</td>
					<td>
						<input class="form-control input-sm bobot" type="text" name="bobot" value="{{$rencana->bobot}}">
					</td>
					<?php
					foreach($rencana->kd_nilai as $kd_nilai){
						$kd_id[] = $kd_nilai->kompetensi_dasar_id;
					}
					foreach($data_kd as $kd){
					?>
					<td style="vertical-align:middle;">
						<input type="hidden" name="id_kompetensi[]" value="{{$kd->id_kompetensi}}" />
						<div class="text-center"><input type="checkbox" <?php echo (in_array($kd->kompetensi_dasar_id, $kd_id)) ? ' checked="checked"' : ''; ?> name="kd[]" value="<?php echo $kd->kompetensi_dasar_id; ?>" /></div>
					</td>
					<?php } ?>
					<td><input class="form-control input-sm" type="text" name="keterangan_penilaian" value="{{$rencana->keterangan}}"></td>
				</tr>
			</tbody>
		</table>
		</div>
@stop
@section('box-footer')
		<div class="form-group" id="simpan">
			<button type="submit" class="btn btn-success pull-right">Simpan</button>
		</div>
	</form>
@stop
@section('js')
<script>
var checkJSON = function(m) {
	if (typeof m == 'object') { 
		try{ m = JSON.stringify(m); 
		} catch(err) { 
			return false; 
		}
	}
	if (typeof m == 'string') {
		try{ m = JSON.parse(m); 
		} catch (err) {
			return false;
		}
	}
	if (typeof m != 'object') { 
		return false;
	}
	return true;
};
$('.select2').select2();
$('#kelas').change(function(){
	$("#rombel").val('');
	$("#rombel").trigger('change.select2');
	var ini = $(this).val();
	if(ini == ''){
		return false;
	}
	$.ajax({
		url: '{{url('ajax/get-rombel')}}',
		type: 'post',
		data: $("form#form").serialize(),
		success: function(response){
			result = checkJSON(response);
			if(result == true){
				$('.simpan').hide();
				$('#result').html('');
				$('table.table').addClass("jarak1");
				var data = $.parseJSON(response);
				$('#rombel').html('<option value="">== Pilih Rombongan Belajar ==</option>');
				if($.isEmptyObject(data.result)){
				} else {
					$.each(data.result, function (i, item) {
						$('#rombel').append($('<option>', { 
							value: item.value,
							text : item.text
						}));
					});
				}
			} else {
				$('#result').html(response);
			}
		}
	});
});
$('#rombel').change(function(){
	var ini = $(this).val();
	if(ini == ''){
		return false;
	}
	$.ajax({
		url: '{{url('ajax/get-mapel')}}',
		type: 'post',
		data: $("form#form").serialize(),
		success: function(response){
			result = checkJSON(response);
			if(result == true){
				var data = $.parseJSON(response);
				$('#mapel').html('<option value="">== Pilih Mata Pelajaran ==</option>');
				if(!$.isEmptyObject(data.mapel)){
					$.each(data.mapel, function (i, item) {
						$('#mapel').append($("<option></option>")
						.attr("value",item.value)
						.attr("data-pembelajaran_id",item.pembelajaran_id)
						.text(item.text)); 
					});
				}
			} else {
				$('.simpan').show();
				$('#result').html(response);
			}
		}
	});
});
$('#mapel').change(function(){
	var ini = $(this).val();
	var selected = $(this).find('option:selected');
	var pembelajaran_id = selected.data('pembelajaran_id');
	$('#pembelajaran_id').val(pembelajaran_id);
	if(ini == ''){
		return false;
	}
	$.ajax({
		url: '{{url('/ajax/get-kd')}}',
		type: 'post',
		data: $("form#form").serialize(),
		success: function(response){
		console.log(response);
			$('#result').html(response);
		}
	});
});
</script>
@stop