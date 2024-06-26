@extends('layouts.app')
@section ('content')
 
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="body">
    <ul class="nav nav-tabs3 white">
        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Home-new2">Data Warga</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Profile-new2">Tambah Warga</a></li>
       

    </ul>
    <div class="tab-content">
        {{-- TAB tabel data warga --}}
        <div class="tab-pane show active" id="Home-new2">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        {{-- search bar --}}
                        <form method="GET" action="{{route('data_warga')}}">
                            <div class="input-group">
                                    <div class="col-md-3">
                                        <div class="input-group mb-3">
                                            <input type="text" name="nama" class="form-control" placeholder="Cari nama/nik" aria-label="" aria-describedby="basic-addon1">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-outline-secondary" ><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </form>                            
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NIK</th>
                                        <th>NAMA</th>
                                        <th>Jenis Kelamin</th>
                                        <th>RT</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($warga as $penduduk)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$penduduk->nik}}</td>
                                        <td>{{$penduduk->nama}}</td>
                                        <td>{{$penduduk->jenis_kelamin}}</td>
                                        <td>{{$penduduk->rt}}</td>
                                        <td> 
                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModalCenter{{$penduduk->nik}}">Detail</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#edit{{$penduduk->nik}}">Edit</button>
                                        </td>                                        
                                    </tr>  
                                    <div class="modal fade" id="exampleModalCenter{{$penduduk->nik}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle"> data detail dari {{$penduduk->nama}} </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <p><strong>NIK</strong></p>
                                                            <p><strong>Nama</strong></p>
                                                            <p><strong>Jenis Kelamin</strong></p>
                                                            <p><strong>Tanggal Lahir</strong></p>
                                                            <p><strong>Pekerjaan</strong></p>
                                                            <p><strong>Status Kependudukan</strong></p>
                                                            <p><strong>Luas Rumah</strong></p>
                                                            <p><strong>Agama</strong></p>
                                                            <p><strong>Golongan Darah</strong></p>
                                                            <p><strong>Status</strong></p>
                                                            <p><strong>Pendidikan Terakhir</strong></p>
                                                            <p><strong>RT</strong></p>
                                                            <p><strong>Gaji</strong></p>
                                                            <p><strong>Domisili</strong></p>
                                                            <p><strong>Alamat</strong></p>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <p>:{{$penduduk->nik}}</p>
                                                            <p>:{{$penduduk->nama}}</p>
                                                            <p>:{{$penduduk->jenis_kelamin}}</p>
                                                            <p>:{{$penduduk->tanggal_lahir}}</p>
                                                            <p>:{{$penduduk->pekerjaan}}</p>
                                                            <p>:{{$penduduk->status_kependudukan}}</p>
                                                            <p>:{{$penduduk->luas_rumah}}</p>
                                                            <p>:{{$penduduk->agama}}</p>
                                                            <p>:{{$penduduk->golongan_darah}}</p>
                                                            <p>:{{$penduduk->status}}</p>
                                                            <p>:{{$penduduk->pendidikan}}</p>
                                                            <p>:{{$penduduk->rt}}</p>
                                                            <p>:{{$penduduk->gaji}}</p>
                                                            <p>:{{$penduduk->domisili}}</p>
                                                            <p>:{{$penduduk->alamat}}</p>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary theme-bg gradient">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    
                                    {{-- Edit --}}
                                    <div class="modal fade" id="edit{{$penduduk->nik}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle"> data detail dari {{$penduduk->nama}} </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">

                                                    <form method="post" action="{{route('prosesEditWarga')}}">
                                                        @csrf
                                                        <div class="row clearfix">
                                                            {{-- kiri atas --}}
                                                            <div class="col-lg-6 col-md-12">
                                                                <div class="form-group">
                                                                    <label for="">NIK :</label>
                                                                    <input name="nik" type="text" value="{{$penduduk->nik}}" class="form-control" placeholder="NIK" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">KK :</label>
                                                                    <input name="no_kk" type="text" value="{{$penduduk->no_kk}}" class="form-control" placeholder="Nomor KK" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Jenis Kelamin :</label>
                                                                    <select name="jenis_kelamin" class="custom-select" id="inputGroupSelect01" required>
                                                                        <option>Pilih Jenis Kelamin :</option>
                                                                        <option value="laki-laki" {{$penduduk->jenis_kelamin == 'laki-laki' ? 'selected' : ''}}>Laki-Laki</option>
                                                                        <option value="perempuan" {{$penduduk->jenis_kelamin == 'perempuan' ? 'selected' : ''}}>Perempuan</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group  ">
                                                                    <label>Tanggal Lahir :</label>
                                                                    <div class="input-group">
                                                                        <input name="tanggal_lahir" value="{{$penduduk->tanggal_lahir}}" type="date"  class="form-control"  placeholder="Pilih tanggal" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Pekerjaan :</label>
                                                                    <input name="pekerjaan" value="{{$penduduk->pekerjaan}}" type="text" class="form-control" placeholder="Pekerjaan" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Status Kependudukan :</label>
                                                                    <select name="status_kependudukan" class="custom-select" id="inputGroupSelect01" required>
                                                                        <option>Pilih Status Kependudukan</option>
                                                                        <option value="Warga Tetap" {{$penduduk->status_kependudukan == 'Warga Tetap' ? 'selected' : ''}}>Warga Tetap</option>
                                                                        <option value="Warga Kontrak" {{$penduduk->status_kependudukan == 'Warga Kontrak' ? 'selected' : ''}}>Warga Kontrak</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Luas Rumah :</label>
                                                                    <input name="luas_rumah" value="{{$penduduk->luas_rumah}}" type="text" class="form-control" placeholder="Luas Rumah (m2)" required>
                                                                </div>
                                                            </div>
                                                            {{-- Kanan atas --}}
                                                            <div class="col-lg-6 col-md-12">
                                                                <div class="form-group">
                                                                    <label for="">Nama :</label>
                                                                    <input name="nama" value="{{$penduduk->nama}}" type="text" class="form-control" placeholder="Nama" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Agama :</label>
                                                                    <select name="agama" class="custom-select" id="inputGroupSelect01" required>
                                                                        <option>Pilih agama</option>
                                                                        <option value="islam" {{$penduduk->agama == 'islam' ? 'selected' : ''}}>islam</option>
                                                                        <option value="katolik" {{$penduduk->agama == 'katolik' ? 'selected' : ''}}>katolik</option>
                                                                        <option value="kristen" {{$penduduk->agama == 'kristen' ? 'selected' : ''}}>kristen</option>
                                                                        <option value="budha" {{$penduduk->agama == 'budha' ? 'selected' : ''}}>budha</option>
                                                                        <option value="hindu" {{$penduduk->agama == 'hindu' ? 'selected' : ''}}>hindu</option>
                                                                        <option value="konghucu" {{$penduduk->agama == 'konghucu' ? 'selected' : ''}}>konghucu</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Golongan Darah :</label>
                                                                    <select name="golongan_darah" class="custom-select" id="inputGroupSelect01" required>
                                                                        <option>Pilih golongan darah</option>
                                                                        <option value="A" {{$penduduk->golongan_darah == 'A' ? 'selected' : ''}}>A</option>
                                                                        <option value="B" {{$penduduk->golongan_darah == 'B' ? 'selected' : ''}}>B</option>
                                                                        <option value="AB" {{$penduduk->golongan_darah == 'AB' ? 'selected' : ''}}>AB</option>
                                                                        <option value="O" {{$penduduk->golongan_darah == 'O' ? 'selected' : ''}}>O</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Status :</label>
                                                                    <select name="status" class="custom-select" id="inputGroupSelect01" required>
                                                                        <option >Pilih Status</option>
                                                                        <option value="janda/duda" {{$penduduk->status == 'janda/duda' ? 'selected' : ''}}>Janda/Duda</option>
                                                                        <option value="miskin" {{$penduduk->status == 'miskin' ? 'selected' : ''}}>Miskin</option>    
                                                                        <option value="sakit parah" {{$penduduk->status == 'sakit parah' ? 'selected' : ''}}>Sakit Parah</option>    
                                                                        <option value="sebatang kara" {{$penduduk->status == 'sebatang kara' ? 'selected' : ''}}>Sebatang Kara</option>    
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Pendidikan Terakhir :</label>
                                                                    <select name="pendidikan" class="custom-select" id="inputGroupSelect01" required>
                                                                        <option >Pendidikan terakhir </option>
                                                                        <option value="SD" {{$penduduk->pendidikan == 'SD' ? 'selected' : ''}}>SD</option>
                                                                        <option value="SMP" {{$penduduk->pendidikan == 'SMP' ? 'selected' : ''}}>SMP</option>
                                                                        <option value="SMA" {{$penduduk->pendidikan == 'SMA' ? 'selected' : ''}}>SMA</option>
                                                                        <option value="Tidak Sekolah" {{$penduduk->pendidikan == 'Tidak Sekolah' ? 'selected' : ''}}>Tidak Sekolah</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">RT :</label>
                                                                    <select name="rt" class="custom-select" id="inputGroupSelect01" required>
                                                                        <option >Pilih rt (domisili) </option>
                                                                        <option value="1" {{$penduduk->rt == '1' ? 'selected' : ''}}>1</option>
                                                                        <option value="2" {{$penduduk->rt == '2' ? 'selected' : ''}}>2</option>
                                                                        <option value="3" {{$penduduk->rt == '3' ? 'selected' : ''}}>3</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Gaji :</label>
                                                                    <select name="gaji" class="custom-select" id="inputGroupSelect01" required>
                                                                        <option >Pilih rentang gaji </option>
                                                                        <option value="0-400.000" {{$penduduk->gaji == '0-400.000' ? 'selected' : ''}}>0-400.000</option>
                                                                        <option value="400.000-600.000" {{$penduduk->gaji == '400.000-600.000' ? 'selected' : ''}}>400.000-600.000</option>
                                                                        <option value="600.000-1.000.000" {{$penduduk->gaji == '600.000-1.000.000' ? 'selected' : ''}}>600.000-1.000.000</option>
                                                                        <option value=">1.000.000" {{$penduduk->gaji == '>1.000.000' ? 'selected' : ''}}>>1.000.000</option>
                                                                    </select>
                                                                </div>
                                                            </div>       
                                                                  
                                                            {{-- Bawah --}}
                                                            <div class="col-lg-12 col-md-12">
                                                                <hr>
                                                                <h6>*Pastikan alamat  sesuai</h6>
                                                                <div class="form-group c_form_group">
                                                                    <label>Domisili :</label>
                                                                    <input name="domisili" value="{{$penduduk->domisili}}" type="text" class="form-control" placeholder="alamat tempat tinggal sekarang" required>
                                                                </div>
                                                                <div class="form-group c_form_group">
                                                                    <label>Alamat :</label>
                                                                    <input name="alamat" value="{{$penduduk->alamat}}" type="text" class="form-control" placeholder="alamat asli sesuai dengan (KTP)" required>
                                                                </div>
                                                            </div>
                                                        </div>                                                  
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary theme-bg gradient">Save changes</button>
                                                </div>

                                            </form>

                                            </div>
                                        </div>
                                    </div>  
                                    @endforeach                                                                                               
                                   
                                </tbody>
                            </table>
                            {{-- Button Pagination --}}
                            <div class="text-center mt-3">
                                <a href="{{ $warga->previousPageUrl() }}" class="btn btn-primary {{ $warga->onFirstPage() ? 'disabled' : '' }}">Previous</a>
                                <a href="{{ $warga->nextPageUrl() }}" class="btn btn-primary {{ $warga->hasMorePages() ? '' : 'disabled' }}">Next</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Detail Modals ini basically template boi--}}
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <p>Cras mattis consectetur orbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary theme-bg gradient">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- TAB Tambah warga --}}
        <div class="tab-pane" id="Profile-new2">
        <form method="post" action="{{route('prosesTambahWarga')}}">
            @csrf
            <div class="card">
                <div class="header">
                    <h2>Data diri</h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        {{-- kiri atas --}}
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label for="">NIK :</label>
                                <input name="nik" type="text" class="form-control" placeholder="NIK" required>
                            </div>
                            <div class="form-group">
                                <label for="">KK :</label>
                                <input name="no_kk" type="text" class="form-control" placeholder="Nomor KK" required>
    
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin :</label>
                                <select name="jenis_kelamin" class="custom-select" id="inputGroupSelect01" required>
                                    <option>Pilih Jenis Kelamin :</option>
                                    <option value="laki-laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group  ">
                                <label>Tanggal Lahir :</label>
                                <div class="input-group">
                                    <input name="tanggal_lahir" type="date"  class="form-control"  placeholder="Pilih tanggal" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Pekerjaan :</label>
                                <input name="pekerjaan" type="text" class="form-control" placeholder="Pekerjaan" required>
                            </div>
                            <div class="form-group">
                                <label for="">Status Kependudukan :</label>
                                <select name="status_kependudukan" class="custom-select" id="inputGroupSelect01" required>
                                    <option>Pilih Status Kependudukan</option>
                                    <option value="Warga Tetap">Warga Tetap</option>
                                    <option value="Warga Kontrak">Warga Kontrak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Luas Rumah :</label>
                                <input name="luas_rumah" type="text" class="form-control" placeholder="Luas Rumah (m2)" required>
                            </div>
                        </div>
                        {{-- Kanan atas --}}
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label for="">Nama :</label>
                                <input name="nama" type="text" class="form-control" placeholder="Nama" required>
                            </div>
                            <div class="form-group">
                                <label for="">Agama :</label>
                                <select name="agama" class="custom-select" id="inputGroupSelect01" required>
                                    <option>Pilih agama</option>
                                    <option value="islam">islam</option>
                                    <option value="katolik">katolik</option>
                                    <option value="kristen">kristen</option>
                                    <option value="budha">budha</option>
                                    <option value="hindu">hindu</option>
                                    <option value="konghucu">konghucu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Golongan Darah :</label>
                                <select name="golongan_darah" class="custom-select" id="inputGroupSelect01" required>
                                    <option>Pilih golongan darah</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Status :</label>
                                <select name="status" class="custom-select" id="inputGroupSelect01" required>
                                    <option >Pilih Status</option>
                                    <option value="janda/duda">Janda/Duda</option>
                                    <option value="miskin">Miskin</option>    
                                    <option value="sakit parah">Sakit Parah</option>    
                                    <option value="sebatang kara">Sebatang Kara</option>    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Pendidikan Terakhir :</label>
                                <select name="pendidikan" class="custom-select" id="inputGroupSelect01" required>
                                    <option >Pendidikan terakhir </option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="Tidak Sekolah">Tidak Sekolah</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">RT :</label>
                                <select name="rt" class="custom-select" id="inputGroupSelect01" required>
                                    <option >Pilih rt (domisili) </option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Gaji :</label>
                                <select name="gaji" class="custom-select" id="inputGroupSelect01" required>
                                    <option >Pilih rentang gaji </option>
                                    <option value="0-400.000">0-400.000</option>
                                    <option value="400.000-600.000">400.000-600.000</option>
                                    <option value="600.000-1.000.000">600.000-1.000.000</option>
                                    <option value=">1.000.000">>1.000.000</option>
                                </select>
                            </div>
                        </div>       
                              
                        {{-- Bawah --}}
                        <div class="col-lg-12 col-md-12">
                            <hr>
                            <h6>*Pastikan alamat  sesuai</h6>
                            <div class="form-group c_form_group">
                                <label>Domisili :</label>
                                <input name="domisili" type="text" class="form-control" placeholder="alamat tempat tinggal sekarang" required>
                            </div>
                            <div class="form-group c_form_group">
                                <label>Alamat :</label>
                                <input name="alamat" type="text" class="form-control" placeholder="alamat asli sesuai dengan (KTP)" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary theme-bg gradient">Simpan</button>
                    
                </div>
            </div>   
        </form>

        </div>
        
        
    </div>
</div>



<!-- Javascript -->
<script src="assets/bundles/libscripts.bundle.js"></script>    
<script src="assets/bundles/vendorscripts.bundle.js"></script>
@endsection
