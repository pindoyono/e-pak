
<div class="material-datatables card-content table-responsive table-full-width">
    <table id="datatables" class="table table-striped table-no-bordered table-hover table-hover" cellspacing="0" width="100%" style="width:100%">
            <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Nama</th>
                <th rowspan="2">Sekolah</th>
                <th colspan="2">USULAN GOL.</th>
                <th colspan="4">Angka Kredit</th>
                <th colspan="4">PD</th>
                <th colspan="4">PI KI</th>
                <th rowspan="2">Keterangan</th>
                <th rowspan="2">Penilai</th>
            </tr>
            <tr>
                <th>Dari</th>
                <th>Ke</th>
                <th>Diperoleh</th>
                <th>Wajib</th>
                <th>+/-</th>
                <th>Ket</th>
                <th>Diperoleh</th>
                <th>Wajib</th>
                <th>+/-</th>
                <th>Ket</th>
                <th>Diperoleh</th>
                <th>Wajib</th>
                <th>+/-</th>
                <th>Ket</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $data)
            <tr>
                <td> {{$key+1}}</td>
                <td>
                        <a target="_blank" href="{{route('dupaks_penilai.createPDF', Crypt::encrypt($data->dupak_id))}}">
                            {{$data->name}}
                        </a>
                </td>
                <td> {{$data->sekolah}}</td>
                <td>{{ substr($data->pangkat,-5)}}</td>
                <td>{{ substr(check_naik_pangkat($data->idj)->pangkat,-5)  }}</td>
                <td>
                    {{
                        number_format(
                        json_decode($data->ijazah_tdk_sesuai)->total +
                        json_decode($data->pendukung)->total +
                        json_decode($data->pendidikan)->total + 
                        json_decode($data->prajabatan)->total  +
                        json_decode($data->pembelajaran)->total +
                        json_decode($data->bimbingan)->total +
                        json_decode($data->tugas_lain)->total +
                        json_decode($data->pd)->total +
                        json_decode($data->pi)->total +
                        json_decode($data->ki)->total +
                        $data->dasus 
                        ,3)


                    }}
                </td>
                <td>
                    {{ 
                        number_format(
                        check_jabatan($data->pangkat_golongan , 'target')
                        ,3) 
                    }}
                </td>
                <td>
                    {{
                        number_format(

                        number_format(
                        json_decode($data->ijazah_tdk_sesuai)->total +
                        json_decode($data->pendukung)->total +
                        json_decode($data->pendidikan)->total + 
                        json_decode($data->prajabatan)->total  +
                        json_decode($data->pembelajaran)->total +
                        json_decode($data->bimbingan)->total +
                        json_decode($data->tugas_lain)->total +
                        json_decode($data->pd)->total +
                        json_decode($data->pi)->total +
                        json_decode($data->ki)->total +
                        $data->dasus 
                        ,3) 
                        
                        -

                        number_format(
                        check_jabatan($data->pangkat_golongan , 'target')
                        ,3) 

                        ,3) 

                    }}
                </td>
                <td>
                    @if(
                        number_format(
                        json_decode($data->ijazah_tdk_sesuai)->total +
                        json_decode($data->pendukung)->total +
                        json_decode($data->pendidikan)->total + 
                        json_decode($data->prajabatan)->total  +
                        json_decode($data->pembelajaran)->total +
                        json_decode($data->bimbingan)->total +
                        json_decode($data->tugas_lain)->total +
                        json_decode($data->pd)->total +
                        json_decode($data->pi)->total +
                        json_decode($data->ki)->total +
                        $data->dasus 
                        ,3) 
                        
                        -

                        number_format(
                        check_jabatan($data->pangkat_golongan , 'target')
                        ,3) < 0
                    )
                    <span> Tidak Lolos</span>
                    @else
                    <span> Lolos</span>
                    @endif
                </td>
                <td>
                    {{
                        number_format(json_decode($data->pd)->total,3)
                    }}
                </td>
                <td>
                    {{
                        number_format(check_jabatan($data->pangkat_golongan , 'akpkbpd'),3)
                    }}
                </td>
                <td>
                    {{
                        number_format(
                        ( number_format(json_decode($data->pd)->total,3) - number_format(check_jabatan($data->pangkat_golongan , 'akpkbpd'),3) )
                        ,3) 
                    }}
                </td>
                <td>
                    @if(
                        number_format(json_decode($data->pd)->total,3) - number_format(check_jabatan($data->pangkat_golongan , 'akpkbpd'),3)
                         < 0
                    )
                    <span> Tidak Lolos</span>
                    @else
                    <span> Lolos</span>
                    @endif
                </td>
                <td>
                        {{
                            number_format( number_format(json_decode($data->pi)->total,3) + number_format(json_decode($data->ki)->total,3) ,3)
                        }}
                </td>
                <td>
                        {{
                            number_format( check_jabatan($data->pangkat_golongan , 'akpkbpiki'),3)
                        }}
                </td>
                <td>
                        {{
                            number_format(
                            number_format( number_format(json_decode($data->pi)->total,3) + number_format(json_decode($data->ki)->total,3) ,3) 
                            -
                            number_format( check_jabatan($data->pangkat_golongan , 'akpkbpiki'),3)
                            ,3)
                        }}
                </td>
                <td>
                    @if(
                            number_format(
                            number_format( number_format(json_decode($data->pi)->total,3) + number_format(json_decode($data->ki)->total,3) ,3) 
                            -
                            number_format( check_jabatan($data->pangkat_golongan , 'akpkbpiki'),3)
                            ,3) < 0
                    )
                    <span> Tidak Lolos</span>
                    @else
                    <span> Lolos</span>
                    @endif
                </td>
                <td>
                @if(
                        number_format(
                        json_decode($data->ijazah_tdk_sesuai)->total +
                        json_decode($data->pendukung)->total +
                        json_decode($data->pendidikan)->total + 
                        json_decode($data->prajabatan)->total  +
                        json_decode($data->pembelajaran)->total +
                        json_decode($data->bimbingan)->total +
                        json_decode($data->tugas_lain)->total +
                        json_decode($data->pd)->total +
                        json_decode($data->pi)->total +
                        json_decode($data->ki)->total +
                        $data->dasus 
                        ,3) 
                        
                        -

                        number_format(
                        check_jabatan($data->pangkat_golongan , 'target')
                        ,3) >= 0
                        
                        &&
                        
                        (number_format(json_decode($data->pd)->total,3) - number_format(check_jabatan($data->pangkat_golongan , 'akpkbpd'),3))
                        
                         >= 0

                        &&

                            number_format(
                            number_format( number_format(json_decode($data->pi)->total,3) + number_format(json_decode($data->ki)->total,3) ,3) 
                            -
                            number_format( check_jabatan($data->pangkat_golongan , 'akpkbpiki'),3)
                            ,3) >= 0

                        
                    )

                            @role('admin provinsi')
                                <a target="_blank" href="{{route('dupaks_penilai.create_pak_PDF', Crypt::encrypt($data->dupak_id))}}">
                                    <span> Memenuhi Syarat</span>
                                </a>
                            @else
                                <span> Memenuhi Syarat</span>
                            @endrole
                    @else
                        @role('admin provinsi')
                                <a target="_blank" href="{{route('dupaks_penilai.create_pak_PDF', Crypt::encrypt($data->dupak_id))}}">
                                    <span> Tidak Memenuhi Syarat</span>
                                </a>
                            @else
                                <span> Tidak Memenuhi Syarat</span>
                            @endrole
                            
                    @endif
                </td>
                <td>
                        {{
                            $data->penilai
                        }}
                </td>
            </tr>
            @endforeach 
            
        </tbody>
    </table>
</div>