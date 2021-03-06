

<style>

.border, td1, th1 {
  border: 1px solid black;
}

table {
  width: 100%;
  border-collapse: collapse;
}

.wrapper {
    border: 0px solid white;
}

hr{
    border:0;
    border-top: 3px double #8c8c8c;
}

</style>

<div class="container center" style="text-align:center;">

    <div>
        <table style="font-size:9">
            <tr>
            
                <td width="10%"> 
                    <img width="60px" src="{{public_path('material/img/kaltara.png')}}" alt="logo"/>
                </td width="80%">
                <td style="text-align:center;">
                    <b  style="font-size:14">DINAS PENDIDIKAN DAN KEBUDAYAAN </b> <br>
                    Alamat: Jalan Sengkawit Komplek Pasar Induk Gedung Kanan Lt. II Telp/Fax : (0552) 2020530 <br>
                    Tanjung Selor Kode Pos 77212, Email: kaltara.pendidikan@yahoo.com/katara.pendidikan@gmail.com <br>
                    <b  style="font-size:14">TANJUNG SELOR </b>
                </td>
                <td width="10%"></td>
            </tr>
        </table>
    </div>
    <hr>
    
    
    <div>
        <table  style="font-size:10;text-align:justify">
            <tr>
                <td ></td>
                <td ></td>
                <td colspan=3>  </td>
                <td></td>
                <td colspan=2 >Tanjung Selor, 4 Januari 2021</td>
            </tr>
            <tr>
                <td >No</td>
                <td >:</td>
                <td  colspan=3>823.3/ {{$berita_acara->no_pak}}  /Disdikbud-A1/KU/I/2021</td>
                <td colspan=3 >Yth. Kepala {{  nama_sekolah($biodatas->sekolah_id)->nama }} </td>
            </tr>
            <tr>
                <td >Lampiran</td>
                <td >:</td>
                <td  colspan=3 >Dua lembar </td>
                <td></td>
                <td colspan=2 >di  --</td>
            </tr>
            <tr>
                <td style="width:100px">Hal</td>
                <td  style="width:10px">:</td>
                <td  colspan=3 >Hasil Penilaian Angka Kredit Jafung Guru </td>
                <td style="width:20px">  </td>
                <td style="width:20px"> </td>
                <td style="width:200px">Tempat</td>
            </tr>
            <tr>
                <td ></td>
                <td ></td>
                <td  colspan=6> a.n. {{$users->name}}  ({{  nama_sekolah($biodatas->sekolah_id)->nama }}) </td>
            </tr>
            <tr>
                <td ></td>
                <td ></td>
                <td  colspan=6> Sehubungan dengan surat Kepala {{  nama_sekolah($biodatas->sekolah_id)->nama }} Perihal usul penilaian angka kredit saudara </td>
            </tr>
    </div>
    <div>
        <table style="font-size:11;">
            <tr>
                <td  width=100px> </td>
                <td  width=100px>Nama </td>
                <td  width=5>: </td>
                <td >{{$users->name}} </td>
            </tr>
            <tr>
                <td  width=100px> </td>
                <td  width=100px>NIP </td>
                <td  width=5>:</td>
                <td > {{$users->nip}}</td>
            </tr>
            <tr>
                <td  width=100px> </td>
                <td  width=100px>Tempat,Tgl Lahir </td>
                <td  width=5>:</td>
                <td > {{$biodatas->tempat_lahir.', '.tgl_indo($biodatas->tanggal_lahir)}}</td>
            </tr>
            <tr>
                <td  width=100px> </td>
                <td  width=100px>Pangkat/Gol/Ruang </td>
                <td  width=5>:</td>
                <td > {{  pangkat($biodatas->pangkat_golongan)->pangkat }}</td>
            </tr>
            <tr>
                <td  width=100px> </td>
                <td  width=100px> Unit Kerja</td>
                <td  width=5>:</td>
                <td > {{  nama_sekolah($biodatas->sekolah_id)->nama }} </td>
            </tr>
        </table>

Yang telah dinilai oleh Tim Penilai Angka Kredit Jabatan Fungsional Guru Provinsi Kalimantan Utara pada tanggal 30 November s.d 4 Desember 2020, yang bersangkutan dinyatakan 
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
                                            
                                            number_format(json_decode($berita_acara->pd)->baru,3) - number_format(check_jabatan($biodatas->pangkat_golongan , 'akpkbpd'),3)
                                            + number_format(json_decode($berita_acara->prajabatan)->baru,3)
                                             >= 0

                                            &&

                                                number_format(
                                                number_format( number_format(json_decode($berita_acara->pi)->baru,3) + number_format(json_decode($berita_acara->ki)->baru,3) ,3) 
                                                -
                                                number_format( check_jabatan($biodatas->pangkat_golongan , 'akpkbpiki'),3)
                                                ,3) >= 0
                                            
                                            &&
                                                
                                                    number_format(
                                                        (json_decode($berita_acara->pendidikan)->baru + 
                                                        json_decode($berita_acara->prajabatan)->baru  +
                                                        json_decode($berita_acara->pembelajaran)->baru +
                                                        json_decode($berita_acara->bimbingan)->baru +
                                                        json_decode($berita_acara->tugas_lain)->baru +
                                                        json_decode($berita_acara->pd)->baru +
                                                        json_decode($berita_acara->pi)->baru +
                                                        json_decode($berita_acara->ki)->baru +
                                                        $berita_acara->dasus)
                                                        - 
                                                        (check_jabatan($biodatas->pangkat_golongan , 'akk')*90/100)
                                                        ,3) >= 0
                                            &&
                                                        number_format( 
                                                            
                                                            (json_decode($berita_acara->ijazah_tdk_sesuai)->baru + json_decode($berita_acara->pendukung)->baru)
                                                            -
                                                            (check_jabatan($biodatas->pangkat_golongan , 'akk')*10/100)
                                                        
                                                         ,3) <= 0
                                            
                                        )
                                            <b>
                                                Memenuhi Syarat
                                            </b>
                                             
                                        @else
                                            <b>
                                                Tidak Memenuhi Syarat
                                            </b>
                                        @endif
 untuk dibuatkan PAK Tahun 2020.										
Hasil penilaian DUPAK dan bukti fisiknya pada periode  
                @if(!empty($berita_acara->created_at))
                    @if($biodatas->pangkat_golongan == 1 )
                        {{  tgl_indo($biodatas->tmt_cpns).' - 31 Desember '.date("Y") }}
                    @else
                        @if( tgl_indo_tanpa_tahun($biodatas->tmt_pns) == '01 April')
                            {{  tgl_indo( date("Y-m-d",strtotime(date("Y-m-d", strtotime($biodatas->tmt_pns)) . "+3 months") )).' - 31 Desember '.date("Y",strtotime($berita_acara->created_at)) }}
                        @else
                            {{  tgl_indo( date("Y-m-d",strtotime(date("Y-m-d", strtotime($biodatas->tmt_pns)) . "+3 months")) ).' - 31 Desember '.date("Y",strtotime($berita_acara->created_at)) }}
                        @endif
                    @endif
                @else
                    @if($biodatas->pangkat_golongan == 1 )
                        {{  tgl_indo($biodatas->tmt_cpns).' - 31 Desember '.date("Y") }}
                    @else
                        @if( tgl_indo_tanpa_tahun($biodatas->tmt_pns) == '01 April')
                            {{  tgl_indo( date("Y-m-d",strtotime(date("Y-m-d", strtotime($biodatas->tmt_pns)) . "+3 months") )).' - 31 Desember '.date("Y") }}
                        @else
                            {{  tgl_indo( date("Y-m-d",strtotime(date("Y-m-d", strtotime($biodatas->tmt_pns)) . "+3 months")) ).' - 31 Desember '.date("Y") }}
                        @endif
                    @endif
                @endif adalah sebagai berikut :										


    <table>
        <tbody style="font-size:11;">
            <tr style="text-align:center">
                <td style="border: 1px solid black;" colspan=4> PENETAPAN ANGKA KREDIT</td>
                <td style="border: 1px solid black;" width=100px > LAMA</td>
                <td style="border: 1px solid black;" width=100px > BARU</td>
                <td style="border: 1px solid black;" width=100px > JUMLAH</td>
            </tr>
            <tr>
                <td style="border: 1px solid black;" width="2%" >1</td>
                <td style="border: 1px solid black;" colspan=3> <b>Unsur Utama</b></td>
                <td style="border: 1px solid black;" > <b></b></td>
                <td style="border: 1px solid black;" style="text-align:right"> <b>{{ $berita_acara->dasus }}</b></td>
                <td style="border: 1px solid black;" style="text-align:right"> <b>{{ $berita_acara->dasus }}</b></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;" width="2%" rowspan="12"></td>
                <td style="border: 1px solid black;" colspan=3> a. Pendidikan</td>
                <td style="border: 1px solid black;" > </td>
                <td style="border: 1px solid black;" > </td>
                <td style="border: 1px solid black;" > </td>
            </tr>
            <tr>
                <td style="border: 1px solid black;" colspan="3">1) Pendidikan sekolah dan memperoleh gelar ijazah </td>
                <td style="border: 1px solid black;" style="text-align:right" >{{ number_format(json_decode($berita_acara->pendidikan)->lama,3) }}</td>
                <td style="border: 1px solid black;" style="text-align:right" >{{ number_format(json_decode($berita_acara->pendidikan)->baru,3) }}</td>
                <td style="border: 1px solid black;" style="text-align:right" >{{ number_format(json_decode($berita_acara->pendidikan)->total,3) }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid black;" colspan="3">2) Mengikuti pelatihan prajabatan</td>
                <td style="border: 1px solid black;" style="text-align:right" >{{ number_format(json_decode($berita_acara->prajabatan)->lama,3) }}</td>
                <td style="border: 1px solid black;" style="text-align:right" >{{ number_format(json_decode($berita_acara->prajabatan)->baru,3) }}</td>
                <td style="border: 1px solid black;" style="text-align:right" >{{ number_format(json_decode($berita_acara->prajabatan)->total,3) }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid black;" colspan="3">b. Pembelajaran /  bimbingan dan tugas tertentu</td>
                <td style="border: 1px solid black;"></td>
                <td style="border: 1px solid black;"></td>
                <td style="border: 1px solid black;"></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;" colspan="3">    1) Proses pembelajaran	</td>
                <td style="border: 1px solid black;" style="text-align:right" >{{ number_format(json_decode($berita_acara->pembelajaran)->lama,3) }}</td>
                <td style="border: 1px solid black;" style="text-align:right" >{{ number_format(json_decode($berita_acara->pembelajaran)->baru,3) }}</td>
                <td style="border: 1px solid black;" style="text-align:right" >{{ number_format(json_decode($berita_acara->pembelajaran)->total,3) }}</td>   
            </tr>
            <tr>
                <td style="border: 1px solid black;" colspan="3">    2) Proses bimbingan	</td>
                <td style="border: 1px solid black;" style="text-align:right" >{{ number_format(json_decode($berita_acara->bimbingan)->lama,3) }}</td>
                <td style="border: 1px solid black;" style="text-align:right" >{{ number_format(json_decode($berita_acara->bimbingan)->baru,3) }}</td>
                <td style="border: 1px solid black;" style="text-align:right" >{{ number_format(json_decode($berita_acara->bimbingan)->total,3) }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid black;" colspan="3">    3) Tugas lain yang relevan</td>
                <td style="border: 1px solid black;" style="text-align:right" >{{ number_format(json_decode($berita_acara->tugas_lain)->lama,3) }}</td>
                <td style="border: 1px solid black;" style="text-align:right" >{{ number_format(json_decode($berita_acara->tugas_lain)->baru,3) }}</td>
                <td style="border: 1px solid black;" style="text-align:right" >{{ number_format(json_decode($berita_acara->tugas_lain)->total,3) }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid black;" colspan="3">c. Pengembangan Keprofesian</td>
                <td style="border: 1px solid black;"></td>
                <td style="border: 1px solid black;"></td>
                <td style="border: 1px solid black;"></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;" colspan="3"> 1) Pengembangan diri</td>
                <td style="border: 1px solid black;" style="text-align:right" >{{ number_format(json_decode($berita_acara->pd)->lama,3) }}</td>
                <td style="border: 1px solid black;" style="text-align:right" >{{ number_format(json_decode($berita_acara->pd)->baru,3) }}</td>
                <td style="border: 1px solid black;" style="text-align:right" >{{ number_format(json_decode($berita_acara->pd)->total,3) }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid black;" colspan="3">2) Publikasi ilmiah</td>
                <td style="border: 1px solid black;" style="text-align:right" >{{ number_format(json_decode($berita_acara->pi)->lama,3) }}</td>
                <td style="border: 1px solid black;" style="text-align:right" >{{ number_format(json_decode($berita_acara->pi)->baru,3) }}</td>
                <td style="border: 1px solid black;" style="text-align:right" >{{ number_format(json_decode($berita_acara->pi)->total,3) }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid black;" colspan="3">  3) Karya Inovatif</td>
                <td style="border: 1px solid black;" style="text-align:right" >{{ number_format(json_decode($berita_acara->ki)->lama,3) }}</td>
                <td style="border: 1px solid black;" style="text-align:right" >{{ number_format(json_decode($berita_acara->ki)->baru,3) }}</td>
                <td style="border: 1px solid black;" style="text-align:right" >{{ number_format(json_decode($berita_acara->ki)->total,3) }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid black;" colspan="3"> <b>Jumlah Unsur Utama</b></td>
                <td style="border: 1px solid black;" style="text-align:right"> 
                    <b>
                        {{
                            number_format(
                            json_decode($berita_acara->pendidikan)->lama + 
                            json_decode($berita_acara->prajabatan)->lama  +
                            json_decode($berita_acara->pembelajaran)->lama +
                            json_decode($berita_acara->bimbingan)->lama +
                            json_decode($berita_acara->tugas_lain)->lama +
                            json_decode($berita_acara->pd)->lama +
                            json_decode($berita_acara->pi)->lama +
                            json_decode($berita_acara->ki)->lama,3)
                        }}
                    </b>
                </td>
                <td style="border: 1px solid black;" style="text-align:right">
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
                            json_decode($berita_acara->ki)->baru,3)
                        }}
                    </b>
                </td>
                <td style="border: 1px solid black;" style="text-align:right">
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
                            json_decode($berita_acara->ki)->total,3)
                        }}
                    </b>
                    </td>
            </tr>
            <tr>
                <td style="border: 1px solid black;" width="2%" >2</td>
                <td style="border: 1px solid black;" colspan="3"><b>Unsur Penunjang</b></td>
                <td style="border: 1px solid black;"></td>
                <td style="border: 1px solid black;"></td>
                <td style="border: 1px solid black;"></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;" width="2%" rowspan="4"></td>
                <td style="border: 1px solid black;" colspan="3">1. Ijazah yang tidak sesuai</td>
                <td style="border: 1px solid black;" style="text-align:right" >{{ number_format(json_decode($berita_acara->ijazah_tdk_sesuai)->lama,3) }}</td>
                <td style="border: 1px solid black;" style="text-align:right" >{{ number_format(json_decode($berita_acara->ijazah_tdk_sesuai)->baru,3) }}</td>
                <td style="border: 1px solid black;" style="text-align:right" >{{ number_format(json_decode($berita_acara->ijazah_tdk_sesuai)->total,3) }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid black;" colspan="3">2. Pendukung tugas guru</td>
                <td style="border: 1px solid black;" style="text-align:right" >{{ number_format(json_decode($berita_acara->pendukung)->lama,3) }}</td>
                <td style="border: 1px solid black;" style="text-align:right" >{{ number_format(json_decode($berita_acara->pendukung)->baru,3) }}</td>
                <td style="border: 1px solid black;" style="text-align:right" >{{ number_format(json_decode($berita_acara->pendukung)->total,3) }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid black;" colspan="3"><b>Jumlah Unsur Penunjang	</b></td>
                <td style="border: 1px solid black;" style="text-align:right">
                    <b>
                        {{
                            number_format(json_decode($berita_acara->ijazah_tdk_sesuai)->lama +
                            json_decode($berita_acara->pendukung)->lama,3)
                        }}
                    </b>
                </td>
                <td style="border: 1px solid black;" style="text-align:right">
                    <b>
                        {{
                            number_format(json_decode($berita_acara->ijazah_tdk_sesuai)->baru +
                            json_decode($berita_acara->pendukung)->baru,3)
                        }}
                    </b>
                </td> 
                <td style="border: 1px solid black;" style="text-align:right">
                    <b>
                        {{
                            number_format(json_decode($berita_acara->ijazah_tdk_sesuai)->total +
                            json_decode($berita_acara->pendukung)->total,3)
                        }}
                    </b>
                </td>
            </tr>
            <td style="border: 1px solid black;" colspan="3"><b> Jumlah Unsur Utama dan Penunjang</b></td>
                <td style="border: 1px solid black;" style="text-align:right">
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
                            json_decode($berita_acara->ki)->lama,3)
                        }}
                    </b>
                </td>
                <td style="border: 1px solid black;" style="text-align:right">
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
                <td style="border: 1px solid black;" style="text-align:right">
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

                            $berita_acara->dasus,3)

                        }}
                    </b>
                </td>
            </tr>
            <tr>
            </tr>
    </tbody>
    </table>
    <div align="left" style="margin-top:0px" >
        *) Penyesuaian PAK	 <br>						
        Komposisi perolehan angka kredit yang harus dipenuhi adalah sebagai berikut :							    
    </div>
    <br>
    <table style="font-size:10;">
        <thead >
            <tr>
                <td style="border: 1px solid black;font-size:9;text-align:center" width="19%" rowspan="2">
                      URAIAN  
                </td>
                <td style="border: 1px solid black;font-size:9;text-align:center" width="10%" rowspan="2">
                        AKK
                </td>
                <td style="border: 1px solid black;font-size:9;text-align:center" colspan="3">
                        UNSUR UTAMA
                </td>
                <td style="border: 1px solid black;font-size:9;text-align:center" width="15%"  rowspan="2">
                        UNSUR PENUNJANG  MAX 10%
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid black;font-size:9;text-align:center" width="17%" >
                        Pengembangan Diri
                </td>
                <td style="border: 1px solid black;font-size:9;text-align:center" width="17%">
                        P Ilmiah dan K Ilmiah
                </td>
                <td style="border: 1px solid black;font-size:9;text-align:center">
                        Jumlah Unsur Utama Min 90%
                </td>
            </tr>
        </thead>
        <tbody>
           
            <tr >
                <td style="border: 1px solid black;" ><b> AK yg diperoleh </b></td>
                <td style="border: 1px solid black;" style="text-align:right">
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
                </td>
                <td style="border: 1px solid black;" style="text-align:right">
                      {{
                        number_format(
                        json_decode($berita_acara->pd)->baru,3)
                      }}
                </td>
                <td style="border: 1px solid black;" style="text-align:right">
                    {{ 
                        number_format(
                        json_decode($berita_acara->pi)->baru +
                        json_decode($berita_acara->ki)->baru ,3)
                    
                    }}
                </td>
                <td style="border: 1px solid black;" style="text-align:right">
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
                </td>
                <td style="border: 1px solid black;" style="text-align:right">
                        {{
                            number_format(
                            json_decode($berita_acara->ijazah_tdk_sesuai)->baru +
                            json_decode($berita_acara->pendukung)->baru
                            ,3)

                        }}
                        
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid black;" ><b> AK yg wajib di peroleh</b></td>
                <td style="border: 1px solid black;" style="text-align:right">
                     {{  number_format(check_jabatan($biodatas->pangkat_golongan , 'target'),3) }}
                </td>
                <td style="border: 1px solid black;" style="text-align:right">
                    {{ number_format(check_jabatan($biodatas->pangkat_golongan , 'akpkbpd'),3) }}
                </td>
                <td style="border: 1px solid black;" style="text-align:right">
                    {{ number_format(check_jabatan($biodatas->pangkat_golongan , 'akpkbpiki'),3) }} 
                </td>
                <td style="border: 1px solid black;" style="text-align:right">
                    {{ number_format(check_jabatan($biodatas->pangkat_golongan , 'akk')*90/100,3) }}   
                </td>
                <td style="border: 1px solid black;" style="text-align:right">
                    {{ number_format(check_jabatan($biodatas->pangkat_golongan , 'akk')*10/100,3) }}
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"> <b>Kelebihan / Kekurangan </b></td>
                <td style="border: 1px solid black;" style="text-align:right">
                        {{
                            number_format(
                            (json_decode($berita_acara->ijazah_tdk_sesuai)->total +
                            json_decode($berita_acara->pendukung)->total +


                            json_decode($berita_acara->pendidikan)->total + 
                            json_decode($berita_acara->prajabatan)->total  +
                            json_decode($berita_acara->pembelajaran)->total +
                            json_decode($berita_acara->bimbingan)->total +
                            json_decode($berita_acara->tugas_lain)->total +
                            json_decode($berita_acara->pd)->total +
                            json_decode($berita_acara->pi)->total +
                            json_decode($berita_acara->ki)->total +

                            $berita_acara->dasus)
                            -
                            check_jabatan($biodatas->pangkat_golongan , 'target') 
                            ,3)


                        }}
                </td>
                <td style="border: 1px solid black;" style="text-align:right">
                        {{
                            number_format(json_decode($berita_acara->pd)->total - check_jabatan($biodatas->pangkat_golongan , 'akpkbpd'),3)
                        }}
                      
                </td>
                <td style="border: 1px solid black;" style="text-align:right">
                    {{
                        number_format(
                        (json_decode($berita_acara->pi)->baru +
                        json_decode($berita_acara->ki)->baru)
                        -
                        check_jabatan($biodatas->pangkat_golongan , 'akpkbpiki')
                        ,3)
                    }}   
                </td>
                <td style="border: 1px solid black;" style="text-align:right">
                    {{
                        number_format(
                            (json_decode($berita_acara->pendidikan)->baru + 
                            json_decode($berita_acara->prajabatan)->baru  +
                            json_decode($berita_acara->pembelajaran)->baru +
                            json_decode($berita_acara->bimbingan)->baru +
                            json_decode($berita_acara->tugas_lain)->baru +
                            json_decode($berita_acara->pd)->baru +
                            json_decode($berita_acara->pi)->baru +
                            json_decode($berita_acara->ki)->baru +

                            $berita_acara->dasus)
                            -
                            (check_jabatan($biodatas->pangkat_golongan , 'akk')*90/100)
                            ,3)

                    }}
                        
                </td>
                <td style="border: 1px solid black;" style="text-align:right">
                        {{
                            number_format(
                            (json_decode($berita_acara->ijazah_tdk_sesuai)->baru +
                            json_decode($berita_acara->pendukung)->baru)
                            -
                            (check_jabatan($biodatas->pangkat_golongan , 'akk')*10/100)
                            ,3)
                        }}
                </td>
            </tr>
        </tbody>
    </table>
    <p>
    <div style="text-align:left;margin-top:150px">
        <div style="font-size:9;" >
            <label for="catatan">
                LAMPIRAN SURAT HASIL PENILAIAN ANGKA KREDIT GURU (PIKI)<br>
                Nomor: 01122/B4.4/SKP/KP/2019<br>
                Tanggal: 10 Juli 2019<br><br>
            </label>
        </div>
        <div>
        <table border="1" style="font-size:9">
        <thead >
            <tr>
               <td width="2%">No</td>
               <td>Sub Unsur yang Dinilai</td>
               <td>Jenis Dokumen/Judul</td>
               <td>Alasan Belum memenuhi Syarat</td>
               <td>Saran</td>
            </tr>
        </thead>
        <tbody>
                @foreach($lampirans as $key => $lampiran)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$lampiran->jenis}}</td>
                        <td>{{$lampiran->judul}}</td>
                        <td>{{$lampiran->diskripsi}}</td>
                        <td>{{$lampiran->saran}}</td>
                    </tr>
                @endforeach 
        </tbody>
    </table>
        </div>
    </div>

    </p>

    <div style="text-align:left;padding-left:70%;font-size:10;">
                            <!-- @if(!empty($berita_acara->created_at))
                                Malinau, {{tgl_indo( customTanggal1($berita_acara->created_at,"Y-m-d") )}}
                            @else
                                Malinau, {{tgl_indo( $now )}}        
                            @endif -->
                            <br>    
                            Tanjung Selor, 4 Januari 2021
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <b>DR. H. Suriansyah, M.AP. </b>	<br>
                        Pembina Utama, IV/e	<br>
                        NIP. 196502011991031009	<br>
    </div>


</div>