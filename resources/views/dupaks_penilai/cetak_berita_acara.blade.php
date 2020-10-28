<div class="container center" style="text-align:center;">
    <h3>
        BERITA ACARA PENILAIAN ANGKA KREDIT
            <br>
        TAHUN {{tgl_indo_tahun($dupak->awal)}}
    </h3>
    <table>
        <thead>
            <tr style="font-size:8">
                <th colspan=4 >Instansi : Dinas Pendidikan dan Kebudayaan Provinsi Kalimantan Utara</th>
                <th colspan=4 style="text-align:right;">Masa penilaian : {{tgl_indo($dupak->awal).' - '.tgl_indo($dupak->awal)}}</th>
            </tr>
        </thead>
        <tbody style="font-size:11">
            <tr>
                <td width="5%">I</td>
                <td colspan=5 class="text-left"> KETERANGAN PERORANGAN</td>
            </tr>
            <tr>
                <td rowspan=14></td>
                <td width="5%"> 1</td>
                <td width="40%" colspan=2>Nama</td>
                <td colspan=3>{{$users->name}}</td>
            </tr>
            <tr>
                <td width="5%"> 2</td>
                <td colspan=2>NIP</td>
                <td colspan=3>{{$users->nip}}</td>
            </tr>
            <tr>
                <td width="5%"> 3</td>
                <td colspan=2>NUPTK</td>
                <td colspan=3>{{$biodatas->nuptk}}</td>
            </tr>
            <tr>
                <td width="5%"> 4</td>
                <td colspan=2>Tempat dan Tanggal Lahir</td>
                <td colspan=3>{{$biodatas->tempat_lahir.' dan '.$biodatas->tanggal_lahir}}</td>
            </tr>
            <tr>
                <td width="5%"> 5</td>
                <td colspan=2>Jenis Kelamin</td>
                <td colspan=3>{{$biodatas->jenis_kelamin}}</td>
            </tr>
            <tr>
                <td width="5%"> 6</td>
                <td colspan=2>Pendidikan yang telah diperhitungkan angka kreditnya</td>
                <td colspan=3>{{$biodatas->pendidikan}}</td>
            </tr>
            <tr>
                <td width="5%"> 7</td>
                <td colspan=2>Pangkat / Golongan ruang / TMT</td>
                <td colspan=3>{{  pangkat($biodatas->pangkat_golongan)->pangkat }}</td>
            </tr>
            <tr>
                <td width="5%"> 8</td>
                <td colspan=2>Jabatan Guru / TMT</td>
                <td colspan=3>{{  pangkat($biodatas->pangkat_golongan)->jabatan }}</td>
            </tr>
            <tr>
                <td rowspan=2> 9</td>
                <td rowspan=2>Masa kerja Golongan</td>
                <td>Lama</td>
                <td colspan=3>{{$biodatas->tmt_cpns}}</td>
            </tr>
            <tr>
                <td>Baru</td>
                <td colspan=3>{{$biodatas->tmt_cpns}}</td>
            </tr>
            <tr>
                <td width="5%"> 10</td>
                <td colspan=2>Jenis Guru </td>
                <td colspan=3>{{  $biodatas->jenis_guru }}</td>
            </tr>
            <tr>
                <td width="5%"> 11</td>
                <td colspan=2>Unit Kerja </td>
                <td colspan=3>{{  nama_sekolah($biodatas->sekolah_id)->nama }}</td>
            </tr>
            <tr>
                <td rowspan=2> 12</td>
                <td rowspan=2>Alamat</td>
                <td>Sekolah</td>
                <td colspan=3>{{nama_sekolah($biodatas->sekolah_id)->alamat}}</td>
            </tr>
            <tr>
                <td>Rumah</td>
                <td colspan=3>{{$biodatas->alamat}}</td>
            </tr>
            <tr>
                <td colspan=8></td>
            </tr>

            <tr>
                <td width="5%">II</td>
                <td colspan=3> PENETAPAN ANGKA KREDIT</td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
            </tr>
            <tr>
                <td width="5%" rowspan="20"></td>
                <td width="2%" >1</td>
                <td> <b>Unsur Utama</b></td>
                <td ></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td width="2%" rowspan="12"></td>
                <td> a. Pendidikan</td>
                <td></td>
                <td></td>
                <td></td>
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
                <td width="2%" rowspan="12"></td>
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
                <td colspan="3"><b>	</b></td>
                <td></td> 
                <td colspan="3">
                <br>
                        Malinau, {{tgl_indo($now)}}
                    <br>
                    <br>
                    <br>
                    <br>
                        {{Auth::user()->name}} 
                    <br>
                        NIP. {{Auth::user()->nip}}
                </td> 
            </tr>
            
            

    </tbody>
    </table>
</div>