@extends('layouts.app')
@section('content')
    <section id="download">
      <div class="container">
        <div class="content">
          <h3>Lorem ipsum dolor sit amet.</h3>
          <div class="downloadbutton">
          </div>
      </div>
    </div>
    </section>
    <section id="portfoliopage">
      <div class="container">
          <div id="container">
              <span id="pickfiles">Upload file</span>
          </div>
          <div id="filelist">Your browser doesn't have Flash, Silverlight or HTML5 support.</div>      
      </div>
    </section>
@endsection
@push('js')
 <script src="{{asset('/js/plupload.full.min.js')}}"></script>
     <script>
      window.addEventListener("load", function () {
        var uploader = new plupload.Uploader({
          browse_button: 'pickfiles',
          container: document.getElementById('container'),
          url: "{{route('importFileStore')}}",
          chunk_size: '5mb',
          max_retries: 5,
          filters: {
            max_file_size: '2gb',
            mime_types: [{title: "CSV", extensions: "csv"}]
          },
          init: {
            PostInit: function () {
              document.getElementById('filelist').innerHTML = '';
            },
            FilesAdded: function (up, files) {
              plupload.each(files, function (file) {
                document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
              });
              uploader.start();
            },
            UploadProgress: function (up, file) {
              
              document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
            },
            Error: function (up, err) {
              // DO YOUR ERROR HANDLING!
              console.log(err);
            }
          }
        });
        uploader.init();
      });
    </script>
@endpush