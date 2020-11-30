<html>

<style>
table, td, th {
  border: 1px solid black;
}

@page{
  margin: 1em 0.5em;
}

table {
  width: 100%;
  border-collapse: collapse;
}

.wrapper {
    border: 0px solid white;
}

</style>

<div class="container center" style="text-align:center;">

    <div style="text-align:left;padding-left:65%;font-size:8">
    Lampiran V :	Peraturan Bersama	
	Menteri Pendidikan Nasional	
	dan Kepala Badan Kepegawaian Negara	<br>
	Nomor     : 03/V/PB/2010	<br>
	Nomor     : 14 tahun 2010	<br>
	Tanggal    :  6 Mei 2010	<br>
    </div>
    <h3>
            PENETAPAN ANGKA KREDIT<br>
        <!-- TAHUN {{tgl_indo_tahun($dupak->awal)}} -->
            Nomor : 823.3/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/Disdikbud-A1/KU/I/2018	
    </h3>
    
    <div>
        <span align=left style="font-size:10; text-align:left">
            Instansi : Dinas Pendidikan dan Kebudayaan Provinsi Kalimantan Utara      
        </span>
        <span align=right style="font-size:10;text-align:right">
            Masa penilaian : {{tgl_indo($dupak->awal).' - '.tgl_indo($dupak->awal)}}
        </span>
    </div>

    <table>
        <tbody style="font-size:10">
            <tr>
                <td width="5%">I</td>
                <td colspan=7 class="text-left"> KETERANGAN PERORANGAN</td>
            </tr>
            <tr>
                <td rowspan=14></td>
                <td width="5%"> 1</td>
                <td width="40%" colspan=2>Nama</td>
                <td colspan=4>{{$users->name}}</td>
            </tr>
            <tr>
                <td width="5%"> 2</td>
                <td colspan=2>NIP</td>
                <td colspan=4>{{$users->nip}}</td>
            </tr>
            <tr>
                <td width="5%"> 3</td>
                <td colspan=2>NUPTK</td>
                <td colspan=4>{{$biodatas->nuptk}}</td>
            </tr>
            <tr>
                <td width="5%"> 4</td>
                <td colspan=2>Tempat, Tanggal Lahir</td>
                <td colspan=4>{{$biodatas->tempat_lahir.', '.tgl_indo($biodatas->tanggal_lahir)}}</td>
            </tr>
            <tr>
                <td width="5%"> 5</td>
                <td colspan=2>Jenis Kelamin</td>
                <td colspan=4>{{$biodatas->jenis_kelamin}}</td>
            </tr>
            <tr>
                <td width="5%"> 6</td>
                <td colspan=2>Pendidikan yang telah diperhitungkan angka kreditnya</td>
                <td colspan=4>{{$biodatas->pendidikan}}</td>
            </tr>
            <tr>
                <td width="5%"> 7</td>
                <td colspan=2>Pangkat / Golongan ruang / TMT</td>
                <td colspan=4>{{  pangkat($biodatas->pangkat_golongan)->pangkat }}</td>
            </tr>
            <tr>
                <td width="5%"> 8</td>
                <td colspan=2>Jabatan Guru / TMT</td>
                <td colspan=4>{{  pangkat($biodatas->pangkat_golongan)->jabatan }}</td>
            </tr>
            <tr>
                <td rowspan=2> 9</td>
                <td rowspan=2>Masa Kerja Golongan</td>
                <td>Lama</td>
                <td colspan=4>{{ $berita_acara->masa_kerja_lama  }}</td>
            </tr>
            <tr>
                <td>Baru</td>
                <td colspan=4>{{ $berita_acara->masa_kerja_baru }}</td>
            </tr>
            <tr>
                <td width="5%"> 10</td>
                <td colspan=2>Jenis Guru </td>
                <td colspan=4>{{  $biodatas->jenis_guru }}</td>
            </tr>
            <tr>
                <td width="5%"> 11</td>
                <td colspan=2>Unit Kerja </td>
                <td colspan=4>{{  nama_sekolah($biodatas->sekolah_id)->nama }}</td>
            </tr>
            <tr>
                <td rowspan=2> 12</td>
                <td rowspan=2>Alamat</td>
                <td>Sekolah</td>
                <td colspan=4>{{nama_sekolah($biodatas->sekolah_id)->alamat}}</td>
            </tr>
            <tr>
                <td>Rumah</td>
                <td colspan=4>{{$biodatas->alamat}}</td>
            </tr>

            <tr>
                <td width="5%">II</td>
                <td colspan=4> PENETAPAN ANGKA KREDIT</td>
                <td > LAMA</td>
                <td > BARU</td>
                <td > JUMLAH</td>
            </tr>
            <tr>
                <td width="5%" rowspan="20"></td>
                <td width="2%" >0</td>
                <td colspan=3> <b>Daerah Khusus</b></td>
                <td> <b>    </b></td>
                <td> <b>  {{ $berita_acara->dasus }} </b></td>
                <td> <b>  {{ $berita_acara->dasus }} </b></td>
            </tr>
            <tr>
                <td width="2%" >1</td>
                <td colspan=3> <b>Unsur Utama</b></td>
                <td > <b></b></td>
                <td > <b></b></td>
                <td > <b></b></td>
            </tr>
            <tr>
                <td width="2%" rowspan="12"></td>
                <td colspan=3> a. Pendidikan</td>
                <td > </td>
                <td > </td>
                <td > </td>
            </tr>
            <tr>
                <td colspan="3">1) Pendidikan sekolah dan memperoleh gelar ijazah </td>
                <td>{{ json_decode($berita_acara->pendidikan)->lama }}</td>
                <td>{{ json_decode($berita_acara->pendidikan)->baru }}</td>
                <td>{{ json_decode($berita_acara->pendidikan)->total }}</td>
            </tr>
            <tr>
                <td colspan="3">2) Mengikuti pelatihan prajabatan</td>
                <td>{{ json_decode($berita_acara->prajabatan)->lama }}</td>
                <td>{{ json_decode($berita_acara->prajabatan)->baru }}</td>
                <td>{{ json_decode($berita_acara->prajabatan)->total }}</td>
            </tr>
            <tr>
                <td colspan="3">b. Pembelajaran /  bimbingan dan tugas tertentu</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">    1) Proses pembelajaran	</td>
                <td>{{ json_decode($berita_acara->pembelajaran)->lama }}</td>
                <td>{{ json_decode($berita_acara->pembelajaran)->baru }}</td>
                <td>{{ json_decode($berita_acara->pembelajaran)->total }}</td>   
            </tr>
            <tr>
                <td colspan="3">    2) Proses bimbingan	</td>
                <td>{{ json_decode($berita_acara->bimbingan)->lama }}</td>
                <td>{{ json_decode($berita_acara->bimbingan)->baru }}</td>
                <td>{{ json_decode($berita_acara->bimbingan)->total }}</td>
            </tr>
            <tr>
                <td colspan="3">    3) Tugas lain yang relevan</td>
                <td>{{ json_decode($berita_acara->tugas_lain)->lama }}</td>
                <td>{{ json_decode($berita_acara->tugas_lain)->baru }}</td>
                <td>{{ json_decode($berita_acara->tugas_lain)->total }}</td>
            </tr>
            <tr>
                <td colspan="3">c. Pengembangan Keprofesian</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3"> 1) Pengembangan diri</td>
                <td>{{ json_decode($berita_acara->pd)->lama }}</td>
                <td>{{ json_decode($berita_acara->pd)->baru }}</td>
                <td>{{ json_decode($berita_acara->pd)->total }}</td>
            </tr>
            <tr>
                <td colspan="3">2) Publikasi ilmiah</td>
                <td>{{ json_decode($berita_acara->pi)->lama }}</td>
                <td>{{ json_decode($berita_acara->pi)->baru }}</td>
                <td>{{ json_decode($berita_acara->pi)->total }}</td>
            </tr>
            <tr>
                <td colspan="3">  3) Karya Inovatif</td>
                <td>{{ json_decode($berita_acara->ki)->lama }}</td>
                <td>{{ json_decode($berita_acara->ki)->baru }}</td>
                <td>{{ json_decode($berita_acara->ki)->total }}</td>
            </tr>
            <tr>
                <td colspan="3"> <b>Jumlah Unsur Utama</b></td>
                <td> 
                    <b>
                        {{
                            json_decode($berita_acara->pendidikan)->lama + 
                            json_decode($berita_acara->prajabatan)->lama  +
                            json_decode($berita_acara->pembelajaran)->lama +
                            json_decode($berita_acara->bimbingan)->lama +
                            json_decode($berita_acara->tugas_lain)->lama +
                            json_decode($berita_acara->pd)->lama +
                            json_decode($berita_acara->pi)->lama +
                            json_decode($berita_acara->ki)->lama
                        }}
                    </b>
                </td>
                <td>
                    <b>
                        {{
                            json_decode($berita_acara->pendidikan)->baru + 
                            json_decode($berita_acara->prajabatan)->baru  +
                            json_decode($berita_acara->pembelajaran)->baru +
                            json_decode($berita_acara->bimbingan)->baru +
                            json_decode($berita_acara->tugas_lain)->baru +
                            json_decode($berita_acara->pd)->baru +
                            json_decode($berita_acara->pi)->baru +
                            json_decode($berita_acara->ki)->baru
                        }}
                    </b>
                </td>
                <td>
                    <b>
                        {{
                            json_decode($berita_acara->pendidikan)->total + 
                            json_decode($berita_acara->prajabatan)->total  +
                            json_decode($berita_acara->pembelajaran)->total +
                            json_decode($berita_acara->bimbingan)->total +
                            json_decode($berita_acara->tugas_lain)->total +
                            json_decode($berita_acara->pd)->total +
                            json_decode($berita_acara->pi)->total +
                            json_decode($berita_acara->ki)->total
                        }}
                    </b>
                    </td>
            </tr>
            <tr>
                <td width="2%" >2</td>
                <td colspan="3"><b>Unsur Penunjang</b></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td width="2%" rowspan="3"></td>
                <td colspan="3">1. Ijazah yang tidak sesuai</td>
                <td>{{ json_decode($berita_acara->ijazah_tdk_sesuai)->lama }}</td>
                <td>{{ json_decode($berita_acara->ijazah_tdk_sesuai)->baru }}</td>
                <td>{{ json_decode($berita_acara->ijazah_tdk_sesuai)->total }}</td>
            </tr>
            <tr>
                <td colspan="3">2. Pendukung tugas guru</td>
                <td>{{ json_decode($berita_acara->pendukung)->lama }}</td>
                <td>{{ json_decode($berita_acara->pendukung)->baru }}</td>
                <td>{{ json_decode($berita_acara->pendukung)->total }}</td>
            </tr>
            <tr>
                <td colspan="3"><b>Jumlah Unsur Penunjang	</b></td>
                <td>
                    <b>
                        {{
                            json_decode($berita_acara->ijazah_tdk_sesuai)->lama +
                            json_decode($berita_acara->pendukung)->lama 

                           
                        }}
                    </b>
                </td>
                <td>
                    <b>
                        {{
                            json_decode($berita_acara->ijazah_tdk_sesuai)->baru +
                            json_decode($berita_acara->pendukung)->baru
                        }}
                    </b>
                </td> 
                <td>
                    <b>
                        {{
                            json_decode($berita_acara->ijazah_tdk_sesuai)->total + 
                            json_decode($berita_acara->pendukung)->total
                        }}
                    </b>
                </td>
            </tr>

            <tr>
                <td colspan="4"><b> Jumlah Usur Utama dan Unsur Penunjang</b></td>
                <td>
                    <b>
                        {{
                            json_decode($berita_acara->ijazah_tdk_sesuai)->lama +
                            json_decode($berita_acara->pendukung)->lama +


                            json_decode($berita_acara->pendidikan)->lama + 
                            json_decode($berita_acara->prajabatan)->lama  +
                            json_decode($berita_acara->pembelajaran)->lama +
                            json_decode($berita_acara->bimbingan)->lama +
                            json_decode($berita_acara->tugas_lain)->lama +
                            json_decode($berita_acara->pd)->lama +
                            json_decode($berita_acara->pi)->lama +
                            json_decode($berita_acara->ki)->lama
                        }}
                    </b>
                </td>
                <td>
                    <b>
                        {{
                            json_decode($berita_acara->ijazah_tdk_sesuai)->baru +
                            json_decode($berita_acara->pendukung)->baru +



                            json_decode($berita_acara->pendidikan)->baru + 
                            json_decode($berita_acara->prajabatan)->baru  +
                            json_decode($berita_acara->pembelajaran)->baru +
                            json_decode($berita_acara->bimbingan)->baru +
                            json_decode($berita_acara->tugas_lain)->baru +
                            json_decode($berita_acara->pd)->baru +
                            json_decode($berita_acara->pi)->baru +
                            json_decode($berita_acara->ki)->baru
                        }}
                    </b>
                </td> 
                <td>
                    <b>
                        {{
                            json_decode($berita_acara->ijazah_tdk_sesuai)->total +
                            json_decode($berita_acara->pendukung)->total +


                            json_decode($berita_acara->pendidikan)->total + 
                            json_decode($berita_acara->prajabatan)->total  +
                            json_decode($berita_acara->pembelajaran)->total +
                            json_decode($berita_acara->bimbingan)->total +
                            json_decode($berita_acara->tugas_lain)->total +
                            json_decode($berita_acara->pd)->total +
                            json_decode($berita_acara->pi)->total +
                            json_decode($berita_acara->ki)->total +

                            $berita_acara->dasus 


                        }}
                    </b>
                </td>
            </tr>
            
            <tr>
                <td colspan="7">Tidak Dapat / Dapat dipertimbangkan untuk Kenaikan Pangkat, Golongan Ruang, TMT: 
                    {{ check_naik_pangkat($biodatas->pangkat_golongan)->pangkat 
                        .', '.check_naik_pangkat_periode( customTanggal1($berita_acara->created_at,"Y-m-d") ).'  '.
                        date('Y', strtotime($berita_acara->created_at->addYear()))
                 }} </td>
            </tr>
            
    </tbody>
    </table>

    <div style="text-align:left;padding-left:70%">
                            @if(!empty($berita_acara->created_at))
                                Malinau, {{ tgl_indo( customTanggal1($berita_acara->created_at,"Y-m-d") )}}
                            @else
                                Malinau, {{tgl_indo( $now )}}        
                            @endif
                        <br>
                        <br>
                        <br>
                        <br>
                            {{ $berita_acara->penilai }} 
                        <br>
                            NIP. {{ Auth::user()->nip }}
    </div>


</div>
</html>