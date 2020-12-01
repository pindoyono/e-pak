<style>
table, td, th {
  border: 1px solid black;
}


@page{
  margin: 0.5em 3em;
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
    <h3>
        BERITA ACARA PENILAIAN ANGKA KREDIT
            <br>
        <!-- TAHUN {{tgl_indo_tahun($dupak->awal)}} -->
    </h3>
    
    <div style="font-size:10; text-align:justify">
        Pada hari ini {{ hari_ini().", ".tgl_indo($now)}} bertempat di Kantor Cabang Dinas Pendidikan dan Kebudayaan Provinsi Kalimantan Utara
        Wilayah Malinau dan Tana Tidung di Malinau telah dilakukan penilaian terhadap usulan penilaian angka kredit jabatan fungsional guru dengan hasil sebagai berikut:
    </div>
    <table>
        <tbody style="font-size:11">
            <tr>
            <td colspan=4 style="font-size:9; text-align:left">
                Instansi : Dinas Pendidikan dan Kebudayaan Provinsi Kalimantan Utara      
            </td>
            <td colspan=4 style="font-size:9;text-align:right">
                Masa Penilaian : {{tgl_indo($dupak->awal).' - '.tgl_indo($dupak->akhir)}}
            </td>
            </tr>
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
                <td colspan=2 style="font-size:9;">Pendidikan yang telah diperhitungkan angka kreditnya</td>
                <td colspan=4>{{$biodatas->pendidikan}}</td>
            </tr>
            <tr>
                <td width="5%"> 7</td>
                <td colspan=2>Pangkat / Golongan ruang / TMT</td>
                <td colspan=4>{{  pangkat($biodatas->pangkat_golongan)->pangkat.' / '.tgl_indo($biodatas->tmt_pns) }}</td>
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
                <td colspan=4 style="font-size:9;">{{nama_sekolah($biodatas->sekolah_id)->alamat}}</td>
            </tr>
            <tr>
                <td>Rumah</td>
                <td colspan=4 style="font-size:9;">{{$biodatas->alamat}}</td>
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
                <td width="2%" >1</td>
                <td colspan=3> <b>Unsur Utama</b></td>
                <td style="text-align:right"> <b> {{ number_format(0,3) }} </b></td>
                <td style="text-align:right"> <b>  {{ number_format($berita_acara->dasus,3) }} </b></td>
                <td style="text-align:right"> <b>  {{ number_format($berita_acara->dasus,3) }} </b></td>
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
                <td style="text-align:right">{{ number_format(json_decode($berita_acara->pendidikan)->lama,3)  }}</td>
                <td style="text-align:right">{{ number_format(json_decode($berita_acara->pendidikan)->baru,3)  }}</td>
                <td style="text-align:right">{{ number_format(json_decode($berita_acara->pendidikan)->total,3) }}</td>
            </tr>
            <tr>
                <td colspan="3">2) Mengikuti pelatihan prajabatan</td>
                <td style="text-align:right">{{ number_format(json_decode($berita_acara->prajabatan)->lama,3) }}</td>
                <td style="text-align:right">{{ number_format(json_decode($berita_acara->prajabatan)->baru,3) }}</td>
                <td style="text-align:right">{{ number_format(json_decode($berita_acara->prajabatan)->total,3) }}</td>
            </tr>
            <tr>
                <td colspan="3">b. Pembelajaran /  bimbingan dan tugas tertentu</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">    1) Proses pembelajaran	</td>
                <td style="text-align:right">{{ number_format(json_decode($berita_acara->pembelajaran)->lama,3) }}</td>
                <td style="text-align:right">{{ number_format(json_decode($berita_acara->pembelajaran)->baru,3) }}</td>
                <td style="text-align:right">{{ number_format(json_decode($berita_acara->pembelajaran)->total,3) }}</td>   
            </tr>
            <tr>
                <td colspan="3">    2) Proses bimbingan	</td>
                <td style="text-align:right">{{ number_format(json_decode($berita_acara->bimbingan)->lama,3) }}</td>
                <td style="text-align:right">{{ number_format(json_decode($berita_acara->bimbingan)->baru,3) }}</td>
                <td style="text-align:right">{{ number_format(json_decode($berita_acara->bimbingan)->total,3) }}</td>
            </tr>
            <tr>
                <td colspan="3">    3) Tugas lain yang relevan</td>
                <td style="text-align:right">{{ number_format(json_decode($berita_acara->tugas_lain)->lama,3) }}</td>
                <td style="text-align:right">{{ number_format(json_decode($berita_acara->tugas_lain)->baru,3) }}</td>
                <td style="text-align:right">{{ number_format(json_decode($berita_acara->tugas_lain)->total,3) }}</td>
            </tr>
            <tr>
                <td colspan="3">c. Pengembangan Keprofesian</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3"> 1) Pengembangan Diri</td>
                <td style="text-align:right">{{ number_format(json_decode($berita_acara->pd)->lama,3) }}</td>
                <td style="text-align:right">{{ number_format(json_decode($berita_acara->pd)->baru,3) }}</td>
                <td style="text-align:right">{{ number_format(json_decode($berita_acara->pd)->total,3) }}</td>
            </tr>
            <tr>
                <td colspan="3">2) Publikasi Ilmiah</td>
                <td style="text-align:right">{{ number_format(json_decode($berita_acara->pi)->lama,3) }}</td>
                <td style="text-align:right">{{ number_format(json_decode($berita_acara->pi)->baru,3) }}</td>
                <td style="text-align:right">{{ number_format(json_decode($berita_acara->pi)->total,3) }}</td>
            </tr>
            <tr>
                <td colspan="3">  3) Karya Inovatif</td>
                <td style="text-align:right">{{ number_format(json_decode($berita_acara->ki)->lama,3) }}</td>
                <td style="text-align:right">{{ number_format(json_decode($berita_acara->ki)->baru,3) }}</td>
                <td style="text-align:right">{{ number_format(json_decode($berita_acara->ki)->total,3) }}</td>
            </tr>
            <tr>
                <td colspan="3"> <b>Jumlah Unsur Utama</b></td>
                <td style="text-align:right"> 
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
                <td style="text-align:right">
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
                <td width="2%" >2</td>
                <td colspan="3"><b>Unsur Penunjang</b></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td width="2%" rowspan="3"></td>
                <td colspan="3">1. Ijazah yang tidak sesuai</td>
                <td style="text-align:right">{{ number_format(json_decode($berita_acara->ijazah_tdk_sesuai)->lama,3) }}</td>
                <td style="text-align:right">{{ number_format(json_decode($berita_acara->ijazah_tdk_sesuai)->baru,3) }}</td>
                <td style="text-align:right">{{ number_format(json_decode($berita_acara->ijazah_tdk_sesuai)->total,3) }}</td>
            </tr>

            
            <tr>
                <td colspan="3">2. Pendukung tugas guru</td>
                <td style="text-align:right">{{ number_format(json_decode($berita_acara->pendukung)->lama,3) }}</td>
                <td style="text-align:right">{{ number_format(json_decode($berita_acara->pendukung)->baru,3) }}</td>
                <td style="text-align:right">{{ number_format(json_decode($berita_acara->pendukung)->total,3) }}</td>
            </tr>
            <tr>
                <td colspan="3"><b>Jumlah Unsur Penunjang	</b></td>
                <td style="text-align:right">
                    <b>
                        {{ 
                            number_format(
                            json_decode($berita_acara->ijazah_tdk_sesuai)->lama +
                            json_decode($berita_acara->pendukung)->lama 
                            ,3)

                           
                        }}
                    </b>
                </td>
                <td style="text-align:right">
                    <b>
                        {{
                            number_format(
                            json_decode($berita_acara->ijazah_tdk_sesuai)->baru +
                            json_decode($berita_acara->pendukung)->baru
                            ,3)
                        }}
                    </b>
                </td> 
                <td style="text-align:right">
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
            <td colspan="4"><b> Jumlah Unsur Utama dan Unsur Penunjang</b></td>
                <td style="text-align:right">
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
                <td style="text-align:right">
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
                <td style="text-align:right">
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
            <tr>
            </tr>
    </tbody>
    </table>

    <div style="text-align:left;padding-left:70%">
                            @if(!empty($berita_acara->created_at))
                                Malinau, {{tgl_indo( customTanggal1($berita_acara->created_at,"Y-m-d") )}}
                            @else
                                Malinau, {{tgl_indo( $now )}}        
                            @endif
                        <br>
                        <br>
                        <br>
                        <br>
                            {{ $berita_acara->penilai }} 
                        <br>
                            NIP. {{ $berita_acara->nip_penilai }}
    </div>


</div>