<!-- Javascript -->
<script src="{{asset('js/app.min.js')}}"></script>






{{--Toastr--}}
<script src="{{ asset("js/toastr.js") }}"></script>
<script>
    @if(Session::has('error'))
    toastr.error("{{ Session::get("error") }}")
    @endif

    @if(Session::has('success'))
    toastr.success("{{ Session::get("success") }}")
    @endif
    @if(Session::has('info'))
    toastr.info("{{ Session::get("info") }}")
    @endif

    @if($errors->any())
    @foreach($errors->all() as $err)
    toastr.error("{{ $err }}");
    @endforeach
    @endif
</script>