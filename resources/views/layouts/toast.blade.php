<script>
  @if(Session::has('message'))
  Toastify({
        text:" {{ session('message') }}",
        duration: 3000,
        close:true,
        gravity:"top",
        position: "right",
        backgroundColor: "#4fbe87",
    }).showToast();
  @endif

 @if(Session::has('error'))
 Toastify({
        text: "This is toast in top right",
        duration: 3000,
        close:true,
        gravity:"top",
        position: "right",
        backgroundColor: "#4fbe87",
    }).showToast();
  @endif

  @if(Session::has('info'))
 Toastify({
        text: "This is toast in top right",
        duration: 3000,
        close:true,
        gravity:"top",
        position: "right",
        backgroundColor: "#4fbe87",
    }).showToast();
  @endif

  @if(Session::has('warning'))
 Toastify({
        text: "This is toast in top right",
        duration: 3000,
        close:true,
        gravity:"top",
        position: "right",
        backgroundColor: "#4fbe87",
    }).showToast();
  @endif
</script>
