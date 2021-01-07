<html>

<style>



.border, td1, th1 {
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

<div class="container wrapper center" style="text-align:center;">

    <div style="text-align:left;padding-left:65%;font-size:8">
    Lampiran V :	Peraturan Bersama	
	Menteri Pendidikan Nasional	
	dan Kepala Badan Kepegawaian Negara	<br>
	Nomor     : 03/V/PB/2010	<br>
	Nomor     : 14 tahun 2010	<br>
	Tanggal    :  6 Mei 2010	<br>
    </div>

    <div>
        <span style="font-size:12;">
        <b>
                    PENETAPAN ANGKA KREDIT<br>
            <!-- TAHUN {{tgl_indo_tahun($dupak->awal)}} -->
        Nomor : 823.3/
        {{$dupak->no_pak}}
        /Disdikbud-A1/KU/I/{{ date('Y', strtotime($dupak->awal))+1 }}	
        <b>
        </span>
        <br>
        <span align=left style="font-size:10; text-align:left">
            Instansi : Dinas Pendidikan dan Kebudayaan Provinsi Kalimantan Utara      
        </span>
        <span align=right style="font-size:10;text-align:right">
            Masa penilaian : {{tgl_indo($dupak->awal).' - '.tgl_indo($dupak->akhir)}}
        </span>
    </div>

    <table >
        <tbody  style="border: 1px solid black;font-size:10;">
            <tr>
                <td style="border: 1px solid black;" width="5%">I</td>
                <td style="border: 1px solid black;" colspan=7> KETERANGAN PERORANGAN</td>
            </tr>
            <tr>
                <td  style="border: 1px solid black;" rowspan=14></td>
                <td  style="border: 1px solid black;" width="5%"> 1</td>
                <td  style="border: 1px solid black;" width="40%" colspan=2>Nama</td>
                <td  style="border: 1px solid black;" colspan=4>{{$users->name}}</td>
            </tr>
            <tr>
                <td  style="border: 1px solid black;" width="5%"> 2</td>
                <td  style="border: 1px solid black;" colspan=2>NIP</td>
                <td  style="border: 1px solid black;" colspan=4>{{$users->nip}}</td>
            </tr>
            <tr>
                <td  style="border: 1px solid black;" width="5%"> 3</td>
                <td  style="border: 1px solid black;" colspan=2>NUPTK</td>
                <td  style="border: 1px solid black;" colspan=4>{{$biodatas->nuptk}}</td>
            </tr>
            <tr>
                <td  style="border: 1px solid black;" width="5%"> 4</td>
                <td  style="border: 1px solid black;" colspan=2>Tempat, Tanggal Lahir</td>
                <td  style="border: 1px solid black;" colspan=4>{{$biodatas->tempat_lahir.', '.tgl_indo($biodatas->tanggal_lahir)}}</td>
            </tr>
            <tr>
                <td  style="border: 1px solid black;" width="5%"> 5</td>
                <td  style="border: 1px solid black;" colspan=2>Jenis Kelamin</td>
                <td  style="border: 1px solid black;" colspan=4>{{$biodatas->jenis_kelamin}}</td>
            </tr>
            <tr>
                <td  style="border: 1px solid black;" width="5%"> 6</td>
                <td  style="border: 1px solid black;" colspan=2 style="font-size:9;">Pendidikan yang telah diperhitungkan angka kreditnya</td>
                <td  style="border: 1px solid black;" colspan=4>{{$biodatas->pendidikan}}</td>
            </tr>
            <tr>
                <td  style="border: 1px solid black;" width="5%"> 7</td>
                <td  style="border: 1px solid black;" colspan=2>Pangkat / Golongan ruang / TMT</td>
                <td  style="border: 1px solid black;" colspan=4>{{  pangkat($biodatas->pangkat_golongan)->pangkat.' / '.tgl_indo($biodatas->tmt_pns) }}</td>
            </tr>
            <tr>
                <td  style="border: 1px solid black;" width="5%"> 8</td>
                <td  style="border: 1px solid black;" colspan=2>Jabatan Guru / TMT</td>
                <td  style="border: 1px solid black;" colspan=4>{{  pangkat($biodatas->pangkat_golongan)->jabatan }}</td>
            </tr>
            <tr>
                <td  style="border: 1px solid black;" rowspan=2> 9</td>
                <td  style="border: 1px solid black;" rowspan=2>Masa Kerja Golongan</td>
                <td  style="border: 1px solid black;">Lama</td>
                <td  style="border: 1px solid black;" colspan=4>{{ $berita_acara->masa_kerja_lama  }}</td>
            </tr>
            <tr>
                <td>Baru</td>
                <td  style="border: 1px solid black;" colspan=4>{{ $berita_acara->masa_kerja_baru }}</td>
            </tr>
            <tr>
                <td  style="border: 1px solid black;" width="5%"> 10</td>
                <td  style="border: 1px solid black;" colspan=2>Jenis Guru </td>
                <td  style="border: 1px solid black;" colspan=4>{{  $biodatas->jenis_guru }}</td>
            </tr>
            <tr>
                <td  style="border: 1px solid black;" width="5%"> 11</td>
                <td  style="border: 1px solid black;" colspan=2>Unit Kerja </td>
                <td  style="border: 1px solid black;" colspan=4>{{  nama_sekolah($biodatas->sekolah_id)->nama }}</td>
            </tr>
            <tr>
                <td  style="border: 1px solid black;" rowspan=2> 12</td>
                <td  style="border: 1px solid black;" rowspan=2>Alamat</td>
                <td  style="border: 1px solid black;">Sekolah</td>
                <td  style="border: 1px solid black;"colspan=4 style="font-size:7;">{{ strtolower(nama_sekolah($biodatas->sekolah_id)->alamat) }}</td>
            </tr>
            <tr>
                <td  style="border: 1px solid black;">Rumah</td>
                <td  style="border: 1px solid black;" colspan=4 style="font-size:7;">{{ strtolower($biodatas->alamat) }}</td>
            </tr>

            <tr>
                <td  style="border: 1px solid black;" width="5%">II</td>
                <td  style="border: 1px solid black;" colspan=4> PENETAPAN ANGKA KREDIT</td>
                <td  style="border: 1px solid black;" > LAMA</td>
                <td  style="border: 1px solid black;" > BARU</td>
                <td  style="border: 1px solid black;" > JUMLAH</td>
            </tr>
            <tr>
                <td  style="border: 1px solid black;" width="5%" rowspan="20"></td>
                <td  style="border: 1px solid black;" width="2%" >1</td>
                <td  style="border: 1px solid black;" colspan=3> <b>Unsur Utama</b></td>
                <td  style="border: 1px solid black; text-align:right"> <b>     {{ number_format(0,3) }} </b></td>
                <td  style="border: 1px solid black; text-align:right"> <b>  {{ number_format($berita_acara->dasus,3) }} </b></td>
                <td  style="border: 1px solid black; text-align:right"> <b>  {{ number_format($berita_acara->dasus,3) }} </b></td>
            </tr>
            <tr>
                <td  style="border: 1px solid black;" width="2%" rowspan="12"></td>
                <td  style="border: 1px solid black;" colspan=3> a. Pendidikan</td>
                <td  style="border: 1px solid black;" > </td>
                <td  style="border: 1px solid black;" > </td>
                <td  style="border: 1px solid black;" > </td>
            </tr>
            <tr>
                <td  style="border: 1px solid black;" colspan="3">1) Pendidikan sekolah dan memperoleh gelar ijazah </td>
                <td  style="border: 1px solid black; text-align:right">{{ number_format(json_decode($berita_acara->pendidikan)->lama,3)  }}</td>
                <td  style="border: 1px solid black; text-align:right">{{ number_format(json_decode($berita_acara->pendidikan)->baru,3)  }}</td>
                <td  style="border: 1px solid black; text-align:right">{{ number_format(json_decode($berita_acara->pendidikan)->total,3) }}</td>
            </tr>
            <tr>
                <td  style="border: 1px solid black;" colspan="3">2) Mengikuti pelatihan prajabatan</td>
                <td  style="border: 1px solid black; text-align:right">{{ number_format(json_decode($berita_acara->prajabatan)->lama,3) }}</td>
                <td  style="border: 1px solid black; text-align:right">{{ number_format(json_decode($berita_acara->prajabatan)->baru,3) }}</td>
                <td  style="border: 1px solid black; text-align:right">{{ number_format(json_decode($berita_acara->prajabatan)->total,3) }}</td>
            </tr>
            <tr>
                <td   style="border: 1px solid black;" style="border: 1px solid black;" colspan="3">b. Pembelajaran /  bimbingan dan tugas tertentu</td>
                <td style="border: 1px solid black;"></td>
                <td  style="border: 1px solid black;"></td>
                <td style="border: 1px solid black;"></td>
            </tr>
            <tr>
                <td  style="border: 1px solid black;"colspan="3">    1) Proses pembelajaran	</td>
                <td  style="border: 1px solid black; text-align:right">{{ number_format(json_decode($berita_acara->pembelajaran)->lama,3) }}</td>
                <td  style="border: 1px solid black; text-align:right">{{ number_format(json_decode($berita_acara->pembelajaran)->baru,3) }}</td>
                <td  style="border: 1px solid black; text-align:right">{{ number_format(json_decode($berita_acara->pembelajaran)->total,3) }}</td>   
            </tr>
            <tr>
                <td  style="border: 1px solid black;"colspan="3">    2) Proses bimbingan	</td>
                <td  style="border: 1px solid black; text-align:right">{{ number_format(json_decode($berita_acara->bimbingan)->lama,3) }}</td>
                <td  style="border: 1px solid black; text-align:right">{{ number_format(json_decode($berita_acara->bimbingan)->baru,3) }}</td>
                <td  style="border: 1px solid black; text-align:right">{{ number_format(json_decode($berita_acara->bimbingan)->total,3) }}</td>
            </tr>
            <tr>
                <td  style="border: 1px solid black;"colspan="3">    3) Tugas lain yang relevan</td>
                <td  style="border: 1px solid black; text-align:right">{{ number_format(json_decode($berita_acara->tugas_lain)->lama,3) }}</td>
                <td  style="border: 1px solid black; text-align:right">{{ number_format(json_decode($berita_acara->tugas_lain)->baru,3) }}</td>
                <td  style="border: 1px solid black; text-align:right">{{ number_format(json_decode($berita_acara->tugas_lain)->total,3) }}</td>
            </tr>
            <tr>
                <td  style="border: 1px solid black;"colspan="3">c. Pengembangan Keprofesian</td>
                <td  style="border: 1px solid black;"></td>
                <td  style="border: 1px solid black;"></td>
                <td  style="border: 1px solid black;"></td>
            </tr>
            <tr>
                <td  style="border: 1px solid black;"colspan="3"> 1) Pengembangan Diri</td>
                <td  style="border: 1px solid black; text-align:right">{{ number_format(json_decode($berita_acara->pd)->lama,3) }}</td>
                <td  style="border: 1px solid black; text-align:right">{{ number_format(json_decode($berita_acara->pd)->baru,3) }}</td>
                <td  style="border: 1px solid black; text-align:right">{{ number_format(json_decode($berita_acara->pd)->total,3) }}</td>
            </tr>
            <tr>
                <td  style="border: 1px solid black;"colspan="3">2) Publikasi Ilmiah</td>
                <td  style="border: 1px solid black; text-align:right">{{ number_format(json_decode($berita_acara->pi)->lama,3) }}</td>
                <td  style="border: 1px solid black; text-align:right">{{ number_format(json_decode($berita_acara->pi)->baru,3) }}</td>
                <td  style="border: 1px solid black; text-align:right">{{ number_format(json_decode($berita_acara->pi)->total,3) }}</td>
            </tr>
            <tr>
                <td  style="border: 1px solid black;"  colspan="3">  3) Karya Inovatif</td>
                <td  style="border: 1px solid black; text-align:right">{{ number_format(json_decode($berita_acara->ki)->lama,3) }}</td>
                <td  style="border: 1px solid black; text-align:right">{{ number_format(json_decode($berita_acara->ki)->baru,3) }}</td>
                <td  style="border: 1px solid black; text-align:right">{{ number_format(json_decode($berita_acara->ki)->total,3) }}</td>
            </tr>
            <tr>
                <td  style="border: 1px solid black;"colspan="3"> <b>Jumlah Unsur Utama</b></td>
                <td  style="border: 1px solid black; text-align:right"> 
                    <b>
                        {{  number_format(
                            json_decode($berita_acara->pendidikan)->lama + 
                            json_decode($berita_acara->prajabatan)->lama  +
                            json_decode($berita_acara->pembelajaran)->lama +
                            json_decode($berita_acara->bimbingan)->lama +
                            json_decode($berita_acara->tugas_lain)->lama +
                            json_decode($berita_acara->pd)->lama +
                            json_decode($berita_acara->pi)->lama +
                            json_decode($berita_acara->ki)->lama
                            ,3)
                        }}
                    </b>
                </td>
                <td  style="border: 1px solid black; text-align:right">
                    <b>
                        {{
                            number_format(
                            json_decode($berita_acara->pendidikan)->baru + 
                            json_decode($berita_acara->prajabatan)->baru  +
                            json_decode($berita_acara->pembelajaran)->baru +
                            json_decode($berita_acara->bimbingan)->baru +
                            json_decode($berita_acara->tugas_lain)->baru +
                            json_decode($berita_acara->pd)->baru +
                            json_decode($berita_acara->pi)->baru +
                            json_decode($berita_acara->ki)->baru +

                            $berita_acara->dasus 
                            ,3)
                        }}
                    </b>
                </td>
                <td style="text-align:right">
                    <b>
                        {{
                            number_format(
                            json_decode($berita_acara->pendidikan)->total + 
                            json_decode($berita_acara->prajabatan)->total  +
                            json_decode($berita_acara->pembelajaran)->total +
                            json_decode($berita_acara->bimbingan)->total +
                            json_decode($berita_acara->tugas_lain)->total +
                            json_decode($berita_acara->pd)->total +
                            json_decode($berita_acara->pi)->total +
                            json_decode($berita_acara->ki)->total +

                            $berita_acara->dasus 
                            ,3)
                        }}
                    </b>
                    </td>
            </tr>

            <tr>
                <td  style="border: 1px solid black;" width="2%" >2</td>
                <td  style="border: 1px solid black;" colspan="3"><b>Unsur Penunjang</b></td>
                <td  style="border: 1px solid black;" ></td>
                <td  style="border: 1px solid black;"></td>
                <td  style="border: 1px solid black;"></td>
            </tr>
            <tr>
                <td  style="border: 1px solid black;" width="2%" rowspan="3"></td>
                <td  style="border: 1px solid black;" colspan="3">1. Ijazah yang tidak sesuai</td>
                <td  style="border: 1px solid black; text-align:right">{{ number_format(json_decode($berita_acara->ijazah_tdk_sesuai)->lama,3) }}</td>
                <td  style="border: 1px solid black; text-align:right">{{ number_format(json_decode($berita_acara->ijazah_tdk_sesuai)->baru,3) }}</td>
                <td  style="border: 1px solid black; text-align:right">{{ number_format(json_decode($berita_acara->ijazah_tdk_sesuai)->total,3) }}</td>
            </tr>

            
            <tr>
                <td  style="border: 1px solid black;" colspan="3">2. Pendukung tugas guru</td>
                <td  style="border: 1px solid black; text-align:right">{{ number_format(json_decode($berita_acara->pendukung)->lama,3) }}</td>
                <td  style="border: 1px solid black; text-align:right">{{ number_format(json_decode($berita_acara->pendukung)->baru,3) }}</td>
                <td  style="border: 1px solid black; text-align:right">{{ number_format(json_decode($berita_acara->pendukung)->total,3) }}</td>
            </tr>
            <tr>
                <td  style="border: 1px solid black;" colspan="3"><b>Jumlah Unsur Penunjang	</b></td>
                <td  style="border: 1px solid black; text-align:right">
                    <b>
                        {{ 
                            number_format(
                            json_decode($berita_acara->ijazah_tdk_sesuai)->lama +
                            json_decode($berita_acara->pendukung)->lama 
                            ,3)

                           
                        }}
                    </b>
                </td>
                <td  style="border: 1px solid black; text-align:right">
                    <b>
                        {{
                            number_format(
                            json_decode($berita_acara->ijazah_tdk_sesuai)->baru +
                            json_decode($berita_acara->pendukung)->baru
                            ,3)
                        }}
                    </b>
                </td> 
                <td  style="border: 1px solid black; text-align:right">
                    <b>
                        {{
                            number_format(
                            json_decode($berita_acara->ijazah_tdk_sesuai)->total + 
                            json_decode($berita_acara->pendukung)->total
                            ,3)
                        }}
                    </b>
                </td>
            </tr>

            <tr>
                <td  style="border: 1px solid black;" colspan="4"><b> Jumlah Usur Utama dan Unsur Penunjang</b></td>
                <td  style="border: 1px solid black; text-align:right">
                    <b>
                        {{
                            number_format(
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
                            ,3)
                        }}
                    </b>
                </td>
                <td  style="border: 1px solid black; text-align:right">
                    <b>
                        {{
                            number_format(
                            json_decode($berita_acara->ijazah_tdk_sesuai)->baru +
                            json_decode($berita_acara->pendukung)->baru +



                            json_decode($berita_acara->pendidikan)->baru + 
                            json_decode($berita_acara->prajabatan)->baru  +
                            json_decode($berita_acara->pembelajaran)->baru +
                            json_decode($berita_acara->bimbingan)->baru +
                            json_decode($berita_acara->tugas_lain)->baru +
                            json_decode($berita_acara->pd)->baru +
                            json_decode($berita_acara->pi)->baru +
                            json_decode($berita_acara->ki)->baru +

                            $berita_acara->dasus 
                            ,3)
                        }}
                    </b>
                </td> 
                <td  style="border: 1px solid black; text-align:right">
                    <b>
                        {{
                            number_format(
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
                            ,3)


                        }}
                    </b>
                </td>
            </tr>
            

                @if(
                    number_format(
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
                    ,3) 
                    
                    -

                    number_format(
                    check_jabatan($biodatas->pangkat_golongan , 'target')
                    ,3) >= 0
                    
                    &&
                    
                    number_format(json_decode($berita_acara->pd)->total,3) - number_format(check_jabatan($biodatas->pangkat_golongan , 'akpkbpd'),3) >= 0

                    &&

                        number_format(
                        number_format( number_format(json_decode($berita_acara->pi)->total,3) + number_format(json_decode($berita_acara->ki)->total,3) ,3) 
                        -
                        number_format( check_jabatan($biodatas->pangkat_golongan , 'akpkbpiki'),3)
                        ,3) >= 0

                    
                )
                    @if(tgl_indo($dupak->awal) == 2020)
                <tr>
                    <td  style="border: 1px solid black;" colspan="7">Dapat dipertimbangkan untuk Kenaikan Pangkat, Golongan Ruang, TMT: 
                        {{ check_naik_pangkat($biodatas->pangkat_golongan)->pangkat 
                            .', '.check_naik_pangkat_periode( customTanggal1($berita_acara->created_at,"Y-m-d") ).'  '.
                            date('Y', strtotime($berita_acara->created_at->addYear()))
                    }} </td>
                </tr>
                @endif
                @else
                    <!-- <td  style="border: 1px solid black;" colspan="7">Tidak Dapat dipertimbangkan untuk Kenaikan Pangkat, Golongan Ruang, TMT: 
                        {{ check_naik_pangkat($biodatas->pangkat_golongan)->pangkat 
                            .', '.check_naik_pangkat_periode( customTanggal1($berita_acara->created_at,"Y-m-d") ).'  '.
                            date('Y', strtotime($berita_acara->created_at->addYear()))
                    }} </td> -->
                @endif    
            
    </tbody>
    </table>

</div>

    <div>
        <table style="font-size:10" style="border: 1px solid black;">
            
            <tr style="border: 1px solid black;">
                <td width="10%" >Nama</td>
                <td  width="2%" >:</td>
                <td width="57%">{{$users->name}}</td>
                <td >Ditetapkan di</td>
                <td >:</td>
                <td >Tanjung Selor</td>
            </tr>
            <tr >
                <td width="10%" > NIP</td>
                <td width="2%" >:</td>
                <td >{{$users->nip}}</td>
                <td  > Pada Tanggal </td>
                <td width="1%" >:</td>
                <!-- <td > {{tgl_indo( $now )}} </td> -->
                @if(date('Y', strtotime($dupak->awal))=='2017')
                <td > 17 Januari 2018 </td>
                @elseif(date('Y', strtotime($dupak->awal))=='2018')
                <td > 17 Januari 2019 </td>
                @elseif(date('Y', strtotime($dupak->awal))=='2019')
                <td > 30 Maret 2020 </td>
                @elseif(date('Y', strtotime($dupak->awal))=='2020')
                <td > 4 Januari 2021 </td>
                @endif
            </tr>
            <tr >
                <td width="10%" >Alamat</td>
                <td width="2%" >:</td>
                <td >{{strtolower($biodatas->alamat)}}</td>
                <td ></td>
                <td ></td>
                <td ></td>
            </tr>
            <tr>
                <td  colspan="3">
                    1	Kepala Kantor Regional VIII BKN Banjarmasin di Banjarbaru		 <br> 
                    2	Gubernur Kalimantan Utara		 <br> 
                    &nbsp;&nbsp;&nbsp;Up. Kepala BKD Prov. Kaltara di Tanjung Selor		 <br> 
                    3	Sekretaris Tim Penilai Penetapan Angka Kredit		 <br> 
                    4	Kepala Sekolah yang bersangkutan		 <br> 
                    5	Yang bersangkutan		 <br> 
                    <br> 
                </td>
                <td colspan="3">
                    <div style="font-size:11;">
                        <span style="">
                        @if(date('Y', strtotime($dupak->awal))=='2017' || date('Y', strtotime($dupak->awal))=='2018')
                            Kepala Dinas,
                        </span> 
                        <br>
                        <br>
                        <br>
                        <br>
                        <b>DR. H. Sigit Muryono, M.Pd., Kons </b>	<br>
                        Pembina Utama Madya	<br>
                        NIP. 196005211981111001	<br>
                        @else
                        Sekretaris Daerah,
                        </span> 
                        <br>
                        <br>
                        <br>
                        <br>
                        <b>DR. H. Suriansyah, M.AP. </b>	<br>
                        Pembina Utama, IV/e	<br>
                        NIP. 196502011991031009	<br>
                        @endif

                    </div>
                </td>
                
            </tr>
        </table>
    </div>
</html>