<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE</title>

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link href="{{ asset('assets/admin/css/admin.css') }}" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <h2 class="my-2">Portfolio</h2>
  </nav>

  @include('admin.layouts.sidebar')

  <div class="content-wrapper">
    @if(session()->has('success'))
      <div class="alert alert-success m-3 mb-0">{{ session('success') }}</div>
    @endif

    @if(session()->has('error'))
      <div class="alert alert-danger m-3 mb-0">{{ session('error') }}</div>
    @endif
    <div class="content mt-3">
      <div class="container-fluid">
        @yield('content')
      </div>
    </div>
  </div>

  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>
</div>

<script src="{{ asset('assets/admin/js/admin.js') }}"></script>

<script>
    $('.nav-sidebar a').each(function () {
        let location = window.location.protocol + '//' + window.location.host + window.location.pathname;
        let link = this.href;
        if (link == location) {
            $(this).addClass('active');
            $(this).closest('.has-treeview').addClass('menu-open');
        }
    });

    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>

{{--<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>--}}
<script src="{{ asset('js/ckeditor5/build/ckeditor.js') }}"></script>
<script src="{{ asset('js/ckfinder/ckfinder.js') }}"></script>
<script>CKFinder.config({connectorPath: '/ckfinder/connector'});</script>

<style>
    .ck.ck-content.ck-editor__editable {
        min-height: 300px;
    }
</style>

<script>
    ClassicEditor
        .create(document.querySelector('#content'), {
            ckfinder: {
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
            },
            toolbar: ['ckfinder', 'imageUpload', '|', 'heading', '|', 'bold', 'italic', 'link', '|', 'numberedList', 'bulletedList', '|', 'insertTable', '|', 'code', 'sourceEditing', 'HTMLEmbed', '|', 'undo', 'redo',]
            // toolbar: {
            //     items: [
            //         'heading', '|',
            //         'fontfamily', 'fontsize', '|',
            //         'alignment', '|',
            //         'fontColor', 'fontBackgroundColor', '|',
            //         'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
            //         'link', '|',
            //         'outdent', 'indent', '|',
            //         'bulletedList', 'numberedList', 'todoList', '|',
            //         'code', 'codeBlock', '|',
            //         'insertTable', '|',
            //         'uploadImage', 'blockQuote', '|',
            //         'undo', 'redo'
            //     ],
            //     shouldNotGroupWhenFull: true
            // }
        })
        .catch(error => {
            console.error(error);
        });
</script>

</body>
</html>