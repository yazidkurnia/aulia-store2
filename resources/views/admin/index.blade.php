@extends('template.admin.index')

@section('content')
  
@endsection

@section('js')
  <script type="text/javascript">
          // NOTE:: logout scrypt
          $(document).ready(function() {
            $('#logout-link').click(function(event) {
                event.preventDefault();
                $('#logout-form').submit();
              });
          });
  </script>
@endsection