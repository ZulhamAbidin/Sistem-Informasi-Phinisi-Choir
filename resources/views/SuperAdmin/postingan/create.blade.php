@extends('layouts.main')
@section('container')
    <div class="main-container container-fluid">

        <div class="page-header">
            <h1 class="page-title">Buat Postingan</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Postingan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Buat Postingan</li>
                </ol>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('admin.postingan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Judul Postingan -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="judul_postingan">Judul Postingan</label>
                                        <input type="text" name="judul_postingan" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kategori">Kategori</label>
                                        <select name="kategori" class="form-control form-select" data-bs-placeholder="Select Country">
                                            <option value="news" selected>news</option>
                                            <option value="competition">competition</option>
                                            <option value="achievement">achievement</option>
                                        </select>
                                    </div>
                                </div>
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sumber">Sumber</label>
                                        <input  type="text" name="sumber" class="form-control" value="">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lokasi">Lokasi</label>
                                        <input  type="text" name="lokasi" class="form-control" placeholder="Gedung BU UNM" required>
                                    </div>
                                </div>
                                
                           
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sampul">Gambar Utama</label>
                                        <input type="file" name="sampul" class=" form-control" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gambar_pendukung">Gambar Pendukung</label>
                                        <input type="file" name="gambar_pendukung[]" class="form-control" multiple>
                                        <small class="text-danger">Maksimal 15 Gambar</small>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea type="text" class="form-control" id="summernote" cols="30" rows="10" name="deskripsi" required></textarea>
                                </div>

                                {{-- <div class="form-group">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="highlights" name="highlights">
                                        <label class="form-check-label" for="highlights">Highlights</label>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="sampai_dengan_tanggal">Sampai dengan Tanggal</label>
                                    <input type="date" class="form-control" id="sampai_dengan_tanggal" name="sampai_dengan_tanggal">
                                    <small class="form-text text-muted">Pilih tanggal jika ingin menetapkan batas waktu.</small>
                                </div> --}}


                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block">Simpan Postingan</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            
        </div>
        
    </div>


    <script>
        $('#summernote').summernote({
                placeholder: 'description...',
                tabsize:2,
                height:300
            });
    </script>
@endsection
