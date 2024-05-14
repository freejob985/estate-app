<!-- import.blade.php -->
@extends('layout')

@section('content')
    <h1>Import Excel File</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('properties.import') }}" method="POST" enctype="multipart/form-data">
        @csr
        <div class="form-group">
            <label for="file">Choose Excel File</label>

            {{-- <input type="file" class="form-control-file" id="file" name="file" required> --}}
{{--
<div class="custom-file-container" data-upload-id="myFirstExcel">
  <label>Upload Excel File <a href="javascript:void(0)" class="custom-file-container__file-clear" title="Clear File">x</a></label>
  <label class="custom-file-container__custom-file">
    <input type="file" class="custom-file-container__custom-file__custom-file-input" accept=".xlsx, .xls" name="file">
    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
    <span class="custom-file-container__custom-file__custom-file-control"></span>
  </label>
  <div class="custom-file-container__file-preview"></div>
</div> --}}




<div class="custom-file-container" data-upload-id="myFirstImage">
    <label>Upload (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
    <label class="custom-file-container__custom-file" >
        <input type="file" class="custom-file-container__custom-file__custom-file-input" >
        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
        <span class="custom-file-container__custom-file__custom-file-control"></span>
    </label>
    <div class="custom-file-container__image-preview"></div>
</div>


        </div>
        <button type="submit" class="btn btn-primary">Import</button>
    </form>
<a href="{{ route('properties.export.template') }}" class="btn btn-success">Download Template</a>

@endsection
@push('css')
<style>
@import url('https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap');
*{
  font-family: "Cairo", sans-serif;

}
.table > tbody > tr > td {
    border: none;
    color: #888ea8;
    font-size: 20px;
    letter-spacing: 1px;
}
</style>
@endpush
